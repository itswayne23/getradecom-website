<?php
require_once 'config/db.php';
$page_title = 'Product Portfolio & Compare';
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

<!-- Portfolio Catalogue Header -->
<section class="hero-light-stage border-b border-black/[0.06] py-14">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">GE Tradecom Portfolio Lineup</span>
                <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1">Products &amp; Compare</h1>
                <p class="text-[#6e6e73] text-[15px] sm:text-[17px] mt-2 max-w-2xl">
                    Browse specifications across Apple categories, compare up to 3 models side by side, register for stock notifications, or locate a verified Assam dealer.
                </p>
            </div>

            <!-- Search Input -->
            <form method="GET" action="products.php" class="flex items-center gap-2 w-full md:w-auto">
                <?php if ($selected_category !== 'All'): ?>
                    <input type="hidden" name="category" value="<?= e($selected_category) ?>">
                <?php endif; ?>
                <input type="text" name="q" value="<?= e($search) ?>" placeholder="Search model or spec..."
                       class="w-full md:w-64 px-4 py-2.5 rounded-full bg-white border border-[#d2d2d7] text-sm text-[#1d1d1f] focus:outline-none focus:border-[#0071e3]">
                <button type="submit" class="btn-tactile px-5 py-2.5 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-sm font-medium transition cursor-pointer">
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
            <p class="text-[14px] text-[#6e6e73] mb-6">Try clearing your search filter or ask a GE Tradecom specialist for assistance.</p>
            <a href="products.php" class="inline-block px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition">Reset Filters</a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($products as $p):
                $comparePayload = htmlspecialchars(json_encode([
                    'id' => (int)$p['id'],
                    'name' => $p['name'],
                    'slug' => $p['slug'],
                    'category' => $p['category'],
                    'tagline' => $p['tagline'],
                    'specs' => $p['key_specs'],
                    'colors' => $p['colors'],
                ]), ENT_QUOTES, 'UTF-8');
            ?>
            <article class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-7 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3] bg-white px-3 py-1 rounded-full border border-black/[0.05]">
                            <?= e($p['category']) ?>
                        </span>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick='toggleCompare(<?= $comparePayload ?>, this)'
                                    data-compare-id="<?= (int)$p['id'] ?>"
                                    class="compare-btn text-[11px] font-medium px-2.5 py-1 rounded-full bg-white border border-[#d2d2d7] text-[#424245] hover:border-[#0071e3] hover:text-[#0071e3] transition cursor-pointer">
                                + Compare
                            </button>
                            <?php if (!empty($p['badge'])): ?>
                            <span class="text-[10px] font-semibold uppercase tracking-wider bg-[#1d1d1f] text-white px-2.5 py-1 rounded-full">
                                <?= e($p['badge']) ?>
                            </span>
                            <?php endif; ?>
                        </div>
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
                            class="btn-tactile flex-1 py-2.5 px-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[12px] font-medium transition cursor-pointer">
                        Enquire
                    </button>
                    <button onclick="openEnquiryModal('stock_notify', '<?= e($p['name']) ?>')"
                            class="btn-tactile py-2.5 px-3 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[12px] font-medium transition cursor-pointer">
                        Notify Me
                    </button>
                    <a href="product-details.php?slug=<?= urlencode($p['slug']) ?>"
                       class="btn-tactile py-2.5 px-3.5 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[12px] font-medium transition">
                        Details
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<!-- Floating Compare Bar -->
<div id="compare-tray" class="fixed bottom-6 left-1/2 -translate-x-1/2 z-40 hidden">
    <div class="bg-[#161617]/95 backdrop-blur-xl text-white rounded-full px-5 py-2.5 shadow-2xl border border-white/15 flex items-center gap-4 text-xs">
        <span id="compare-count" class="font-medium">0 selected to compare</span>
        <button type="button" onclick="openCompareModal()" class="px-4 py-1.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white font-medium cursor-pointer transition">
            Compare Now
        </button>
        <button type="button" onclick="clearCompare()" class="text-[#a1a1a6] hover:text-white cursor-pointer">Clear</button>
    </div>
</div>

