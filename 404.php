<?php
http_response_code(404);
$pageTitle = 'Página no encontrada';
require 'includes/header.php';
require 'includes/navbar.php';
?>

<div class="container py-5 text-center">
  <h1 class="display-1 fw-bold text-danger">404</h1>
  <h4 class="fw-bold mb-2">Página no encontrada</h4>
  <p class="text-muted mb-4">Lo sentimos, la página que buscas no existe o fue movida.</p>
  <a href="index.php" class="btn btn-danger me-2">Ir al inicio</a>
  <a href="pages/sitemap.php" class="btn btn-outline-secondary">Ver mapa del sitio</a>
</div>

<?php require 'includes/footer.php'; ?>
