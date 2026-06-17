<?php $pageTitle = 'Mapa del sitio'; ?>
<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<div class="container py-5">
  <h4 class="fw-bold mb-1">Mapa del sitio</h4>
  <p class="text-muted small mb-4">Todas las páginas disponibles en el sitio.</p>

  <div class="row g-4">

    <!-- Secciones principales -->
    <div class="col-md-4">
      <h6 class="text-danger fw-bold text-uppercase mb-3">Secciones principales</h6>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="../index.php">🏠 Inicio</a></li>
        <li class="list-group-item"><a href="about.php">🏢 Nosotros</a></li>
        <li class="list-group-item"><a href="services.php">📋 Servicios</a></li>
        <li class="list-group-item"><a href="contact.php">✉️ Contáctanos</a></li>
      </ul>
    </div>

    <!-- Secciones secundarias -->
    <div class="col-md-4">
      <h6 class="text-danger fw-bold text-uppercase mb-3">Secciones secundarias</h6>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="help.php">❓ Ayuda</a></li>
        <li class="list-group-item"><a href="inbox.php">📬 Buzón</a></li>
        <li class="list-group-item"><a href="search.php">🔍 Búsqueda</a></li>
        <li class="list-group-item"><a href="sitemap.php">🗺️ Mapa del sitio</a></li>
      </ul>
    </div>

    <!-- Elementos adicionales -->
    <div class="col-md-4">
      <h6 class="text-danger fw-bold text-uppercase mb-3">Cuenta y acceso</h6>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="register.php">📝 Registrar</a></li>
        <li class="list-group-item"><a href="login.php">🔐 Iniciar sesión</a></li>
        <li class="list-group-item"><a href="recovery.php">🔑 Recuperar contraseña</a></li>
        <li class="list-group-item"><a href="../404.php">⚠️ Página de error</a></li>
      </ul>
    </div>

  </div>
</div>

<?php require '../includes/footer.php'; ?>
