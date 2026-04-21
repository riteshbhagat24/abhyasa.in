<?php
$PAGE_TITLE = 'Privacy Policy — Abhyasa';
$PAGE_DESCRIPTION = 'How Abhyasa collects, uses, and protects student and parent information.';
require_once __DIR__ . '/includes/header.php';
?>

<main>

<section class="page-hero">
  <div class="container">
    <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
      <a href="index.php">Home</a>
      <?= icon('chevron-right', 14) ?>
      <span>Privacy Policy</span>
    </nav>
    <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>Legal</span>
    <h1 class="serif">Privacy Policy</h1>
    <p class="page-hero__lede">
      How Abhyasa collects, uses and protects the information of students, parents and visitors to this website. Last updated: <?= date('F Y') ?>.
    </p>
  </div>
</section>

<section class="post-body" style="padding-top: 2rem;">
  <div class="container" style="max-width: 72ch; margin-inline: auto;">
    <h3 style="font-family: 'Fraunces', serif; font-size: 1.4rem; margin-top: 2rem;">1. Information we collect</h3>
    <p style="color: var(--text-secondary); line-height: 1.8;">When you fill out a form on this website — such as the Book-a-Demo form — we collect the name, phone number, email address, class, and program of interest you submit. We also collect anonymised analytics (pages visited, referrer, browser type) to improve the site.</p>

    <h3 style="font-family: 'Fraunces', serif; font-size: 1.4rem; margin-top: 2rem;">2. How we use it</h3>
    <p style="color: var(--text-secondary); line-height: 1.8;">We use the information you provide only to respond to your enquiry — to call back, confirm a demo slot, or send requested study material. We do not sell, rent, or share your information with third parties for marketing.</p>

    <h3 style="font-family: 'Fraunces', serif; font-size: 1.4rem; margin-top: 2rem;">3. How we store it</h3>
    <p style="color: var(--text-secondary); line-height: 1.8;">Form submissions are stored on our web server and are only accessible to authorised Abhyasa staff. We retain enquiry data for up to 24 months for follow-up purposes.</p>

    <h3 style="font-family: 'Fraunces', serif; font-size: 1.4rem; margin-top: 2rem;">4. Cookies</h3>
    <p style="color: var(--text-secondary); line-height: 1.8;">We use minimal functional cookies only. We do not use third-party advertising cookies or cross-site trackers.</p>

    <h3 style="font-family: 'Fraunces', serif; font-size: 1.4rem; margin-top: 2rem;">5. Your rights</h3>
    <p style="color: var(--text-secondary); line-height: 1.8;">You can ask us to correct or delete your information at any time by emailing <a href="mailto:<?= e($CONTACT['email']) ?>" style="color: var(--gold-600);"><?= e($CONTACT['email']) ?></a>. We will action the request within 7 working days.</p>

    <h3 style="font-family: 'Fraunces', serif; font-size: 1.4rem; margin-top: 2rem;">6. Contact</h3>
    <p style="color: var(--text-secondary); line-height: 1.8;">
      Questions about this policy? Email <a href="mailto:<?= e($CONTACT['email']) ?>" style="color: var(--gold-600);"><?= e($CONTACT['email']) ?></a> or call <?= e($CONTACT['phone_display']) ?>.
    </p>
  </div>
</section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
