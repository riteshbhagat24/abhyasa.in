<?php
/**
 * Contact form endpoint.
 * - Accepts JSON POST { name, phone, email?, course?, class?, message?, _honey?, _token? }
 * - Writes submission to data/submissions/YYYY-MM-DD.jsonl
 * - Optionally emails the institute (uncomment mail() block below)
 * - Returns { ok: true, message } or { ok: false, error } (HTTP 200 on success, 4xx on error)
 */

declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: same-origin');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed.']);
    exit;
}

// Read JSON body
$raw = file_get_contents('php://input') ?: '';
$data = json_decode($raw, true);

if (!is_array($data)) {
    // Fallback: form-encoded
    $data = $_POST;
}

// Honeypot
if (!empty($data['_honey'])) {
    // silently accept (do not reveal spam detection)
    echo json_encode(['ok' => true, 'message' => 'Thank you! We will call you within one working day.']);
    exit;
}

$name    = trim((string)($data['name']    ?? ''));
$phone   = trim((string)($data['phone']   ?? ''));
$email   = trim((string)($data['email']   ?? ''));
$course  = trim((string)($data['course']  ?? ''));
$class   = trim((string)($data['class']   ?? ''));
$message = trim((string)($data['message'] ?? ''));

// Validation
$errors = [];
if ($name === '' || strlen($name) > 120) $errors[] = 'Please enter a valid name.';
if ($phone === '' || !preg_match('/^[0-9+\-\s()]{8,20}$/', $phone)) $errors[] = 'Please enter a valid phone number.';
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email looks invalid.';
if (strlen($message) > 2000) $errors[] = 'Message is too long (2000 chars max).';

if ($errors) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'error' => implode(' ', $errors)]);
    exit;
}

// Basic rate-limit (per IP, 5/min)
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rateDir = __DIR__ . '/../data/rate';
@mkdir($rateDir, 0755, true);
$rateFile = $rateDir . '/' . preg_replace('/[^a-zA-Z0-9.:]/', '_', $ip) . '.txt';
$now = time();
$recent = [];
if (is_file($rateFile)) {
    $recent = array_filter(array_map('intval', explode(',', trim((string)file_get_contents($rateFile)))), fn($t) => $t > $now - 60);
}
if (count($recent) >= 5) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'error' => 'Too many requests. Please wait a minute and try again.']);
    exit;
}
$recent[] = $now;
@file_put_contents($rateFile, implode(',', $recent));

// Build record
$record = [
    'ts'      => date('c'),
    'ip'      => $ip,
    'ua'      => $_SERVER['HTTP_USER_AGENT'] ?? '',
    'name'    => $name,
    'phone'   => $phone,
    'email'   => $email,
    'course'  => $course,
    'class'   => $class,
    'message' => $message,
];

// Persist to JSON lines file
$dir = __DIR__ . '/../data/submissions';
@mkdir($dir, 0755, true);
$file = $dir . '/' . date('Y-m-d') . '.jsonl';
@file_put_contents($file, json_encode($record, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND | LOCK_EX);

// ---- Optional: email the institute. Uncomment and configure as needed. ----
// $to = 'sbisala@gmail.com';
// $subject = 'New enquiry from abhyasa.in — ' . $name;
// $body = "New enquiry from the website:\n\n".
//         "Name:    $name\n".
//         "Phone:   $phone\n".
//         "Email:   $email\n".
//         "Program: $course\n".
//         "Class:   $class\n".
//         "Message: $message\n";
// $headers = "From: no-reply@abhyasa.in\r\n" .
//            "Reply-To: " . ($email ?: 'no-reply@abhyasa.in') . "\r\n" .
//            "Content-Type: text/plain; charset=UTF-8\r\n";
// @mail($to, $subject, $body, $headers);

echo json_encode([
    'ok' => true,
    'message' => 'Thank you! Bisala Sir will call you within one working day.',
]);
