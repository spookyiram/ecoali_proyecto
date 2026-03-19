<?php
session_start();
require "conexion.php";
require "config_mail.php";
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: register.php");
    exit;
}

$email = trim($_POST["email"] ?? "");

if (empty($email)) {
    $_SESSION["mensaje"] = "Debes ingresar un correo.";
    header("Location: register.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["mensaje"] = "El correo no tiene un formato válido.";
    header("Location: register.php");
    exit;
}

/* Verificar si el correo ya existe */
$sqlCorreo = "SELECT email FROM usuario_perfil WHERE email = ?";
$stmtCorreo = $conn->prepare($sqlCorreo);
$stmtCorreo->bind_param("s", $email);
$stmtCorreo->execute();
$resultCorreo = $stmtCorreo->get_result();

if ($resultCorreo->num_rows > 0) {
    $_SESSION["mensaje"] = "Ese correo ya está registrado.";
    header("Location: register.php");
    exit;
}

/* Generar código */
$codigo = strval(rand(100000, 999999));

/* Eliminar códigos anteriores del mismo correo */
$sqlDelete = "DELETE FROM verificaciones_correo WHERE email = ?";
$stmtDelete = $conn->prepare($sqlDelete);
$stmtDelete->bind_param("s", $email);
$stmtDelete->execute();

/* Guardar nuevo código */
$sqlInsert = "INSERT INTO verificaciones_correo (email, codigo, verificado) VALUES (?, ?, 0)";
$stmtInsert = $conn->prepare($sqlInsert);
$stmtInsert->bind_param("ss", $email, $codigo);

if (!$stmtInsert->execute()) {
    $_SESSION["mensaje"] = "Error al generar el código.";
    header("Location: register.php");
    exit;
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = MAIL_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = MAIL_USERNAME;
    $mail->Password   = MAIL_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = MAIL_PORT;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Codigo de verificacion - Ecoali';
    $mail->Body = "
        <div style='font-family: Arial, sans-serif; padding:20px;'>
            <h2 style='color:#ff6a00;'>Verificacion de correo</h2>
            <p>Hola,</p>
            <p>Tu codigo de verificacion para completar tu registro en <strong>Ecoali</strong> es:</p>
            <div style='font-size:32px; font-weight:bold; color:#333; margin:20px 0;'>
                {$codigo}
            </div>
            <p>Si tu no solicitaste este registro, puedes ignorar este mensaje.</p>
        </div>
    ";
    $mail->AltBody = "Tu codigo de verificacion para Ecoali es: {$codigo}";

    $mail->send();

    $_SESSION["email_registro"] = $email;
    $_SESSION["mensaje"] = "Te enviamos un codigo de verificacion a tu correo.";
    header("Location: verificar_codigo.php");
    exit;

} catch (Exception $e) {
    $_SESSION["mensaje"] = "No se pudo enviar el correo. Error: " . $mail->ErrorInfo;
    header("Location: register.php");
    exit;
}
?>