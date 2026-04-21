<?php
/**
 * Simple session-based auth for the admin stub.
 *
 *   ⚠️  BEFORE DEPLOYING:
 *   1. Change the default credentials below (or move them to env/.env).
 *   2. Generate a bcrypt hash and paste it into $ADMIN_PASS_HASH:
 *          php -r "echo password_hash('YOUR-PASSWORD', PASSWORD_BCRYPT), PHP_EOL;"
 *   3. Delete the $ADMIN_PASS_PLAIN fallback below.
 *   4. Deploy only over HTTPS.
 *
 * This is deliberately minimal. For anything beyond the admin stub,
 * swap this for a library like PHP-Auth or Delight\Auth.
 */

declare(strict_types=1);

session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/',
    'secure'   => !empty($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_name('abhyasa_admin');
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

// ===== Credentials (CHANGE THESE) =====
$ADMIN_USER       = 'admin';
$ADMIN_PASS_PLAIN = 'change-me-now';   // fallback — delete this line after setting $ADMIN_PASS_HASH
$ADMIN_PASS_HASH  = '';                // paste bcrypt hash here; when set, plain fallback is ignored

function admin_is_logged_in(): bool {
    return !empty($_SESSION['admin_user']);
}

function admin_require_login(): void {
    if (!admin_is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

function admin_login(string $user, string $pass): bool {
    global $ADMIN_USER, $ADMIN_PASS_HASH, $ADMIN_PASS_PLAIN;

    if (!hash_equals($ADMIN_USER, $user)) return false;

    $ok = false;
    if ($ADMIN_PASS_HASH !== '') {
        $ok = password_verify($pass, $ADMIN_PASS_HASH);
    } elseif ($ADMIN_PASS_PLAIN !== '') {
        $ok = hash_equals($ADMIN_PASS_PLAIN, $pass);
    }

    if (!$ok) return false;

    session_regenerate_id(true);
    $_SESSION['admin_user'] = $user;
    $_SESSION['admin_login_at'] = time();
    return true;
}

function admin_logout(): void {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $p['path'] ?? '/', $p['domain'] ?? '', !empty($p['secure']), !empty($p['httponly']));
    }
    session_destroy();
}

/** True if the default credentials are still in use — show warning banner. */
function admin_using_defaults(): bool {
    global $ADMIN_PASS_HASH, $ADMIN_PASS_PLAIN;
    return $ADMIN_PASS_HASH === '' && $ADMIN_PASS_PLAIN === 'change-me-now';
}
