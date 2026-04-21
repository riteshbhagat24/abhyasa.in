<?php
$PAGE_TITLE = 'About Abhyasa — Nagpur\'s Dedicated NEET Institute';
$PAGE_DESCRIPTION = 'Abhyasa is an institute built for the medical dream — and nothing else. Meet Bisala Sir, our one-batch-only philosophy, and 20+ years of NEET teaching experience.';
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
      <span>About</span>
    </nav>
    <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>Our story</span>
    <h1 class="serif">An institute built for the medical dream — and <em style="color: var(--gold-600); font-style: italic;">nothing else</em>.</h1>
    <p class="page-hero__lede">
      We're not a coaching chain. We're not a mass-market cramming class. We are one classroom, one batch, one exam — and twenty years of experience invested in making every student feel that way.
    </p>
    <div class="page-hero__actions">
      <a href="contact.php" class="btn btn-primary">Book a free demo <?= icon('arrow-right', 18) ?></a>
      <a href="courses.php" class="btn btn-ghost">See our programs</a>
    </div>
  </div>
</section>

<!-- Founder full spread -->
<section class="founder-section" aria-labelledby="founder-heading">
  <div class="container founder-layout">
    <div class="about-image-stack">
      <img src="<?= e($ABOUT_IMAGES['primary']) ?>" alt="<?= e($FOUNDER['name']) ?> — Founder, Abhyasa" loading="lazy" />
    </div>

    <div class="founder-content reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">02</span><span class="eyebrow-sep">·</span>Meet the founder</span>
      <h3 id="founder-heading" class="section-title" style="margin-top:0.75rem;">&ldquo;A student preparing for NEET doesn't need a bigger class. They need a better one.&rdquo;</h3>
      <?php foreach ($FOUNDER['bio'] as $p): ?>
        <p><?= $p ?></p>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- All value points -->
<section class="courses-section" aria-labelledby="values-heading">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">03</span><span class="eyebrow-sep">·</span>What makes us different</span>
      <h2 id="values-heading" class="section-title reveal--chars">Six principles. No shortcuts.</h2>
      <p class="section-lede">The coaching industry is built on scale. We've built Abhyasa on the opposite — depth. Here's what that looks like in practice.</p>
    </div>

    <div class="about-points" style="margin-top:3rem; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));" data-reveal-stagger>
      <?php foreach ($VALUES as $v): ?>
      <div class="point">
        <span class="point-icon" aria-hidden="true"><?= icon($v['icon'], 22) ?></span>
        <div>
          <h4><?= e($v['title']) ?></h4>
          <p><?= e($v['text']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Mission statement -->
<section class="stats" aria-labelledby="mission-heading">
  <div class="container">
    <div style="max-width: 68ch; margin-inline: auto; text-align: center;">
      <span class="eyebrow eyebrow--light eyebrow--numbered" style="justify-content: center;"><span class="eyebrow-num" style="color: var(--gold-400);">04</span><span class="eyebrow-sep">·</span>Our mission</span>
      <h2 id="mission-heading" class="section-title serif italic" style="color: var(--cream-50); margin-top: 1rem; font-size: clamp(2rem, 2.2vw + 1rem, 3.2rem); margin-inline: auto;">
        To build, in every student who walks through our door, the preparation — and the temperament — of someone who will become a doctor.
      </h2>
      <p style="color: rgba(255,255,255,0.7); margin-top: 1.5rem; font-size: 1.05rem;">Because that is what Abhyasa means. <em style="color: var(--gold-400);">Practice. Discipline. Habit.</em></p>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section" aria-labelledby="t-heading">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">05</span><span class="eyebrow-sep">·</span>Student voices</span>
      <h2 id="t-heading" class="section-title reveal--chars">What our students say.</h2>
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
