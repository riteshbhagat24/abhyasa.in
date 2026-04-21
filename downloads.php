<?php
$PAGE_TITLE = 'Free NEET Study Material & Downloads — Abhyasa';
$PAGE_DESCRIPTION = 'Downloadable NEET and Board study material for Class 8-12: chapter notes, formula cheatsheets, MCQ worksheets, previous year papers and mock test keys.';
require_once __DIR__ . '/includes/header.php';
?>

<main>

<section class="page-hero">
  <div class="hero-orbs" aria-hidden="true">
    <div class="hero-orb hero-orb--gold" data-parallax="0.3"></div>
  </div>
  <div class="container">
    <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
      <a href="index.php">Home</a>
      <?= icon('chevron-right', 14) ?>
      <span>Downloads</span>
    </nav>
    <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>Free Resources</span>
    <h1 class="serif">Study material for <em style="color: var(--gold-600); font-style: italic;">every class</em>.</h1>
    <p class="page-hero__lede">
      Chapter notes, formula sheets, MCQ worksheets, previous-year papers and mock-test keys — organised by class and exam. Download free, no signup required.
    </p>
  </div>
</section>

<section>
  <div class="container">
    <div class="resources-grid" data-reveal-stagger>
      <?php foreach ($DOWNLOADS as $d): ?>
      <article class="res-card">
        <span class="res-icon" aria-hidden="true"><?= icon('file', 22) ?></span>
        <span class="res-size"><?= e($d['size']) ?></span>
        <h4><?= e($d['title']) ?></h4>
        <p><?= e($d['desc']) ?></p>
        <ul class="res-items">
          <?php foreach ($d['items'] as $it): ?>
          <li><?= e($it) ?></li>
          <?php endforeach; ?>
        </ul>
        <a href="contact.php?interest=downloads&amp;pack=<?= urlencode($d['title']) ?>" class="text-link"><?= icon('download', 16) ?> Request pack</a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Counselling -->
<section class="courses-section">
  <div class="container">
    <div class="about-grid" style="align-items: center;">
      <div class="reveal">
        <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">02</span><span class="eyebrow-sep">·</span>Need a personalised plan?</span>
        <h2 class="section-title reveal--chars">Not sure where to start?</h2>
        <p class="section-lede">Study material is only useful if it fits your stage. Send us your class and current standing — we'll recommend the right pack and, if you want, a free 30-minute counselling call with Bisala Sir.</p>
        <div style="margin-top:2rem; display:flex; gap:0.75rem; flex-wrap:wrap;">
          <a href="contact.php" class="btn btn-primary">Request counselling <?= icon('arrow-right', 16) ?></a>
          <a href="<?= e(tel_link($CONTACT['phone_tel'])) ?>" class="btn btn-ghost"><?= icon('phone', 16) ?> <?= e($CONTACT['phone_display']) ?></a>
        </div>
      </div>
      <div class="founder-visual" data-initials="PDF" aria-hidden="true" style="min-height: 360px;">
        <span class="badge"><?= icon('download', 14) ?> Free for all aspirants</span>
        <h3 style="color: var(--cream-50);">Built from real NEET batches.</h3>
        <p>Not a generic online bundle. These are the handouts our actual students use, refined over 20 years.</p>
      </div>
    </div>
  </div>
</section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
