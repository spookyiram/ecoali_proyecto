<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

if ((int)$_SESSION["rol_id"] !== 1) {
    header("Location: login.php");
    exit;
}

$nombre = $_SESSION["nombre"] ?? "Admin";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestión de Inventario - ECOALI</title>

<link rel="stylesheet" href="assets/css/globals.css">
<link rel="stylesheet" href="assets/css/inventario_admin.css">
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
</head>

<body>
<div class="gestin-de-inventario">

  <div class="organic-background"></div>
  <div class="background-blur"></div>
  <div class="div"></div>

  <div class="aside">
    <div class="margin">
      <div class="container-13">
        <div class="div-4"><div class="text-27">ECOALI</div></div>
      </div>
    </div>

    <div class="margin-2">
      <div class="background-10">
        <div class="avatar"></div>
        <div class="div-4">
          <div class="div-2"><div class="text-28"><?php echo htmlspecialchars($nombre); ?></div></div>
          <div class="div-2"><div class="text-29">Gestión Pro</div></div>
        </div>
      </div>
    </div>

    <div class="nav">
      <a class="link" href="dashboard_admin.php">
        <div class="div-4"><div class="text-30">Dashboard</div></div>
      </a>

      <a class="link-active-state" href="inventario_admin.php">
        <div class="link-active-state-2"></div>
        <div class="div-4"><div class="text-31">Inventario</div></div>
      </a>

      <a class="link" href="proveedores_admin.php">
        <div class="div-4"><div class="text-30">Proveedores</div></div>
      </a>

      <a class="link" href="logistica_admin.php">
        <div class="div-4"><div class="text-30">Logística</div></div>
      </a>

      <a class="link" href="reportes_admin.php">
        <div class="div-4"><div class="text-30">Reportes</div></div>
      </a>
    </div>

    <div class="button-wrapper">
      <a href="logout.php" class="button-5">
        <div class="container-3"><div class="text-32">Cerrar Sesión</div></div>
      </a>
    </div>
  </div>

  <div class="header-topappbar">
    <div class="div-4"><div class="text-26">Gestión de Inventario</div></div>
  </div>

  <div class="main-content">

    <div class="section-search">
      <div class="container">
        <div class="input">
          <div class="container">
            <p class="text-wrapper">Buscar por ID o lote...</p>
          </div>
        </div>
      </div>

      <div class="container-2">
        <div class="background-shadow">
          <button class="button"><div class="text">Todo</div></button>
          <button class="div-wrapper"><div class="text-2">Disponible</div></button>
          <button class="div-wrapper"><div class="text-2">Vendido</div></button>
          <button class="div-wrapper"><div class="text-2">Caducado</div></button>
        </div>

        <button class="button-2"><div class="text-3">Agregar producto</div></button>
      </div>
    </div>

    <div class="status-overviews">
      <div class="background-border">
        <div class="container-5"><div class="text-wrapper-2">Total Lotes Disponibles</div></div>
        <div class="div-2"><div class="text-wrapper-3">1,248</div></div>
      </div>

      <div class="background-border-2">
        <div class="container-5"><div class="text-wrapper-2">Próximos a Caducar</div></div>
        <div class="div-2"><div class="text-wrapper-3">42</div></div>
      </div>

      <div class="background-border-3">
        <div class="container-5"><div class="text-wrapper-2">Stock Caducado</div></div>
        <div class="div-2"><div class="text-wrapper-3">08</div></div>
      </div>
    </div>

    <div class="inventory-table">
      <div class="header">
        <div class="row">
          <div><div class="text-7">ID DEL LOTE</div></div>
          <div><div class="text-7">TIPO DE HUEVO</div></div>
          <div><div class="text-7">TAMAÑO</div></div>
          <div><div class="text-8">CANTIDAD</div></div>
          <div><div class="text-7">POSTURA</div></div>
          <div><div class="text-7">CADUCIDAD</div></div>
          <div><div class="text-7">ESTADO</div></div>
          <div><div class="text-9">ACCIONES</div></div>
        </div>
      </div>

      <div class="row-disponible">
        <div><div class="text-10">#LT-2024-001</div></div>
        <div><div class="text-11">Orgánico Camperos</div></div>
        <div><div class="text-12">Extra (XL)</div></div>
        <div><div class="background-2"><div class="text-13">450 ud.</div></div></div>
        <div><div class="text-14">12 Oct 2023</div></div>
        <div><div class="text-14">09 Nov 2023</div></div>
        <div><div class="overlay-6"><div class="background-3"></div><div class="text-15">Disponible</div></div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#LT-2024-002</div></div>
        <div><div class="text-11">Blanco Tradicional</div></div>
        <div><div class="text-12">Grande (L)</div></div>
        <div><div class="background-2"><div class="text-13">120 ud.</div></div></div>
        <div><div class="text-14">01 Oct 2023</div></div>
        <div><div class="text-16">28 Oct 2023</div></div>
        <div><div class="overlay-7"><div class="background-5"></div><div class="text-17">Próx. Caducidad</div></div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#LT-2024-003</div></div>
        <div><div class="text-18">Ponedora Rubia</div></div>
        <div><div class="text-12">Medio (M)</div></div>
        <div><div class="overlay-8"><div class="text-19">15 ud.</div></div></div>
        <div><div class="text-14">20 Sep 2023</div></div>
        <div><div class="text-20">18 Oct 2023</div></div>
        <div><div class="overlay-9"><div class="background-7"></div><div class="text-21">Caducado</div></div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#LT-2024-004</div></div>
        <div><div class="text-11">Ecológico de Pasto</div></div>
        <div><div class="text-12">Pequeño (S)</div></div>
        <div><div class="background-2"><div class="text-13">28 ud.</div></div></div>
        <div><div class="text-14">15 Oct 2023</div></div>
        <div><div class="text-14">12 Nov 2023</div></div>
        <div><div class="overlay-10"><div class="background-9"></div><div class="text-22">Bajo Stock</div></div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="pagination-like">
        <div class="div-4"><p class="p">MOSTRANDO 4 DE 128 LOTES</p></div>
        <div class="container-8">
          <button class="button-3"><div class="text-23">1</div></button>
          <button class="button-4"><div class="text-24">2</div></button>
        </div>
      </div>
    </div>

    <div class="inventory-forecast">
      <div class="overlay-11">
        <div class="heading"><div class="text-wrapper-4">Optimización de Residuos</div></div>
        <p class="text-25">Detectamos que 8 lotes caducaron recientemente. Considera ajustar la logística de proveedores locales.</p>
      </div>

      <div class="overlay-12">
        <div class="heading"><div class="text-wrapper-5">Previsión Semanal</div></div>
        <p class="text-25">La demanda de huevos orgánicos subió un 15%. Se recomienda aumentar el stock disponible.</p>
      </div>
    </div>

  </div>
</div>
</body>
</html>