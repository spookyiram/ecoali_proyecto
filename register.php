<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ecoali Registro</title>

  <link rel="stylesheet" href="assets/css/globals.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="login">

    <div class="main-the-prompt">
      <div class="organic-background"></div>
      <div class="gradient-blur"></div>

      <div class="login-card">
        <div class="login-card-shadow"></div>

        <div class="logo-brand-anchor">
          <div class="text-wrapper">
            <div class="text">Ecoali</div>
          </div>
          <div class="container"></div>
        </div>

        <div class="header-content">
          <div class="div-wrapper">
            <div class="div">Crear cuenta</div>
          </div>
          <p class="p">Ingresa tu correo para recibir un código de verificación</p>
        </div>

        <?php if (isset($_SESSION["mensaje"])): ?>
          <div class="mensaje-login">
            <?php
            echo $_SESSION["mensaje"];
            unset($_SESSION["mensaje"]);
            ?>
          </div>
        <?php endif; ?>

        <div class="form-margin">
          <form action="forms/enviar_codigo.php" method="POST" class="form">

            <div class="container-2">
              <div class="label-margin">
                <div class="div-2">
                  <div class="text-wrapper-2">Correo electrónico</div>
                </div>
              </div>

              <div class="div-2">
                <div class="input">
                  <input
                    class="container-3"
                    type="email"
                    name="email"
                    placeholder="nombre@ejemplo.com"
                    required
                  />
                </div>
              </div>
            </div>

            <div class="action-button-margin">
              <button class="action-button" type="submit">
                <div class="action-button-shadow"></div>
                <div class="text-wrapper-3">Enviar código</div>
              </button>
            </div>

          </form>
        </div>

        <div class="text-wrapper">
          <p class="text-6">
            <span class="span">¿Ya tienes una cuenta? </span>
            <a href="login.php" class="text-wrapper-4">Inicia sesión</a>
          </p>
        </div>
      </div>
    </div>

    <div class="footer-shell">
      <div class="container-6">
        <div class="text-wrapper">
          <p class="text-7">© 2024 Ecoali. Vitalidad Orgánica.</p>
        </div>

        <div class="container-7">
          <div class="link"><div class="text-7">Privacidad</div></div>
          <div class="link"><div class="text-7">Términos</div></div>
          <div class="link"><div class="text-7">Contacto</div></div>
        </div>
      </div>
    </div>

    <div class="decorative-bottom"></div>
  </div>
</body>
</html>