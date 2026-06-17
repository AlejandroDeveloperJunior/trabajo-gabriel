<?php
$pageTitle = 'Contáctanos';
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name))    $errors['name']    = 'El nombre es obligatorio.';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
                         $errors['email']   = 'Correo inválido.';
    if (empty($subject)) $errors['subject'] = 'El asunto es obligatorio.';
    if (strlen($message) < 10)
                         $errors['message'] = 'El mensaje debe tener al menos 10 caracteres.';

    if (empty($errors)) {
        // Aquí iría mail() o guardar en BD
        $success = true;
    }
}
?>
<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-7">

      <h4 class="fw-bold mb-1">Contáctanos</h4>
      <p class="text-muted small mb-4">Llena el formulario y te respondemos a la brevedad.</p>

      <?php if ($success): ?>
        <div class="alert alert-success">¡Mensaje enviado! Te contactaremos pronto.</div>
      <?php else: ?>

      <div class="card shadow-sm">
        <div class="card-body p-4">
          <form method="POST">

            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" name="name"
                  class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                  value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                <div class="invalid-feedback"><?= $errors['name'] ?? '' ?></div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Correo</label>
                <input type="email" name="email"
                  class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                  value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Asunto</label>
              <input type="text" name="subject"
                class="form-control <?= isset($errors['subject']) ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
              <div class="invalid-feedback"><?= $errors['subject'] ?? '' ?></div>
            </div>

            <div class="mb-3">
              <label class="form-label">Mensaje</label>
              <textarea name="message" rows="5"
                class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
              <div class="invalid-feedback"><?= $errors['message'] ?? '' ?></div>
            </div>

            <button type="submit" class="btn btn-danger">Enviar mensaje</button>

          </form>
        </div>
      </div>

      <?php endif; ?>

    </div>
  </div>
</div>

<?php require '../includes/footer.php'; ?>
