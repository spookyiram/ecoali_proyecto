<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ecoali Login</title>

  <link rel="stylesheet" href="assets/css/globals.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://accounts.google.com/gsi/client" async defer></script>
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
            <div class="div">Bienvenido de nuevo</div>
          </div>
          <p class="p">Inicia sesión para continuar en tu cuenta</p>
        </div>

        <?php if (isset($_SESSION["mensaje"])): ?>
          <div class="mensaje-login">
            <?php
            echo $_SESSION["mensaje"];
            unset($_SESSION["mensaje"]);
            ?>
          </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["mensaje_login"])): ?>
          <div class="mensaje-login exito">
            <?php
            echo $_SESSION["mensaje_login"];
            unset($_SESSION["mensaje_login"]);
            ?>
          </div>
        <?php endif; ?>

        <div class="form-margin">
          <form action="forms/procesar_login.php" method="POST" class="form">

            <div class="container-2">
              <div class="label-margin">
                <div class="div-2">
                  <div class="text-wrapper-2">Usuario</div>
                </div>
              </div>

              <div class="div-2">
                <div class="input">
                  <input
                    class="container-3"
                    type="text"
                    name="usuario"
                    placeholder="Ingresa tu usuario"
                    required
                  />
                </div>
              </div>
            </div>

            <div class="container-2">
              <div class="container-4">
                <div class="text-wrapper">
                  <div class="text-2">Contraseña</div>
                </div>
                <div class="text-wrapper">
                  <a href="#" class="text-3">¿Olvidaste tu contraseña?</a>
                </div>
              </div>

              <div class="div-2">
                <div class="input">
                  <input
                    class="container-3"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                  />
                </div>
              </div>
            </div>

            <div class="action-button-margin">
              <button class="action-button" type="submit">
                <div class="action-button-shadow"></div>
                <div class="text-wrapper-3">Iniciar Sesión</div>
              </button>
            </div>

          </form>
        </div>

        <div class="divider">
          <div class="horizontal-divider"></div>
          <div class="text-wrapper">
            <div class="text-4">O CONTINÚA CON</div>
          </div>
          <div class="horizontal-divider"></div>
        </div>

        <div class="social-buttons">
          <button class="button" id="googleCustomBtn" type="button">
            Continuar con Google
          </button>
        </div>

        <div class="text-wrapper">
          <p class="text-6">
            <span class="span">¿No tienes una cuenta?</span>
            <a href="register.php" class="text-wrapper-4">   Regístrate</a>
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

  <div id="g_id_onload"
       data-client_id="610699907925-g8kf8c126tvsncvip1d1dne4h4b55khh.apps.googleusercontent.com"
       data-callback="handleCredentialResponse">
  </div>

  <div id="googleSignInHidden" style="display:none;"></div>

  <form id="googleLoginForm" action="forms/google_login.php" method="POST" style="display:none;">
    <input type="hidden" name="credential" id="credential">
  </form>

  <script>
    function handleCredentialResponse(response) {
      document.getElementById("credential").value = response.credential;
      document.getElementById("googleLoginForm").submit();
    }

    window.onload = function () {
      google.accounts.id.initialize({
        client_id: "610699907925-g8kf8c126tvsncvip1d1dne4h4b55khh.apps.googleusercontent.com",
        callback: handleCredentialResponse
      });

      google.accounts.id.renderButton(
        document.getElementById("googleSignInHidden"),
        {
          type: "standard",
          theme: "outline",
          size: "large",
          shape: "pill",
          text: "continue_with",
          logo_alignment: "left",
          width: 300
        }
      );

      const customBtn = document.getElementById("googleCustomBtn");

      customBtn.addEventListener("click", function () {
        const officialGoogleButton = document.querySelector("#googleSignInHidden div[role='button']");
        if (officialGoogleButton) {
          officialGoogleButton.click();
        } else {
          alert("El botón de Google aún no cargó. Intenta de nuevo.");
        }
      });
    };
  </script>
</body>
</html>