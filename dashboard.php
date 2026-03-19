<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - ECOALI</title>
</head>
<body>
    <h1>Bienvenido a ECOALI</h1>
    <p>Usuario: <?php echo htmlspecialchars($_SESSION["usuario"] ?? ""); ?></p>
    <p>Nombre: <?php echo htmlspecialchars(($_SESSION["nombre"] ?? "") . " " . ($_SESSION["apellido"] ?? "")); ?></p>
    <p>Correo: <?php echo htmlspecialchars($_SESSION["email"] ?? ""); ?></p>
    <p>Rol ID: <?php echo htmlspecialchars($_SESSION["rol_id"] ?? ""); ?></p>
    <p>Login con Google: <?php echo isset($_SESSION["login_google"]) ? "Sí" : "No"; ?></p>

    <a href="logout.php">Cerrar sesión</a>
</body>
</html>