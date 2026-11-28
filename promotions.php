<?php
require_once 'config/db.php';
$page_title = 'Approved Campaigns & Product Launches';
require_once 'includes/header.php';

$campaigns = [];
try {
    $stmt = $pdo->query("SELECT * FROM campaigns WHERE is_active = 1 ORDER BY start_date DESC, id ASC");
    $campaigns = $stmt->fetchAll();
} catch (Throwable $e) {
    $campaigns = [];
}

$flash = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
?>

<?php if ($flash): ?>
<div class="bg-[#f5f5f7] border-b border-[#d2d2d7] text-[#1d1d1f] text-[13px] py-3 px-4 text-center font-medium">
    <span class="inline-block w-2 h-2 rounded-full bg-[#30d158] mr-2"></span><?= e($flash) ?>
</div>
<?php endif; ?>

<section class="hero-light-stage border-b border-black/[0.06] py-14">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">GE Tradecom Assam &middot; Campaigns</span>
        <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1">Approved Campaigns &amp; Launches</h1>
        <p class="text-[#6e6e73] text-[15px] sm:text-[17px] mt-2 max-w-2xl">
            Official channel campaigns, product launch briefings, and partner-backed initiatives active across Assam with transparent validity dates and terms.
        </p>
    </div>
</section>

<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14">
    <?php if (empty($campaigns)): ?>
        <div class="bg-[#f5f5f7] border border-black/[0.05] rounded-[30px] p-12 text-center">
            <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mb-2">No active campaigns right now</h2>
            <p class="text-[14px] text-[#6e6e73] mb-6">Subscribe to launch updates or ask our specialist team about upcoming approved Assam programmes.</p>
            <button onclick="openEnquiryModal('specialist', 'Upcoming Assam Campaigns')" class="px-6 py-2.5 rounded-full bg-[#0071e3] text-white text-sm font-medium cursor-pointer">
                Enquire With Specialist
            </button>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($campaigns as $cp): ?>
            <article class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8 flex flex-col justify-between">
                <div>
                    <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                        <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3] bg-white px-3 py-1 rounded-full border border-black/[0.05]">
                            <?= e($cp['segment']) ?>
                        </span>
                        <span class="text-[11px] font-medium text-[#6e6e73]">
                            Valid <?= e(date('d M Y', strtotime($cp['start_date']))) ?> &ndash; <?= e(date('d M Y', strtotime($cp['end_date']))) ?>
                        </span>
                    </div>

                    <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mb-2"><?= e($cp['title']) ?></h2>
                    <p class="text-[14px] text-[#424245] leading-relaxed mb-4"><?= e($cp['summary']) ?></p>

                    <div class="bg-white/85 rounded-2xl p-4 border border-black/[0.04] text-[12px] space-y-2 mb-6">
                        <p><strong class="text-[#1d1d1f]">Eligible Lineup:</strong> <?= e($cp['eligible_products']) ?></p>
                        <p class="text-[#6e6e73]"><strong class="text-[#1d1d1f]">Terms:</strong> <?= e($cp['terms']) ?></p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button onclick="openEnquiryModal('specialist', 'Campaign: <?= e($cp['title']) ?>')"
                            class="btn-tactile px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition cursor-pointer">
                        Enquire About Campaign
                    </button>
                    <a href="about.php" class="btn-tactile px-5 py-2.5 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[13px] font-medium transition">
                        About GE Tradecom
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php require_once 'includes/footer.php'; ?>
