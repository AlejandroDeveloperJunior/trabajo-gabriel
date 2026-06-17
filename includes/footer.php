<?php
$base = (strpos($_SERVER['PHP_SELF'], '/pages/') !== false) ? '../' : '';
?>
<footer class="bg-dark text-light mt-5 py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h6 class="fw-bold">MiSitio</h6>
        <p class="text-muted small">Sitio web desarrollado como proyecto académico.</p>
      </div>
      <div class="col-md-4 mb-3">
        <h6 class="fw-bold">Páginas</h6>
        <ul class="list-unstyled small">
          <li><a href="<?= $base ?>index.php" class="text-muted text-decoration-none">Inicio</a></li>
          <li><a href="<?= $base ?>pages/about.php" class="text-muted text-decoration-none">Nosotros</a></li>
          <li><a href="<?= $base ?>pages/services.php" class="text-muted text-decoration-none">Servicios</a></li>
          <li><a href="<?= $base ?>pages/contact.php" class="text-muted text-decoration-none">Contáctanos</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3">
        <h6 class="fw-bold">Cuenta</h6>
        <ul class="list-unstyled small">
          <li><a href="<?= $base ?>pages/login.php" class="text-muted text-decoration-none">Iniciar sesión</a></li>
          <li><a href="<?= $base ?>pages/register.php" class="text-muted text-decoration-none">Registrarse</a></li>
          <li><a href="<?= $base ?>pages/recovery.php" class="text-muted text-decoration-none">Recuperar contraseña</a></li>
          <li><a href="<?= $base ?>pages/sitemap.php" class="text-muted text-decoration-none">Mapa del sitio</a></li>
        </ul>
      </div>
    </div>
    <hr class="border-secondary">
    <p class="text-muted small text-center mb-0">&copy; <?= date('Y') ?> MiSitio. Todos los derechos reservados.</p>
  </div>
</footer>

<!-- Chat flotante -->
<div style="position:fixed; bottom:1.5rem; right:1.5rem; z-index:999;">
  <button class="btn btn-danger rounded-circle shadow" onclick="toggleChat()" style="width:52px;height:52px;font-size:1.3rem;" title="Chat">💬</button>
  <div id="chatBox" class="card shadow" style="display:none; width:280px; position:absolute; bottom:60px; right:0;">
    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center py-2">
      <small class="fw-bold">Soporte en línea</small>
      <button class="btn btn-sm text-white p-0" onclick="toggleChat()">✕</button>
    </div>
    <div id="chatMsgs" class="card-body bg-white" style="height:180px; overflow-y:auto; font-size:.85rem;">
      <div class="mb-2"><span class="badge bg-secondary">Bot</span> ¡Hola! ¿En qué te puedo ayudar?</div>
    </div>
    <div class="card-footer p-2 d-flex gap-1">
      <input id="chatInput" type="text" class="form-control form-control-sm" placeholder="Escribe...">
      <button class="btn btn-sm btn-danger" onclick="sendChat()">➤</button>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function toggleChat() {
  const box = document.getElementById('chatBox');
  box.style.display = box.style.display === 'none' ? 'block' : 'none';
}
function sendChat() {
  const input = document.getElementById('chatInput');
  const msgs = document.getElementById('chatMsgs');
  const text = input.value.trim();
  if (!text) return;
  msgs.innerHTML += `<div class="mb-2 text-end"><span class="badge bg-primary">Tú</span> ${text}</div>`;
  input.value = '';
  setTimeout(() => {
    msgs.innerHTML += `<div class="mb-2"><span class="badge bg-secondary">Bot</span> Gracias por tu mensaje, pronto te atenderemos.</div>`;
    msgs.scrollTop = msgs.scrollHeight;
  }, 600);
}
document.getElementById('chatInput')?.addEventListener('keypress', e => { if (e.key === 'Enter') sendChat(); });
</script>
</body>
</html>
