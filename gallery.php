<?php
$PAGE_TITLE = 'Gallery — Inside Abhyasa\'s NEET Classrooms';
$PAGE_DESCRIPTION = 'Photos and videos from Abhyasa — classrooms, doubt-clearing sessions, mock tests, batch celebrations and alumni stories.';
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
      <span>Gallery</span>
    </nav>
    <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>Inside Abhyasa</span>
    <h1 class="serif">The <em style="color: var(--gold-600); font-style: italic;">everyday</em> of a serious batch.</h1>
    <p class="page-hero__lede">
      Lecture halls, one-on-one sessions, Sunday mocks, alumni meetups, results day. Here's what the Abhyasa classroom looks like from the inside.
    </p>
    <div class="page-hero__actions">
      <a href="#photos" class="btn btn-primary"><?= icon('image', 18) ?> Photos</a>
      <a href="#videos" class="btn btn-ghost"><?= icon('play', 18) ?> Videos</a>
    </div>
  </div>
</section>

<!-- Photos -->
<section id="photos">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">02</span><span class="eyebrow-sep">·</span>Photos</span>
      <h2 class="section-title reveal--chars">Life inside Abhyasa.</h2>
    </div>

    <div class="gallery-masonry" role="list" aria-label="Gallery">
      <?php
      $photos = array_filter($GALLERY, fn($g) => $g['type'] === 'photo');
      foreach ($photos as $g):
      ?>
      <div class="mi ar-<?= e($g['aspect']) ?>" role="listitem" tabindex="0">
        <?php if (!empty($g['src'])): ?>
          <img src="<?= e($g['src']) ?>" alt="<?= e($g['caption']) ?>" loading="lazy" />
        <?php else: ?>
          <span class="mi-label" aria-hidden="true"><?= e($g['label']) ?></span>
        <?php endif; ?>
        <span class="mi-type" aria-hidden="true"><?= icon('image', 16) ?></span>
        <div class="mi-caption"><?= e($g['caption']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Videos -->
<section id="videos" class="courses-section">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">03</span><span class="eyebrow-sep">·</span>Videos</span>
      <h2 class="section-title reveal--chars">Walkthroughs, alumni stories &amp; classroom clips.</h2>
    </div>

    <div class="resources-grid" data-reveal-stagger>
      <?php
      $videos = array_filter($GALLERY, fn($g) => $g['type'] === 'video');
      foreach ($videos as $v):
      ?>
      <article class="res-card" style="min-height: 280px; padding: 0; overflow: hidden; background: var(--navy-900); border-color: var(--navy-700); color: var(--cream-50);">
        <?php if (!empty($v['src'])): ?>
          <div style="position: relative; aspect-ratio: 16/10; overflow: hidden;">
            <img src="<?= e($v['src']) ?>" alt="<?= e($v['caption']) ?>" loading="lazy" style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover;" />
            <div style="position:absolute; inset:0; background: linear-gradient(180deg, transparent 40%, rgba(7,15,31,0.75)); display:grid; place-items:center;">
              <span style="width:56px; height:56px; display:grid; place-items:center; border-radius:50%; background:rgba(201,169,110,0.92); color:var(--navy-950);"><?= icon('play', 24) ?></span>
            </div>
          </div>
        <?php endif; ?>
        <div style="padding: 1.2rem 1.4rem 1.4rem;">
          <h4 style="color: var(--cream-50); font-family: Fraunces, serif; font-size: 1.1rem; margin: 0;"><?= e($v['label']) ?></h4>
          <p style="color: rgba(255,255,255,0.65); font-size: 0.88rem; margin-top: 0.3rem;"><?= e($v['caption']) ?></p>
          <a href="#" class="text-link" style="color: var(--gold-400); margin-top: 0.5rem;">Watch <?= icon('arrow-right', 16) ?></a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
