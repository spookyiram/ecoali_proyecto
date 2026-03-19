<?php
session_start();
require "conexion.php";

if (!isset($_SESSION["email_verificado"])) {
    header("Location: register.php");
    exit;
}

$email = $_SESSION["email_verificado"];

/* Obtener roles excepto ADMINISTRADOR */
$sqlRoles = "SELECT id, nombre FROM roles WHERE nombre != 'ADMINISTRADOR' ORDER BY nombre ASC";
$resultRoles = $conn->query($sqlRoles);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar registro - ECOALI</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="register-container">
    

    <h2>Completar registro</h2>
    <p>Correo validado: <strong><?php echo htmlspecialchars($email); ?></strong></p>

    <?php if (isset($_SESSION["mensaje"])): ?>
        <div class="mensaje">
            <?php
            echo $_SESSION["mensaje"];
            unset($_SESSION["mensaje"]);
            ?>
        </div>
    <?php endif; ?>

    <form action="guardar_usuario.php" method="POST">

        <div class="input-box">
            <i class="fa fa-user"></i>
            <input type="text" name="usuario" placeholder="Usuario" required>
        </div>

        <div class="input-box">
            <i class="fa fa-id-card"></i>
            <input type="text" name="nombre" placeholder="Nombre" required>
        </div>

        <div class="input-box">
            <i class="fa fa-id-card"></i>
            <input type="text" name="apellido" placeholder="Apellido" required>
        </div>

        <div class="input-box">
            <i class="fa fa-location-dot"></i>
            <input type="text" name="direccion" placeholder="Dirección">
        </div>

        <div class="input-box">
            <i class="fa fa-phone"></i>
            <input type="text" name="telefono" placeholder="Teléfono">
        </div>

        <div class="input-box">
            <i class="fa fa-briefcase"></i>
            <select name="rol_id" required>
                <option value="">Selecciona un rol</option>
                <?php while ($rol = $resultRoles->fetch_assoc()): ?>
                    <option value="<?php echo $rol["id"]; ?>">
                        <?php echo ucfirst(strtolower($rol["nombre"])); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="input-box">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>

        <div class="input-box">
            <i class="fa fa-lock"></i>
            <input type="password" name="confirmar_password" placeholder="Confirmar contraseña" required>
        </div>

        <button type="submit" class="btn-register">Crear cuenta</button>

        <p class="login-link">
            ¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a>
        </p>
    </form>
</div>

</body>
</html>