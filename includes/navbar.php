<?php
// ID único del sitio
define('SITE_ID', 'MiSitio-001');
define('SITE_NAME', 'MiSitio');

// Detectar página activa
$current = basename($_SERVER['PHP_SELF']);

// Ruta base relativa según carpeta
$base = (strpos($_SERVER['PHP_SELF'], '/pages/') !== false) ? '../' : '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">

    <!-- ID del sitio + nombre -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?= $base ?>index.php">
      <span class="badge bg-danger"><?= SITE_ID ?></span>
      <?= SITE_NAME ?>
    </a>

    <!-- Hamburger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">

      <!-- Secciones principales -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $current === 'index.php' ? 'active' : '' ?>" href="<?= $base ?>index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current === 'about.php' ? 'active' : '' ?>" href="<?= $base ?>pages/about.php">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current === 'services.php' ? 'active' : '' ?>" href="<?= $base ?>pages/services.php">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current === 'contact.php' ? 'active' : '' ?>" href="<?= $base ?>pages/contact.php">Contáctanos</a>
        </li>
      </ul>

      <!-- Búsqueda -->
      <form class="d-flex me-3" method="GET" action="<?= $base ?>pages/search.php">
        <input class="form-control form-control-sm me-2" type="search" name="q" placeholder="Buscar..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
        <button class="btn btn-sm btn-outline-light" type="submit">🔍</button>
      </form>

      <!-- Elementos adicionales -->
      <ul class="navbar-nav gap-1">
        <li class="nav-item">
          <a class="nav-link <?= $current === 'register.php' ? 'active' : '' ?>" href="<?= $base ?>pages/register.php">Registrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current === 'login.php' ? 'active' : '' ?>" href="<?= $base ?>pages/login.php">Iniciar sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current === 'inbox.php' ? 'active' : '' ?>" href="<?= $base ?>pages/inbox.php">Buzón</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current === 'help.php' ? 'active' : '' ?>" href="<?= $base ?>pages/help.php">Ayuda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current === 'sitemap.php' ? 'active' : '' ?>" href="<?= $base ?>pages/sitemap.php">Mapa del sitio</a>
        </li>
      </ul>

    </div>
  </div>
</nav>
