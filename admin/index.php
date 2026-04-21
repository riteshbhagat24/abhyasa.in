<?php
require_once __DIR__ . '/auth.php';
admin_require_login();

$submissionsDir = __DIR__ . '/../data/submissions';
$files = is_dir($submissionsDir) ? glob($submissionsDir . '/*.jsonl') : [];
rsort($files);

$submissions = [];
foreach (array_slice($files, 0, 30) as $f) {
    $lines = array_reverse(array_filter(array_map('trim', file($f, FILE_IGNORE_NEW_LINES) ?: [])));
    foreach ($lines as $ln) {
        $obj = json_decode($ln, true);
        if (is_array($obj)) $submissions[] = $obj;
    }
}
$total = count($submissions);
$submissions = array_slice($submissions, 0, 200);

// Stats
$today = date('Y-m-d');
$todayCount = 0;
foreach ($submissions as $s) if (strpos($s['ts'] ?? '', $today) === 0) $todayCount++;

function e_admin(?string $s): string { return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Dashboard — Abhyasa Admin</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" />
<style>
  *, *::before, *::after { box-sizing: border-box; }
  body { margin: 0; font-family: 'Inter', system-ui, sans-serif; background: #FAF8F3; color: #0B1F3A; }
  .shell { display: grid; grid-template-columns: 260px 1fr; min-height: 100vh; }
  aside.sidebar { background: #070F1F; color: rgba(255,255,255,0.85); padding: 1.5rem 1rem; position: sticky; top: 0; height: 100vh; }
  .brand { display: flex; align-items: center; gap: 0.7rem; font-family: 'Fraunces', serif; font-weight: 700; color: #FAF8F3; margin-bottom: 2rem; padding: 0.5rem; }
  .brand-mark { width: 36px; height: 36px; display: grid; place-items: center; background: #0B1F3A; color: #D9BC85; border-radius: 8px; box-shadow: inset 0 0 0 1px #9A7A3A; font-family: 'Fraunces', serif; }
  nav.side ul { list-style: none; padding: 0; margin: 0; display: grid; gap: 0.3rem; }
  nav.side a { display: flex; align-items: center; gap: 0.6rem; padding: 0.7rem 0.8rem; border-radius: 8px; color: rgba(255,255,255,0.75); font-size: 0.92rem; transition: all 150ms ease; text-decoration: none; }
  nav.side a:hover { background: rgba(255,255,255,0.05); color: #D9BC85; }
  nav.side a.active { background: rgba(201,169,110,0.15); color: #D9BC85; }
  .logout { position: absolute; bottom: 1rem; left: 1rem; right: 1rem; }
  .logout a { display: block; padding: 0.7rem; border-radius: 8px; text-align: center; color: rgba(255,255,255,0.5); font-size: 0.85rem; border: 1px solid rgba(255,255,255,0.1); }
  .logout a:hover { background: rgba(255,255,255,0.05); color: #D9BC85; }

  main.content { padding: 2rem; overflow-y: auto; }
  @media (max-width: 768px) { .shell { grid-template-columns: 1fr; } aside.sidebar { position: static; height: auto; } .logout { position: static; } }

  .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem; }
  .page-header h1 { font-family: 'Fraunces', serif; font-weight: 600; font-size: 2rem; margin: 0; }
  .sub { color: #4A5A75; font-size: 0.95rem; margin-top: 0.2rem; }

  .warn {
    padding: 1rem; background: #FFF1E6; color: #7A3D1F;
    border: 1px solid #E8C9AF; border-radius: 10px; margin-bottom: 1.5rem;
    font-size: 0.9rem; display: flex; gap: 0.7rem; align-items: flex-start;
  }
  .warn code { background: rgba(0,0,0,0.05); padding: 0.1rem 0.4rem; border-radius: 4px; font-size: 0.88em; }

  .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem; }
  .stat-card {
    background: #fff; padding: 1.3rem; border-radius: 12px;
    border: 1px solid #E6ECF5; box-shadow: 0 1px 2px rgba(11,31,58,0.04);
  }
  .stat-label { font-size: 0.76rem; color: #6C7B94; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600; }
  .stat-num { font-family: 'Fraunces', serif; font-size: 2rem; font-weight: 600; margin-top: 0.3rem; color: #0B1F3A; }

  .card { background: #fff; border: 1px solid #E6ECF5; border-radius: 12px; padding: 1.5rem; }
  .card h2 { font-family: 'Fraunces', serif; font-size: 1.3rem; margin: 0 0 1rem 0; }

  table { width: 100%; border-collapse: collapse; font-size: 0.92rem; }
  th { text-align: left; padding: 0.7rem 0.6rem; color: #6C7B94; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600; border-bottom: 1px solid #E6ECF5; }
  td { padding: 0.85rem 0.6rem; border-bottom: 1px solid #F4EFE3; vertical-align: top; }
  td.ts { color: #6C7B94; font-size: 0.85rem; white-space: nowrap; font-variant-numeric: tabular-nums; }
  td.name { font-weight: 600; }
  td.phone a { color: #0B1F3A; text-decoration: none; border-bottom: 1px dotted #C9A96E; }
  td.phone a:hover { color: #9A7A3A; }
  .tag { display: inline-block; padding: 0.15rem 0.5rem; background: #F4EFE3; color: #1C3A66; border-radius: 999px; font-size: 0.75rem; font-weight: 600; }
  .empty { text-align: center; padding: 3rem 1rem; color: #6C7B94; }
  .empty .big { font-family: 'Fraunces', serif; font-size: 3rem; color: #D9BC85; margin-bottom: 0.5rem; }
</style>
</head>
<body>
<div class="shell">
  <aside class="sidebar">
    <div class="brand"><span class="brand-mark">अ</span><span>Abhyasa · Admin</span></div>
    <nav class="side" aria-label="Admin navigation">
      <ul>
        <li><a href="index.php" class="active">◆ Dashboard</a></li>
        <li><a href="#" onclick="alert('Coming soon — extend data/ sources to back this.');">📝 Content (soon)</a></li>
        <li><a href="#" onclick="alert('Coming soon.');">📸 Gallery (soon)</a></li>
        <li><a href="#" onclick="alert('Coming soon.');">📰 Blog posts (soon)</a></li>
        <li><a href="../index.php" target="_blank">↗ View site</a></li>
      </ul>
    </nav>
    <div class="logout">
      <a href="logout.php">Sign out</a>
    </div>
  </aside>

  <main class="content">
    <div class="page-header">
      <div>
        <h1>Enquiries</h1>
        <div class="sub">Contact form submissions — most recent first.</div>
      </div>
    </div>

    <?php if (admin_using_defaults()): ?>
      <div class="warn">
        <strong>⚠</strong>
        <div>
          You are using the default admin password. Open <code>admin/auth.php</code>, generate a bcrypt hash with
          <code>php -r "echo password_hash('YOUR-PASS', PASSWORD_BCRYPT);"</code>, paste it into <code>$ADMIN_PASS_HASH</code>,
          and delete the <code>$ADMIN_PASS_PLAIN</code> line before deploying.
        </div>
      </div>
    <?php endif; ?>

    <div class="stats">
      <div class="stat-card">
        <div class="stat-label">Total enquiries</div>
        <div class="stat-num"><?= e_admin((string)$total) ?></div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Today</div>
        <div class="stat-num"><?= e_admin((string)$todayCount) ?></div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Files stored</div>
        <div class="stat-num"><?= e_admin((string)count($files)) ?></div>
      </div>
    </div>

    <div class="card">
      <h2>Recent submissions</h2>

      <?php if (!$submissions): ?>
        <div class="empty">
          <div class="big">∅</div>
          <p>No submissions yet. Form data will appear here after the first enquiry is received.</p>
        </div>
      <?php else: ?>
        <div style="overflow-x: auto;">
          <table>
            <thead>
              <tr>
                <th>Received</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Program</th>
                <th>Class</th>
                <th>Message</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($submissions as $s): ?>
              <tr>
                <td class="ts"><?= e_admin(date('d M · H:i', strtotime($s['ts'] ?? ''))) ?></td>
                <td class="name"><?= e_admin($s['name'] ?? '—') ?></td>
                <td class="phone"><?php $p = $s['phone'] ?? ''; if ($p): ?><a href="tel:<?= e_admin(preg_replace('/[^+\d]/', '', $p)) ?>"><?= e_admin($p) ?></a><?php endif; ?></td>
                <td><?php if (!empty($s['email'])): ?><a href="mailto:<?= e_admin($s['email']) ?>"><?= e_admin($s['email']) ?></a><?php else: ?>—<?php endif; ?></td>
                <td><?= $s['course'] ? '<span class="tag">' . e_admin($s['course']) . '</span>' : '—' ?></td>
                <td><?= e_admin($s['class'] ?? '—') ?></td>
                <td style="max-width: 300px;"><?= e_admin($s['message'] ?? '—') ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>

  </main>
</div>
</body>
</html>
