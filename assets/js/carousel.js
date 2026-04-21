/**
 * Abhyasa — carousel.js
 * Auto-converts card grids into horizontal scroll-snap carousels on narrow
 * viewports. Pure CSS handles the visual swipe; JS only adds dot indicators
 * and tracks the active slide.
 *
 * Selectors enhanced: .courses-grid, .testimonial-grid, .resources-grid,
 *                     .blog-grid, .students-grid, .results-grid
 *
 * No enhancement on desktop: dot markup is inserted once but .carousel-dots
 * is display:none above the breakpoint, and no scroll listener fires when
 * scrollWidth === clientWidth (grid mode).
 */
(() => {
  const SELECTORS = [
    '.courses-grid',
    '.testimonial-grid',
    '.resources-grid',
    '.blog-grid',
    '.students-grid',
    '.results-grid',
  ];

  const mq = window.matchMedia('(max-width: 768px)');

  function enhance(grid) {
    if (grid.dataset.carousel === 'true') return;
    grid.dataset.carousel = 'true';

    const items = Array.from(grid.children);
    if (items.length < 2) return;

    // Build dot nav
    const dots = document.createElement('div');
    dots.className = 'carousel-dots';
    dots.setAttribute('aria-hidden', 'true');
    items.forEach((_, i) => {
      const d = document.createElement('button');
      d.type = 'button';
      d.className = 'carousel-dot' + (i === 0 ? ' is-active' : '');
      d.setAttribute('aria-label', 'Go to slide ' + (i + 1));
      d.addEventListener('click', () => {
        const target = items[i];
        if (!target) return;
        grid.scrollTo({ left: target.offsetLeft - grid.offsetLeft, behavior: 'smooth' });
      });
      dots.appendChild(d);
    });
    grid.insertAdjacentElement('afterend', dots);

    // Track active dot on scroll (rAF-throttled)
    let rafId = 0;
    const updateActive = () => {
      const centerX = grid.scrollLeft + grid.clientWidth / 2;
      let closestIdx = 0;
      let closestDist = Infinity;
      items.forEach((item, i) => {
        const itemCenter = item.offsetLeft + item.offsetWidth / 2;
        const dist = Math.abs(centerX - itemCenter);
        if (dist < closestDist) { closestDist = dist; closestIdx = i; }
      });
      dots.querySelectorAll('.carousel-dot').forEach((d, i) => {
        d.classList.toggle('is-active', i === closestIdx);
      });
      rafId = 0;
    };

    grid.addEventListener('scroll', () => {
      if (rafId) return;
      rafId = requestAnimationFrame(updateActive);
    }, { passive: true });

    // Hide dots on desktop via CSS; but update state if the media query flips
    window.addEventListener('resize', () => {
      if (!mq.matches) return;
      requestAnimationFrame(updateActive);
    }, { passive: true });
  }

  function enhanceAll() {
    SELECTORS.forEach(sel => {
      document.querySelectorAll(sel).forEach(enhance);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', enhanceAll);
  } else {
    enhanceAll();
  }
})();
