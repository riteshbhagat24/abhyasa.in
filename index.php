<?php
$PAGE_TITLE = 'Abhyasa — Best NEET Coaching in Nagpur | Exclusively for NEET';
$PAGE_DESCRIPTION = 'Nagpur\'s dedicated NEET coaching institute. One batch, 35 students, 20+ years of faculty experience. 1,200+ hours of teaching, 40,000+ MCQs, 200+ tests per year.';
$USE_THREE = true;
$BODY_CLASS = 'page-home';
require_once __DIR__ . '/includes/header.php';
?>

<main>

<!-- ===================== HERO ===================== -->
<section class="hero" id="home" aria-label="Hero">
  <div class="container hero-inner">
    <div class="hero-content">
      <span class="hero-eyebrow"><span class="dot" aria-hidden="true"></span>Nagpur's dedicated NEET institute · Est. <?= e((string)$SITE['established']) ?></span>
      <h1 class="display-xl">Where India's future doctors are <em>built</em>, not rushed.</h1>
      <p class="hero-lede">
        Abhyasa is an exclusive institute for the NEET medical entrance exam. One batch. Thirty-five students. Twenty years of faculty experience guiding every mind, one by one — through Class XI, XII and beyond.
      </p>
      <div class="hero-actions">
        <a href="contact.php" class="btn btn-primary btn-lg">
          Book your free 7-day demo <?= icon('arrow-right', 18) ?>
        </a>
        <a href="courses.php" class="btn btn-ghost btn-lg">Explore programs</a>
      </div>
      <div class="hero-meta">
        <span><strong>20+ years</strong> faculty experience</span>
        <span><strong>35 seats</strong> per batch</span>
        <span><strong>Free</strong> 7-day demo classes</span>
      </div>
    </div>

    <aside class="hero-3d-stage" aria-label="Admissions snapshot">
      <div class="hero-3d-canvas"></div>
      <div class="hero-3d-content">
        <h3>Admissions · 2025 &amp; 2026</h3>
        <p class="headline">A seat at Abhyasa is a commitment to <span>becoming a doctor.</span></p>
        <ul>
          <li><?= icon('check', 20) ?>2-Year NEET 2026 — for Class XI students</li>
          <li><?= icon('check', 20) ?>1-Year NEET — for Class XII students</li>
          <li><?= icon('check', 20) ?>Repeaters / Droppers Batch for NEET 2025</li>
          <li><?= icon('check', 20) ?>Simultaneous Board + NEET preparation</li>
        </ul>
      </div>
      <div class="hero-3d-footer">
        <span class="batch-pill">
          <span style="display:inline-block; width:6px; height:6px; background:currentColor; border-radius:50%;"></span>
          Limited to 35 students
        </span>
        <span>Call <?= e($CONTACT['phone_display']) ?></span>
      </div>
    </aside>
  </div>

  <!-- Rotating circular badge -->
  <div class="hero-badge" aria-hidden="true">
    <svg class="hero-badge__svg" viewBox="0 0 100 100">
      <defs>
        <path id="abhyasaBadgePath" d="M50,50 m-38,0 a38,38 0 1,1 76,0 a38,38 0 1,1 -76,0"></path>
      </defs>
      <text font-size="7.4">
        <textPath href="#abhyasaBadgePath">ABHYASA · NEET 2026 · NAGPUR · EXCLUSIVELY FOR NEET · </textPath>
      </text>
      <circle cx="50" cy="50" r="13" fill="#C9A96E"></circle>
      <text x="50" y="53.5" text-anchor="middle" font-size="8" fill="#0B1F3A" font-weight="700" letter-spacing="0.5">LIVE</text>
    </svg>
  </div>

  <!-- Scroll cue -->
  <div class="hero-scroll-cue" aria-hidden="true">
    <span>Scroll</span>
    <svg viewBox="0 0 12 24" width="12" height="24"><path d="M6 2 V 22 M6 22 L 2 18 M6 22 L 10 18" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg>
  </div>
</section>

