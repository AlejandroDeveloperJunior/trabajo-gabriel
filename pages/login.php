<?php
$pageTitle = 'Iniciar sesión';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email'] = 'Ingresa un correo válido.';

    if (empty($password))
        $errors['password'] = 'La contraseña es obligatoria.';

    // Simulación: usuario válido
    if (empty($errors)) {
        if ($email === 'demo@demo.com' && $password === '123456') {
            // session_start(); $_SESSION['user'] = $email;
            header('Location: ../index.php');
            exit;
        } else {
            $errors['general'] = 'Correo o contraseña incorrectos.';
        }
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
          <h4 class="fw-bold mb-1">Iniciar sesión</h4>
          <p class="text-muted small mb-4">Accede a tu cuenta.</p>

          <?php if (!empty($errors['general'])): ?>
            <div class="alert alert-danger"><?= $errors['general'] ?></div>
          <?php endif; ?>

          <form method="POST" id="loginForm">

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

            <div class="mb-3 text-end">
              <a href="recovery.php" class="small text-muted">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-danger">Entrar</button>
            </div>

          </form>

          <p class="text-center text-muted small mt-3">
            ¿No tienes cuenta? <a href="register.php">Regístrate</a>
          </p>
          <p class="text-center text-muted small">
            <em>Demo: demo@demo.com / 123456</em>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
document.getElementById('loginForm')?.addEventListener('submit', function(e) {
    let valid = true;

    const email = document.getElementById('email');
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        email.classList.add('is-invalid');
        valid = false;
    } else { email.classList.remove('is-invalid'); }

    const pass = document.getElementById('password');
    if (pass.value.trim() === '') {
        pass.classList.add('is-invalid');
        valid = false;
    } else { pass.classList.remove('is-invalid'); }

    if (!valid) e.preventDefault();
});
</script>

<?php require '../includes/footer.php'; ?>
