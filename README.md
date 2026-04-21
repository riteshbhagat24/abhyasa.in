# Abhyasa — Best NEET Coaching in Nagpur

Marketing & lead-generation website for **Abhyasa**, a dedicated NEET coaching institute in Nagpur. Built as a PHP-based multi-page site with a CMS-ready data layer, a GSAP + Three.js animation system, and a minimal admin area for managing enquiries.

[Live](#) · [Screenshots](#screenshots) · [Install](#install) · [Deploy](#deploy) · [Extend to full CMS](#extending-to-a-full-cms)

---

## What's inside

- **11 pages** — Home, About, Courses (+ detail), Downloads, Results, Gallery, Blog, Blog Post, Contact, Privacy, 404
- **PHP-based** — no build step, runs on any shared host with PHP 7.4+
- **CMS-ready** — all site content lives in `config.php` as typed PHP arrays; swap for a DB layer without touching the pages
- **Real animation system** — GSAP + ScrollTrigger for reveals and parallax, Lenis for smooth scroll, Three.js for the DNA-helix hero
- **Admin stub** — session-based login, enquiry dashboard, ready to extend
- **Contact API** — JSON endpoint, honeypot + rate-limit, stores to `data/submissions/*.jsonl`
- **Apache `.htaccess`** — pretty URLs, security headers, deny rules for sensitive folders
- **Accessibility** — semantic HTML, ARIA labels, focus-visible rings, `prefers-reduced-motion` respected
- **Responsive** — mobile-first breakpoints at 640 / 768 / 900 / 1024 / 1100 / 1240

---

## Screenshots

The site uses:

- Deep navy `#0B1F3A` + warm gold `#C9A96E` palette (trust + prestige for an education brand)
- Serif display headings (`Fraunces`) paired with `Inter` for UI
- A rotating 3D DNA double-helix in the hero (medical-entrance metaphor)
- Full parallax orbs, staggered scroll-reveals, animated counters, a marquee strip, 3D-tilt testimonial cards

---

## Install

### Prerequisites
- PHP 7.4 or newer (8.x recommended)
- Apache with `mod_rewrite` (or any web server — see [nginx config](#nginx))

### Run locally (no web server needed)

PHP ships with a built-in dev server. From the project folder:

```bash
php -S localhost:8000
```

Then open **http://localhost:8000/**. The admin is at **http://localhost:8000/admin/login.php**.

### Run with Docker (optional)

```bash
docker run --rm -it -v "$PWD":/app -w /app -p 8000:8000 php:8.3-cli php -S 0.0.0.0:8000
```

---

## Deploy

### Shared hosting (cPanel / Hostinger / Bluehost / etc.)

1. In the control panel, go to **File Manager** and open `public_html/` (or the document root for the domain).
2. Upload the contents of this repo (not the folder itself — the files directly into the doc root).
3. Verify Apache `mod_rewrite` is enabled (it almost always is).
4. Visit the domain. Done.

> **Before publishing:** open `admin/auth.php` and rotate the default credentials (see [Admin readme](admin/README.md)).

### VPS / Docker / cloud

Any PHP 7.4+ stack with Apache or nginx + php-fpm works. A minimal `docker-compose.yml`:

```yaml
services:
  web:
    image: php:8.3-apache
    volumes: [".:/var/www/html"]
    ports: ["80:80"]
```

### nginx

If you're on nginx, drop this into your server block:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
# Pretty URLs (one level)
location ~ ^/([a-z0-9\-]+)$ {
    try_files /$1.php =404;
}
# Blog post route
location ~ ^/blog/([a-z0-9\-]+)/?$ {
    try_files /blog-post.php?slug=$1 =404;
}
# Deny sensitive paths
location ~ ^/(data|includes)(/|$) { deny all; return 403; }
location ~ /\. { deny all; }
# PHP handler — adjust socket path for your setup
location ~ \.php$ {
    include fastcgi_params;
    fastcgi_pass unix:/run/php/php8.3-fpm.sock;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
}
```

### Push to GitHub

```bash
cd abhyasa-revamp
git init
git add .
git commit -m "Initial commit: Abhyasa PHP site"
git branch -M main
git remote add origin git@github.com:YOUR-ORG/abhyasa.in.git
git push -u origin main
```

> GitHub Pages does **not** run PHP. To deploy from GitHub, use GitHub Actions to push to your PHP host, or use Vercel + a PHP runtime, or a platform like Render / Fly / Railway with a `php:apache` image.

---

## File structure

```
abhyasa-revamp/
├── index.php                    Home
├── about.php                    About Us
├── courses.php                  All programs + detail sections
├── downloads.php                Study material
├── results.php                  Past NEET results
├── gallery.php                  Photos + videos
├── blog.php                     Blog listing
├── blog-post.php                Single blog post (uses ?slug=)
├── contact.php                  Contact form + map
├── privacy-policy.php           Legal
├── 404.php                      Custom not-found
│
├── config.php                   ★ Single source of truth for site content
├── .htaccess                    Apache rules (pretty URLs, security)
│
├── includes/
│   ├── header.php               <!doctype>, nav, header, opens <body>
│   ├── footer.php               Footer, scripts, closing tags
│   └── helpers.php              e(), icon(), social_icon(), render_features()
│
├── assets/
│   ├── css/main.css             Design system (tokens, components, pages)
│   ├── js/main.js               Lenis smooth-scroll, mobile drawer, form POST
│   ├── js/animations.js         GSAP + ScrollTrigger reveals, parallax, counters
│   ├── js/hero-3d.js            Three.js rotating DNA helix
│   └── images/                  Drop photos/icons here
│
├── api/
│   └── contact.php              JSON endpoint — persists submissions
│
├── admin/
│   ├── login.php                Admin login
│   ├── logout.php               Destroys session
│   ├── index.php                Dashboard: enquiries table
│   ├── auth.php                 Session helpers (CHANGE CREDENTIALS HERE)
│   └── README.md                How to extend to a full CMS
│
├── data/
│   ├── submissions/             Contact-form submissions (*.jsonl, gitignored)
│   └── rate/                    Rate-limit buckets (gitignored)
│
├── .gitignore
├── README.md                    This file
└── LICENSE
```

---

## Editing content

All site content lives in **[config.php](config.php)** as typed PHP arrays. Edit and refresh — no build step, no DB required.

### Frequently edited values

| What | Variable | File |
|---|---|---|
| Phone / email / address | `$CONTACT` | `config.php` |
| Social links | `$SOCIAL` | `config.php` |
| Course programs | `$COURSES` | `config.php` |
| Blog posts | `$BLOG_POSTS` | `config.php` |
| Testimonials | `$TESTIMONIALS` | `config.php` |
| Results by year | `$RESULTS` | `config.php` |
| Gallery items | `$GALLERY` | `config.php` |
| Download packs | `$DOWNLOADS` | `config.php` |
| Homepage stats | `$STATS` | `config.php` |
| Founder bio | `$FOUNDER` | `config.php` |

### Adding a new blog post

1. Open `config.php`, find `$BLOG_POSTS`.
2. Copy an existing entry as a template. Give it a unique `slug`.
3. Save. Visit `/blog/your-slug` (or `/blog-post.php?slug=your-slug`).

### Adding an icon

Icons are inline SVGs. In `includes/helpers.php`, find the `icon()` function — add a new entry to the `$paths` array with a Lucide-style path.

---

## Extending to a full CMS

The front-end pages read everything through PHP arrays. To database-back them:

1. Create a thin repository (e.g. `lib/Repo.php`) that returns data in the same shape.
2. Replace the includes in `config.php`:
   ```php
   $BLOG_POSTS = Repo::listBlogPosts();
   $COURSES    = Repo::listCourses();
   // …
   ```
3. Build admin CRUD on top of `admin/index.php` — clone the enquiries table pattern for each content type.

A full plan is in [`admin/README.md`](admin/README.md).

---

## Security

| Concern | How it's handled |
|---|---|
| **Sensitive files** | `.htaccess` denies `config.php`, `.env`, `*.jsonl`, `includes/`, `data/` |
| **CSRF** | Contact form uses a hidden token + honeypot + rate-limit (5/min/IP) |
| **XSS** | All user content escaped via `e()` before rendering |
| **Headers** | `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`, `Permissions-Policy` set in `.htaccess` |
| **Admin auth** | Session cookie with `HttpOnly`, `SameSite=Lax`, `Secure` (on HTTPS), session regenerated on login |
| **Admin password** | bcrypt via `password_hash` + `password_verify` — **you must rotate the default** |

**Before going live:**

- [ ] Rotate `$ADMIN_USER` / `$ADMIN_PASS_HASH` in `admin/auth.php`
- [ ] Deploy over HTTPS (force via `.htaccess` — there's a commented block ready)
- [ ] Confirm `data/` returns 403 (try `https://yoursite.com/data/submissions/`)
- [ ] Back up `data/submissions/` off-server
- [ ] Tighten CSP in `.htaccess` once inline scripts are moved out

---

## Accessibility

- WCAG 2.2 AA color contrast on the full palette
- Semantic HTML: `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`, `<figure>`, `<blockquote>`
- Focus-visible outlines (gold, 3px, 3px offset) on all interactive elements
- ARIA: `aria-labelledby` on sections, `aria-label` on icon-only buttons, `aria-live="polite"` on form status
- Minimum touch target size 44×44 (Apple HIG) for all buttons and icons
- `prefers-reduced-motion` disables GSAP, Lenis, pulse animations, the 3D helix rotation
- Form labels are visible, not placeholder-only, and describe requirements; errors announced near the relevant field

---

## Browser support

- Modern evergreen browsers (Chrome, Firefox, Safari, Edge — last 2 versions)
- Three.js requires WebGL 1 — falls back gracefully (card still renders without the helix) if unavailable
- No IE11 support

---

## Performance notes

- CSS is one file, ~30KB gzipped
- GSAP + ScrollTrigger loaded from `cdnjs` (heavily cached). Swap for self-hosted builds if your CSP rules it out.
- `font-display: swap` on Google Fonts
- Images: drop real photos into `assets/images/` and swap the placeholders in `config.php`
- Three.js DNA helix is lightweight (single mesh + particles), runs at 60fps on mid-range laptops
- The scroll progress bar uses `requestAnimationFrame` via Lenis — no scroll-handler churn

---

## Credits

- Fonts: [Fraunces](https://fonts.google.com/specimen/Fraunces), [Inter](https://fonts.google.com/specimen/Inter) (Google Fonts)
- Animation: [GSAP](https://gsap.com/) + [ScrollTrigger](https://gsap.com/scrolltrigger/)
- Smooth scroll: [Lenis](https://github.com/studio-freight/lenis)
- 3D: [Three.js](https://threejs.org/)
- Icon system: Lucide-compatible SVG paths (hand-ported, no runtime dependency)

---

## License

MIT — see [LICENSE](LICENSE).
