<?php
session_start();
require "conexion.php";
require "config_google.php";
require "vendor/autoload.php";

$credential = $_POST["credential"] ?? "";

if (empty($credential)) {
    $_SESSION["mensaje"] = "No se recibió el token de Google.";
    header("Location: login.php");
    exit;
}

try {
    $client = new Google_Client(['client_id' => GOOGLE_CLIENT_ID]);
    $payload = $client->verifyIdToken($credential);

    if (!$payload) {
        $_SESSION["mensaje"] = "Token de Google inválido.";
        header("Location: login.php");
        exit;
    }

    $email = $payload["email"] ?? "";
    $nombre_google = $payload["name"] ?? "";
    $email_verificado_google = $payload["email_verified"] ?? false;

    if (empty($email) || !$email_verificado_google) {
        $_SESSION["mensaje"] = "Google no devolvió un correo válido/verificado.";
        header("Location: login.php");
        exit;
    }

    /* Buscar usuario por correo en tu tabla usuario_perfil */
    $sql = "SELECT u.id, u.usuario, u.rol_id, u.activo, up.nombre, up.apellido, up.email
            FROM usuarios u
            INNER JOIN usuario_perfil up ON u.id = up.usuario_id
            WHERE up.email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();

        if ((int)$user["activo"] !== 1) {
            $_SESSION["mensaje"] = "Tu cuenta está inactiva.";
            header("Location: login.php");
            exit;
        }

        $_SESSION["usuario_id"] = $user["id"];
        $_SESSION["usuario"] = $user["usuario"];
        $_SESSION["rol_id"] = $user["rol_id"];
        $_SESSION["nombre"] = $user["nombre"];
        $_SESSION["apellido"] = $user["apellido"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["login_google"] = true;

        header("Location: dashboard.php");
        exit;
    } else {
        /* Si el correo no existe en tu sistema */
        $_SESSION["mensaje"] = "Ese correo de Google no está registrado en Ecoali. Primero regístrate.";
        header("Location: register.php");
        exit;
    }

} catch (Exception $e) {
    $_SESSION["mensaje"] = "Error en Google Login: " . $e->getMessage();
    header("Location: login.php");
    exit;
}