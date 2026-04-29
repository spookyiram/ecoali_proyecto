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
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta charset="utf-8" />
<title>Gestión de Inventario - ECOALI</title>

<link rel="stylesheet" href="assets/css/globals.css">
<link rel="stylesheet" href="assets/css/inventario_admin.css">
</head>

<body>
<div class="gestin-de-inventario">

<div class="organic-background"></div>
<div class="background-blur"></div>
<div class="div"></div>

<div class="main-content">

  <div class="section-search">
    <div class="container">
      <div class="input">
        <div class="container">
          <p class="text-wrapper">Buscar por ID o lote...</p>
        </div>
      </div>
      <div class="icon-wrapper">
        <img class="icon" src="assets/img/icon-4.svg" />
      </div>
    </div>

    <div class="container-2">
      <div class="background-shadow">
        <button class="button"><div class="text">Todo</div></button>
        <button class="div-wrapper"><div class="text-2">Disponible</div></button>
        <button class="div-wrapper"><div class="text-2">Vendido</div></button>
        <button class="div-wrapper"><div class="text-2">Caducado</div></button>
      </div>

      <button class="button-2">
        <div class="container-3">
          <img class="img" src="assets/img/icon-11.svg" />
        </div>
        <div class="text-3">Agregar producto</div>
      </button>
    </div>
  </div>

  <div class="status-overviews">
    <div class="background-border">
      <div class="container-4">
        <div class="overlay"><img class="icon-2" src="assets/img/icon-14.svg" /></div>
        <div class="overlay-2"><div class="text-4">SALUDABLE</div></div>
      </div>
      <div class="container-5"><div class="text-wrapper-2">Total Lotes Disponibles</div></div>
      <div class="div-2"><div class="text-wrapper-3">1,248</div></div>
    </div>

    <div class="background-border-2">
      <div class="container-6">
        <div class="img-wrapper"><img class="icon-3" src="assets/img/image.svg" /></div>
        <div class="overlay-3"><div class="text-5">REVISAR</div></div>
      </div>
      <div class="container-5"><div class="text-wrapper-2">Próximos a Caducar</div></div>
      <div class="div-2"><div class="text-wrapper-3">42</div></div>
    </div>

    <div class="background-border-3">
      <div class="container-7">
        <div class="overlay-4"><img class="icon" src="assets/img/icon-2.svg" /></div>
        <div class="overlay-5"><div class="text-6">CRÍTICO</div></div>
      </div>
      <div class="container-5"><div class="text-wrapper-2">Stock Caducado</div></div>
      <div class="div-2"><div class="text-wrapper-3">08</div></div>
    </div>
  </div>

  <div class="inventory-table">
    <div class="div-2">
      <header class="header">
        <div class="row">
          <div class="cell"><div class="text-7">ID DEL LOTE</div></div>
          <div class="cell-2"><div class="text-7">TIPO DE HUEVO</div></div>
          <div class="cell-3"><div class="text-7">TAMAÑO</div></div>
          <div class="cell-4"><div class="text-8">CANTIDAD</div></div>
          <div class="cell-5"><div class="text-7">POSTURA</div></div>
          <div class="cell-6"><div class="text-7">CADUCIDAD</div></div>
          <div class="cell-7"><div class="text-7">ESTADO</div></div>
          <div class="cell-8"><div class="text-9">ACCIONES</div></div>
        </div>
      </header>

      <div class="div-2">

        <div class="row-disponible">
          <div class="data"><div class="text-10">#LT-2024-001</div></div>
          <div class="data-2"><div class="background"></div><div class="text-11">Orgánico Camperos</div></div>
          <div class="data-3"><div class="text-12">Extra (XL)</div></div>
          <div class="background-wrapper"><div class="background-2"><div class="text-13">450 ud.</div></div></div>
          <div class="data-4"><div class="text-14">12 Oct 2023</div></div>
          <div class="data-5"><div class="text-14">09 Nov 2023</div></div>
          <div class="overlay-wrapper"><div class="overlay-6"><div class="background-3"></div><div class="text-15">Disponible</div></div></div>
          <img class="data-6" src="assets/img/data-2.svg" />
        </div>

        <div class="div-3">
          <div class="data-7"><div class="text-10">#LT-2024-002</div></div>
          <div class="data-2"><div class="background-4"></div><div class="text-11">Blanco Tradicional</div></div>
          <div class="data-8"><div class="text-12">Grande (L)</div></div>
          <div class="data-9"><div class="background-2"><div class="text-13">120 ud.</div></div></div>
          <div class="data-10"><div class="text-14">01 Oct 2023</div></div>
          <div class="data-11"><div class="text-16">28 Oct 2023</div></div>
          <div class="data-12"><div class="overlay-7"><div class="background-5"></div><div class="text-17">Próx. Caducidad</div></div></div>
          <img class="data-6" src="assets/img/data-3.svg" />
        </div>

        <div class="div-3">
          <div class="data-7"><div class="text-10">#LT-2024-003</div></div>
          <div class="data-2"><div class="background-6"></div><div class="text-18">Ponedora Rubia</div></div>
          <div class="data-8"><div class="text-12">Medio (M)</div></div>
          <div class="data-9"><div class="overlay-8"><div class="text-19">15 ud.</div></div></div>
          <div class="data-10"><div class="text-14">20 Sep 2023</div></div>
          <div class="data-11"><div class="text-20">18 Oct 2023</div></div>
          <div class="data-12"><div class="overlay-9"><div class="background-7"></div><div class="text-21">Caducado</div></div></div>
          <img class="data-6" src="assets/img/data-4.svg" />
        </div>

        <div class="div-3">
          <div class="data-13"><div class="text-10">#LT-2024-004</div></div>
          <div class="data-2"><div class="background-8"></div><div class="text-11">Ecológico de Pasto</div></div>
          <div class="data-14"><div class="text-12">Pequeño (S)</div></div>
          <div class="data-15"><div class="background-2"><div class="text-13">28 ud.</div></div></div>
          <div class="data-16"><div class="text-14">15 Oct 2023</div></div>
          <div class="data-17"><div class="text-14">12 Nov 2023</div></div>
          <div class="data-18"><div class="overlay-10"><div class="background-9"></div><div class="text-22">Bajo Stock</div></div></div>
          <img class="data-6" src="assets/img/data.svg" />
        </div>

      </div>
    </div>

    <div class="pagination-like">
      <div class="div-4"><p class="p">MOSTRANDO 4 DE 128 LOTES</p></div>
      <div class="container-8">
        <div class="container-wrapper"><div class="container-3"><img class="icon-4" src="assets/img/icon-3.svg" /></div></div>
        <button class="button-3"><div class="button-shadow"></div><div class="text-23">1</div></button>
        <button class="button-4"><div class="text-24">2</div></button>
        <div class="container-wrapper"><div class="container-3"><img class="icon-4" src="assets/img/icon.svg" /></div></div>
      </div>
    </div>
  </div>

  <div class="inventory-forecast">
    <div class="overlay-11">
      <div class="container-9"><img class="icon-5" src="assets/img/icon-12.svg" /></div>
      <div class="container-10">
        <div class="div-2"><img class="icon-6" src="assets/img/icon-15.svg" /></div>
        <div class="heading"><div class="text-wrapper-4">Optimización de Residuos</div></div>
        <div class="container-11">
          <p class="text-25">Detectamos que 8 lotes caducaron recientemente.<br/>Considera ajustar la logística de proveedores<br/>locales para reducir el tiempo de almacenamiento.</p>
        </div>
      </div>
    </div>

    <div class="overlay-12">
      <div class="container-9"><img class="icon-7" src="assets/img/icon-13.svg" /></div>
      <div class="container-10">
        <div class="div-2"><img class="icon-8" src="assets/img/icon-6.svg" /></div>
        <div class="heading"><div class="text-wrapper-5">Previsión Semanal</div></div>
        <div class="container-11">
          <p class="text-25">La demanda de huevos orgánicos subió un 15%. Se<br/>recomienda aumentar el stock disponible en un 10%<br/>para el próximo lunes.</p>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="header-topappbar">
  <div class="div-4"><div class="text-26">Gestión de Inventario</div></div>
  <img class="container-12" src="assets/img/container.svg" />
