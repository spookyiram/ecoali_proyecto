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
<title>Gestión de Proveedores - ECOALI</title>

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

      <a class="link" href="inventario_admin.php">
        <div class="div-4"><div class="text-30">Inventario</div></div>
      </a>

      <a class="link-active-state" href="proveedores_admin.php">
        <div class="link-active-state-2"></div>
        <div class="div-4"><div class="text-31">Proveedores</div></div>
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
    <div class="div-4"><div class="text-26">Gestión de Proveedores</div></div>

    <button class="button-2"><div class="text-3">Agregar proveedor</div></button>
  </div>

  <div class="main-content">

    <div class="section-search">
      <div class="container">
        <div class="input">
          <div class="container">
            <p class="text-wrapper">Buscar por nombre, ID o ciudad...</p>
          </div>
        </div>
      </div>

      <div class="container-2">
        <div class="background-shadow">
          <button class="button"><div class="text">Todos</div></button>
          <button class="div-wrapper"><div class="text-2">Activo</div></button>
          <button class="div-wrapper"><div class="text-2">Pendiente</div></button>
          <button class="div-wrapper"><div class="text-2">Inactivo</div></button>
        </div>
      </div>
    </div>

    <div class="status-overviews">
      <div class="background-border">
        <div class="container-5"><div class="text-wrapper-2">Total de Proveedores</div></div>
        <div class="div-2"><div class="text-wrapper-3">48</div></div>
      </div>

      <div class="background-border-2">
        <div class="container-5"><div class="text-wrapper-2">Proveedores Activos</div></div>
        <div class="div-2"><div class="text-wrapper-3">42</div></div>
      </div>

      <div class="background-border-3">
        <div class="container-5"><div class="text-wrapper-2">Solicitudes Pendientes</div></div>
        <div class="div-2"><div class="text-wrapper-3">6</div></div>
      </div>
    </div>

    <div class="inventory-table">
      <div class="header">
        <div class="row">
          <div><div class="text-7">ID PROVEEDOR</div></div>
          <div><div class="text-7">NOMBRE</div></div>
          <div><div class="text-7">CONTACTO</div></div>
          <div><div class="text-8">UBICACIÓN</div></div>
          <div><div class="text-7">ESTADO</div></div>
          <div><div class="text-7">REGISTRO</div></div>
          <div><div class="text-9">ACCIONES</div></div>
        </div>
      </div>

      <div class="row-disponible">
        <div><div class="text-10">#PV-001</div></div>
        <div><div class="text-11">AgroOrgánicos del Valle</div></div>
        <div><div class="text-12">contacto@agro.com</div></div>
        <div><div class="text-14">Sevilla, España</div></div>
        <div><div class="overlay-6"><div class="background-3"></div><div class="text-15">Activo</div></div></div>
        <div><div class="text-14">12 Ene 2024</div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#PV-002</div></div>
        <div><div class="text-11">Logística Premium S.L.</div></div>
        <div><div class="text-12">info@logpremium.es</div></div>
        <div><div class="text-14">Barcelona, España</div></div>
        <div><div class="overlay-7"><div class="background-5"></div><div class="text-17">Pendiente</div></div></div>
        <div><div class="text-14">05 Feb 2024</div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#PV-003</div></div>
        <div><div class="text-11">Frutas del Rey</div></div>
        <div><div class="text-12">ventas@frdelrey.com</div></div>
        <div><div class="text-14">Málaga, España</div></div>
        <div><div class="overlay-6"><div class="background-3"></div><div class="text-15">Activo</div></div></div>
        <div><div class="text-14">15 Ene 2024</div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#PV-004</div></div>
        <div><div class="text-18">Envases EcoLife</div></div>
        <div><div class="text-12">admin@ecolife.org</div></div>
        <div><div class="text-14">Madrid, España</div></div>
        <div><div class="overlay-10"><div class="background-9"></div><div class="text-22">Inactivo</div></div></div>
        <div><div class="text-14">20 Dic 2023</div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="pagination-like">
        <div class="div-4"><p class="p">MOSTRANDO 4 DE 48 PROVEEDORES</p></div>
        <div class="container-8">
          <button class="button-3"><div class="text-23">1</div></button>
          <button class="button-4"><div class="text-24">2</div></button>
        </div>
      </div>
    </div>

  </div>
</div>
</body>
</html>