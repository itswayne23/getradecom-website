<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/site.php';

if (empty($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

// Handle POST actions (update enquiry status or toggle dealer active state)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        $admin_action = $_POST['admin_action'] ?? '';

        if ($admin_action === 'update_status') {
            $id = (int)($_POST['enquiry_id'] ?? 0);
            $status = $_POST['status'] ?? 'new';
            $allowed = ['new', 'contacted', 'routed', 'closed'];
            if ($id > 0 && in_array($status, $allowed, true)) {
                $stmt = $pdo->prepare("UPDATE enquiries SET status = :status WHERE id = :id");
                $stmt->execute([':status' => $status, ':id' => $id]);
            }
        } elseif ($admin_action === 'toggle_dealer') {
            $id = (int)($_POST['dealer_id'] ?? 0);
            if ($id > 0) {
                $stmt = $pdo->prepare("UPDATE dealers SET is_active = IF(is_active = 1, 0, 1) WHERE id = :id");
                $stmt->execute([':id' => $id]);
            }
        }
    }
    header('Location: index.php');
    exit;
}

$enquiries = $pdo->query("SELECT * FROM enquiries ORDER BY created_at DESC")->fetchAll();
$dealers = $pdo->query("SELECT * FROM dealers ORDER BY district ASC, id ASC")->fetchAll();
$sub_count = (int)$pdo->query("SELECT COUNT(*) FROM subscribers")->fetchColumn();
$prod_count = (int)$pdo->query("SELECT COUNT(*) FROM products WHERE is_active = 1")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | <?= e(SITE_NAME) ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body class="bg-[#f5f5f7] text-[#1d1d1f] min-h-screen">
    <header class="glass-nav border-b border-black/[0.08] sticky top-0 z-30">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 h-14 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <span class="font-display font-semibold text-lg tracking-tight">getradeCom Admin</span>
                <span class="text-[11px] bg-[#0071e3]/10 text-[#0071e3] px-2.5 py-0.5 rounded-full font-semibold">Assam Operations</span>
            </div>
            <div class="flex items-center gap-4 text-xs">
                <a href="../index.php" target="_blank" class="text-[#0071e3] hover:underline font-medium">View Live Website &nearr;</a>
                <span class="text-[#6e6e73] hidden sm:inline"><?= e($_SESSION['admin_name'] ?? 'Admin') ?></span>
                <a href="?logout=1" class="px-3.5 py-1.5 rounded-full bg-black/[0.06] hover:bg-black/[0.1] text-[#1d1d1f] font-medium transition">Logout</a>
            </div>
        </div>
    </header>

    <main class="max-w-[1200px] mx-auto px-4 sm:px-6 py-10 space-y-8">
        <!-- KPI Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white border border-black/[0.05] rounded-[24px] p-6">
                <div class="text-[12px] text-[#6e6e73]">Total Enquiries</div>
                <div class="font-display text-3xl font-semibold mt-1"><?= count($enquiries) ?></div>
            </div>
            <div class="bg-white border border-black/[0.05] rounded-[24px] p-6">
                <div class="text-[12px] text-[#6e6e73]">Assam Dealers</div>
                <div class="font-display text-3xl font-semibold mt-1"><?= count($dealers) ?></div>
            </div>
            <div class="bg-white border border-black/[0.05] rounded-[24px] p-6">
                <div class="text-[12px] text-[#6e6e73]">Active Products</div>
                <div class="font-display text-3xl font-semibold mt-1"><?= $prod_count ?></div>
            </div>
            <div class="bg-white border border-black/[0.05] rounded-[24px] p-6">
                <div class="text-[12px] text-[#6e6e73]">Newsletter Subscribers</div>
                <div class="font-display text-3xl font-semibold mt-1"><?= $sub_count ?></div>
            </div>
        </div>

        <!-- Enquiries Table -->
        <section class="bg-white border border-black/[0.05] rounded-[28px] p-7 overflow-x-auto">
            <h2 class="font-display text-xl font-semibold mb-4">Customer, Specialist &amp; Business Enquiries</h2>
            <?php if (empty($enquiries)): ?>
                <p class="text-sm text-[#6e6e73] py-6">No enquiries submitted yet. Test a form on the website to see entries appear here.</p>
            <?php else: ?>
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-black/[0.08] text-[#86868b] uppercase">
                            <th class="py-3 pr-4">Type</th>
                            <th class="py-3 pr-4">Contact</th>
                            <th class="py-3 pr-4">District / Org</th>
                            <th class="py-3 pr-4">Interest / Notes</th>
                            <th class="py-3 pr-4">Date</th>
                            <th class="py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/[0.05]">
                        <?php foreach ($enquiries as $enq): ?>
                        <tr>
                            <td class="py-3.5 pr-4 font-semibold uppercase text-[#0071e3]"><?= e($enq['enquiry_type']) ?></td>
                            <td class="py-3.5 pr-4">
                                <div class="font-semibold text-[#1d1d1f]"><?= e($enq['full_name']) ?></div>
                                <div class="text-[#6e6e73]"><?= e($enq['phone']) ?> &middot; <?= e($enq['email']) ?></div>
                            </td>
                            <td class="py-3.5 pr-4">
                                <div><?= e($enq['district'] ?? '-') ?></div>
                                <?php if (!empty($enq['company_name'])): ?>
                                <div class="text-[#6e6e73]"><?= e($enq['company_name']) ?> (Qty: <?= (int)$enq['quantity'] ?>)</div>
                                <?php endif; ?>
                            </td>
                            <td class="py-3.5 pr-4 max-w-xs">
                                <?php if (!empty($enq['product_interest'])): ?>
                                <div class="font-medium text-[#1d1d1f]"><?= e($enq['product_interest']) ?></div>
                                <?php endif; ?>
                                <div class="text-[#6e6e73] truncate"><?= e($enq['message'] ?? '') ?></div>
                            </td>
                            <td class="py-3.5 pr-4 whitespace-nowrap text-[#6e6e73]"><?= e(date('d M, H:i', strtotime($enq['created_at']))) ?></td>
                            <td class="py-3.5 whitespace-nowrap">
                                <form method="POST" class="inline-flex items-center gap-1">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="admin_action" value="update_status">
                                    <input type="hidden" name="enquiry_id" value="<?= (int)$enq['id'] ?>">
                                    <select name="status" onchange="this.form.submit()" class="px-2.5 py-1 rounded-lg border border-[#d2d2d7] bg-white text-xs">
                                        <?php foreach (['new','contacted','routed','closed'] as $st): ?>
                                        <option value="<?= $st ?>" <?= $enq['status'] === $st ? 'selected' : '' ?>><?= ucfirst($st) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>

        <!-- Assam Dealers Publication Control -->
        <section class="bg-white border border-black/[0.05] rounded-[28px] p-7 overflow-x-auto">
            <h2 class="font-display text-xl font-semibold mb-4">Assam Dealer Listings (Publication Control)</h2>
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="border-b border-black/[0.08] text-[#86868b] uppercase">
                        <th class="py-3 pr-4">Store Name</th>
                        <th class="py-3 pr-4">District &amp; PIN</th>
                        <th class="py-3 pr-4">Phone</th>
                        <th class="py-3 pr-4">Visibility</th>
                        <th class="py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/[0.05]">
                    <?php foreach ($dealers as $dl): ?>
                    <tr>
                        <td class="py-3.5 pr-4 font-semibold text-[#1d1d1f]"><?= e($dl['store_name']) ?></td>
                        <td class="py-3.5 pr-4"><?= e($dl['district']) ?> &mdash; <?= e($dl['pin_code']) ?></td>
                        <td class="py-3.5 pr-4"><?= e($dl['phone']) ?></td>
                        <td class="py-3.5 pr-4">
                            <?php if ($dl['is_active']): ?>
                            <span class="px-2.5 py-0.5 rounded-full bg-[#e9f9ee] text-[#1f7a3e] font-semibold">Published</span>
                            <?php else: ?>
                            <span class="px-2.5 py-0.5 rounded-full bg-[#f5f5f7] text-[#6e6e73] font-semibold">Hidden</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-3.5">
                            <form method="POST" class="inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="admin_action" value="toggle_dealer">
                                <input type="hidden" name="dealer_id" value="<?= (int)$dl['id'] ?>">
                                <button type="submit" class="px-3.5 py-1 rounded-full border border-[#d2d2d7] hover:bg-[#f5f5f7] font-medium cursor-pointer transition">
                                    <?= $dl['is_active'] ? 'Hide' : 'Publish' ?>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
