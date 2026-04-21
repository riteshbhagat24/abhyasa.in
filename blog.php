<?php
$PAGE_TITLE = 'Blog — NEET Preparation Insights from Abhyasa';
$PAGE_DESCRIPTION = 'Articles on NEET preparation, study techniques, subject-wise strategies, and what to look for in a coaching class.';
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
      <span>Blog</span>
    </nav>
    <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>From the blog</span>
    <h1 class="serif">Advice from <em style="color: var(--gold-600); font-style: italic;">twenty years</em> in the NEET trenches.</h1>
    <p class="page-hero__lede">
      Strategy, study techniques, what to look for in a coaching class, subject-wise guidance and hard-won lessons from two decades of teaching medical aspirants.
    </p>
  </div>
</section>

<!-- Featured post (first) -->
<?php $featured = $BLOG_POSTS[0]; $rest = array_slice($BLOG_POSTS, 1); ?>
<section>
  <div class="container">
    <article class="course-card featured blog-card-featured reveal">
      <?php if (!empty($featured['image'])): ?>
      <div class="blog-card-featured__img">
        <img src="<?= e($featured['image']) ?>" alt="<?= e($featured['title']) ?>" loading="lazy" />
      </div>
      <?php endif; ?>
      <div class="blog-card-featured__body">
        <span class="blog-date" style="color: var(--gold-400);">
          <?= e($featured['date_display']) ?>
          <span class="chip" style="background: rgba(201,169,110,0.2); color: var(--gold-300); border-color: rgba(201,169,110,0.3);"><?= e($featured['category']) ?></span>
          · <?= e($featured['read_time']) ?>
        </span>
        <h2 class="section-title" style="color: var(--cream-50); max-width: 24ch; font-size: clamp(1.6rem, 1.8vw + 1rem, 2.4rem); margin-top: 0;"><?= e($featured['title']) ?></h2>
        <p style="color: rgba(255,255,255,0.78); font-size: 1rem; line-height: 1.6;"><?= e($featured['excerpt']) ?></p>
        <a href="blog-post.php?slug=<?= e($featured['slug']) ?>" class="btn btn-gold" style="align-self: flex-start; margin-top: 0.5rem;">Read the full post <?= icon('arrow-right', 16) ?></a>
      </div>
    </article>
  </div>
</section>

<!-- Rest of posts -->
<section class="courses-section">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">02</span><span class="eyebrow-sep">·</span>More posts</span>
      <h2 class="section-title reveal--chars">Latest writing.</h2>
    </div>

    <div class="blog-grid" data-reveal-stagger>
      <?php foreach ($rest as $post): ?>
      <article class="blog-card">
        <?php if (!empty($post['image'])): ?>
        <div class="blog-card__image">
          <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy" />
        </div>
        <?php endif; ?>
        <span class="blog-date">
          <?= e($post['date_display']) ?>
          <span class="chip"><?= e($post['category']) ?></span>
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
