<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/site.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

// Verify CSRF token
$token = $_POST['csrf_token'] ?? '';
if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
    $_SESSION['flash_message'] = 'Session expired or invalid request. Please try again.';
    header('Location: ../index.php');
    exit;
}

$redirect_back = $_SERVER['HTTP_REFERER'] ?? '../index.php';
// Prevent open-redirect outside local host
if (!str_starts_with($redirect_back, 'http://localhost') && !str_starts_with($redirect_back, 'http://127.0.0.1') && !str_starts_with($redirect_back, '../')) {
    $redirect_back = '../index.php';
}

$action = $_POST['action'] ?? 'enquiry';

if ($action === 'subscribe') {
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $consent = isset($_POST['consent']) ? 1 : 0;

    if (!$email || !$consent) {
        $_SESSION['flash_message'] = 'Please enter a valid email address and accept the subscription consent.';
        header('Location: ' . $redirect_back);
        exit;
    }

    $stmt = $pdo->prepare("INSERT IGNORE INTO subscribers (email, consent_given) VALUES (:email, :consent)");
    $stmt->execute([':email' => $email, ':consent' => $consent]);

    $_SESSION['flash_message'] = 'Subscribed! You will receive updates on GE Tradecom Assam launches, workshops, and approved campaigns.';
    header('Location: ' . $redirect_back);
    exit;
}

// Standard Enquiry / Specialist / Business / Trade-in / Workshop / Stock Notification / Dealer Onboarding / Education
$allowed_types = ['product', 'specialist', 'business', 'trade_in', 'workshop', 'stock_notify', 'dealer_onboarding', 'education', 'general'];
$enquiry_type = in_array($_POST['enquiry_type'] ?? '', $allowed_types, true) ? $_POST['enquiry_type'] : 'general';

$full_name = trim($_POST['full_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$company_name = trim($_POST['company_name'] ?? '') ?: null;
$district = trim($_POST['district'] ?? '') ?: null;
$product_interest = trim($_POST['product_interest'] ?? '') ?: null;
$quantity = max(1, (int)($_POST['quantity'] ?? 1));
$message = trim($_POST['message'] ?? '') ?: null;
$consent_given = isset($_POST['consent']) ? 1 : 0;

if ($full_name === '' || $phone === '' || !$email || !$consent_given) {
    $_SESSION['flash_message'] = 'Please complete all required fields and accept the contact consent checkbox.';
    header('Location: ' . $redirect_back);
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO enquiries
        (enquiry_type, full_name, phone, email, company_name, district, product_interest, quantity, message, consent_given)
    VALUES
        (:enquiry_type, :full_name, :phone, :email, :company_name, :district, :product_interest, :quantity, :message, :consent_given)
");

$stmt->execute([
    ':enquiry_type' => $enquiry_type,
    ':full_name' => $full_name,
    ':phone' => $phone,
    ':email' => $email,
    ':company_name' => $company_name,
    ':district' => $district,
    ':product_interest' => $product_interest,
    ':quantity' => $quantity,
    ':message' => $message,
    ':consent_given' => $consent_given,
]);

// If registering for a specific workshop, increment booked seats safely
if ($enquiry_type === 'workshop' && !empty($_POST['workshop_id'])) {
    $ws_id = (int)$_POST['workshop_id'];
    $upd = $pdo->prepare("UPDATE workshops SET seats_booked = LEAST(seats_total, seats_booked + 1) WHERE id = :id AND seats_booked < seats_total");
    $upd->execute([':id' => $ws_id]);
}

$_SESSION['flash_message'] = 'Thank you, ' . $full_name . '! Your request has been recorded and routed for GE Tradecom Assam follow-up.';
header('Location: ' . $redirect_back);
exit;
