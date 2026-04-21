<?php
$PAGE_TITLE = 'NEET Results — Abhyasa Past Batches';
$PAGE_DESCRIPTION = 'Year-on-year NEET results from Abhyasa students. Selections to GMC Nagpur, AIIMS, AFMC and other top medical colleges.';
require_once __DIR__ . '/includes/header.php';
?>

<main>

<section class="page-hero">
  <div class="hero-orbs" aria-hidden="true">
    <div class="hero-orb hero-orb--gold" data-parallax="0.3"></div>
    <div class="hero-orb hero-orb--navy" data-parallax="0.2"></div>
  </div>
  <div class="container">
    <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
      <a href="index.php">Home</a>
      <?= icon('chevron-right', 14) ?>
      <span>Results</span>
    </nav>
    <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>Past batches</span>
    <h1 class="serif">Year after year, the <em style="color: var(--gold-600); font-style: italic;">same answer</em>: personal attention works.</h1>
    <p class="page-hero__lede">
      These are the numbers behind the single-batch philosophy. Four consecutive years of selections to top medical colleges across India — from a batch size that never exceeds 35.
    </p>
  </div>
</section>

<!-- Year results -->
<section>
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">02</span><span class="eyebrow-sep">·</span>By the numbers</span>
      <h2 class="section-title reveal--chars">Selections, year by year.</h2>
    </div>
    <div class="results-grid" data-reveal-stagger>
      <?php foreach ($RESULTS as $r): ?>
      <article class="result-card">
        <div class="year"><?= e($r['year']) ?></div>
        <div class="sel"><?= e((string)$r['selected']) ?><small>/ 35 selected</small></div>
        <div class="top">Top scorer: <strong><?= e($r['top_scorer']) ?></strong></div>
        <div class="adm"><?= icon('award', 14) ?> <?= e($r['admissions']) ?></div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Successful students showcase -->
<section class="courses-section" id="alumni" aria-labelledby="alumni-heading">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">03</span><span class="eyebrow-sep">·</span>Our alumni</span>
      <h2 id="alumni-heading" class="section-title reveal--chars">The students behind the results.</h2>
      <p class="section-lede">Faces from past Abhyasa batches — now at medical colleges across India and beyond. Every one of them went through the same 35-seat classroom, the same daily routine, the same Bisala Sir.</p>
    </div>

    <div class="students-grid" data-reveal-stagger>
      <?php foreach ($SUCCESSFUL_STUDENTS as $s): ?>
      <article class="student-card">
        <div class="student-card__img">
          <span class="student-card__badge"><?= icon('award', 12) ?> Selected</span>
          <img src="<?= e($s['photo']) ?>" alt="<?= e($s['name']) ?> — <?= e($s['college']) ?>" loading="lazy" />
        </div>
        <div class="student-card__body">
          <div class="student-card__name"><?= e($s['name']) ?></div>
          <div class="student-card__college"><?= e($s['college']) ?></div>
          <?php if (!empty($s['note'])): ?>
            <div class="student-card__note"><?= icon('sparkles', 12) ?> <?= e($s['note']) ?></div>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Big quote -->
<section class="stats">
  <div class="container" style="text-align:center; max-width: 70ch; margin-inline:auto;">
    <?= icon('quote', 40) ?>
    <h2 class="serif italic" style="color: var(--cream-50); font-size: clamp(1.8rem, 2vw + 1rem, 2.8rem); margin-top: 1.5rem; line-height: 1.25; font-variation-settings: 'opsz' 120;">
      &ldquo;The result is a classroom where every student is seen, challenged and supported — not lost in a crowd of hundreds.&rdquo;
    </h2>
    <p style="margin-top:1.5rem; color: rgba(255,255,255,0.65); font-size: 0.95rem;">— <?= e($FOUNDER['name']) ?>, Founder</p>
  </div>
</section>

<!-- Results testimonials -->
<section class="testimonials-section">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">04</span><span class="eyebrow-sep">·</span>Voices from the results</span>
      <h2 class="section-title reveal--chars">In their words.</h2>
    </div>
    <div class="testimonial-grid" data-reveal-stagger>
      <?php foreach ($TESTIMONIALS as $t): ?>
      <figure class="t-card" data-tilt>
        <span class="quote-mark" aria-hidden="true">&ldquo;</span>
        <blockquote><?= e($t['quote']) ?></blockquote>
        <figcaption class="t-author">
          <?php if (!empty($t['photo'])): ?>
            <img class="t-avatar-img" src="<?= e($t['photo']) ?>" alt="<?= e($t['name']) ?>" loading="lazy" />
          <?php else: ?>
            <span class="t-avatar" aria-hidden="true"><?= e($t['initial']) ?></span>
          <?php endif; ?>
          <div>
            <div class="name"><?= e($t['name']) ?></div>
            <div class="role"><?= e($t['role']) ?></div>
          </div>
        </figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
