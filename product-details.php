<?php
require_once 'config/db.php';

$slug = trim($_GET['slug'] ?? '');
$stmt = $pdo->prepare("SELECT * FROM products WHERE slug = :slug AND is_active = 1 LIMIT 1");
$stmt->execute([':slug' => $slug]);
$product = $stmt->fetch();

if (!$product) {
    $page_title = 'Product Not Found';
    require_once 'includes/header.php';
    echo '<div class="max-w-4xl mx-auto px-4 py-24 text-center"><h1 class="font-display text-3xl font-semibold text-[#1d1d1f] mb-3">Product not found</h1><p class="text-sm text-[#6e6e73] mb-6">The requested Apple product could not be found in the active catalogue.</p><a href="products.php" class="inline-block px-6 py-2.5 rounded-full bg-[#0071e3] text-white text-sm font-medium">Back to Products</a></div>';
    require_once 'includes/footer.php';
    exit;
}

$page_title = $product['name'] . ' — Specifications & Enquiry';
require_once 'includes/header.php';

$rel_stmt = $pdo->prepare("SELECT * FROM products WHERE category = :cat AND id != :id AND is_active = 1 LIMIT 3");
$rel_stmt->execute([':cat' => $product['category'], ':id' => $product['id']]);
$related = $rel_stmt->fetchAll();

$specs_list = array_filter(array_map('trim', explode('|', $product['key_specs'] ?? '')));
$finishes = array_filter(array_map('trim', explode(',', $product['colors'] ?? '')));
?>

