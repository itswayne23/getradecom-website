<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/site.php';

if (!empty($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        $error = 'Invalid session token. Please refresh and try again.';
    } else {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_name'] = $user['name'];
            $_SESSION['admin_email'] = $user['email'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid email or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | <?= e(SITE_NAME) ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body class="bg-[#f5f5f7] min-h-screen flex items-center justify-center p-4">
    <div class="bg-white border border-black/[0.06] rounded-[30px] max-w-md w-full p-8 sm:p-10 shadow-sm">
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">getradeCom Admin</span>
        <h1 class="font-display text-2xl font-semibold text-[#1d1d1f] mt-1 mb-1">Partner &amp; Lead Console</h1>
        <p class="text-[12px] text-[#6e6e73] mb-6">Sign in to review enquiries, subscribers, and Assam dealer status.</p>

        <?php if ($error): ?>
        <div class="bg-[#fff2f4] border border-[#ff3b30]/20 text-[#d70015] text-xs rounded-xl p-3 mb-4">
            <?= e($error) ?>
        </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <?= csrf_field() ?>
            <div>
                <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Email</label>
                <input type="email" name="email" required value="admin@getradecom.com"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
            </div>
            <div>
                <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Password</label>
                <input type="password" name="password" required placeholder="Enter password"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
            </div>
            <button type="submit" class="w-full py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition cursor-pointer">
                Sign In
            </button>
        </form>

        <div class="mt-6 pt-4 border-t border-black/[0.06] flex justify-between items-center text-[11px] text-[#6e6e73]">
            <span>Demo: admin@getradecom.com / Admin@123</span>
            <a href="../index.php" class="text-[#0071e3] hover:underline">&larr; Back to Site</a>
        </div>
    </div>
</body>
</html>
