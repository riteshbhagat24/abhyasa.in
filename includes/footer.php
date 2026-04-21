<?php /** footer.php — site-wide footer + global JS */ ?>

<!-- Global CTA (repeatable) -->
<?php if (!($HIDE_FOOTER_CTA ?? false)): ?>
<section class="cta-band section-fade-in" aria-labelledby="cta-heading">
  <div class="container cta-band__inner">
    <div>
      <span class="eyebrow eyebrow--dark">Ready when you are</span>
      <h2 id="cta-heading" class="cta-band__title">Serious about NEET?<br/>Come sit in a class.</h2>
      <p class="cta-band__text">Seven days of real teaching — no commitment, no fee, no pressure. If we're right for you, we'll know together.</p>
    </div>
    <div class="cta-band__actions">
      <a href="contact.php" class="btn btn-primary btn-lg">Book free demo <?= icon('arrow-right', 18) ?></a>
      <a href="<?= e(tel_link($CONTACT['phone_tel'])) ?>" class="btn btn-dark-ghost btn-lg">
        <?= icon('phone', 18) ?> <?= e($CONTACT['phone_display']) ?>
      </a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Footer -->
<footer class="site-footer" aria-labelledby="footer-heading">
  <h2 id="footer-heading" class="sr-only">Footer</h2>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-col footer-brand">
        <span class="brand">
          <span class="brand-mark" aria-hidden="true">अ</span>
          <span class="brand-text">
            <span class="brand-name"><?= e($SITE['name']) ?></span>
            <span class="brand-tagline"><?= e($SITE['tagline']) ?></span>
          </span>
        </span>
        <p class="footer-about">Nagpur's dedicated NEET coaching institute. One batch, thirty-five students, twenty years of teaching experience — built for the medical dream.</p>
        <div class="footer-social" aria-label="Social links">
          <?php foreach ($SOCIAL as $s): ?>
            <a href="<?= e($s['url']) ?>" aria-label="<?= e($s['label']) ?>" target="_blank" rel="noopener noreferrer"><?= social_icon($s['id']) ?></a>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="footer-col">
        <h5>Institute</h5>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="results.php">Results</a></li>
          <li><a href="gallery.php">Gallery</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h5>Resources</h5>
        <ul>
          <li><a href="downloads.php">Downloads</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="contact.php">Book a Demo</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="privacy-policy.php">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h5>Reach us</h5>
        <ul class="footer-contact">
          <li><a href="<?= e(tel_link($CONTACT['phone_tel'])) ?>"><?= icon('phone', 16) ?> <?= e($CONTACT['phone_display']) ?></a></li>
          <li><a href="mailto:<?= e($CONTACT['email']) ?>"><?= icon('mail', 16) ?> <?= e($CONTACT['email']) ?></a></li>
          <li class="footer-addr"><?= icon('map-pin', 16) ?>
            <span>
              <?php foreach ($CONTACT['address_lines'] as $l): ?>
                <?= e($l) ?><br/>
              <?php endforeach; ?>
            </span>
          </li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <span>© <?= e((string)$SITE['copyright_year']) ?> <?= e($SITE['name']) ?>. All rights reserved.</span>
      <span><a href="privacy-policy.php">Privacy Policy</a></span>
    </div>
  </div>
</footer>

<!-- Floating WhatsApp -->
<a href="https://wa.me/<?= e($CONTACT['whatsapp']) ?>" class="floating-call" aria-label="WhatsApp <?= e($SITE['name']) ?>" target="_blank" rel="noopener">
  <?= social_icon('whatsapp', 26) ?>
</a>

<!-- GSAP + ScrollTrigger (needed only for parallax + counters) + Three.js (home only) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>
<?php if (($USE_THREE ?? false)): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r158/three.min.js" defer></script>
<?php endif; ?>

<!-- App JS -->
<script src="<?= e(asset('js/main.js')) ?>?v=2" defer></script>
<script src="<?= e(asset('js/animations.js')) ?>?v=2" defer></script>
<script src="<?= e(asset('js/carousel.js')) ?>?v=1" defer></script>
<?php if (($USE_THREE ?? false)): ?>
<script src="<?= e(asset('js/hero-3d.js')) ?>?v=2" defer></script>
<?php endif; ?>

</body>
</html>
