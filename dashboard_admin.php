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
<title>Panel de Control - ECOALI</title>

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
      <a class="link-active-state" href="dashboard_admin.php">
        <div class="link-active-state-2"></div>
        <div class="div-4"><div class="text-31">Dashboard</div></div>
      </a>

      <a class="link" href="inventario_admin.php">
        <div class="div-4"><div class="text-30">Inventario</div></div>
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
    <div class="div-4"><div class="text-26">Panel de Control</div></div>

    <div style="display:flex; gap:12px;">
      <button class="button-2"><div class="text-3">Exportar PDF</div></button>
      <button class="button-2"><div class="text-3">+ Nueva Orden</div></button>
    </div>
  </div>

  <div class="main-content">

    <div class="status-overviews">
      <div class="background-border">
        <div class="container-5"><div class="text-wrapper-2">Usuarios Activos</div></div>
        <div class="div-2"><div class="text-wrapper-3">1,284</div></div>
      </div>

      <div class="background-border-2">
        <div class="container-5"><div class="text-wrapper-2">Ventas Totales</div></div>
        <div class="div-2"><div class="text-wrapper-3">$45.2k</div></div>
      </div>

      <div class="background-border-3">
        <div class="container-5"><div class="text-wrapper-2">Stock de Huevos</div></div>
        <div class="div-2"><div class="text-wrapper-3">8,420</div></div>
      </div>
    </div>

    <div class="inventory-forecast">
      <div class="overlay-11">
        <div class="heading"><div class="text-wrapper-4">Producción Semanal</div></div>
        <p class="text-25">Resumen de producción semanal por granja y clasificación de productos.</p>
      </div>

      <div class="overlay-12">
        <div class="heading"><div class="text-wrapper-5">Accesos Directos</div></div>
        <p class="text-25">Usuarios, granjas, stock y facturas disponibles para consulta rápida.</p>
      </div>
    </div>

    <div class="inventory-table">
      <div class="header">
        <div class="row">
          <div><div class="text-7">ÚLTIMOS PEDIDOS</div></div>
          <div><div class="text-7">CLIENTE</div></div>
          <div><div class="text-7">FECHA</div></div>
          <div><div class="text-8">TOTAL</div></div>
          <div><div class="text-7">ESTADO</div></div>
          <div><div class="text-9">ACCIÓN</div></div>
        </div>
      </div>

      <div class="row-disponible">
        <div><div class="text-10">#ORD-4592</div></div>
        <div><div class="text-11">Carlos Mendoza</div></div>
        <div><div class="text-14">Hace 15 min</div></div>
        <div><div class="background-2"><div class="text-13">$450.00</div></div></div>
        <div><div class="overlay-6"><div class="background-3"></div><div class="text-15">Completado</div></div></div>
        <div><div class="text-10">Ver</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#ORD-4591</div></div>
        <div><div class="text-11">Lucía Fernández</div></div>
        <div><div class="text-14">Hace 2 horas</div></div>
        <div><div class="background-2"><div class="text-13">$1,200.00</div></div></div>
        <div><div class="overlay-7"><div class="background-5"></div><div class="text-17">Pendiente</div></div></div>
        <div><div class="text-10">Ver</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#ORD-4590</div></div>
        <div><div class="text-11">Roberto Gómez</div></div>
        <div><div class="text-14">Hoy, 10:24 AM</div></div>
        <div><div class="background-2"><div class="text-13">$234.50</div></div></div>
        <div><div class="overlay-6"><div class="background-3"></div><div class="text-15">Completado</div></div></div>
        <div><div class="text-10">Ver</div></div>
      </div>
    </div>

  </div>
</div>
</body>
</html>