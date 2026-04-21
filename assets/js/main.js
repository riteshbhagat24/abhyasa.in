/**
 * Abhyasa — main.js
 * Native scroll (no Lenis — native is smoother on modern browsers and avoids
 * the compositor-bypass lag that smooth-scroll libs cause on low-end devices).
 * Handles: mobile drawer, header scroll state, rAF-throttled scroll progress,
 * anchor scrolling with sticky-header offset, contact form POST.
 */
(() => {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ===== Anchor smooth scroll with sticky-header offset =====
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function(e) {
      const id = this.getAttribute('href').slice(1);
      if (!id) return;
      const el = document.getElementById(id);
      if (!el) return;
      e.preventDefault();
      const offset = 80;
      const y = el.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top: y, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    });
  });

  // ===== rAF-throttled scroll handler (header shadow + progress bar) =====
  const header = document.getElementById('site-header');
  const progress = document.querySelector('.scroll-progress span');
  let scrollTicking = false;
  function onScrollFrame() {
    const y = window.scrollY;
    if (header) {
      const scrolled = y > 10;
      if (header.dataset._scrolled !== String(scrolled)) {
        header.classList.toggle('is-scrolled', scrolled);
        header.dataset._scrolled = String(scrolled);
      }
    }
    if (progress) {
      const max = document.documentElement.scrollHeight - window.innerHeight;
      const ratio = max > 0 ? Math.min(1, y / max) : 0;
      progress.style.width = (ratio * 100).toFixed(1) + '%';
    }
    scrollTicking = false;
  }
  function onScroll() {
    if (!scrollTicking) {
      requestAnimationFrame(onScrollFrame);
      scrollTicking = true;
    }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScrollFrame();

  // ===== Mobile drawer =====
  const drawer = document.getElementById('mobile-drawer');
  const toggle = document.querySelector('[data-menu-open]');
  const closeBtns = document.querySelectorAll('[data-menu-close]');
  function setDrawer(open) {
    if (!drawer) return;
    drawer.setAttribute('aria-hidden', String(!open));
    if (toggle) toggle.setAttribute('aria-expanded', String(open));
    document.body.style.overflow = open ? 'hidden' : '';
  }
  if (toggle) toggle.addEventListener('click', () => setDrawer(true));
  closeBtns.forEach(b => b.addEventListener('click', () => setDrawer(false)));
  if (drawer) {
    drawer.addEventListener('click', (e) => { if (e.target === drawer) setDrawer(false); });
    drawer.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setDrawer(false)));
  }
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer && drawer.getAttribute('aria-hidden') === 'false') setDrawer(false);
  });

  // ===== Contact form handler =====
  document.querySelectorAll('form[data-contact-form]').forEach(form => {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const status = form.querySelector('[data-form-status]');
      const btn = form.querySelector('button[type="submit"]');
      const data = Object.fromEntries(new FormData(form).entries());

      if (!data.name || !data.phone) {
        status.className = 'form-status error';
        status.textContent = 'Please fill in your name and phone number.';
        return;
      }
      if (!/^[0-9+\-\s()]{8,18}$/.test(data.phone)) {
        status.className = 'form-status error';
        status.textContent = 'Please enter a valid phone number.';
        return;
      }

      btn.disabled = true;
      btn.style.opacity = '0.7';
      status.className = 'form-status';
      status.style.color = 'var(--text-muted)';
      status.textContent = 'Sending…';

      try {
        const res = await fetch('api/contact.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data),
        });
        const payload = await res.json().catch(() => ({}));
        if (res.ok && payload.ok) {
          status.className = 'form-status success';
          status.textContent = '✓ ' + (payload.message || 'Thank you! Bisala Sir will call you within one working day.');
          form.reset();
        } else {
          throw new Error(payload.error || 'Submission failed.');
        }
      } catch (err) {
        status.className = 'form-status error';
        status.textContent = '⚠ ' + err.message + ' You can also call us directly at +91 80879 00022.';
      } finally {
        btn.disabled = false;
        btn.style.opacity = '1';
      }
    });
  });

  // ===== 3D tilt on cards (rAF-throttled, pointer-only) =====
  if (!prefersReducedMotion && window.matchMedia('(hover: hover)').matches) {
    document.querySelectorAll('[data-tilt]').forEach(card => {
      const max = 6;
      let rafId = 0;
      let pendingX = 0, pendingY = 0;
      function apply() {
        card.style.transform = `perspective(1200px) rotateX(${pendingY.toFixed(2)}deg) rotateY(${pendingX.toFixed(2)}deg)`;
        rafId = 0;
      }
      card.addEventListener('pointermove', (e) => {
        const r = card.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width - 0.5;
        const y = (e.clientY - r.top) / r.height - 0.5;
        pendingX = x * max;
        pendingY = -y * max;
        if (!rafId) rafId = requestAnimationFrame(apply);
      });
      card.addEventListener('pointerleave', () => { card.style.transform = ''; });
    });
  }
})();
