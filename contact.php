<?php
$PAGE_TITLE = 'Contact Abhyasa — Book Your Free NEET Demo';
$PAGE_DESCRIPTION = 'Call, WhatsApp, email or visit Abhyasa in Nagpur. Book a free 7-day demo of our NEET coaching classes — no commitment, no fee.';
$HIDE_FOOTER_CTA = true; // contact page already has the form
require_once __DIR__ . '/includes/header.php';

$preselected_program = $_GET['program'] ?? '';
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
      <span>Contact</span>
    </nav>
    <span class="eyebrow eyebrow--numbered"><span class="eyebrow-num">01</span><span class="eyebrow-sep">·</span>Get in touch</span>
    <h1 class="serif">Questions? <em style="color: var(--gold-600); font-style: italic;">Visit us.</em> <em style="color: var(--gold-600); font-style: italic;">Call us.</em> Or book your free demo.</h1>
    <p class="page-hero__lede">
      We read every message and reply within one working day. For anything urgent, please call directly — the phone is answered by the institute, not an answering service.
    </p>
  </div>
</section>

<section>
  <div class="container">
    <div class="contact-grid">
      <!-- Left: contact info -->
      <div class="contact-list reveal">
        <a class="contact-item" href="<?= e(tel_link($CONTACT['phone_tel'])) ?>" aria-label="Call Abhyasa">
          <span class="ci-icon" aria-hidden="true"><?= icon('phone', 18) ?></span>
          <div>
            <div class="ci-label">Phone / WhatsApp</div>
            <div class="ci-val"><?= e($CONTACT['phone_display']) ?></div>
          </div>
        </a>

        <a class="contact-item" href="mailto:<?= e($CONTACT['email']) ?>" aria-label="Email Abhyasa">
          <span class="ci-icon" aria-hidden="true"><?= icon('mail', 18) ?></span>
          <div>
            <div class="ci-label">Email</div>
            <div class="ci-val"><?= e($CONTACT['email']) ?></div>
          </div>
        </a>

        <div class="contact-item">
          <span class="ci-icon" aria-hidden="true"><?= icon('map-pin', 18) ?></span>
          <div>
            <div class="ci-label">Visit the institute</div>
            <div class="ci-val">
              <?php foreach ($CONTACT['address_lines'] as $line): ?>
                <?= e($line) ?><br/>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <div class="contact-item">
          <span class="ci-icon" aria-hidden="true"><?= icon('clock', 18) ?></span>
          <div>
            <div class="ci-label">Office hours</div>
            <div class="ci-val"><?= e($CONTACT['hours']) ?></div>
          </div>
        </div>

        <div class="map-frame" aria-label="Map of Abhyasa location">
          <iframe
            src="<?= e($CONTACT['map_embed']) ?>"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Location map"></iframe>
        </div>
      </div>

      <!-- Right: form -->
      <form class="form-card reveal" data-contact-form aria-labelledby="form-heading" novalidate>
        <h3 id="form-heading">Book an appointment</h3>
        <p class="note">We'll call within one working day to confirm your free 7-day demo slot.</p>

        <div class="form-row two">
          <div class="form-field">
            <label for="f-name">Student name <span class="req" aria-hidden="true">*</span></label>
            <input id="f-name" name="name" type="text" autocomplete="name" required />
          </div>
          <div class="form-field">
            <label for="f-phone">Phone number <span class="req" aria-hidden="true">*</span></label>
            <input id="f-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" required placeholder="+91 ..." />
          </div>
        </div>

        <div class="form-row two" style="margin-top:1.1rem;">
          <div class="form-field">
            <label for="f-email">Email</label>
            <input id="f-email" name="email" type="email" autocomplete="email" />
          </div>
          <div class="form-field">
            <label for="f-course">Program of interest</label>
            <select id="f-course" name="course">
              <option value="2-year-neet" <?= $preselected_program === '2-year-neet' ? 'selected' : '' ?>>2-Year NEET (with XI &amp; XII)</option>
              <option value="1-year-neet" <?= $preselected_program === '1-year-neet' ? 'selected' : '' ?>>1-Year NEET (with XII)</option>
              <option value="repeaters" <?= $preselected_program === 'repeaters' ? 'selected' : '' ?>>Repeaters / Droppers Batch</option>
              <option value="unsure">Not sure yet — want to talk</option>
            </select>
          </div>
        </div>

        <div class="form-field" style="margin-top:1.1rem;">
          <label for="f-class">Current class</label>
          <select id="f-class" name="class">
            <option value="">Select your current class</option>
            <option value="class-10">Class 10</option>
            <option value="class-11">Class 11</option>
            <option value="class-12">Class 12</option>
            <option value="dropper">Dropper / Repeater</option>
            <option value="foundation">Class 8–9 (foundation)</option>
          </select>
        </div>

        <div class="form-field" style="margin-top:1.1rem;">
          <label for="f-msg">Message <span class="help">(optional)</span></label>
          <textarea id="f-msg" name="message" placeholder="Anything specific you'd like to ask about…"></textarea>
        </div>

        <input type="hidden" name="_token" value="<?= e(bin2hex(random_bytes(16))) ?>" />
        <input type="text" name="_honey" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;width:1px;height:1px;opacity:0;" aria-hidden="true" />

        <div class="form-submit">
          <button type="submit" class="btn btn-primary btn-lg">
            Book free demo <?= icon('arrow-right', 18) ?>
          </button>
          <span class="note-sm">By submitting, you agree to be contacted by <?= e($SITE['name']) ?>.</span>
        </div>

        <div data-form-status class="form-status" role="status" aria-live="polite"></div>
      </form>
    </div>
  </div>
</section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
