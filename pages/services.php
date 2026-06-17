<?php $pageTitle = 'Servicios'; ?>
<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<div class="container py-5">
  <h4 class="fw-bold mb-1">Servicios</h4>
  <p class="text-muted small mb-4">Lo que ofrecemos.</p>

  <div class="row g-4">
    <?php
    $services = [
        ['icon' => '🌐', 'title' => 'Desarrollo Web',    'desc' => 'Creamos sitios web modernos y responsivos a tu medida.'],
        ['icon' => '📱', 'title' => 'Diseño Responsive',  'desc' => 'Tu sitio se ve bien en cualquier dispositivo.'],
        ['icon' => '🔒', 'title' => 'Seguridad',          'desc' => 'Validación de datos y protección en frontend y backend.'],
        ['icon' => '📬', 'title' => 'Mensajería',         'desc' => 'Sistema de buzón y contacto integrado.'],
        ['icon' => '🔍', 'title' => 'Búsqueda interna',   'desc' => 'Encuentra cualquier página del sitio fácilmente.'],
        ['icon' => '💬', 'title' => 'Soporte en vivo',    'desc' => 'Chat de soporte disponible en todas las páginas.'],
    ];
    foreach ($services as $s):
    ?>
    <div class="col-md-4">
      <div class="card h-100 shadow-sm border-0">
        <div class="card-body">
          <p class="fs-2 mb-2"><?= $s['icon'] ?></p>
          <h6 class="fw-bold"><?= $s['title'] ?></h6>
          <p class="text-muted small"><?= $s['desc'] ?></p>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require '../includes/footer.php'; ?>
