<?php
session_start();
require "forms/conexion.php";

if (!isset($_SESSION["email_verificado"])) {
    header("Location: register.php");
    exit;
}

$email = $_SESSION["email_verificado"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Completar registro - Ecoali</title>

<link rel="stylesheet" href="assets/css/globals.css">
<link rel="stylesheet" href="assets/css/style.css">

<style>
  body {
    margin: 0;
    min-height: 100vh;
    background: #fff5ed;
    font-family: "Manrope", Arial, sans-serif;
  }

  .complete-page {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
    position: relative;
    overflow: hidden;
  }

  .blob-1,
  .blob-2 {
    position: absolute;
    border-radius: 999px;
    filter: blur(45px);
    opacity: .35;
  }

  .blob-1 {
    width: 360px;
    height: 360px;
    background: #ff8a00;
    top: -120px;
    left: -90px;
  }

  .blob-2 {
    width: 300px;
    height: 300px;
    background: #9df197;
    bottom: -90px;
    right: -70px;
  }

  .complete-card {
    width: 100%;
    max-width: 980px;
    background: rgba(255, 255, 255, .86);
    backdrop-filter: blur(14px);
    border-radius: 34px;
    box-shadow: 0 28px 60px rgba(70, 40, 0, .14);
    padding: 34px;
    position: relative;
    z-index: 2;
  }

  .complete-header {
    text-align: center;
    margin-bottom: 28px;
  }

  .brand {
    color: #8d4a00;
    font-size: 26px;
    font-weight: 800;
    margin-bottom: 8px;
  }

  .complete-header h1 {
    margin: 0;
    color: #462800;
    font-size: 34px;
    font-weight: 800;
  }

  .complete-header p {
    margin: 8px 0 0;
    color: #7a5427;
    font-size: 15px;
  }

  .complete-header strong {
    color: #176a21;
  }

  .complete-message {
    background: #fff3e6;
    color: #8d4a00;
    border: 1px solid #ffd4a8;
    padding: 12px;
    border-radius: 16px;
    text-align: center;
    margin-bottom: 18px;
  }

  .complete-form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px 22px;
  }

  .field label {
    display: block;
    margin: 0 0 8px 12px;
    color: #7a5427;
    font-size: 13px;
    font-weight: 700;
  }

  .field input,
  .field select {
    width: 100%;
    height: 50px;
    border: 1px solid rgba(213, 164, 112, .35);
    border-radius: 999px;
    background: #ffffff;
    padding: 0 18px;
    outline: none;
    color: #462800;
    font-size: 15px;
    box-shadow: 0 10px 24px rgba(70, 40, 0, .06);
    box-sizing: border-box;
  }

  .field input::placeholder {
    color: #c79b6d;
  }

  .field input:focus,
  .field select:focus {
    border-color: #ff8a00;
    box-shadow: 0 0 0 4px rgba(255, 138, 0, .16);
  }

  .field-full {
    grid-column: 1 / -1;
  }

  .submit-row {
    grid-column: 1 / -1;
    margin-top: 8px;
  }

  .submit-row button {
    width: 100%;
    height: 54px;
    border: none;
    border-radius: 999px;
    background: linear-gradient(135deg, #8d4a00, #ff8a00);
    color: #fff5ed;
    font-size: 16px;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 14px 26px rgba(141, 74, 0, .28);
  }

  .submit-row button:hover {
    transform: translateY(-1px);
  }

  .bottom-link {
    text-align: center;
    margin-top: 18px;
    color: #7a5427;
    font-size: 14px;
  }

  .bottom-link a {
    color: #8d4a00;
    font-weight: 800;
    text-decoration: none;
  }

  @media (max-width: 760px) {
    .complete-card {
      padding: 24px;
      border-radius: 26px;
    }

    .complete-form {
      grid-template-columns: 1fr;
    }

    .field-full,
    .submit-row {
      grid-column: auto;
    }

    .complete-header h1 {
      font-size: 26px;
    }
  }
</style>
</head>

<body>

<div class="complete-page">
  <div class="blob-1"></div>
  <div class="blob-2"></div>

  <div class="complete-card">
    <div class="complete-header">
      <div class="brand">ECOALI</div>
      <h1>Completar registro</h1>
      <p>Correo verificado: <strong><?php echo htmlspecialchars($email); ?></strong></p>
    </div>

    <?php if (isset($_SESSION["mensaje"])): ?>
      <div class="complete-message">
        <?php
          echo $_SESSION["mensaje"];
          unset($_SESSION["mensaje"]);
        ?>
      </div>
    <?php endif; ?>

    <form action="forms/guardar_usuario.php" method="POST" class="complete-form">

      <div class="field">
        <label>Usuario</label>
        <input type="text" name="usuario" placeholder="Tu usuario" required>
      </div>

      <div class="field">
        <label>Rol</label>
        <select name="rol_id" required>
          <option value="">Selecciona un rol</option>
          <option value="3">Proveedor</option>
          <option value="2">Cliente</option>
          <option value="4">Repartidor</option>
        </select>
      </div>

      <div class="field">
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Tu nombre" required>
      </div>

      <div class="field">
        <label>Apellido</label>
        <input type="text" name="apellido" placeholder="Tu apellido" required>
      </div>

      <div class="field">
        <label>Dirección</label>
        <input type="text" name="direccion" placeholder="Tu dirección">
      </div>

      <div class="field">
        <label>Teléfono</label>
        <input type="text" name="telefono" placeholder="Tu teléfono">
      </div>

      <div class="field">
        <label>Contraseña</label>
        <input type="password" name="password" placeholder="••••••••" required>
      </div>

      <div class="field">
        <label>Confirmar contraseña</label>
        <input type="password" name="confirmar_password" placeholder="••••••••" required>
      </div>

      <div class="submit-row">
        <button type="submit">Crear cuenta</button>
      </div>
    </form>

    <div class="bottom-link">
      ¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>
    </div>
  </div>
</div>

</body>
</html>