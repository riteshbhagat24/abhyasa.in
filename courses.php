<?php
$PAGE_TITLE = 'NEET Programs at Abhyasa — 2-Year, 1-Year & Repeaters';
$PAGE_DESCRIPTION = 'Three NEET preparation programs: 2-year flagship (XI + XII + NEET), 1-year (XII + NEET), and Repeaters/Droppers. One batch, 35 students, 20+ years of faculty.';
require_once __DIR__ . '/includes/header.php';
?>

<main>

<!-- Page hero -->
<section class="page-hero">
  <div class="hero-orbs" aria-hidden="true">
    <div class="hero-orb hero-orb--gold" data-parallax="0.3"></div>
    <div class="hero-orb hero-orb--navy" data-parallax="0.2"></div>
  </div>
  <div class="container">
    <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
      <a href="index.php">Home</a>
      <?= icon('chevron-right', 14) ?>
      <span>Courses</span>
    </nav>
    <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>Programs</span>
    <h1 class="serif">Three paths. <em style="color: var(--gold-600); font-style: italic;">One destination.</em></h1>
    <p class="page-hero__lede">
      Each program is designed for a specific stage of NEET preparation. All three share the same faculty, the same 35-seat cap, and the same obsessive focus on the medical entrance exam.
    </p>
  </div>
</section>

<!-- Courses summary grid -->
<section class="courses-section" aria-label="Course programs">
  <div class="container">
    <div class="courses-grid">
      <?php foreach ($COURSES as $c): ?>
      <article class="course-card <?= $c['featured'] ? 'featured' : '' ?>">
        <?php if (!empty($c['image'])): ?>
        <div class="course-card__image">
          <img src="<?= e($c['image']) ?>" alt="<?= e($c['title']) ?>" loading="lazy" />
        </div>
        <?php endif; ?>
        <span class="course-num" aria-hidden="true"><?= e($c['number']) ?></span>
        <h3><?= e($c['title']) ?></h3>
        <span class="course-duration"><?= e($c['duration']) ?></span>
        <p class="course-summary"><?= e($c['summary']) ?></p>
        <?= render_features(array_slice($c['features'], 0, 4)) ?>
        <a href="#<?= e($c['id']) ?>" class="btn <?= $c['featured'] ? 'btn-gold' : 'btn-ghost' ?>">Program details <?= icon('arrow-right', 16) ?></a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Detail sections -->
<?php foreach ($COURSES as $idx => $c): ?>
<section id="<?= e($c['id']) ?>" class="<?= $idx % 2 === 0 ? '' : 'courses-section' ?>" aria-labelledby="course-<?= e($c['id']) ?>-heading">
  <div class="container">
    <div class="course-detail">
      <div class="course-detail__body reveal">
        <span class="eyebrow">Program <?= e($c['number']) ?></span>
        <h2 id="course-<?= e($c['id']) ?>-heading" class="section-title"><?= e($c['title']) ?></h2>
        <p class="section-lede" style="margin-top:1rem;"><?= e($c['summary']) ?></p>

        <h3>Who this is for</h3>
        <p><?= e($c['duration']) ?>. Built specifically for students at this stage of the NEET journey — not compressed from a different program, not reused from last year's material.</p>

        <h3>How we approach it</h3>
        <?php foreach ($c['long_desc'] as $p): ?>
          <p><?= e($p) ?></p>
        <?php endforeach; ?>

        <h3>What's included</h3>
        <?= render_features($c['features']) ?>
      </div>

      <aside class="course-detail__aside">
        <h4>Enrol in <?= e($c['title']) ?></h4>
        <p class="price-note">Admissions are open. Limited to 35 students. Free 7-day demo before you commit.</p>

        <a href="contact.php?program=<?= urlencode($c['id']) ?>" class="btn btn-gold" style="width:100%;">Book your demo <?= icon('arrow-right', 16) ?></a>

        <ul>
          <li><?= icon('check', 18) ?>20+ years experienced faculty</li>
          <li><?= icon('check', 18) ?>One batch of 35, hard cap</li>
          <li><?= icon('check', 18) ?>Board + NEET, taught together</li>
          <li><?= icon('check', 18) ?>Printed material, chapter by chapter</li>
          <li><?= icon('check', 18) ?>Weekly tests + mock exams</li>
        </ul>

        <div style="border-top: 1px solid rgba(255,255,255,0.12); padding-top: 1rem; margin-top: 1rem;">
          <a href="<?= e(tel_link($CONTACT['phone_tel'])) ?>" style="color: var(--cream-50); display:inline-flex; gap:0.5rem; align-items:center; font-size: 0.95rem;">
            <?= icon('phone', 16) ?> Call <?= e($CONTACT['phone_display']) ?>
          </a>
        </div>
      </aside>
    </div>
  </div>
</section>
<?php endforeach; ?>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
