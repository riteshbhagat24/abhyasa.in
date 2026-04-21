/**
 * Abhyasa — animations.js
 * Lean scroll reveals via IntersectionObserver (no GSAP dependency for this layer).
 * GSAP is only used for the optional count-up and hero headline.
 * All constant-running animations (floats, marquee reflows) removed from JS —
 * pure CSS where possible, else skipped.
 */
(() => {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ===== Scroll reveals via IntersectionObserver (cheap, no rAF loops) =====
  if ('IntersectionObserver' in window && !prefersReducedMotion) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, [data-reveal]').forEach(el => io.observe(el));

    // Stagger for grids — add .reveal.stagger-N to children then observe parent
    document.querySelectorAll('[data-reveal-stagger]').forEach(grid => {
      Array.from(grid.children).forEach((child, i) => {
        child.classList.add('reveal');
        child.style.transitionDelay = (Math.min(i, 7) * 70) + 'ms';
        io.observe(child);
      });
    });
  } else {
    // Reduced motion: mark everything visible immediately
    document.querySelectorAll('.reveal, [data-reveal]').forEach(el => el.classList.add('in-view'));
    document.querySelectorAll('[data-reveal-stagger]').forEach(grid => {
      Array.from(grid.children).forEach(child => child.classList.add('reveal', 'in-view'));
    });
  }

  // ===== Parallax (only when GSAP+ScrollTrigger are available AND reduced-motion is off) =====
  const gsap = window.gsap;
  const ScrollTrigger = window.ScrollTrigger;
  if (gsap && ScrollTrigger && !prefersReducedMotion) {
    gsap.registerPlugin(ScrollTrigger);

    // Parallax on hero orbs (lightweight — only 2 elements max per page)
    document.querySelectorAll('.hero-orb').forEach((orb, i) => {
      const strength = i === 0 ? -30 : 25;
      gsap.to(orb, {
        yPercent: strength,
        ease: 'none',
        scrollTrigger: {
          trigger: orb.closest('.hero, .page-hero'),
          start: 'top top',
          end: 'bottom top',
          scrub: 1,
        },
      });
    });

    // Generic [data-parallax] — respect low count
    document.querySelectorAll('[data-parallax]').forEach(el => {
      const strength = parseFloat(el.dataset.parallax || 0.2);
      gsap.to(el, {
        yPercent: -strength * 80,
        ease: 'none',
        scrollTrigger: {
          trigger: el.closest('section') || el,
          start: 'top bottom',
          end: 'bottom top',
          scrub: true,
        },
      });
    });

    // Animated number counters — single-run, cheap
    document.querySelectorAll('.stat-num[data-count]').forEach(el => {
      const target = parseFloat(el.dataset.count);
      const suffix = el.dataset.countSuffix || '';
      const prefix = el.dataset.countPrefix || '';
      const obj = { val: 0 };
      gsap.to(obj, {
        val: target,
        duration: 1.8,
        ease: 'power2.out',
        scrollTrigger: { trigger: el, start: 'top 85%', once: true },
        onUpdate: () => {
          el.textContent = prefix + Math.round(obj.val).toLocaleString('en-IN') + suffix;
        }
      });
    });
  }

  // ===== Character split + reveal =====
  // Splits .reveal--chars text into per-character spans so the
  // in-view transition staggers letter by letter.
  (function splitChars() {
    if (prefersReducedMotion) return;

    const nodes = document.querySelectorAll('.reveal--chars');
    nodes.forEach(el => {
      if (el.dataset.charSplit === 'done') return;
      const raw = el.textContent;
      el.textContent = '';
      let idx = 0;
      for (const ch of raw) {
        const span = document.createElement('span');
        if (ch === ' ' || ch === ' ') {
          span.className = 'char space';
          span.innerHTML = '&nbsp;';
        } else {
          span.className = 'char';
          span.textContent = ch;
        }
        span.style.setProperty('--char-i', idx++);
        el.appendChild(span);
      }
      el.dataset.charSplit = 'done';
    });

    // Observe each .reveal--chars so the stagger fires on entry
    if ('IntersectionObserver' in window) {
      const cio = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            cio.unobserve(entry.target);
          }
        });
      }, { threshold: 0.2, rootMargin: '0px 0px -40px 0px' });
      nodes.forEach(n => cio.observe(n));
    } else {
      nodes.forEach(n => n.classList.add('in-view'));
    }
  })();

  // ===== Impact progress bars — animate width on view =====
  if ('IntersectionObserver' in window && !prefersReducedMotion) {
    const barIO = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-in-view');
          barIO.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });
    document.querySelectorAll('.stats-item[data-fill], .impact-bar').forEach(el => {
      const host = el.closest('.stats-item') || el;
      barIO.observe(host);
    });
  } else {
    document.querySelectorAll('.stats-item[data-fill]').forEach(el => el.classList.add('is-in-view'));
  }

  // Refresh after all images loaded
  if (window.ScrollTrigger) {
    window.addEventListener('load', () => window.ScrollTrigger.refresh());
  }
})();