<!-- ===================== BANNER ===================== -->
<section class="banner-section" aria-label="Admissions banner">
  <div class="container">
    <div class="banner reveal">
      <img src="<?= e($BANNER['image']) ?>" alt="Abhyasa NEET batch" class="banner__img" loading="lazy" />
      <div class="banner__content">
        <span class="banner__pill"><?= e($BANNER['pill']) ?></span>
        <span class="eyebrow eyebrow--light" style="margin-top: 1rem;"><?= e($BANNER['eyebrow']) ?></span>
        <h2><?= e($BANNER['title']) ?></h2>
        <p><?= e($BANNER['subtitle']) ?></p>
        <div class="banner__actions">
          <a href="<?= e($BANNER['cta_href']) ?>" class="btn btn-gold"><?= e($BANNER['cta_text']) ?> <?= icon('arrow-right', 16) ?></a>
          <a href="<?= e(tel_link($CONTACT['phone_tel'])) ?>" class="btn btn-on-dark">
            <?= icon('phone', 16) ?> Call <?= e($CONTACT['phone_display']) ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== MARQUEE ===================== -->
<div class="marquee" aria-hidden="true">
  <div class="marquee__track">
    <span>Exclusively NEET · Only 35 Seats · Board + NEET · 20+ Years of Teaching · 1,200+ Hours per Year · 40,000+ MCQs · 200+ Tests · Bisala Sir Teaches Every Batch</span>
  </div>
</div>

<!-- ===================== STATS (bento) ===================== -->
<section class="stats" aria-label="Key learning metrics">
  <div class="container">
    <div class="bento-stats">
      <?php foreach ($STATS as $i => $s):
        $wide = $i === 0;
        $widthPct = [82, 96, 80, 100][$i] ?? 70;
      ?>
      <div class="stats-item reveal <?= $wide ? 'stats-item--wide' : '' ?>" data-fill>
        <span class="stat-sub"><?= e($s['unit']) ?></span>
        <span class="stat-num tabular"><?= e($s['num']) ?></span>
        <span class="stat-label"><?= e($s['label']) ?></span>
        <span class="stat-sub2"><?= e($s['sub']) ?></span>
        <div class="impact-bar" aria-hidden="true"><span style="--w: <?= (int)$widthPct ?>%"></span></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== ABOUT ===================== -->
<section id="about" aria-labelledby="about-heading">
  <div class="container about-grid">
    <div>
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>About Abhyasa</span>
      <h2 id="about-heading" class="section-title reveal--chars">An institute built for the medical dream — and nothing else.</h2>
      <p class="section-lede">
        NEET-UG is the single gateway to MBBS, BDS, BAMS, BHMS and every graduate medical course in India. Abhyasa exists for this one exam. We don't teach ten competitive exams; we teach one deeply — and the Class XI &amp; XII boards that sit inside it.
      </p>
      <p class="section-lede" style="margin-top: 1rem;">
        Our environment values diversity, individuality, mutual respect and the free exchange of ideas. The result is a classroom where every student is seen, challenged and supported — not lost in a crowd of hundreds.
      </p>
      <div style="margin-top:2rem;">
        <a href="about.php" class="btn btn-ghost">Read the full story <?= icon('arrow-right', 16) ?></a>
      </div>
    </div>

    <div class="about-points" aria-label="What makes Abhyasa different" data-reveal-stagger>
      <?php foreach (array_slice($VALUES, 0, 4) as $v): ?>
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

<!-- ===================== COURSES ===================== -->
<section id="courses" class="courses-section" aria-labelledby="courses-heading">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">02</span><span class="eyebrow-sep">·</span>Programs</span>
      <h2 id="courses-heading" class="section-title reveal--chars">Three paths. One destination: NEET.</h2>
      <p class="section-lede">Choose the program that matches where you are in your preparation. Every path includes classroom teaching, printed material, 200+ tests, doubt-clearing and personal mentoring.</p>
    </div>

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
        <a href="courses.php#<?= e($c['id']) ?>" class="btn <?= $c['featured'] ? 'btn-gold' : 'btn-ghost' ?>">
          Read more <?= icon('arrow-right', 16) ?>
        </a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== FOUNDER ===================== -->
<section class="founder-section" aria-labelledby="founder-heading">
  <div class="container founder-layout">
    <div class="about-image-stack">
      <img src="<?= e($ABOUT_IMAGES['primary']) ?>" alt="Bisala Sir — Founder, Abhyasa" loading="lazy" />
    </div>

    <div class="founder-content">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">03</span><span class="eyebrow-sep">·</span>Meet the founder</span>
      <h3 id="founder-heading" class="section-title" style="margin-top:0.75rem;">&ldquo;Every student gets personal attention. That's not a slogan. That's the whole point.&rdquo;</h3>
      <?php foreach ($FOUNDER['bio'] as $p): ?>
        <p><?= $p ?></p>
      <?php endforeach; ?>
      <div class="founder-actions">
        <a href="about.php" class="btn btn-primary">Read the full story <?= icon('arrow-right', 16) ?></a>
        <a href="results.php" class="btn btn-ghost">View past results</a>
      </div>
    </div>
  </div>
