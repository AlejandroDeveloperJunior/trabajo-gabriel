<?php $pageTitle = 'Ayuda'; ?>
<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<div class="container py-5">
  <h4 class="fw-bold mb-1">Centro de ayuda</h4>
  <p class="text-muted small mb-4">Preguntas frecuentes.</p>

  <div class="accordion" id="faqAccordion" style="max-width:700px;">

    <?php
    $faqs = [
        ['¿Cómo me registro?',             'Ve a la sección "Registrar" en el menú y completa el formulario.'],
        ['¿Olvidé mi contraseña, qué hago?','Usa la opción "Recuperar contraseña" desde la pantalla de inicio de sesión.'],
        ['¿Cómo puedo contactarlos?',       'Puedes escribirnos desde la sección "Contáctanos" o usar el chat en la parte inferior.'],
        ['¿El sitio es gratuito?',          'Sí, el registro y uso básico es completamente gratuito.'],
        ['¿Cómo cambio mis datos?',         'Una vez dentro de tu cuenta, accede a tu perfil para editar tu información.'],
    ];
    foreach ($faqs as $i => [$q, $a]):
    ?>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?>" type="button"
          data-bs-toggle="collapse" data-bs-target="#faq<?= $i ?>">
          <?= $q ?>
        </button>
      </h2>
      <div id="faq<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
        <div class="accordion-body text-muted"><?= $a ?></div>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</div>

<?php require '../includes/footer.php'; ?>