<!-- Side-by-Side Compare Modal -->
<div id="compare-modal" class="apple-modal-overlay fixed inset-0 z-50 hidden bg-black/45 flex items-center justify-center p-4">
    <div class="apple-modal-panel bg-white rounded-[28px] max-w-4xl w-full p-6 sm:p-8 shadow-2xl border border-black/5 relative max-h-[88vh] overflow-y-auto">
        <button onclick="closeCompareModal()" class="absolute top-5 right-5 w-8 h-8 rounded-full bg-[#f5f5f7] hover:bg-[#e8e8ed] flex items-center justify-center text-[#6e6e73] cursor-pointer" aria-label="Close comparison">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Portfolio Comparison</span>
        <h3 class="font-display text-2xl font-semibold text-[#1d1d1f] mt-1 mb-6">Compare Apple Models</h3>
        <div id="compare-table-wrap" class="overflow-x-auto"></div>
    </div>
</div>

<script>
let compareList = [];

function toggleCompare(item, btn) {
    const idx = compareList.findIndex(x => x.id === item.id);
    if (idx >= 0) {
        compareList.splice(idx, 1);
    } else {
        if (compareList.length >= 3) {
            compareList.shift();
        }
        compareList.push(item);
    }
    syncCompareUI();
}

function clearCompare() {
    compareList = [];
    syncCompareUI();
}

function syncCompareUI() {
    document.querySelectorAll('.compare-btn').forEach(btn => {
        const id = parseInt(btn.getAttribute('data-compare-id'), 10);
        const active = compareList.some(x => x.id === id);
        btn.textContent = active ? '✓ Comparing' : '+ Compare';
        btn.classList.toggle('bg-[#0071e3]', active);
        btn.classList.toggle('text-white', active);
        btn.classList.toggle('border-[#0071e3]', active);
        btn.classList.toggle('bg-white', !active);
        btn.classList.toggle('text-[#424245]', !active);
    });
    const tray = document.getElementById('compare-tray');
    const countEl = document.getElementById('compare-count');
    if (compareList.length > 0) {
        tray?.classList.remove('hidden');
        if (countEl) countEl.textContent = `${compareList.length} of 3 selected to compare`;
    } else {
        tray?.classList.add('hidden');
    }
}

function openCompareModal() {
    const wrap = document.getElementById('compare-table-wrap');
    if (!wrap || compareList.length === 0) return;
    const cols = compareList.map(p => `
        <div class="bg-[#f5f5f7] rounded-2xl p-5 flex flex-col justify-between border border-black/[0.04]">
            <div>
                <div class="text-[10px] font-semibold uppercase tracking-wider text-[#0071e3] mb-1">${p.category}</div>
                <h4 class="font-display text-xl font-semibold text-[#1d1d1f] mb-1">${p.name}</h4>
                <p class="text-[12px] text-[#6e6e73] mb-4">${p.tagline || ''}</p>
                <div class="space-y-3 text-[12px] border-t border-black/[0.06] pt-3">
                    <div>
                        <div class="text-[10px] font-semibold uppercase text-[#86868b]">Specifications</div>
                        <div class="text-[#1d1d1f] mt-0.5 leading-relaxed">${p.specs || '-'}</div>
                    </div>
                    <div>
                        <div class="text-[10px] font-semibold uppercase text-[#86868b]">Finishes</div>
                        <div class="text-[#1d1d1f] mt-0.5">${p.colors || '-'}</div>
                    </div>
                </div>
            </div>
            <div class="pt-5 flex gap-2">
                <button onclick="closeCompareModal(); openEnquiryModal('product', '${p.name.replace(/'/g, "\\'")}')" class="flex-1 py-2 rounded-full bg-[#0071e3] text-white text-[12px] font-medium cursor-pointer">Enquire</button>
                <a href="product-details.php?slug=${encodeURIComponent(p.slug)}" class="py-2 px-4 rounded-full bg-white border border-[#d2d2d7] text-[#1d1d1f] text-[12px] font-medium">Specs</a>
            </div>
        </div>
    `).join('');
    wrap.innerHTML = `<div class="grid grid-cols-1 md:grid-cols-${compareList.length} gap-4">${cols}</div>`;
    showSpringModal(document.getElementById('compare-modal'));
}

function closeCompareModal() {
    hideSpringModal(document.getElementById('compare-modal'));
}
document.getElementById('compare-modal')?.addEventListener('click', (e) => {
    if (e.target.id === 'compare-modal') closeCompareModal();
});
</script>

<?php require_once 'includes/footer.php'; ?>
