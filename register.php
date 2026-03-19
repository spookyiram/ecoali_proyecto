<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ECOALI</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <div class="register-container">
        <img src="imagenes/logo.jpeg" alt="Logo ECOALI" class="logo">

        <h2>Regístrate</h2>
        <p>Ingresa tu correo para recibir un código de verificación</p>

        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="mensaje">
                <?php
                echo $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
                ?>
            </div>
        <?php endif; ?>

        <form action="enviar_codigo.php" method="POST">
            <div class="input-box">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Correo electrónico" required>
            </div>

            <button type="submit" class="btn-register">Enviar código</button>

            <p class="login-link">
                ¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a>
            </p>
        </form>
    </div>

</body>
</html>