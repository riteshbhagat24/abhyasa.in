<?php
http_response_code(404);
$PAGE_TITLE = 'Page not found — Abhyasa';
$PAGE_DESCRIPTION = 'The page you were looking for doesn\'t exist.';
$HIDE_FOOTER_CTA = true;
require_once __DIR__ . '/includes/header.php';
?>

<main>
<section class="notfound">
  <div>
    <div class="big">404</div>
    <h1>This page took a detour.</h1>
    <p>The page you were looking for doesn't exist — it may have been moved or the URL is wrong. Here are some places that might help:</p>
    <div class="actions">
      <a href="index.php" class="btn btn-primary">Back to home <?= icon('arrow-right', 16) ?></a>
      <a href="courses.php" class="btn btn-ghost">See our programs</a>
      <a href="contact.php" class="btn btn-ghost">Contact us</a>
    </div>
  </div>
</section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
