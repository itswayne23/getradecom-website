<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('SITE_NAME', 'getradeCom');
define('SITE_TAGLINE', 'Authorised Apple Product Distribution & Channel Network — Assam');
define('OFFICIAL_PHONE', '+91 361 000 0000');       // Replace with approved company number
define('OFFICIAL_WHATSAPP', '919864000000');        // Country code + number, no +
define('OFFICIAL_EMAIL', 'enquiries@getradecom.com');
define('TERRITORY', 'Assam, India');

// CSRF Token Helper
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function csrf_field(): string {
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
}

function e(?string $str): string {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}