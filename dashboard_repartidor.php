<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

if ((int)$_SESSION["rol_id"] !== 4) {
    header("Location: login.php");
    exit;
}

$nombre = $_SESSION["nombre"] ?? "Repartidor";
$inicial = strtoupper(substr($nombre, 0, 1));
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Entregas - ECOALI</title>

  <link rel="stylesheet" href="assets/css/globals.css">
  <link rel="stylesheet" href="assets/css/repartidor.css">
</head>
<body>

<div class="delivery-page">

  <aside class="sidebar">
    <div class="brand">ECOALI</div>

    <div class="profile">
      <div class="avatar"><?php echo htmlspecialchars($inicial); ?></div>
      <div>
        <h3><?php echo htmlspecialchars($nombre); ?></h3>
        <p>Delivery Fleet Alpha</p>
      </div>
    </div>

    <nav class="menu">
      <a class="active">▦ Dashboard</a>
      <a>▣ Pedidos</a>
      <a>▤ Entregas</a>
      <a>◈ Evidencia</a>
      <a>ⓘ Incidentes</a>
    </nav>

    <div class="shift-status">
      <small>ESTADO DEL TURNO</small>
      <p><span></span> En Servicio</p>
    </div>
  </aside>

  <main class="content">

    <header class="topbar">
      <div>
        <h1>Panel de Entregas</h1>
      </div>

      <div class="route-info">
        <p>Lunes, 24 Mayo</p>
        <strong>Ruta 042-B</strong>
        <div class="mini-avatar"><?php echo htmlspecialchars($inicial); ?></div>
      </div>
    </header>

    <section class="metrics">
      <div class="metric-card">
        <div class="metric-top">
          <span class="icon">▣</span>
          <small>Hoy</small>
        </div>
        <h2>12</h2>
        <p>Pedidos Asignados</p>
      </div>

      <div class="metric-card">
        <div class="metric-top">
          <span class="icon green">✓</span>
          <small>+2</small>
        </div>
        <h2>08</h2>
        <p>Entregas Completadas</p>
      </div>

      <div class="metric-card">
        <div class="metric-top">
          <span class="icon yellow">▣</span>
          <small>Pendiente</small>
        </div>
        <h2>04</h2>
        <p>Entregas Pendientes</p>
      </div>

      <div class="metric-card">
        <div class="metric-top">
          <span class="icon">⏱</span>
          <small>-5%</small>
        </div>
        <h2>18 min</h2>
        <p>Tiempo Promedio</p>
      </div>
    </section>

    <section class="main-grid">

      <div class="map-card">
        <div class="card-head">
          <h3>Ruta de Entrega Actual</h3>
          <button>Iniciar Navegación</button>
        </div>

        <div class="map-box">
          <div class="map-line"></div>
          <div class="point start">Origen</div>
          <div class="point end">Entrega #3</div>
        </div>

        <div class="route-stats">
          <div>
            <span>▰</span>
            <div>
              <small>Distancia</small>
              <strong>4.2 km</strong>
            </div>
          </div>

          <div>
            <span>◴</span>
            <div>
              <small>Estimado</small>
              <strong>12 min</strong>
            </div>
          </div>

          <div>
            <span>▦</span>
            <div>
              <small>Tráfico</small>
              <strong>Moderado</strong>
            </div>
          </div>
        </div>
      </div>

      <div class="orders-card">
        <div class="orders-head">
          <h3>Próximas Paradas</h3>
          <span>3 restantes</span>
        </div>

        <div class="order active-order">
          <div class="order-top">
            <small>#ECO-8821</small>
            <span>EN CAMINO</span>
          </div>
          <h4>Carlos Mendoza</h4>
          <p>Av. Las Flores 452, Miraflores</p>
          <div class="order-bottom">
            <small class="priority">● Prioridad Alta</small>
            <button>DETALLES</button>
          </div>
        </div>

        <div class="order">
          <div class="order-top">
            <small>#ECO-8822</small>
            <span>PENDIENTE</span>
          </div>
          <h4>Lucía Fernández</h4>
          <p>Calle Roble 12, San Isidro</p>
          <div class="order-bottom">
            <small>14:30 - 15:00</small>
            <button>DETALLES</button>
          </div>
        </div>

        <div class="order">
          <div class="order-top">
            <small>#ECO-8825</small>
            <span>PENDIENTE</span>
          </div>
          <h4>Roberto Gómez</h4>
          <p>Jr. Pizarro 881, Centro</p>
          <div class="order-bottom">
            <small>15:15 - 15:45</small>
            <button>DETALLES</button>
          </div>
        </div>

        <button class="all-btn">Ver todas las entregas</button>
      </div>

    </section>

  </main>

  <div class="green-blur"></div>

</div>

</body>
</html>