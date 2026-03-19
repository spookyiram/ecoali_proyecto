<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ECOALI</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>

    <div class="login-container">
        <img src="imagenes/logo.png" alt="Logo ECOALI" class="logo">

        <h2>Bienvenido de nuevo</h2>
        <p>Inicie sesión para continuar</p>

        <?php if (isset($_SESSION["mensaje_login"])): ?>
            <div class="mensaje">
                <?php
                echo $_SESSION["mensaje_login"];
                unset($_SESSION["mensaje_login"]);
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["mensaje"])): ?>
            <div class="mensaje">
                <?php
                echo $_SESSION["mensaje"];
                unset($_SESSION["mensaje"]);
                ?>
            </div>
        <?php endif; ?>

        <form action="procesar_login.php" method="POST">
            <div class="input-box">
                <i class="fa fa-user"></i>
                <input type="text" name="usuario" placeholder="Usuario" required>
            </div>

            <div class="input-box">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>

            <div class="options">
                <label>
                    <input type="checkbox" name="recordarme"> Recordarme
                </label>
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="btn-login">Iniciar Sesión</button>

            <p class="register-link">
                ¿No tienes cuenta? <a href="register.php">Regístrate</a>
            </p>
        </form>

        <div class="divider">
            <span>o</span>
        </div>

    <div id="g_id_onload"
     data-client_id="610699907925-g8kf8c126tvsncvip1d1dne4h4b55khh.apps.googleusercontent.com"
     data-callback="handleCredentialResponse">
</div>

        <div id="google-btn" class="google-btn-box"></div>

        <form id="googleLoginForm" action="google_login.php" method="POST" style="display:none;">
            <input type="hidden" name="credential" id="credential">
        </form>
    </div>

    <script>
        window.handleCredentialResponse = function(response) {
            document.getElementById("credential").value = response.credential;
            document.getElementById("googleLoginForm").submit();
        };

        window.onload = function () {
            google.accounts.id.renderButton(
                document.getElementById("google-btn"),
                {
                    theme: "outline",
                    size: "large",
                    shape: "pill",
                    text: "signin_with",
                    width: 300
                }
            );
        };
    </script>

</body>
</html>