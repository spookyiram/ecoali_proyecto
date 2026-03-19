<?php
session_start();
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: register.php");
    exit;
}

if (!isset($_SESSION["email_verificado"])) {
    header("Location: register.php");
    exit;
}

$email = $_SESSION["email_verificado"];

$usuario = trim($_POST["usuario"] ?? "");
$nombre = trim($_POST["nombre"] ?? "");
$apellido = trim($_POST["apellido"] ?? "");
$direccion = trim($_POST["direccion"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$rol_id = trim($_POST["rol_id"] ?? "");
$password = $_POST["password"] ?? "";
$confirmar_password = $_POST["confirmar_password"] ?? "";

/* Validaciones */
if (
    empty($usuario) || empty($nombre) || empty($apellido) ||
    empty($rol_id) || empty($password) || empty($confirmar_password)
) {
    $_SESSION["mensaje"] = "Completa todos los campos obligatorios.";
    header("Location: completar_registro.php");
    exit;
}

if ($password !== $confirmar_password) {
    $_SESSION["mensaje"] = "Las contraseñas no coinciden.";
    header("Location: completar_registro.php");
    exit;
}

/* Validar que el usuario no exista */
$sqlUsuario = "SELECT id FROM usuarios WHERE usuario = ?";
$stmtUsuario = $conn->prepare($sqlUsuario);
$stmtUsuario->bind_param("s", $usuario);
$stmtUsuario->execute();
$resultUsuario = $stmtUsuario->get_result();

if ($resultUsuario->num_rows > 0) {
    $_SESSION["mensaje"] = "El nombre de usuario ya existe.";
    header("Location: completar_registro.php");
    exit;
}

/* Validar que el correo no exista */
$sqlEmail = "SELECT usuario_id FROM usuario_perfil WHERE email = ?";
$stmtEmail = $conn->prepare($sqlEmail);
$stmtEmail->bind_param("s", $email);
$stmtEmail->execute();
$resultEmail = $stmtEmail->get_result();

if ($resultEmail->num_rows > 0) {
    $_SESSION["mensaje"] = "Ese correo ya está registrado.";
    header("Location: register.php");
    exit;
}

/* Hash de contraseña */
$password_hash = password_hash($password, PASSWORD_BCRYPT);

/* Insertar en usuarios */
$sqlInsertUsuario = "INSERT INTO usuarios (usuario, password_hash, rol_id, activo) VALUES (?, ?, ?, 1)";
$stmtInsertUsuario = $conn->prepare($sqlInsertUsuario);
$stmtInsertUsuario->bind_param("ssi", $usuario, $password_hash, $rol_id);

if (!$stmtInsertUsuario->execute()) {
    $_SESSION["mensaje"] = "Error al guardar el usuario.";
    header("Location: completar_registro.php");
    exit;
}

$usuario_id = $conn->insert_id;

/* Insertar en usuario_perfil */
$sqlInsertPerfil = "INSERT INTO usuario_perfil (usuario_id, nombre, apellido, direccion, telefono, email)
                    VALUES (?, ?, ?, ?, ?, ?)";
$stmtInsertPerfil = $conn->prepare($sqlInsertPerfil);
$stmtInsertPerfil->bind_param("isssss", $usuario_id, $nombre, $apellido, $direccion, $telefono, $email);

if (!$stmtInsertPerfil->execute()) {
    $_SESSION["mensaje"] = "Error al guardar el perfil.";
    header("Location: completar_registro.php");
    exit;
}

/* Limpiar sesión de registro */
unset($_SESSION["email_registro"]);
unset($_SESSION["email_verificado"]);


/* Mensaje para login */
$_SESSION["mensaje_login"] = "Cuenta creada correctamente. Ahora inicia sesión.";

/* Regresar al login */
header("Location: login.php");
exit;
?>