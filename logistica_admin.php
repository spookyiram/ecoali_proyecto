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
<title>Gestión de Pedidos y Logística - ECOALI</title>

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

      <a class="link" href="proveedores_admin.php">
        <div class="div-4"><div class="text-30">Proveedores</div></div>
      </a>

      <a class="link-active-state" href="logistica_admin.php">
        <div class="link-active-state-2"></div>
        <div class="div-4"><div class="text-31">Logística</div></div>
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
    <div class="div-4"><div class="text-26">Gestión de Pedidos y Logística</div></div>

    <button class="button-2"><div class="text-3">Asignar pedido</div></button>
  </div>

  <div class="main-content">

    <div class="section-search">
      <div class="container">
        <div class="input">
          <div class="container">
            <p class="text-wrapper">Buscar por ID, cliente o dirección...</p>
          </div>
        </div>
      </div>

      <div class="container-2">
        <div class="background-shadow">
          <button class="button"><div class="text">Todos</div></button>
          <button class="div-wrapper"><div class="text-2">Pendiente</div></button>
          <button class="div-wrapper"><div class="text-2">En proceso</div></button>
          <button class="div-wrapper"><div class="text-2">En ruta</div></button>
          <button class="div-wrapper"><div class="text-2">Entregado</div></button>
        </div>
      </div>
    </div>

    <div class="status-overviews">
      <div class="background-border">
        <div class="container-5"><div class="text-wrapper-2">Pedidos Totales</div></div>
        <div class="div-2"><div class="text-wrapper-3">156</div></div>
      </div>

      <div class="background-border-2">
        <div class="container-5"><div class="text-wrapper-2">Pendientes</div></div>
        <div class="div-2"><div class="text-wrapper-3">12</div></div>
      </div>

      <div class="background-border-3">
        <div class="container-5"><div class="text-wrapper-2">En Ruta</div></div>
        <div class="div-2"><div class="text-wrapper-3">08</div></div>
      </div>
    </div>

    <div class="inventory-table">
      <div class="header">
        <div class="row">
          <div><div class="text-7">ID PEDIDO</div></div>
          <div><div class="text-7">CLIENTE</div></div>
          <div><div class="text-7">DIRECCIÓN</div></div>
          <div><div class="text-8">REPARTIDOR</div></div>
          <div><div class="text-7">ESTADO</div></div>
          <div><div class="text-9">ACCIONES</div></div>
        </div>
      </div>

      <div class="row-disponible">
        <div><div class="text-10">#PED-001</div></div>
        <div><div class="text-11">Elena Rivas</div></div>
        <div><div class="text-12">Calle de Alcalá, 45, Madrid</div></div>
        <div><div class="text-14">No asignado</div></div>
        <div><div class="overlay-10"><div class="background-9"></div><div class="text-22">Pendiente</div></div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#PED-002</div></div>
        <div><div class="text-11">Restaurante Aroma</div></div>
        <div><div class="text-12">Av. de la Libertad, 12, Sevilla</div></div>
        <div><div class="text-14">Carlos Gómez</div></div>
        <div><div class="overlay-7"><div class="background-5"></div><div class="text-17">En proceso</div></div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#PED-003</div></div>
        <div><div class="text-11">Marina Luz</div></div>
        <div><div class="text-12">Plaza de Cataluña, 8, Barcelona</div></div>
        <div><div class="text-14">Ana Belén</div></div>
        <div><div class="overlay-6"><div class="background-3"></div><div class="text-15">Entregado</div></div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">#PED-004</div></div>
        <div><div class="text-18">Market Fresh</div></div>
        <div><div class="text-12">Polígono Industrial Las Arenas</div></div>
        <div><div class="text-14">Luis Parra</div></div>
        <div><div class="overlay-9"><div class="background-7"></div><div class="text-21">Incidencia</div></div></div>
        <div><div class="text-10">✎ 🗑</div></div>
      </div>

      <div class="pagination-like">
        <div class="div-4"><p class="p">MOSTRANDO 4 DE 156 PEDIDOS</p></div>
        <div class="container-8">
          <button class="button-3"><div class="text-23">1</div></button>
          <button class="button-4"><div class="text-24">2</div></button>
        </div>
      </div>
    </div>

    <div class="inventory-forecast">
      <div class="overlay-11">
        <div class="heading"><div class="text-wrapper-4">Ruta de Reparto</div></div>
        <p class="text-25">Optimización en tiempo real de rutas, repartidores asignados y seguimiento GPS activo.</p>
      </div>

      <div class="overlay-12">
        <div class="heading"><div class="text-wrapper-5">Alertas Críticas</div></div>
        <p class="text-25">Retraso en #PED-004 por congestión de tráfico. Impacto estimado: 25 minutos.</p>
      </div>
    </div>

  </div>
</div>
</body>
</html>