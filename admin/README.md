# Admin Area — Abhyasa

Minimal admin stub shipped with the site. Good enough to triage enquiries from day one; designed to be extended into a full CMS as you grow.

## What ships today

- **`login.php`** — session-based login. Default: `admin` / `change-me-now`.
- **`index.php`** — dashboard. Reads `data/submissions/*.jsonl` and displays enquiries with call / email shortcuts.
- **`logout.php`** — destroys the session.
- **`auth.php`** — the auth helpers. **Edit this file to set your real credentials.**

## Rotate the default password

1. Generate a bcrypt hash:
   ```bash
   php -r "echo password_hash('YOUR-REAL-PASSWORD', PASSWORD_BCRYPT), PHP_EOL;"
   ```
2. Open `admin/auth.php` and:
   - paste the hash into `$ADMIN_PASS_HASH`
   - delete the `$ADMIN_PASS_PLAIN` fallback line
3. Change `$ADMIN_USER` to your preferred username.
4. Deploy.

## How to extend to a full CMS

The site content is currently read from PHP arrays in `config.php`. To turn this into a database-backed CMS:

1. Pick a storage backend (MySQL / SQLite / flat JSON — any works).
2. Write a thin repository layer that returns data in the same shape as the PHP arrays (`$COURSES`, `$BLOG_POSTS`, `$TESTIMONIALS`, etc.). The front-end pages never need to change.
3. Build admin CRUD screens by cloning the `index.php` pattern:
   - A sidebar menu item (e.g. "Blog posts").
   - A list page with the table pattern already in the dashboard.
   - An edit page with a form that writes back via `PDO` or JSON.
4. Keep the CMS strictly under `/admin` — the public site remains fully static-rendered PHP.

## Where enquiries are stored

- Location: `data/submissions/YYYY-MM-DD.jsonl` (one JSON object per line).
- Rate-limit buckets: `data/rate/<ip>.txt` (recent submission timestamps).
- These folders are `.gitignore`d — see project `.gitignore`.

## Optional email notifications

In `api/contact.php`, there's a commented-out `mail()` block near the bottom. Uncomment it and adjust the `From:` header once your PHP host supports outgoing mail (most do via `sendmail` or a `smtp` wrapper). For reliability, prefer an API-based provider (Postmark, SES, Resend) — swap the `mail()` call for a cURL request to the provider.

## Security checklist before going live

- [ ] Change the default admin credentials (see above).
- [ ] Deploy over HTTPS only.
- [ ] Make sure `/data` is not publicly readable. The `.htaccess` file at the project root already blocks direct access — verify by visiting `https://yoursite.com/data/submissions/` and confirming you get a 403.
- [ ] Back up `data/submissions/` regularly.
- [ ] Review `api/contact.php` rate-limit (default: 5 req/min/IP) and tighten if needed.