</section>

<!-- ===================== TESTIMONIALS ===================== -->
<section class="testimonials-section" id="testimonials" aria-labelledby="testimonials-heading">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">04</span><span class="eyebrow-sep">·</span>Student voices</span>
      <h2 id="testimonials-heading" class="section-title reveal--chars">What our students say, in their own words.</h2>
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

<!-- ===================== DOWNLOADS ===================== -->
<section id="downloads-teaser" aria-labelledby="downloads-heading">
  <div class="container">
    <div class="split-header reveal">
      <div>
        <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">05</span><span class="eyebrow-sep">·</span>Free Resources</span>
        <h2 id="downloads-heading" class="section-title reveal--chars">Study material for every class.</h2>
      </div>
      <a href="downloads.php" class="btn btn-ghost">Browse all downloads <?= icon('arrow-right', 16) ?></a>
    </div>

    <div class="resources-grid" data-reveal-stagger>
      <?php foreach ($DOWNLOADS as $d): ?>
      <article class="res-card">
        <span class="res-icon" aria-hidden="true"><?= icon('file', 22) ?></span>
        <span class="res-size"><?= e($d['size']) ?></span>
        <h4><?= e($d['title']) ?></h4>
        <p><?= e($d['desc']) ?></p>
        <a href="downloads.php" class="text-link">Download pack <?= icon('arrow-right', 16) ?></a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== GALLERY ===================== -->
<section class="gallery-teaser" aria-labelledby="gallery-heading">
  <div class="container gallery-inner">
    <div>
      <span class="eyebrow eyebrow--light eyebrow--numbered"><span class="eyebrow-num" style="color: var(--gold-400);">06</span><span class="eyebrow-sep">·</span>Inside Abhyasa</span>
      <h2 id="gallery-heading" class="reveal--chars">Classrooms, labs, workshops — the everyday of a serious batch.</h2>
      <p>From concept lectures and doubt-clearing sessions to mock-test mornings and batch celebrations, here's a glimpse of life inside Abhyasa.</p>
      <div class="gallery-actions">
        <a href="gallery.php" class="btn btn-gold"><?= icon('image', 18) ?> View all photos</a>
        <a href="gallery.php#videos" class="btn btn-on-dark"><?= icon('play', 18) ?> Watch videos</a>
      </div>
    </div>

    <div class="gallery-tiles" aria-hidden="true">
      <?php
      $home_tiles = array_slice($GALLERY, 0, 5);
      foreach ($home_tiles as $g):
      ?>
      <div class="gallery-tile has-image">
        <?php if (!empty($g['src'])): ?>
          <img src="<?= e($g['src']) ?>" alt="" class="gallery-tile-img" loading="lazy" />
        <?php endif; ?>
        <span class="label"><?= e($g['label']) ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================== BLOG ===================== -->
<section class="blog" id="blog" aria-labelledby="blog-heading">
  <div class="container">
    <div class="split-header reveal">
      <div>
        <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">07</span><span class="eyebrow-sep">·</span>From the blog</span>
        <h2 id="blog-heading" class="section-title reveal--chars">Advice from 20+ years in the NEET trenches.</h2>
      </div>
      <a href="blog.php" class="btn btn-ghost">All posts <?= icon('arrow-right', 16) ?></a>
    </div>

    <div class="blog-grid" data-reveal-stagger>
      <?php foreach (array_slice($BLOG_POSTS, 0, 4) as $post): ?>
      <article class="blog-card">
        <?php if (!empty($post['image'])): ?>
        <div class="blog-card__image">
          <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy" />
        </div>
        <?php endif; ?>
        <span class="blog-date">
          <?= e($post['date_display']) ?> <span class="chip"><?= e($post['category']) ?></span>
        </span>
        <h4><?= e($post['title']) ?></h4>
        <p><?= e($post['excerpt']) ?></p>
        <a href="blog-post.php?slug=<?= e($post['slug']) ?>" class="blog-read">Read post <?= icon('arrow-right', 16) ?></a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
