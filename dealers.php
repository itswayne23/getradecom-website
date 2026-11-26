<?php
require_once 'config/db.php';
$page_title = 'Assam Dealer Locator & Partner Onboarding';
require_once 'includes/header.php';

$district = trim($_GET['district'] ?? '');
$search = trim($_GET['q'] ?? '');

// Distinct districts for dropdown & quick pills
$dist_stmt = $pdo->query("SELECT DISTINCT district FROM dealers WHERE is_active = 1 AND is_verified = 1 ORDER BY district ASC");
$districts = $dist_stmt->fetchAll(PDO::FETCH_COLUMN);

$sql = "SELECT * FROM dealers WHERE is_active = 1 AND is_verified = 1";
$params = [];

if ($district !== '' && $district !== 'All') {
    $sql .= " AND district = :district";
    $params[':district'] = $district;
}

if ($search !== '') {
    $sql .= " AND (store_name LIKE :q1 OR town LIKE :q2 OR pin_code LIKE :q3 OR address LIKE :q4)";
    $like = '%' . $search . '%';
    $params[':q1'] = $like;
    $params[':q2'] = $like;
    $params[':q3'] = $like;
    $params[':q4'] = $like;
}

$sql .= " ORDER BY district ASC, store_name ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$dealers = $stmt->fetchAll();

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
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Assam Channel Network</span>
        <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1">Find a Verified Dealer in Assam</h1>
        <p class="text-[#6e6e73] text-[15px] sm:text-[17px] mt-2 max-w-2xl">
            Search by district, town, store name, or PIN code to view verified partner details, opening hours, outlet pickup/delivery support, and map directions.
        </p>

        <!-- Apple Retail Style Search Bar -->
        <form method="GET" action="dealers.php" class="mt-8 bg-white border border-[#d2d2d7]/80 rounded-[26px] p-4 sm:p-5 shadow-sm grid grid-cols-1 md:grid-cols-12 gap-3">
            <div class="md:col-span-4">
                <label class="block text-[10px] font-semibold uppercase tracking-wider text-[#86868b] mb-1.5">District</label>
                <select name="district" class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm bg-[#f5f5f7] focus:bg-white focus:outline-none focus:border-[#0071e3]">
                    <option value="All">All Assam Districts</option>
                    <?php foreach ($districts as $d): ?>
                    <option value="<?= e($d) ?>" <?= $district === $d ? 'selected' : '' ?>><?= e($d) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="md:col-span-5">
                <label class="block text-[10px] font-semibold uppercase tracking-wider text-[#86868b] mb-1.5">Town, Store Name, or PIN Code</label>
                <input type="text" name="q" value="<?= e($search) ?>" placeholder="e.g. Guwahati, Nagaon, 781005, Dibrugarh..."
                       class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm bg-[#f5f5f7] focus:bg-white focus:outline-none focus:border-[#0071e3]">
            </div>

            <div class="md:col-span-3 flex items-end gap-2">
                <button type="submit" class="btn-tactile flex-1 py-2.5 px-5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition cursor-pointer">
                    Search Dealers
                </button>
                <?php if ($district !== '' || $search !== ''): ?>
                <a href="dealers.php" class="py-2.5 px-4 rounded-full border border-[#d2d2d7] text-xs font-medium text-[#424245] hover:bg-[#f5f5f7] transition">
                    Clear
                </a>
                <?php endif; ?>
            </div>
        </form>

        <!-- Quick District Pills -->
        <?php if (!empty($districts)): ?>
        <div class="flex gap-2 overflow-x-auto no-scrollbar pt-5 pb-1">
            <a href="dealers.php"
               class="px-3.5 py-1.5 rounded-full text-xs font-medium whitespace-nowrap transition <?= ($district === '' || $district === 'All') ? 'bg-[#1d1d1f] text-white' : 'bg-white text-[#424245] border border-[#d2d2d7] hover:border-[#1d1d1f]' ?>">
                All Districts
            </a>
            <?php foreach ($districts as $d): ?>
            <a href="dealers.php?district=<?= urlencode($d) ?>"
               class="px-3.5 py-1.5 rounded-full text-xs font-medium whitespace-nowrap transition <?= $district === $d ? 'bg-[#1d1d1f] text-white' : 'bg-white text-[#424245] border border-[#d2d2d7] hover:border-[#1d1d1f]' ?>">
                <?= e($d) ?>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14">
    <div class="flex flex-wrap items-center justify-between gap-3 mb-7">
        <p class="text-[14px] text-[#6e6e73]">
            Showing <strong class="text-[#1d1d1f] font-semibold"><?= count($dealers) ?></strong> verified listing(s) in Assam
        </p>
        <span class="text-[11px] bg-[#f5f5f7] text-[#6e6e73] border border-black/[0.06] px-3.5 py-1.5 rounded-full">
            Only verified partner outlets approved for public display are shown
        </span>
    </div>

    <?php if (empty($dealers)): ?>
        <div class="bg-[#f5f5f7] border border-black/[0.05] rounded-[30px] p-12 text-center">
            <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mb-2">No dealers matched your search</h2>
            <p class="text-[14px] text-[#6e6e73] mb-6">Try another PIN code or district, or ask our team to connect you with a nearby partner.</p>
            <button onclick="openEnquiryModal('specialist', 'Dealer Availability in Assam')" class="px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition cursor-pointer">
                Ask a Specialist
            </button>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($dealers as $dl):
                $pickup = !empty($dl['supports_pickup']);
                $delivery = !empty($dl['supports_delivery']);
            ?>
            <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-7 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="text-[11px] font-semibold text-[#0071e3] bg-white px-3 py-1 rounded-full border border-black/[0.05]">
                            <?= e($dl['district']) ?> &middot; <?= e($dl['pin_code']) ?>
                        </span>
                        <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-[#1d1d1f] bg-white px-2.5 py-1 rounded-full border border-black/[0.05]">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#30d158]"></span>
                            Verified
                        </span>
                    </div>

                    <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mb-0.5"><?= e($dl['store_name']) ?></h2>
                    <p class="text-[12px] font-medium text-[#6e6e73] mb-3"><?= e($dl['town']) ?>, Assam</p>

                    <div class="flex flex-wrap gap-1.5 mb-4">
                        <?php if ($pickup): ?>
                        <span class="text-[10px] font-semibold bg-white text-[#1d1d1f] px-2.5 py-0.5 rounded-full border border-black/[0.06]">Store Pickup</span>
                        <?php endif; ?>
                        <?php if ($delivery): ?>
                        <span class="text-[10px] font-semibold bg-white text-[#0071e3] px-2.5 py-0.5 rounded-full border border-[#0071e3]/20">Local Delivery</span>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-2 text-[12px] text-[#424245] bg-white/85 rounded-2xl p-4 border border-black/[0.04] mb-5">
                        <p><strong class="text-[#1d1d1f]">Address:</strong> <?= e($dl['address']) ?></p>
                        <p><strong class="text-[#1d1d1f]">Phone:</strong> <?= e($dl['phone']) ?></p>
                        <?php if (!empty($dl['email'])): ?>
                        <p><strong class="text-[#1d1d1f]">Email:</strong> <?= e($dl['email']) ?></p>
                        <?php endif; ?>
                        <p><strong class="text-[#1d1d1f]">Hours:</strong> <?= e($dl['opening_hours']) ?></p>
                        <p><strong class="text-[#1d1d1f]">Categories:</strong> <?= e($dl['categories_handled']) ?></p>
                    </div>
                </div>

                <div class="flex items-center gap-2.5 pt-1">
                    <a href="tel:<?= e(preg_replace('/\s+/', '', $dl['phone'])) ?>"
                       class="btn-tactile flex-1 text-center py-2.5 px-4 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[12px] font-medium transition">
                        Call Outlet
                    </a>
                    <?php if (!empty($dl['map_url'])): ?>
                    <a href="<?= e($dl['map_url']) ?>" target="_blank" rel="noopener"
                       class="btn-tactile flex-1 text-center py-2.5 px-4 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[12px] font-medium transition">
                        Directions
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Dealer Partner Onboarding Journey -->
    <div id="partner-onboarding" class="reveal-card mt-16 bg-[#161617] text-white rounded-[32px] p-9 sm:p-12 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
        <div class="max-w-2xl">
            <span class="text-[11px] font-semibold uppercase tracking-widest text-[#2997ff]">Channel Expansion &middot; Assam</span>
            <h2 class="font-display text-3xl font-semibold tracking-tight mt-1.5 mb-2">Become an Authorised Assam Channel Partner</h2>
            <p class="text-[#a1a1a6] text-[14px] leading-relaxed">
                Register interest to join the GE Tradecom Pvt Ltd Assam dealer network. Our channel team reviews submitted business details, verifies outlet readiness, and enables approved partners with campaigns and training.
            </p>
        </div>
        <button type="button" onclick="openEnquiryModal('dealer_onboarding', 'Assam Dealer Partner Registration')"
                class="btn-tactile shrink-0 px-7 py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[14px] font-medium transition cursor-pointer">
            Register Dealer Interest
        </button>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
