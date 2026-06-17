<?php
$pageTitle = 'Inicio';
require 'includes/header.php';
require 'includes/navbar.php';
?>

<div class="container py-5">

  <!-- Hero -->
  <div class="p-5 mb-4 bg-white rounded-3 shadow-sm text-center">
    <h1 class="display-5 fw-bold">Bienvenido a MiSitio</h1>
    <p class="lead text-muted">Un sitio web sencillo con PHP y Bootstrap.</p>
    <a href="pages/register.php" class="btn btn-danger me-2">Registrarse</a>
    <a href="pages/login.php" class="btn btn-outline-secondary">Iniciar sesión</a>
  </div>

  <!-- Secciones principales -->
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">📋 Servicios</h5>
          <p class="card-text text-muted">Conoce todo lo que ofrecemos para ti.</p>
          <a href="pages/services.php" class="btn btn-sm btn-outline-danger">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">🏢 Nosotros</h5>
          <p class="card-text text-muted">Quiénes somos y qué nos mueve.</p>
          <a href="pages/about.php" class="btn btn-sm btn-outline-danger">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">✉️ Contáctanos</h5>
          <p class="card-text text-muted">Escríbenos, estamos para atenderte.</p>
          <a href="pages/contact.php" class="btn btn-sm btn-outline-danger">Ir</a>
        </div>
      </div>
    </div>
  </div>

</div>

<?php require 'includes/footer.php'; ?>
