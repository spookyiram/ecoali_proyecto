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
  <title>Dashboard Administrador</title>

  <link rel="stylesheet" href="assets/css/globals.css">
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<div class="admin-page">

  <aside class="sidebar">
    <div class="profile">
      <div class="avatar">🥚</div>
      <div>
        <h3><?php echo htmlspecialchars($nombre); ?> Ecoali</h3>
        <p>Gestión Global</p>
      </div>
    </div>

    <nav class="menu">
      <a class="active">▦ Dashboard</a>
      <a href="inventario_admin.php">▣ Inventario</a>
      <a>◈ Proveedores</a>
      <a>▤ Logística</a>
      <a>▥ Reportes</a>
    </nav>
  </aside>

  <main class="content">

    <header class="topbar">
      <h1>Panel de Control</h1>
      <p>Gestión integral de producción y logística</p>

      <div class="actions">
        <button class="btn-light">Exportar PDF</button>
        <button class="btn-main">+ Nueva Orden</button>
        <a href="logout.php" class="logout">Salir</a>
      </div>
    </header>

    <section class="metrics">
      <div class="card metric">
        <span>USUARIOS ACTIVOS</span>
        <h2>1,284</h2>
      </div>

      <div class="card metric">
        <span>VENTAS TOTALES</span>
        <h2>$45.2k</h2>
      </div>

      <div class="card metric">
        <span>STOCK DE HUEVOS</span>
        <h2>8,420</h2>
      </div>

      <div class="card metric">
        <span>RUTAS ACTIVAS</span>
        <h2>14</h2>
      </div>
    </section>

    <section class="grid-main">
      <div class="card chart">
        <h3>Producción Semanal</h3>
        <div class="chart-empty">
          <span>Lun</span>
          <span>Mar</span>
          <span>Mié</span>
          <span>Jue</span>
          <span>Vie</span>
        </div>
      </div>

      <div class="card quick">
        <h3>Accesos Directos</h3>

        <div class="quick-grid">
          <button>👥<span>Usuarios</span></button>
          <button>🏠<span>Granjas</span></button>
          <button>📦<span>Stock</span></button>
          <button>🧾<span>Facturas</span></button>
        </div>

        <div class="notice">
          Tienes 3 solicitudes de nuevos proveedores pendientes de revisión.
        </div>
      </div>
    </section>

    <section class="bottom-grid">
      <div class="card">
        <div class="card-head">
          <h3>Últimos Pedidos</h3>
          <a>Ver todos</a>
        </div>

        <div class="order">
          <div>#ORD-4592 <small>Hace 15 min</small></div>
          <strong>$450.00</strong>
        </div>

        <div class="order">
          <div>#ORD-4591 <small>Hace 2 horas</small></div>
          <strong>$1,200.00</strong>
        </div>

        <div class="order">
          <div>#ORD-4590 <small>Hoy, 10:24 AM</small></div>
          <strong>$234.50</strong>
        </div>
      </div>

      <div class="card">
        <div class="card-head">
          <h3>Proveedores Destacados</h3>
          <a>Ver mapa</a>
        </div>

        <div class="provider">
          <div class="egg"></div>
          <div>
            <strong>Granja La Aurora</strong>
            <small>Huevos Orgánicos • Premium</small>
          </div>
          <span>★ 4.9</span>
        </div>

        <div class="provider">
          <div class="egg"></div>
          <div>
            <strong>Hortalizas del Valle</strong>
            <small>Vegetales • Sostenible</small>
          </div>
          <span>★ 4.7</span>
        </div>
      </div>
    </section>

  </main>

</div>

</body>
</html>