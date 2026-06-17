<?php
$pageTitle = 'Búsqueda';
$query = trim($_GET['q'] ?? '');

// Páginas del sitio para buscar
$pages = [
    ['title' => 'Inicio',               'url' => '../index.php',         'desc' => 'Página principal del sitio'],
    ['title' => 'Nosotros',             'url' => 'about.php',            'desc' => 'Quiénes somos y qué hacemos'],
    ['title' => 'Servicios',            'url' => 'services.php',         'desc' => 'Servicios que ofrecemos'],
    ['title' => 'Contáctanos',          'url' => 'contact.php',          'desc' => 'Formulario de contacto y buzón'],
    ['title' => 'Registrar',            'url' => 'register.php',         'desc' => 'Crear una cuenta nueva'],
    ['title' => 'Iniciar sesión',       'url' => 'login.php',            'desc' => 'Acceder con tu cuenta'],
    ['title' => 'Recuperar contraseña', 'url' => 'recovery.php',         'desc' => 'Recuperar acceso a tu cuenta'],
    ['title' => 'Buzón',                'url' => 'inbox.php',            'desc' => 'Mensajes recibidos'],
    ['title' => 'Ayuda',                'url' => 'help.php',             'desc' => 'Preguntas frecuentes y soporte'],
    ['title' => 'Mapa del sitio',       'url' => 'sitemap.php',          'desc' => 'Todas las páginas del sitio'],
];

$results = [];
if ($query !== '') {
    foreach ($pages as $page) {
        if (stripos($page['title'], $query) !== false || stripos($page['desc'], $query) !== false) {
            $results[] = $page;
        }
    }
}
?>
<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<div class="container py-5">
  <h4 class="fw-bold mb-1">Búsqueda</h4>

  <form method="GET" class="mb-4">
    <div class="input-group" style="max-width:450px;">
      <input type="search" name="q" class="form-control" placeholder="Buscar en el sitio..." value="<?= htmlspecialchars($query) ?>">
      <button class="btn btn-danger" type="submit">Buscar</button>
    </div>
  </form>

  <?php if ($query === ''): ?>
    <p class="text-muted">Escribe algo para buscar.</p>

  <?php elseif (empty($results)): ?>
    <div class="alert alert-warning">No se encontraron resultados para <strong><?= htmlspecialchars($query) ?></strong>.</div>

  <?php else: ?>
    <p class="text-muted small mb-3"><?= count($results) ?> resultado(s) para <strong><?= htmlspecialchars($query) ?></strong></p>
    <div class="list-group" style="max-width:550px;">
      <?php foreach ($results as $r): ?>
        <a href="<?= $r['url'] ?>" class="list-group-item list-group-item-action">
          <strong><?= htmlspecialchars($r['title']) ?></strong>
          <p class="mb-0 text-muted small"><?= htmlspecialchars($r['desc']) ?></p>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php require '../includes/footer.php'; ?>
