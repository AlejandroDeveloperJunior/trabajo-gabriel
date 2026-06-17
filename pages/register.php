<?php
$pageTitle = 'Registro';
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm'] ?? '';
    $captcha  = $_POST['captcha'] ?? '';

    // Validación backend
    if (empty($name))
        $errors['name'] = 'El nombre es obligatorio.';

    if (empty($email))
        $errors['email'] = 'El correo es obligatorio.';
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email'] = 'El correo no tiene un formato válido.';

    if (strlen($password) < 6)
        $errors['password'] = 'La contraseña debe tener al menos 6 caracteres.';

    if ($password !== $confirm)
        $errors['confirm'] = 'Las contraseñas no coinciden.';

    if ($captcha !== '5')
        $errors['captcha'] = 'Respuesta incorrecta. Intenta de nuevo.';

    if (empty($errors)) {
        // Aquí iría la inserción a base de datos
        $success = true;
    }
}
?>
<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h4 class="mb-1 fw-bold">Crear cuenta</h4>
          <p class="text-muted small mb-4">Completa el formulario para registrarte.</p>

          <?php if ($success): ?>
            <div class="alert alert-success">¡Registro exitoso! Ya puedes <a href="login.php">iniciar sesión</a>.</div>
          <?php else: ?>

          <form method="POST" novalidate id="registerForm">

            <div class="mb-3">
              <label class="form-label">Nombre completo</label>
              <input type="text" name="name" id="name"
                class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
              <div class="invalid-feedback"><?= $errors['name'] ?? '' ?></div>
            </div>

            <div class="mb-3">
              <label class="form-label">Correo electrónico</label>
              <input type="email" name="email" id="email"
                class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
              <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
            </div>

            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password" name="password" id="password"
                class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback"><?= $errors['password'] ?? '' ?></div>
            </div>

            <div class="mb-3">
              <label class="form-label">Confirmar contraseña</label>
              <input type="password" name="confirm" id="confirm"
                class="form-control <?= isset($errors['confirm']) ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback"><?= $errors['confirm'] ?? '' ?></div>
            </div>

            <!-- CAPTCHA humano -->
            <div class="mb-3">
              <label class="form-label">¿Cuánto es 3 + 2? <span class="text-muted">(verificación)</span></label>
              <input type="text" name="captcha" id="captcha" maxlength="2"
                class="form-control <?= isset($errors['captcha']) ? 'is-invalid' : '' ?>"
                value="<?= htmlspecialchars($_POST['captcha'] ?? '') ?>">
              <div class="invalid-feedback"><?= $errors['captcha'] ?? '' ?></div>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-danger">Registrarse</button>
            </div>

          </form>

          <?php endif; ?>

          <p class="text-center text-muted small mt-3">
            ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Validación frontend -->
<script>
document.getElementById('registerForm')?.addEventListener('submit', function(e) {
    let valid = true;

    const name = document.getElementById('name');
    if (name.value.trim() === '') {
        name.classList.add('is-invalid');
        name.nextElementSibling.textContent = 'El nombre es obligatorio.';
        valid = false;
    } else { name.classList.remove('is-invalid'); }

    const email = document.getElementById('email');
    const emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailReg.test(email.value)) {
        email.classList.add('is-invalid');
        email.nextElementSibling.textContent = 'Correo inválido.';
        valid = false;
    } else { email.classList.remove('is-invalid'); }

    const pass = document.getElementById('password');
    if (pass.value.length < 6) {
        pass.classList.add('is-invalid');
        pass.nextElementSibling.textContent = 'Mínimo 6 caracteres.';
        valid = false;
    } else { pass.classList.remove('is-invalid'); }

    const confirm = document.getElementById('confirm');
    if (confirm.value !== pass.value) {
        confirm.classList.add('is-invalid');
        confirm.nextElementSibling.textContent = 'Las contraseñas no coinciden.';
        valid = false;
    } else { confirm.classList.remove('is-invalid'); }

    if (!valid) e.preventDefault();
});
</script>

<?php require '../includes/footer.php'; ?>