</div>

<div class="aside">
  <div class="margin">
    <div class="container-13">
      <div class="div-4"><img class="icon-9" src="assets/img/icon-5.svg" /></div>
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
      <div class="div-4"><img class="icon" src="assets/img/icon-16.svg" /></div>
      <div class="div-4"><div class="text-30">Dashboard</div></div>
    </a>

    <div class="link-active-state">
      <div class="link-active-state-2"></div>
      <div class="div-4"><img class="icon-10" src="assets/img/icon-7.svg" /></div>
      <div class="div-4"><div class="text-31">Inventario</div></div>
    </div>

    <div class="link">
      <div class="div-4"><img class="icon-10" src="assets/img/icon-8.svg" /></div>
      <div class="div-4"><div class="text-30">Proveedores</div></div>
    </div>

    <div class="link">
      <div class="div-4"><img class="icon-11" src="assets/img/icon-17.svg" /></div>
      <div class="div-4"><div class="text-30">Logística</div></div>
    </div>

    <div class="link">
      <div class="div-4"><img class="icon" src="assets/img/icon-9.svg" /></div>
      <div class="div-4"><div class="text-30">Reportes</div></div>
    </div>
  </div>

  <div class="button-wrapper">
    <a href="logout.php" class="button-5">
      <div class="container-3"><img class="icon" src="assets/img/icon-10.svg" /></div>
      <div class="container-3"><div class="text-32">Cerrar Sesión</div></div>
    </a>
  </div>
</div>

</div>
</body>
</html>