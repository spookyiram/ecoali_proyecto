<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

if ((int)$_SESSION["rol_id"] !== 3) {
    header("Location: login.php");
    exit;
}

$nombre = $_SESSION["nombre"] ?? "Proveedor";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Proveedor</title>

  <link rel="stylesheet" href="assets/css/globals.css">
  <link rel="stylesheet" href="assets/css/proveedor.css">
</head>
<body>

<div class="provider-page">

  <aside class="sidebar">
    <div class="brand">ECOALI</div>

    <div class="profile">
      <div class="avatar">🥚</div>
      <div>
        <h3><?php echo htmlspecialchars($nombre); ?> Ecoali</h3>
        <p>Administrador</p>
      </div>
    </div>

    <nav class="menu">
      <a class="active">▦ Dashboard</a>
      <a>▣ Inventario</a>
      <a>◈ Proveedores</a>
      <a>▤ Logística</a>
      <a>▥ Reportes</a>
    </nav>
  </aside>

  <main class="content">

    <header class="topbar">
      <div></div>
      <nav>
        <a class="active-link">Panel</a>
        <a>Soporte</a>
        <a href="logout.php" class="logout">Salir</a>
      </nav>
    </header>

    <section class="hero">
      <div>
        <h1>Gestión de Producción</h1>
        <p>Monitorea tus lotes, clasifica la producción y mantén la trazabilidad total de tus granjas.</p>
      </div>

      <button>Registrar nueva producción</button>
    </section>

    <section class="layout">

      <div class="left-col">

        <div class="card farms-card">
          <div class="card-head">
            <h3>Granjas Activas</h3>
            <span>Operativo</span>
          </div>

          <div class="farm-list">
            <div class="farm">
              <div class="farm-img img-1"></div>
              <div>
                <h4>Granja Los Olivos</h4>
                <p>Vereda El Salitre</p>
                <div>
                  <small>LOTE #402</small>
                  <small class="ok">ACTIVO</small>
                </div>
              </div>
            </div>

            <div class="farm">
              <div class="farm-img img-2"></div>
              <div>
                <h4>Hacienda El Rocío</h4>
                <p>Valle de Atuntaqui</p>
                <div>
                  <small>LOTE #315</small>
                  <small class="ok">ACTIVO</small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="grading">
          <h3>Clasificación de Producción (Semana)</h3>

          <div class="grade-grid">
            <div>
              <h2>A</h2>
              <p>PEQUEÑO</p>
              <div class="bar"></div>
              <span>1,240 ud</span>
            </div>

            <div>
              <h2>AA</h2>
              <p>MEDIANO</p>
              <div class="bar"></div>
              <span>4,500 ud</span>
            </div>

            <div>
              <h2>AAA</h2>
              <p>GRANDE</p>
              <div class="bar"></div>
              <span>820 ud</span>
            </div>
          </div>
        </div>

      </div>

      <div class="right-col">

        <div class="card status">
          <div class="circle">
            <strong>88%</strong>
            <span>EFICIENCIA</span>
          </div>
          <h3>Estado Óptimo</h3>
          <p>Producción superando el promedio mensual en 4.2%</p>
        </div>

        <div class="card trace">
          <h3>🔀 Trazabilidad de Lotes</h3>

          <div class="timeline-item">
            <small>HOY, 08:45 AM</small>
            <h4>Despacho Lote #402</h4>
            <p>Hacia: Centro de Distribución Norte</p>
          </div>

          <div class="timeline-item">
            <small>AYER, 04:30 PM</small>
            <h4>Inspección de Calidad</h4>
            <p>Lote #315 - Resultado: Aprobado</p>
          </div>

          <div class="timeline-item">
            <small>12 OCT, 11:20 AM</small>
            <h4>Registro Lote #315</h4>
            <p>Origen: Hacienda El Rocío</p>
          </div>

          <button class="history-btn">Ver historial completo</button>
        </div>

      </div>

    </section>

  </main>

  <div class="blob blob-orange"></div>
  <div class="blob blob-bottom"></div>

</div>

</body>
</html>