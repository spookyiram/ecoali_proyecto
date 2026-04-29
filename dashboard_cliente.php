<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

if ((int)$_SESSION["rol_id"] !== 2) {
    header("Location: login.php");
    exit;
}

$nombre = $_SESSION["nombre"] ?? "Cliente";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo de Productos - ECOALI</title>

  <link rel="stylesheet" href="assets/css/globals.css">
  <link rel="stylesheet" href="assets/css/cliente.css">
</head>
<body>

<div class="cliente-page">

  <header class="cliente-header">
    <div class="brand">☰ ECOALI</div>
    <div class="cart">🛒<span>3</span></div>
  </header>

  <main class="cliente-content">

    <div class="search-box">
      <span>⌕</span>
      <input type="text" placeholder="Buscar productos frescos...">
    </div>

    <section class="title-section">
      <h1>Catálogo de Productos</h1>
      <p>Frescura directo del campo a tu hogar.</p>
    </section>

    <section class="filters">
      <div class="filter-row">
        <button class="active">Tipo de Huevo</button>
        <button>Tamaño</button>
        <button>Precio</button>
      </div>

      <div class="tag-row">
        <span>Orgánico</span>
        <span>Blanco</span>
        <span>Rojo</span>
      </div>
    </section>

    <section class="product-grid">

      <article class="product-card">
        <div class="product-img img-1">
          <span class="stock">● STOCK</span>
        </div>
        <div class="product-info">
          <h3>Huevos Orgánicos Rojos</h3>
          <p>TAMAÑO: AA | 12 UNIDADES</p>
          <div class="price-row">
            <strong>$4.50</strong>
            <button>+</button>
          </div>
        </div>
      </article>

      <article class="product-card">
        <div class="product-img img-2">
          <span class="stock">● STOCK</span>
        </div>
        <div class="product-info">
          <h3>Huevos Blancos Premium</h3>
          <p>TAMAÑO: AAA | 30 UNIDADES</p>
          <div class="price-row">
            <strong>$8.20</strong>
            <button>+</button>
          </div>
        </div>
      </article>

      <article class="product-card">
        <div class="product-img img-3">
          <span class="stock">● STOCK</span>
        </div>
        <div class="product-info">
          <h3>Pack Familiar Mixto</h3>
          <p>TAMAÑO: AA | 24 UNIDADES</p>
          <div class="price-row">
            <strong>$12.00</strong>
            <button>+</button>
          </div>
        </div>
      </article>

      <article class="product-card">
        <div class="product-img img-4">
          <span class="stock">● STOCK</span>
        </div>
        <div class="product-info">
          <h3>Huevo Rojo Especial</h3>
          <p>TAMAÑO: A | 6 UNIDADES</p>
          <div class="price-row">
            <strong>$2.75</strong>
            <button>+</button>
          </div>
        </div>
      </article>

    </section>

  </main>

  <nav class="bottom-nav">
    <a>⌂<span>Home</span></a>
    <a class="active">▦<span>Catálogo</span></a>
    <a>♙<span><?php echo htmlspecialchars($nombre); ?></span></a>
  </nav>

</div>

</body>
</html>