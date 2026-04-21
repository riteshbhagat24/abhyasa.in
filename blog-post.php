<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/helpers.php';

$slug = $_GET['slug'] ?? '';
$post = find_post($BLOG_POSTS, $slug);

if (!$post) {
    http_response_code(404);
    header('Location: 404.php');
    exit;
}

$PAGE_TITLE = $post['title'] . ' — Abhyasa Blog';
$PAGE_DESCRIPTION = $post['excerpt'];
require_once __DIR__ . '/includes/header.php';

// Related posts
$related = array_values(array_filter($BLOG_POSTS, fn($p) => $p['slug'] !== $post['slug']));
$related = array_slice($related, 0, 3);
?>

<main>

<section class="post-hero">
  <div class="container">
    <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
      <a href="index.php">Home</a>
      <?= icon('chevron-right', 14) ?>
      <a href="blog.php">Blog</a>
      <?= icon('chevron-right', 14) ?>
      <span><?= e($post['category']) ?></span>
    </nav>

    <div class="post-meta">
      <span class="chip"><?= e($post['category']) ?></span>
      <span><?= icon('calendar', 14) ?> <?= e($post['date_display']) ?></span>
      <span><?= icon('clock', 14) ?> <?= e($post['read_time']) ?></span>
    </div>

    <h1 class="serif"><?= e($post['title']) ?></h1>
    <p class="page-hero__lede"><?= e($post['excerpt']) ?></p>
  </div>
</section>

<?php if (!empty($post['image'])): ?>
<section style="padding: 0 0 2rem 0;">
  <div class="container">
    <div style="max-width: 900px; margin-inline: auto; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-lg); aspect-ratio: 16/9; background: var(--cream-100);">
      <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy" style="width:100%; height:100%; object-fit:cover;" />
    </div>
  </div>
</section>
<?php endif; ?>

<article class="post-body">
  <div class="container">
    <?php foreach ($post['body'] as $para): ?>
      <p><?= e($para) ?></p>
    <?php endforeach; ?>

    <hr class="divider" />

    <div style="display:flex; gap:1rem; flex-wrap:wrap; align-items:center; justify-content: space-between;">
      <div>
        <small style="color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600; font-size: 0.75rem;">Written by</small>
        <div style="display:flex; gap:0.75rem; align-items:center; margin-top: 0.5rem;">
          <span class="t-avatar" style="width:48px; height:48px;"><?= e($FOUNDER['initials']) ?></span>
          <div>
            <div style="font-weight: 600; font-family: 'Fraunces', serif; font-size: 1.05rem;"><?= e($FOUNDER['name']) ?></div>
            <div style="font-size: 0.85rem; color: var(--text-muted);"><?= e($FOUNDER['role']) ?></div>
          </div>
        </div>
      </div>
      <a href="contact.php" class="btn btn-primary">Book a free demo <?= icon('arrow-right', 16) ?></a>
    </div>
  </div>
</article>

<!-- Related -->
<section class="courses-section">
  <div class="container">
    <div class="reveal">
      <span class="eyebrow">Keep reading</span>
      <h2 class="section-title">More from the blog.</h2>
    </div>
    <div class="blog-grid" data-reveal-stagger>
      <?php foreach ($related as $rp): ?>
      <article class="blog-card">
        <?php if (!empty($rp['image'])): ?>
        <div class="blog-card__image">
          <img src="<?= e($rp['image']) ?>" alt="<?= e($rp['title']) ?>" loading="lazy" />
        </div>
        <?php endif; ?>
        <span class="blog-date">
          <?= e($rp['date_display']) ?> <span class="chip"><?= e($rp['category']) ?></span>
        </span>
        <h4><?= e($rp['title']) ?></h4>
        <p><?= e($rp['excerpt']) ?></p>
        <a href="blog-post.php?slug=<?= e($rp['slug']) ?>" class="blog-read">Read post <?= icon('arrow-right', 16) ?></a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
