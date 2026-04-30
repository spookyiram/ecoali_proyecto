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
<title>Reportes y Análisis - ECOALI</title>

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

      <a class="link" href="logistica_admin.php">
        <div class="div-4"><div class="text-30">Logística</div></div>
      </a>

      <a class="link-active-state" href="reportes_admin.php">
        <div class="link-active-state-2"></div>
        <div class="div-4"><div class="text-31">Reportes</div></div>
      </a>
    </div>

    <div class="button-wrapper">
      <a href="logout.php" class="button-5">
        <div class="container-3"><div class="text-32">Cerrar Sesión</div></div>
      </a>
    </div>
  </div>

  <div class="header-topappbar">
    <div class="div-4"><div class="text-26">Reportes y Análisis</div></div>

    <button class="button-2">
      <div class="text-3">Exportar PDF</div>
    </button>
  </div>

  <div class="main-content">

    <div class="section-search">
      <div class="container">
        <div class="input">
          <div class="container">
            <p class="text-wrapper">Buscar reportes...</p>
          </div>
        </div>
      </div>

      <div class="container-2">
        <div class="background-shadow">
          <button class="div-wrapper"><div class="text-2">Diario</div></button>
          <button class="div-wrapper"><div class="text-2">Semanal</div></button>
          <button class="button"><div class="text">Mensual</div></button>
          <button class="div-wrapper"><div class="text-2">Anual</div></button>
        </div>

        <button class="button-2">
          <div class="text-3">Filtrar reporte</div>
        </button>
      </div>
    </div>

    <div class="status-overviews">
      <div class="background-border">
        <div class="container-5"><div class="text-wrapper-2">Ventas Totales</div></div>
        <div class="div-2"><div class="text-wrapper-3">$128,430</div></div>
      </div>

      <div class="background-border-2">
        <div class="container-5"><div class="text-wrapper-2">Pedidos Completados</div></div>
        <div class="div-2"><div class="text-wrapper-3">1,248</div></div>
      </div>

      <div class="background-border-3">
        <div class="container-5"><div class="text-wrapper-2">Inventario Disponible</div></div>
        <div class="div-2"><div class="text-wrapper-3">8,520</div></div>
      </div>
    </div>

    <div class="inventory-forecast">
      <div class="overlay-11">
        <div class="heading"><div class="text-wrapper-4">Ventas por periodo</div></div>
        <p class="text-25">
          Desempeño mensual acumulado. Los datos muestran un incremento del 12% en ventas respecto al periodo anterior.
        </p>
      </div>

      <div class="overlay-12">
        <div class="heading"><div class="text-wrapper-5">Inventario por estado</div></div>
        <p class="text-25">
          En stock: 75%. En tránsito: 20%. Bajo stock: 5%. Datos actualizados hace 2 minutos.
        </p>
      </div>
    </div>

    <div class="inventory-table">
      <div class="header">
        <div class="row">
          <div><div class="text-7">TIPO DE REPORTE</div></div>
          <div><div class="text-7">FORMATO</div></div>
          <div><div class="text-7">FECHA</div></div>
          <div><div class="text-8">ESTADO</div></div>
          <div><div class="text-9">ACCIÓN</div></div>
        </div>
      </div>

      <div class="row-disponible">
        <div><div class="text-10">Rendimiento Mensual Ventas</div></div>
        <div><div class="text-11">PDF • 2.4 MB</div></div>
        <div><div class="text-14">12 Oct, 2023</div></div>
        <div><div class="overlay-6"><div class="background-3"></div><div class="text-15">Completado</div></div></div>
        <div><div class="text-10">Descargar</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">Auditoría de Inventario Q3</div></div>
        <div><div class="text-11">XLS • 1.1 MB</div></div>
        <div><div class="text-14">08 Oct, 2023</div></div>
        <div><div class="overlay-6"><div class="background-3"></div><div class="text-15">Completado</div></div></div>
        <div><div class="text-10">Descargar</div></div>
      </div>

      <div class="div-3">
        <div><div class="text-10">Relación de Proveedores</div></div>
        <div><div class="text-11">CSV • 850 KB</div></div>
        <div><div class="text-14">05 Oct, 2023</div></div>
        <div><div class="overlay-7"><div class="background-5"></div><div class="text-17">Pendiente</div></div></div>
        <div><div class="text-10">Ver</div></div>
      </div>

      <div class="pagination-like">
        <div class="div-4"><p class="p">MOSTRANDO 3 REPORTES RECIENTES</p></div>
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