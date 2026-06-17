<?php $pageTitle = 'Buzón'; ?>
<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<div class="container py-5">
  <h4 class="fw-bold mb-1">Buzón</h4>
  <p class="text-muted small mb-4">Mensajes recibidos.</p>

  <?php
  // Mensajes de ejemplo (en un proyecto real vendrían de la BD)
  $messages = [
      ['from' => 'Admin',       'subject' => 'Bienvenido al sitio',         'date' => '2025-06-10', 'read' => false],
      ['from' => 'Soporte',     'subject' => 'Tu registro fue exitoso',      'date' => '2025-06-09', 'read' => true],
      ['from' => 'Notificación','subject' => 'Recuerda completar tu perfil', 'date' => '2025-06-08', 'read' => true],
  ];
  ?>

  <div class="list-group" style="max-width:650px;">
    <?php foreach ($messages as $msg): ?>
    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
      <div>
        <?php if (!$msg['read']): ?>
          <span class="badge bg-danger me-1">Nuevo</span>
        <?php endif; ?>
        <strong><?= htmlspecialchars($msg['subject']) ?></strong>
        <p class="mb-0 text-muted small">De: <?= htmlspecialchars($msg['from']) ?></p>
      </div>
      <small class="text-muted"><?= $msg['date'] ?></small>
    </div>
    <?php endforeach; ?>
  </div>

</div>

<?php require '../includes/footer.php'; ?>
