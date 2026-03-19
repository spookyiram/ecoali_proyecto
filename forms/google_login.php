<?php
session_start();
require "conexion.php";
require "config_google.php";
require "../vendor/autoload.php";

$credential = $_POST["credential"] ?? "";

if (empty($credential)) {
    $_SESSION["mensaje"] = "No se recibió el token de Google.";
    header("Location: ../login.php");
    exit;
}

try {
    $client = new Google_Client(['client_id' => GOOGLE_CLIENT_ID]);
    $payload = $client->verifyIdToken($credential);

    if (!$payload) {
        $_SESSION["mensaje"] = "Token de Google inválido.";
        header("Location: ../login.php");
        exit;
    }

    $email = $payload["email"] ?? "";
    $nombre_google = trim($payload["given_name"] ?? "");
    $apellido_google = trim($payload["family_name"] ?? "");
    $nombre_completo = trim($payload["name"] ?? "");
    $email_verificado_google = $payload["email_verified"] ?? false;

    if (empty($email) || !$email_verificado_google) {
        $_SESSION["mensaje"] = "Google no devolvió un correo válido o verificado.";
        header("Location: ../login.php");
        exit;
    }

    /* Buscar usuario por correo */
    $sql = "SELECT u.id, u.usuario, u.rol_id, u.activo, up.nombre, up.apellido, up.email
            FROM usuarios u
            INNER JOIN usuario_perfil up ON u.id = up.usuario_id
            WHERE up.email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        /* Ya existe: iniciar sesión */
        $user = $resultado->fetch_assoc();

        if ((int)$user["activo"] !== 1) {
            $_SESSION["mensaje"] = "Tu cuenta está inactiva.";
            header("Location: ../login.php");
            exit;
        }

        $_SESSION["usuario_id"] = $user["id"];
        $_SESSION["usuario"] = $user["usuario"];
        $_SESSION["rol_id"] = $user["rol_id"];
        $_SESSION["nombre"] = $user["nombre"];
        $_SESSION["apellido"] = $user["apellido"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["login_google"] = true;

        header("Location: ../dashboard.php");
        exit;
    }

    /* No existe: registrar automáticamente */

    if (empty($nombre_google) && !empty($nombre_completo)) {
        $partes = explode(" ", $nombre_completo, 2);
        $nombre_google = $partes[0] ?? "Usuario";
        $apellido_google = $partes[1] ?? "Google";
    }

    if (empty($nombre_google)) {
        $nombre_google = "Usuario";
    }

    if (empty($apellido_google)) {
        $apellido_google = "Google";
    }

    /* Crear username automático basado en el correo */
    $base_usuario = explode("@", $email)[0];
    $usuario_generado = preg_replace('/[^a-zA-Z0-9_]/', '', $base_usuario);

    if (empty($usuario_generado)) {
        $usuario_generado = "usuario";
    }

    $usuario_final = $usuario_generado;
    $contador = 1;

    while (true) {
        $sqlCheck = "SELECT id FROM usuarios WHERE usuario = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("s", $usuario_final);
        $stmtCheck->execute();
        $resCheck = $stmtCheck->get_result();

        if ($resCheck->num_rows === 0) {
            break;
        }

        $usuario_final = $usuario_generado . $contador;
        $contador++;
    }

    /* Contraseña aleatoria solo para cumplir la estructura */
    $password_temporal = bin2hex(random_bytes(16));
    $password_hash = password_hash($password_temporal, PASSWORD_BCRYPT);

    /* Rol por defecto */
    $rol_id_default = 3; // 3 = Granjero, cámbialo si quieres otro

    /* Insertar en usuarios */
    $sqlInsertUsuario = "INSERT INTO usuarios (usuario, password_hash, rol_id, activo)
                         VALUES (?, ?, ?, 1)";
    $stmtInsertUsuario = $conn->prepare($sqlInsertUsuario);
    $stmtInsertUsuario->bind_param("ssi", $usuario_final, $password_hash, $rol_id_default);

    if (!$stmtInsertUsuario->execute()) {
        $_SESSION["mensaje"] = "Error al registrar usuario con Google.";
        header("Location: ../login.php");
        exit;
    }

    $usuario_id = $conn->insert_id;

    /* Insertar en usuario_perfil */
    $direccion = "";
    $telefono = "";

    $sqlInsertPerfil = "INSERT INTO usuario_perfil (usuario_id, nombre, apellido, direccion, telefono, email)
                        VALUES (?, ?, ?, ?, ?, ?)";
    $stmtInsertPerfil = $conn->prepare($sqlInsertPerfil);
    $stmtInsertPerfil->bind_param(
        "isssss",
        $usuario_id,
        $nombre_google,
        $apellido_google,
        $direccion,
        $telefono,
        $email
    );

    if (!$stmtInsertPerfil->execute()) {
        $_SESSION["mensaje"] = "Error al guardar el perfil de Google.";
        header("Location: ../login.php");
        exit;
    }

    /* Iniciar sesión automáticamente */
    $_SESSION["usuario_id"] = $usuario_id;
    $_SESSION["usuario"] = $usuario_final;
    $_SESSION["rol_id"] = $rol_id_default;
    $_SESSION["nombre"] = $nombre_google;
    $_SESSION["apellido"] = $apellido_google;
    $_SESSION["email"] = $email;
    $_SESSION["login_google"] = true;

    header("Location: ../dashboard.php");
    exit;

} catch (Exception $e) {
    $_SESSION["mensaje"] = "Error en Google Login: " . $e->getMessage();
    header("Location: ../login.php");
    exit;
}
?>