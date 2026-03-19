<?php
session_start();

if (!isset($_SESSION["email_registro"])) {
    header("Location: register.php");
    exit;
}

$email = $_SESSION["email_registro"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar código - ECOALI</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="register-container">

    <h2>Verificar correo</h2>
    <p>Ingresa el código enviado a: <strong><?php echo htmlspecialchars($email); ?></strong></p>

    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="mensaje">
            <?php
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
            ?>
        </div>
    <?php endif; ?>

    

    <form action="validar_codigo.php" method="POST">
        <div class="input-box">
            <i class="fa fa-key"></i>
            <input type="text" name="codigo" placeholder="Ingresa el código" maxlength="6" required>
        </div>

        <button type="submit" class="btn-register">Validar código</button>
    </form>
</div>

</body>
</html>