<?php
session_start();
require "conexion.php";

$usuario = trim($_POST["usuario"] ?? "");
$password = $_POST["password"] ?? "";

if (empty($usuario) || empty($password)) {
    $_SESSION["mensaje"] = "Completa usuario y contraseña.";
    header("Location: ../login.php");
    exit;
}

$sql = "SELECT u.id, u.usuario, u.password_hash, u.rol_id, u.activo, up.nombre, up.apellido, up.email
        FROM usuarios u
        INNER JOIN usuario_perfil up ON u.id = up.usuario_id
        WHERE u.usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    $_SESSION["mensaje"] = "Usuario no encontrado.";
    header("Location: ../login.php");
    exit;
}

$user = $resultado->fetch_assoc();

if ((int)$user["activo"] !== 1) {
    $_SESSION["mensaje"] = "Tu cuenta está inactiva.";
    header("Location: ../login.php");
    exit;
}

if (!password_verify($password, $user["password_hash"])) {
    $_SESSION["mensaje"] = "Contraseña incorrecta.";
    header("Location: ../login.php");
    exit;
}

$_SESSION["usuario_id"] = $user["id"];
$_SESSION["usuario"] = $user["usuario"];
$_SESSION["rol_id"] = $user["rol_id"];
$_SESSION["nombre"] = $user["nombre"];
$_SESSION["apellido"] = $user["apellido"];
$_SESSION["email"] = $user["email"];

header("Location: ../dashboard.php");
exit;
?>