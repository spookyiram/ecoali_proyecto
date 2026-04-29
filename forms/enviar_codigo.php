<?php
session_start();
require "conexion.php";
require "config_mail.php";
require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Validar método */
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../register.php");
    exit;
}

/* Obtener email */
$email = trim($_POST["email"] ?? "");

/* Validaciones */
if (empty($email)) {
    $_SESSION["mensaje"] = "Debes ingresar un correo.";
    header("Location: ../register.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["mensaje"] = "Correo inválido.";
    header("Location: ../register.php");
    exit;
}

/* Verificar si ya existe */
$sql = "SELECT email FROM usuario_perfil WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION["mensaje"] = "Ese correo ya está registrado.";
    header("Location: ../register.php");
    exit;
}

/* Generar código */
$codigo = strval(rand(100000, 999999));

/* Eliminar códigos anteriores */
$sqlDelete = "DELETE FROM verificaciones_correo WHERE email = ?";
$stmtDelete = $conn->prepare($sqlDelete);
$stmtDelete->bind_param("s", $email);
$stmtDelete->execute();

/* Guardar nuevo código */
$sqlInsert = "INSERT INTO verificaciones_correo (email, codigo, verificado)
              VALUES (?, ?, 0)";
$stmtInsert = $conn->prepare($sqlInsert);
$stmtInsert->bind_param("ss", $email, $codigo);

if (!$stmtInsert->execute()) {
    $_SESSION["mensaje"] = "Error al generar código.";
    header("Location: ../register.php");
    exit;
}

/* Enviar correo */
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = MAIL_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = MAIL_USERNAME;
    $mail->Password = MAIL_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = MAIL_PORT;
    $mail->CharSet = "UTF-8";

    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Código de verificación - Ecoali";

    $mail->Body = "
    <div style='font-family: Arial, sans-serif; background:#f4f6f8; padding:20px;'>
        <div style='max-width:500px; margin:auto; background:#ffffff; border-radius:10px; padding:30px; text-align:center;'>
            
            <h2 style='color:#ff6a00; margin-bottom:10px;'>Ecoali</h2>

            <p style='font-size:16px; color:#333;'>Hola 👋</p>

            <p style='font-size:15px; color:#555;'>
                Tu código de verificación para completar tu registro es:
            </p>

            <div style='font-size:36px; font-weight:bold; color:#ff6a00; margin:25px 0; letter-spacing:5px;'>
                {$codigo}
            </div>

            <p style='font-size:13px; color:#888;'>
                Este código es válido por unos minutos.<br>
                Si no solicitaste este registro, puedes ignorar este mensaje.
            </p>

        </div>
    </div>";

    $mail->AltBody = "Tu código de verificación para Ecoali es: {$codigo}";

    $mail->send();

    /* Guardar sesión */
    $_SESSION["email_registro"] = $email;
    $_SESSION["mensaje"] = "Te enviamos un código a tu correo.";

    header("Location: ../verificar_codigo.php");
    exit;

} catch (Exception $e) {
    $_SESSION["mensaje"] = "Error al enviar correo: " . $mail->ErrorInfo;
    header("Location: ../register.php");
    exit;
}