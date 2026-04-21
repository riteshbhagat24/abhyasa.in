<?php
require_once __DIR__ . '/auth.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim((string)($_POST['user'] ?? ''));
    $pass = (string)($_POST['pass'] ?? '');
    if (admin_login($user, $pass)) {
        header('Location: index.php');
        exit;
    }
    $error = 'Invalid credentials.';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin login — Abhyasa</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" />
<style>
  *, *::before, *::after { box-sizing: border-box; }
  body {
    margin: 0;
    font-family: 'Inter', system-ui, sans-serif;
    background:
      radial-gradient(800px 500px at 80% 20%, rgba(201, 169, 110, 0.22), transparent 60%),
      radial-gradient(700px 400px at 20% 80%, rgba(27, 55, 107, 0.35), transparent 60%),
      #070F1F;
    min-height: 100vh;
    display: grid;
    place-items: center;
    padding: 2rem;
    color: #FAF8F3;
  }
  .card {
    background: rgba(11, 31, 58, 0.7);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(201, 169, 110, 0.2);
    padding: 2.5rem;
    border-radius: 20px;
    width: min(100%, 420px);
    box-shadow: 0 40px 80px -30px rgba(0,0,0,0.5);
  }
  .brand {
    display: flex; align-items: center; gap: 0.7rem; margin-bottom: 1.5rem;
    font-family: 'Fraunces', Georgia, serif; font-weight: 700; font-size: 1.4rem;
  }
  .brand-mark {
    width: 40px; height: 40px;
    display: grid; place-items: center;
    background: #0B1F3A;
    color: #D9BC85;
    border-radius: 10px;
    box-shadow: inset 0 0 0 1px #9A7A3A;
  }
  h1 { font-family: 'Fraunces', serif; font-weight: 600; font-size: 1.5rem; margin: 0 0 0.25rem 0; }
  .sub { color: rgba(255,255,255,0.65); font-size: 0.92rem; margin-bottom: 1.5rem; }
  label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 0.4rem; }
  input {
    width: 100%;
    padding: 0.85rem 0.95rem;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.15);
    background: rgba(255,255,255,0.05);
    color: #FAF8F3;
    font: inherit;
    min-height: 48px;
    margin-bottom: 1rem;
    outline: none;
    transition: border-color 150ms, box-shadow 150ms;
  }
  input:focus { border-color: #C9A96E; box-shadow: 0 0 0 3px rgba(201,169,110,0.2); }
  button {
    width: 100%;
    padding: 0.95rem;
    border-radius: 999px;
    border: 0;
    background: linear-gradient(135deg, #C9A96E, #D9BC85);
    color: #070F1F;
    font-weight: 600;
    font-size: 0.98rem;
    cursor: pointer;
    transition: transform 180ms, filter 180ms;
    min-height: 50px;
    margin-top: 0.5rem;
  }
  button:hover { transform: translateY(-1px); filter: brightness(1.04); }
  .error { color: #FFB4A6; background: rgba(194, 74, 59, 0.18); border: 1px solid rgba(194,74,59,0.35); padding: 0.7rem; border-radius: 8px; font-size: 0.9rem; margin-bottom: 1rem; }
  .note { margin-top: 1.5rem; font-size: 0.8rem; color: rgba(255,255,255,0.5); line-height: 1.5; }
  .note code { background: rgba(255,255,255,0.08); padding: 0.1rem 0.3rem; border-radius: 4px; font-size: 0.85em; }
  a { color: #D9BC85; }
</style>
</head>
<body>
<div class="card">
  <div class="brand">
    <span class="brand-mark">अ</span>
    <span>Abhyasa · Admin</span>
  </div>
  <h1>Welcome back</h1>
  <p class="sub">Sign in to manage enquiries and content.</p>

  <?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>

  <form method="post" autocomplete="off">
    <label for="user">Username</label>
    <input id="user" name="user" type="text" required autofocus />
    <label for="pass">Password</label>
    <input id="pass" name="pass" type="password" required />
    <button type="submit">Sign in</button>
  </form>

  <p class="note">
    Default: <code>admin</code> / <code>change-me-now</code>.<br/>
    <strong>Change these in <code>admin/auth.php</code> before deploying.</strong>
    See <a href="README.md">admin README</a> for details.
  </p>
</div>
</body>
</html>
