<?php
require_once 'config/db.php';
$page_title = 'Workshops & Training Sessions';
require_once 'includes/header.php';

$city_filter = trim($_GET['city'] ?? '');
$sql = "SELECT * FROM workshops WHERE is_active = 1";
$params = [];
if ($city_filter !== '' && $city_filter !== 'All') {
    $sql .= " AND city = :city";
    $params[':city'] = $city_filter;
}
$sql .= " ORDER BY session_date ASC, id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$workshops = $stmt->fetchAll();

$cities = $pdo->query("SELECT DISTINCT city FROM workshops WHERE is_active = 1 ORDER BY city ASC")->fetchAll(PDO::FETCH_COLUMN);

$flash = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
?>

<?php if ($flash): ?>
<div class="bg-[#f5f5f7] border-b border-[#d2d2d7] text-[#1d1d1f] text-[13px] py-3 px-4 text-center font-medium">
    <span class="inline-block w-2 h-2 rounded-full bg-[#30d158] mr-2"></span><?= e($flash) ?>
</div>
<?php endif; ?>

<!-- Today at Apple Inspired Hero -->
<section class="hero-light-stage border-b border-black/[0.06] py-14">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Learning &amp; Channel Enablement</span>
        <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1">Workshops &amp; Training</h1>
        <p class="text-[#6e6e73] text-[15px] sm:text-[17px] mt-2 max-w-2xl">
            Explore scheduled public sessions and dealer enablement workshops across Assam cities, check seat capacity, and reserve your spot.
        </p>

        <?php if (!empty($cities)): ?>
        <div id="city-filter-bar" class="flex gap-2 overflow-x-auto no-scrollbar pt-7 pb-1">
            <a href="workshops.php" class="px-4 py-1.5 rounded-full text-xs font-medium whitespace-nowrap transition <?= ($city_filter === '' || $city_filter === 'All') ? 'bg-[#1d1d1f] text-white' : 'bg-white text-[#424245] border border-[#d2d2d7]' ?>">
                All Cities
            </a>
            <?php foreach ($cities as $c): ?>
            <a href="workshops.php?city=<?= urlencode($c) ?>" class="px-4 py-1.5 rounded-full text-xs font-medium whitespace-nowrap transition <?= $city_filter === $c ? 'bg-[#1d1d1f] text-white' : 'bg-white text-[#424245] border border-[#d2d2d7]' ?>">
                <?= e($c) ?>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14">
    <?php if (empty($workshops)): ?>
        <div class="bg-[#f5f5f7] border border-black/[0.05] rounded-[30px] p-12 text-center">
            <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mb-2">No active workshops scheduled right now</h2>
            <p class="text-[14px] text-[#6e6e73] mb-6">Reach out to our team if you’d like to be notified about upcoming training sessions in Assam.</p>
            <button onclick="openEnquiryModal('workshop', 'Upcoming Workshop Notification')" class="px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition cursor-pointer">
                Request Session Updates
            </button>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($workshops as $ws):
                $total = max(1, (int)$ws['seats_total']);
                $booked = max(0, (int)$ws['seats_booked']);
                $remaining = max(0, $total - $booked);
                $pct = min(100, (int)round(($booked / $total) * 100));
            ?>
            <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-7 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="text-[11px] font-semibold text-[#0071e3] bg-white px-3 py-1 rounded-full border border-black/[0.05]">
                            <?= e($ws['city']) ?>
                        </span>
                        <span class="text-[11px] font-semibold <?= $remaining > 0 ? 'text-[#1d1d1f] bg-white' : 'text-[#ff3b30] bg-white' ?> px-3 py-1 rounded-full border border-black/[0.05]">
                            <?= $remaining > 0 ? $remaining . ' seats left' : 'Full' ?>
                        </span>
                    </div>

                    <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mb-1"><?= e($ws['title']) ?></h2>
                    <?php if (!empty($ws['topic'])): ?>
                    <p class="text-[12px] font-medium text-[#0071e3] mb-4"><?= e($ws['topic']) ?></p>
                    <?php endif; ?>

                    <div class="space-y-2 text-[12px] text-[#424245] bg-white/85 rounded-2xl p-4 border border-black/[0.04] mb-4">
                        <p><strong class="text-[#1d1d1f]">Venue:</strong> <?= e($ws['venue']) ?></p>
                        <?php if (!empty($ws['trainer'])): ?>
                        <p><strong class="text-[#1d1d1f]">Trainer:</strong> <?= e($ws['trainer']) ?></p>
                        <?php endif; ?>
                        <p><strong class="text-[#1d1d1f]">Date:</strong> <?= e(date('d M Y', strtotime($ws['session_date']))) ?></p>
                        <p><strong class="text-[#1d1d1f]">Time:</strong> <?= e($ws['session_time']) ?></p>
                    </div>

                    <div class="mb-6">
                        <div class="w-full h-1.5 rounded-full bg-black/10 overflow-hidden">
                            <div class="h-full rounded-full <?= $remaining > 0 ? 'bg-[#0071e3]' : 'bg-[#ff3b30]' ?>" style="width: <?= $pct ?>%"></div>
                        </div>
                    </div>
                </div>

                <?php if ($remaining > 0): ?>
                <button onclick="openEnquiryModal('workshop', 'Workshop: <?= e($ws['title']) ?> (<?= e($ws['city']) ?>)', <?= (int)$ws['id'] ?>)"
                        class="btn-tactile w-full py-2.5 px-4 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition cursor-pointer">
                    Register for Session
                </button>
                <?php else: ?>
                <button disabled class="w-full py-2.5 px-4 rounded-full bg-black/[0.06] text-[#86868b] text-[13px] font-medium cursor-not-allowed">
                    Session Full
                </button>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php require_once 'includes/footer.php'; ?>
