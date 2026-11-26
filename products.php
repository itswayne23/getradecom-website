<?php
require_once 'config/db.php';
$page_title = 'Products Catalogue';
require_once 'includes/header.php';

$categories = ['All', 'iPhone', 'Mac', 'iPad', 'Watch', 'AirPods', 'TV & Home', 'Accessories'];
$selected_category = $_GET['category'] ?? 'All';
if (!in_array($selected_category, $categories, true)) {
    $selected_category = 'All';
}
$search = trim($_GET['q'] ?? '');

$sql = "SELECT * FROM products WHERE is_active = 1";
$params = [];

if ($selected_category !== 'All') {
    $sql .= " AND category = :category";
    $params[':category'] = $selected_category;
}

if ($search !== '') {
    $sql .= " AND (name LIKE :q OR tagline LIKE :q OR key_specs LIKE :q)";
    $params[':q'] = '%' . $search . '%';
}

$sql .= " ORDER BY is_featured DESC, id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();

$flash = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
?>

<?php if ($flash): ?>
<div class="bg-[#f5f5f7] border-b border-[#d2d2d7] text-[#1d1d1f] text-[13px] py-3 px-4 text-center font-medium">
    <span class="inline-block w-2 h-2 rounded-full bg-[#30d158] mr-2"></span><?= e($flash) ?>
</div>
<?php endif; ?>

<!-- Apple Store Catalogue Header -->
<section class="hero-light-stage border-b border-black/[0.06] py-14">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">getradeCom Channel Lineup</span>
                <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1">Products Catalogue</h1>
                <p class="text-[#6e6e73] text-[15px] sm:text-[17px] mt-2 max-w-2xl">
                    Browse specifications across Apple categories, submit a product enquiry, or locate a verified dealer in Assam.
                </p>
            </div>

            <!-- Search Input -->
            <form method="GET" action="products.php" class="flex items-center gap-2 w-full md:w-auto">
                <?php if ($selected_category !== 'All'): ?>
                    <input type="hidden" name="category" value="<?= e($selected_category) ?>">
                <?php endif; ?>
                <input type="text" name="q" value="<?= e($search) ?>" placeholder="Search model or spec..."
                       class="w-full md:w-64 px-4 py-2.5 rounded-full bg-white border border-[#d2d2d7] text-sm text-[#1d1d1f] focus:outline-none focus:border-[#0071e3]">
                <button type="submit" class="px-5 py-2.5 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-sm font-medium transition cursor-pointer">
                    Search
                </button>
            </form>
        </div>

        <!-- Category Filter Pills -->
        <div class="flex gap-2 overflow-x-auto no-scrollbar pt-8 pb-1">
            <?php foreach ($categories as $cat):
                $active = ($cat === $selected_category);
                $url = 'products.php?category=' . urlencode($cat) . ($search !== '' ? '&q=' . urlencode($search) : '');
            ?>
            <a href="<?= e($url) ?>"
               class="px-4 py-2 rounded-full text-[13px] font-medium whitespace-nowrap transition <?= $active ? 'bg-[#1d1d1f] text-white shadow-sm' : 'bg-white text-[#424245] border border-[#d2d2d7]/80 hover:border-[#1d1d1f]' ?>">
                <?= e($cat) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Product Grid -->
<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14">
    <?php if (empty($products)): ?>
        <div class="bg-[#f5f5f7] border border-black/[0.05] rounded-[30px] p-12 text-center">
            <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mb-2">No matching products found</h2>
            <p class="text-[14px] text-[#6e6e73] mb-6">Try clearing your search filter or ask a getradeCom specialist for assistance.</p>
            <a href="products.php" class="inline-block px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition">Reset Filters</a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($products as $p): ?>
            <article class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-7 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3] bg-white px-3 py-1 rounded-full border border-black/[0.05]">
                            <?= e($p['category']) ?>
                        </span>
                        <?php if (!empty($p['badge'])): ?>
                        <span class="text-[10px] font-semibold uppercase tracking-wider bg-[#1d1d1f] text-white px-2.5 py-1 rounded-full">
                            <?= e($p['badge']) ?>
                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="py-4 mb-5 flex items-center justify-center min-h-[160px]">
                        <?= render_product_visual($p['category']) ?>
                    </div>

                    <h2 class="font-display text-2xl font-semibold tracking-tight text-[#1d1d1f] mb-1"><?= e($p['name']) ?></h2>
                    <p class="text-[14px] font-medium text-[#424245] mb-2.5"><?= e($p['tagline']) ?></p>
                    <p class="text-[13px] text-[#6e6e73] leading-relaxed mb-4"><?= e($p['description']) ?></p>

                    <div class="bg-white/90 border border-black/[0.05] rounded-2xl p-4 mb-4">
                        <div class="text-[10px] font-semibold uppercase tracking-wider text-[#86868b] mb-1">Key Specifications</div>
                        <div class="text-[12px] text-[#1d1d1f] leading-relaxed"><?= e($p['key_specs']) ?></div>
                    </div>

                    <?php if (!empty($p['colors'])): ?>
                    <div class="mb-6">
                        <div class="text-[10px] font-semibold uppercase tracking-wider text-[#86868b] mb-2">Finishes</div>
                        <?= render_color_swatches($p['colors'], true) ?>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="flex items-center gap-2 pt-3 border-t border-black/[0.06]">
                    <button onclick="openEnquiryModal('product', '<?= e($p['name']) ?>')"
                            class="flex-1 py-2.5 px-4 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[12px] font-medium transition cursor-pointer">
                        Enquire Now
                    </button>
                    <a href="product-details.php?slug=<?= urlencode($p['slug']) ?>"
                       class="py-2.5 px-4 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[12px] font-medium transition">
                        Details
                    </a>
                    <a href="dealers.php"
                       class="py-2.5 px-3.5 rounded-full border border-[#d2d2d7] hover:border-[#0071e3] bg-white text-[#1d1d1f] text-[12px] font-medium transition">
                        Dealers
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php require_once 'includes/footer.php'; ?>