<section class="max-w-[1100px] mx-auto px-4 sm:px-6 py-12">
    <!-- Apple Breadcrumb -->
    <nav class="text-[12px] text-[#6e6e73] mb-8 flex items-center gap-2">
        <a href="index.php" class="hover:text-[#0071e3] transition">Portfolio</a>
        <span>/</span>
        <a href="products.php" class="hover:text-[#0071e3] transition">Products</a>
        <span>/</span>
        <a href="products.php?category=<?= urlencode($product['category']) ?>" class="hover:text-[#0071e3] transition"><?= e($product['category']) ?></a>
        <span>/</span>
        <span class="text-[#1d1d1f] font-medium"><?= e($product['name']) ?></span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
        <!-- Sticky Hardware Showcase Stage -->
        <div class="lg:col-span-5 lg:sticky lg:top-20">
            <div data-tilt-stage class="tilt-stage hardware-stage bg-[#f5f5f7] border border-black/[0.04] rounded-[32px] p-10 text-center flex flex-col items-center justify-center min-h-[360px]">
                <div class="mb-6">
                    <?= render_product_visual($product['category']) ?>
                </div>
                <?php if (!empty($finishes)): ?>
                <div class="mt-4 pt-5 border-t border-black/[0.06] w-full">
                    <div class="text-[11px] font-semibold uppercase tracking-wider text-[#86868b] mb-3">
                        Finish: <span id="selected-finish-label" class="text-[#1d1d1f]"><?= e($finishes[0]) ?></span>
                    </div>
                    <div class="flex flex-wrap justify-center gap-2.5">
                        <?php foreach ($finishes as $idx => $fin):
                            $hex = get_finish_hex($fin);
                        ?>
                        <button type="button"
                                onclick="selectProductFinish('<?= e($fin) ?>', this)"
                                title="<?= e($fin) ?>"
                                class="finish-dot w-7 h-7 rounded-full border-2 transition cursor-pointer <?= $idx === 0 ? 'border-[#0071e3] scale-110' : 'border-black/15 hover:scale-105' ?>"
                                style="background-color: <?= e($hex) ?>">
                        </button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Product Overview & Enquiry Panel -->
        <div class="lg:col-span-7 space-y-8">
            <div>
                <div class="inline-flex items-center gap-2 mb-3">
                    <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3] bg-[#0071e3]/10 px-3 py-1 rounded-full">
                        <?= e($product['category']) ?>
                    </span>
                    <?php if (!empty($product['badge'])): ?>
                    <span class="text-[11px] font-semibold uppercase tracking-wider bg-[#1d1d1f] text-white px-3 py-1 rounded-full">
                        <?= e($product['badge']) ?>
                    </span>
                    <?php endif; ?>
                </div>

                <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mb-3"><?= e($product['name']) ?></h1>
                <p class="text-[19px] text-[#424245] leading-snug mb-4"><?= e($product['tagline']) ?></p>
                <p class="text-[14px] text-[#6e6e73] leading-relaxed"><?= e($product['description']) ?></p>
            </div>

            <?php if (!empty($specs_list)): ?>
            <div>
                <h2 class="text-[11px] font-semibold uppercase tracking-widest text-[#86868b] mb-3">Key Highlights &amp; Specifications</h2>
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <?php foreach ($specs_list as $spec): ?>
                    <li class="bg-[#f5f5f7] border border-black/[0.04] rounded-2xl px-4 py-3.5 text-[14px] font-medium text-[#1d1d1f]">
                        <?= e($spec) ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <!-- Channel Action Card -->
            <div class="bg-[#fbfbfd] border border-[#d2d2d7]/80 rounded-[28px] p-7 space-y-4">
                <h2 class="font-display text-xl font-semibold text-[#1d1d1f]">Interested in <?= e($product['name']) ?>?</h2>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">
                    Connect with GE Tradecom specialists for Assam partner stock updates, configuration alerts, or business deployment enquiries.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 pt-1">
                    <button id="product-enquire-btn"
                            onclick="openEnquiryModal('product', getSelectedProductLabel())"
                            class="btn-tactile flex-1 py-3 px-5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition cursor-pointer">
                        Request Product Enquiry
                    </button>
                    <button onclick="openEnquiryModal('stock_notify', getSelectedProductLabel())"
                            class="btn-tactile flex-1 py-3 px-5 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[13px] font-medium transition cursor-pointer">
                        Notify Stock Availability
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <a href="dealers.php"
                       class="block text-center py-2.5 px-5 rounded-full bg-[#f5f5f7] hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[12px] font-medium transition">
                        Find Assam Dealers
                    </a>
                    <a href="business.php"
                       class="block text-center py-2.5 px-5 rounded-full bg-[#1d1d1f]/[0.04] hover:bg-[#1d1d1f]/[0.08] text-[#0071e3] text-[12px] font-medium transition">
                        Bulk / Business Enquiry &rarr;
                    </a>
                </div>

                <p class="text-[11px] text-[#86868b] pt-2 border-t border-black/[0.06]">
                    Stock, pickup/delivery, and trade-in availability vary by verified participating partner outlet in Assam.
                </p>
            </div>
        </div>
    </div>

    <?php if (!empty($related)): ?>
    <div class="mt-20 pt-12 border-t border-black/[0.08]">
        <h2 class="font-display text-2xl sm:text-3xl font-semibold tracking-tight text-[#1d1d1f] mb-6">More in <?= e($product['category']) ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($related as $item): ?>
            <a href="product-details.php?slug=<?= urlencode($item['slug']) ?>" class="motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[26px] p-6 block">
                <div class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3] mb-1"><?= e($item['category']) ?></div>
                <h3 class="font-display text-xl font-semibold text-[#1d1d1f] mb-1"><?= e($item['name']) ?></h3>
                <p class="text-[13px] text-[#6e6e73]"><?= e($item['tagline']) ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</section>

<script>
let activeProductFinish = <?= json_encode($finishes[0] ?? '') ?>;
const baseProductName = <?= json_encode($product['name']) ?>;

function selectProductFinish(finish, btn) {
    activeProductFinish = finish;
    const label = document.getElementById('selected-finish-label');
    if (label) label.textContent = finish;
    document.querySelectorAll('.finish-dot').forEach(el => {
        el.classList.remove('border-[#0071e3]', 'scale-110');
        el.classList.add('border-black/15');
    });
    btn.classList.remove('border-black/15');
    btn.classList.add('border-[#0071e3]', 'scale-110');
}

function getSelectedProductLabel() {
    return activeProductFinish ? `${baseProductName} (${activeProductFinish})` : baseProductName;
}
</script>

<?php require_once 'includes/footer.php'; ?>
