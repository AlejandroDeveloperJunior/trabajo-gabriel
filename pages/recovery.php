<?php
$pageTitle = 'Recuperar contraseña';
$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Ingresa un correo electrónico válido.';
    } else {
        // Aquí iría el envío real del correo
        $sent = true;
    }
}
?>
<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-5">

      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h4 class="fw-bold mb-1">Recuperar contraseña</h4>
          <p class="text-muted small mb-4">Te enviaremos un enlace a tu correo.</p>

          <?php if ($sent): ?>
            <div class="alert alert-success">
              Si ese correo existe, recibirás las instrucciones pronto.
            </div>
            <a href="login.php" class="btn btn-outline-secondary w-100">Volver al login</a>
          <?php else: ?>

            <?php if ($error): ?>
              <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
              <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required
                  value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-danger">Enviar enlace</button>
              </div>
            </form>

            <p class="text-center text-muted small mt-3">
              <a href="login.php">Volver al login</a>
            </p>

          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require '../includes/footer.php'; ?>
