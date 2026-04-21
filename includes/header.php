<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/helpers.php';

// Page-level metadata (set by each page before including this file)
$PAGE_TITLE       = $PAGE_TITLE       ?? $SITE['full_name'];
$PAGE_DESCRIPTION = $PAGE_DESCRIPTION ?? $SITE['description'];
$PAGE_HERO_CLASS  = $PAGE_HERO_CLASS  ?? '';
$BODY_CLASS       = $BODY_CLASS       ?? '';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="<?= e($SITE['theme_color']) ?>" />
<title><?= e($PAGE_TITLE) ?></title>
<meta name="description" content="<?= e($PAGE_DESCRIPTION) ?>" />

<!-- Open Graph -->
<meta property="og:title" content="<?= e($PAGE_TITLE) ?>" />
<meta property="og:description" content="<?= e($PAGE_DESCRIPTION) ?>" />
<meta property="og:type" content="website" />
<meta property="og:locale" content="en_IN" />

<!-- Preload fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700;9..144,800;9..144,900&family=Inter:wght@400;500;600;700&display=swap" />

<!-- Styles -->
<link rel="stylesheet" href="<?= e(asset('css/main.css')) ?>?v=2" />

<!-- Favicon (inline SVG) -->
<link rel="icon" type="image/svg+xml" href='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><rect width="64" height="64" rx="14" fill="%230B1F3A"/><text x="50%" y="54%" dominant-baseline="middle" text-anchor="middle" font-family="Fraunces,Georgia,serif" font-weight="700" font-size="36" fill="%23D9BC85">&#2309;</text></svg>' />
</head>
<body class="<?= attr($BODY_CLASS) ?>" data-page="<?= attr(current_page_slug()) ?>">

<!-- Ambient background layer -->
<div class="ambient" aria-hidden="true">
  <div class="ambient__grid"></div>
  <div class="ambient__glow ambient__glow--a"></div>
  <div class="ambient__glow ambient__glow--b"></div>
  <div class="ambient__grain"></div>
</div>

<!-- Scroll progress bar -->
<div class="scroll-progress" aria-hidden="true"><span></span></div>

<!-- Announcement bar -->
<div class="announcement" role="region" aria-label="Admissions announcement">
  <div class="container announcement-inner">
    <span class="pulse" aria-hidden="true"></span>
    <span><strong>Admissions Open:</strong> 2-Year NEET 2026 &amp; Repeaters 2025 · Only <strong>35 seats</strong></span>
    <a href="contact.php" class="announcement-cta">Book Free Demo <?= icon('arrow-right', 14) ?></a>
  </div>
</div>

<!-- Sticky header -->
<header class="site-header" id="site-header">
  <div class="container nav">
    <a href="index.php" class="brand" aria-label="Abhyasa — Home">
      <?php if (!empty($BRAND_LOGO) && is_file(__DIR__ . '/../' . $BRAND_LOGO)): ?>
        <img src="<?= e($BRAND_LOGO) ?>" alt="Abhyasa" class="brand-logo" width="44" height="44" />
      <?php else: ?>
        <span class="brand-mark" aria-hidden="true">अ</span>
      <?php endif; ?>
      <span class="brand-text">
        <span class="brand-name"><?= e($SITE['name']) ?></span>
        <span class="brand-tagline"><?= e($SITE['tagline']) ?></span>
      </span>
    </a>

    <nav class="nav-links" aria-label="Primary navigation">
      <?php foreach ($NAV as $item): if ($item['slug'] === 'contact') continue; ?>
        <a href="<?= e($item['href']) ?>"<?= is_current($item['slug']) ? ' class="active" aria-current="page"' : '' ?>><?= e($item['label']) ?></a>
      <?php endforeach; ?>
    </nav>

    <div class="nav-cta">
      <a href="<?= e(tel_link($CONTACT['phone_tel'])) ?>" class="btn-icon btn-icon--call" aria-label="Call <?= e($SITE['name']) ?>">
        <?= icon('phone', 18) ?>
      </a>
      <a href="contact.php" class="btn btn-primary nav-demo-cta">Book Free Demo</a>
      <button class="menu-toggle" aria-label="Open menu" aria-controls="mobile-drawer" aria-expanded="false" data-menu-open>
        <?= icon('menu', 20) ?>
      </button>
    </div>
  </div>
</header>

<!-- Mobile drawer -->
<div class="mobile-drawer" id="mobile-drawer" aria-hidden="true">
  <div class="mobile-drawer__panel" role="dialog" aria-label="Mobile menu">
    <div class="mobile-drawer__head">
      <span class="brand"><span class="brand-mark" aria-hidden="true">अ</span><span class="brand-text"><span class="brand-name"><?= e($SITE['name']) ?></span></span></span>
      <button class="btn-icon" aria-label="Close menu" data-menu-close><?= icon('x', 20) ?></button>
    </div>
    <nav aria-label="Mobile navigation" class="mobile-drawer__nav">
      <?php foreach ($NAV as $item): ?>
        <a href="<?= e($item['href']) ?>"<?= is_current($item['slug']) ? ' class="active" aria-current="page"' : '' ?>>
          <span><?= e($item['label']) ?></span>
          <?= icon('arrow-right', 16) ?>
        </a>
      <?php endforeach; ?>
    </nav>
    <div class="mobile-drawer__actions">
      <a href="contact.php" class="btn btn-primary">Book Free Demo</a>
      <a href="<?= e(tel_link($CONTACT['phone_tel'])) ?>" class="btn btn-gold">
        <?= icon('phone', 18) ?> Call <?= e($CONTACT['phone_display']) ?>
      </a>
    </div>
  </div>
</div>
