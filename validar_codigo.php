<?php
session_start();
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: register.php");
    exit;
}

if (!isset($_SESSION["email_registro"])) {
    header("Location: register.php");
    exit;
}

$email = $_SESSION["email_registro"];
$codigo = trim($_POST["codigo"] ?? "");

if (empty($codigo)) {
    $_SESSION["mensaje"] = "Debes ingresar el código.";
    header("Location: verificar_codigo.php");
    exit;
}

$sql = "SELECT id FROM verificaciones_correo WHERE email = ? AND codigo = ? AND verificado = 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $codigo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $sqlUpdate = "UPDATE verificaciones_correo SET verificado = 1 WHERE email = ? AND codigo = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ss", $email, $codigo);
    $stmtUpdate->execute();

    $_SESSION["email_verificado"] = $email;
    unset($_SESSION["codigo_prueba"]);

   header("Location: completar_registro.php");
exit;
} else {
    $_SESSION["mensaje"] = "El código es incorrecto.";
    header("Location: verificar_codigo.php");
    exit;
}
?>