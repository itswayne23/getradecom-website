<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('SITE_NAME', 'GE Tradecom Pvt Ltd');
define('SITE_SHORT', 'getradeCom');
define('SITE_TAGLINE', 'Authorised Apple Product Distribution & Channel Network — Assam');
define('OFFICIAL_PHONE', '+91 60020 91639');
define('OFFICIAL_WHATSAPP', '916002091639');        // Country code + number, no +
define('OFFICIAL_EMAIL', 'reachus@getradecom.in');
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
