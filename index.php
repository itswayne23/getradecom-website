<?php
require_once 'config/db.php';
$page_title = 'Home — Apple Product Discovery & Assam Dealer Network';
require_once 'includes/header.php';

// Fetch featured products from MySQL
$stmt = $pdo->query("SELECT * FROM products WHERE is_featured = 1 AND is_active = 1 ORDER BY id ASC LIMIT 6");
$featured_products = $stmt->fetchAll();

// Flash message after form submission
$flash = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
?>

<?php if ($flash): ?>
<div class="bg-[#f5f5f7] border-b border-[#d2d2d7] text-[#1d1d1f] text-[13px] py-3 px-4 text-center font-medium">
    <span class="inline-block w-2 h-2 rounded-full bg-[#30d158] mr-2"></span><?= e($flash) ?>
</div>
<?php endif; ?>

<!-- Hero 1: Official Apple-Grade Dark Titanium Stage with Interactive 3D Hardware Tilt -->
<section class="hero-titanium-glow text-white overflow-hidden border-b border-white/10">
    <div class="max-w-[1024px] mx-auto px-4 sm:px-6 pt-16 sm:pt-24 pb-14 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/[0.08] border border-white/15 text-[11px] font-medium tracking-wide text-[#f5f5f7] mb-5">
            <span class="w-1.5 h-1.5 rounded-full bg-[#2997ff] animate-pulse"></span>
            <span>Now Available Across Assam &middot; Authorised Channel</span>
        </div>

        <h1 class="font-display text-4xl sm:text-6xl lg:text-[72px] font-semibold tracking-tight leading-[1.04] mb-4">
            iPhone 17 Pro <span class="text-[#86868b] font-normal">&amp;</span> <span class="ai-gradient-text">Mac M4</span>
        </h1>

        <p class="text-[17px] sm:text-[21px] text-[#a1a1a6] font-normal max-w-2xl mx-auto leading-relaxed mb-8">
            Explore the latest Apple lineup, consult with product specialists, and connect with verified authorised dealers across Assam.
        </p>

        <div class="flex flex-wrap justify-center items-center gap-3.5 mb-14">
            <a href="products.php" class="btn-tactile px-7 py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white font-medium text-[15px] transition shadow-[0_6px_24px_rgba(0,113,227,0.35)]">
                Explore Products
            </a>
            <a href="dealers.php" class="btn-tactile px-7 py-3 rounded-full bg-transparent hover:bg-white/10 text-[#2997ff] border border-[#2997ff]/60 font-medium text-[15px] transition">
                Locate a Dealer in Assam
            </a>
            <button onclick="openEnquiryModal('specialist', 'General Product Consultation')" class="px-5 py-3 text-[15px] font-medium text-[#f5f5f7] hover:text-[#2997ff] apple-link-arrow transition cursor-pointer">
                <span>Talk to a Specialist</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

        <!-- Sculptural Interactive 3D-Tilt Hardware Duo Showcase -->
        <div data-tilt-stage class="tilt-stage hardware-stage relative max-w-3xl mx-auto pt-4 pb-2 flex flex-col sm:flex-row items-end justify-center gap-8 sm:gap-12">
            <!-- MacBook Pro M4 Architectural Silhouette -->
            <div class="animate-float-slow w-72 sm:w-88 mx-auto sm:mx-0">
                <div class="mx-auto w-64 sm:w-80 h-44 sm:h-52 rounded-t-2xl border-[4px] border-[#3a3a3f] bg-gradient-to-br from-[#0f1320] via-[#1c2942] to-[#08090d] shadow-[0_32px_80px_rgba(41,151,255,0.22)] relative flex flex-col items-center justify-between py-5 hardware-sheen">
                    <div class="w-7 h-2 bg-black rounded-b-md absolute top-0 left-1/2 -translate-x-1/2 border-x border-b border-white/10"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_60%_25%,rgba(41,151,255,0.48),transparent_55%),radial-gradient(circle_at_30%_75%,rgba(175,82,222,0.38),transparent_55%)]"></div>
                    <div class="relative z-10 my-auto text-center px-4">
                        <div class="text-[10px] uppercase tracking-[0.25em] text-[#2997ff] font-semibold mb-1">Apple Silicon</div>
                        <div class="font-display text-2xl sm:text-3xl font-semibold tracking-tight text-white">M4 Series</div>
                        <div class="text-[11px] text-white/60 mt-1">MacBook Air &amp; MacBook Pro</div>
                    </div>
                    <div class="relative z-10 flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/15">
                        <span class="w-2 h-2 rounded-full bg-[#2997ff]"></span>
                        <span class="w-2 h-2 rounded-full bg-[#30d158]"></span>
                        <span class="w-2 h-2 rounded-full bg-[#ff9f0a]"></span>
                        <span class="w-2 h-2 rounded-full bg-[#bf5af2]"></span>
                    </div>
                </div>
                <div class="mx-auto w-72 sm:w-88 h-3 rounded-b-xl bg-gradient-to-b from-[#4a4a50] to-[#232327] shadow-2xl flex justify-center">
                    <div class="w-14 h-1 rounded-b bg-[#161617]"></div>
                </div>
            </div>

            <!-- iPhone 17 Pro Titanium Silhouette -->
            <div class="mx-auto sm:mx-0 w-36 h-64 rounded-[34px] border-[4px] border-[#524f4a] bg-gradient-to-br from-[#191a20] via-[#262c3d] to-[#0a0a0d] shadow-[0_32px_80px_rgba(175,82,222,0.24)] p-3 flex flex-col justify-between relative hardware-sheen">
                <div class="mx-auto w-12 h-3 rounded-full bg-black border border-white/10 flex items-center justify-end pr-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#1a2c4e] border border-[#2997ff]/50"></span>
                </div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_35%_25%,rgba(255,159,10,0.22),transparent_50%),radial-gradient(circle_at_70%_70%,rgba(41,151,255,0.45),transparent_55%)] pointer-events-none"></div>
                <div class="relative z-10 text-center my-auto space-y-2">
                    <div class="font-display text-2xl font-semibold text-white/90 leading-none">9:41</div>
                    <div class="w-11 h-11 mx-auto rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center">
                        <span class="w-3.5 h-3.5 rounded-full bg-gradient-to-tr from-[#2997ff] to-[#bf5af2] shadow-[0_0_16px_rgba(41,151,255,0.85)]"></span>
                    </div>
                    <div class="text-[11px] font-semibold text-white">Titanium</div>
                </div>
                <div class="mx-auto w-12 h-1 rounded-full bg-white/40 relative z-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- Hero 2: Official Apple Porcelain Light Stage -->
<section class="hero-light-stage border-b border-black/[0.06]">
    <div class="max-w-[1024px] mx-auto px-4 sm:px-6 py-16 text-center">
        <span class="text-[12px] font-semibold uppercase tracking-widest text-[#bf4800]">M4 Power</span>
        <h2 class="font-display text-3xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1 mb-3">
            MacBook Air
        </h2>
        <p class="text-[17px] sm:text-[21px] text-[#424245] max-w-xl mx-auto mb-6">
            Lean. Mean. M4 machine. Engineered for remarkable all-day battery life across teams, studios, and campuses.
        </p>
        <div class="flex justify-center items-center gap-6 text-[15px] font-medium">
            <a href="products.php?category=Mac" class="text-[#0071e3] hover:underline apple-link-arrow">
                <span>Learn more</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
            <button onclick="openEnquiryModal('product', 'MacBook Air M4')" class="text-[#0071e3] hover:underline apple-link-arrow cursor-pointer">
                <span>Enquire now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Category Quick Strip (Apple Store Shelf) -->
<section class="bg-white border-b border-black/[0.06]">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 mb-8">
            <h2 class="font-display text-2xl sm:text-[32px] font-semibold tracking-tight text-[#1d1d1f]">
                Store. <span class="text-[#6e6e73] font-normal">The best way to explore Apple in Assam.</span>
            </h2>
            <a href="products.php" class="text-[14px] font-medium text-[#0071e3] hover:underline apple-link-arrow shrink-0">
                <span>View full lineup</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-3.5">
            <?php
            $categories = [
                ['name' => 'iPhone', 'sub' => 'Titanium & Pro'],
                ['name' => 'Mac', 'sub' => 'M4 Power'],
                ['name' => 'iPad', 'sub' => 'Touch & Pencil'],
                ['name' => 'Watch', 'sub' => 'Health & Fitness'],
                ['name' => 'AirPods', 'sub' => 'Spatial Audio'],
                ['name' => 'TV & Home', 'sub' => 'Smart Living'],
                ['name' => 'Accessories', 'sub' => 'Cases & Chargers'],
            ];
            foreach ($categories as $cat): ?>
            <a href="products.php?category=<?= urlencode($cat['name']) ?>"
               class="reveal-card apple-card bg-[#f5f5f7] hover:bg-[#ededf0] rounded-[22px] p-5 text-center flex flex-col items-center justify-center border border-black/[0.03]">
                <div class="w-12 h-12 mb-3 rounded-2xl bg-white shadow-sm flex items-center justify-center text-[#1d1d1f]">
                    <?= render_category_icon($cat['name']) ?>
                </div>
                <div class="font-semibold text-[14px] text-[#1d1d1f] tracking-tight"><?= e($cat['name']) ?></div>
                <div class="text-[11px] text-[#6e6e73] mt-0.5"><?= e($cat['sub']) ?></div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Two-Up Apple Promo Grid (50/50 Split) -->
<section class="max-w-[1200px] mx-auto px-4 sm:px-6 pt-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Tile 1: Assam Verified Dealer Network -->
        <div class="reveal-card apple-card rounded-[28px] bg-[#161617] text-white p-9 sm:p-11 flex flex-col justify-between min-h-[320px] relative overflow-hidden">
            <div class="absolute -right-12 -bottom-12 w-56 h-56 rounded-full bg-[#0071e3]/20 blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#2997ff]">Assam Territory</span>
                <h3 class="font-display text-3xl font-semibold tracking-tight mt-2 mb-2">Authorised Dealer Network</h3>
                <p class="text-[15px] text-[#a1a1a6] max-w-md leading-relaxed mb-5">
                    Locate verified dealers across Guwahati, Nagaon, Dibrugarh, Jorhat, Silchar, and Tezpur by district or PIN code.
                </p>
                <!-- Live Territory City Beacons -->
                <div class="flex flex-wrap gap-2">
                    <?php foreach (['Guwahati', 'Dibrugarh', 'Jorhat', 'Nagaon', 'Silchar'] as $hub): ?>
                    <a href="dealers.php?q=<?= urlencode($hub) ?>" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/[0.08] hover:bg-white/[0.15] border border-white/10 text-[11px] text-[#f5f5f7] transition">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#30d158]"></span>
                        <?= e($hub) ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="relative z-10 pt-8 flex flex-wrap gap-3">
                <a href="dealers.php" class="btn-tactile px-5 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition">
                    Find a Dealer
                </a>
                <a href="contact.php" class="btn-tactile px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-[13px] font-medium transition">
                    Partner Desk
                </a>
            </div>
        </div>

        <!-- Tile 2: Apple at Work / B2B -->
        <div class="reveal-card apple-card rounded-[28px] bg-[#f5f5f7] text-[#1d1d1f] p-9 sm:p-11 flex flex-col justify-between min-h-[320px] border border-black/[0.04] relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-52 h-52 rounded-full bg-[#0071e3]/10 blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">B2B &amp; Institutions</span>
                <h3 class="font-display text-3xl font-semibold tracking-tight mt-2 mb-2">Small Business Solutions</h3>
                <p class="text-[15px] text-[#6e6e73] max-w-md leading-relaxed">
                    Equip growing Assam enterprises, schools, and clinics with Mac &amp; iPad fleets backed by distributor consultation.
                </p>
            </div>
            <div class="relative z-10 pt-8 flex flex-wrap gap-3">
                <a href="business.php" class="btn-tactile px-5 py-2.5 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[13px] font-medium transition">
                    Explore B2B Enquiries
                </a>
                <button onclick="openEnquiryModal('business', 'Corporate / Bulk Enquiry')" class="btn-tactile px-5 py-2.5 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[13px] font-medium transition cursor-pointer">
                    Request Quote
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Grid (Live from MySQL) -->
<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-16">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 mb-8">
        <div>
            <h2 class="font-display text-3xl sm:text-[34px] font-semibold tracking-tight text-[#1d1d1f]">
                The latest. <span class="text-[#6e6e73] font-normal">Take a look at what’s new.</span>
            </h2>
            <p class="text-[#6e6e73] text-[14px] mt-1">Official Apple product lineup available through our Assam dealer network.</p>
        </div>
        <a href="products.php" class="text-[14px] font-medium text-[#0071e3] hover:underline apple-link-arrow shrink-0">
            <span>View all products</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($featured_products as $p): ?>
        <article class="reveal-card apple-card bg-[#f5f5f7] rounded-[28px] p-7 flex flex-col justify-between border border-black/[0.04]">
            <div>
                <div class="flex justify-between items-center mb-5">
                    <span class="text-[11px] font-semibold uppercase tracking-wider text-[#6e6e73]"><?= e($p['category']) ?></span>
                    <?php if (!empty($p['badge'])): ?>
                    <span class="text-[10px] font-semibold uppercase tracking-wider bg-[#1d1d1f] text-white px-2.5 py-0.5 rounded-full"><?= e($p['badge']) ?></span>
                    <?php endif; ?>
                </div>

                <!-- Bespoke Hardware Stage -->
                <div class="py-4 mb-5 flex items-center justify-center min-h-[175px]">
                    <?= render_product_visual($p['category']) ?>
                </div>

                <h3 class="font-display text-2xl font-semibold tracking-tight text-[#1d1d1f] mb-1"><?= e($p['name']) ?></h3>
                <p class="text-[14px] text-[#6e6e73] mb-4 leading-snug"><?= e($p['tagline']) ?></p>

                <?php if (!empty($p['colors'])): ?>
                <div class="mb-4">
                    <?= render_color_swatches($p['colors']) ?>
                </div>
                <?php endif; ?>

                <p class="text-[12px] text-[#424245] bg-white/85 rounded-2xl p-3.5 mb-6 leading-relaxed border border-black/[0.04]">
                    <?= e($p['key_specs']) ?>
                </p>
            </div>

            <div class="flex items-center gap-2.5 pt-1">
                <button onclick="openEnquiryModal('product', '<?= e($p['name']) ?>')" class="btn-tactile flex-1 py-2.5 px-4 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition cursor-pointer">
                    Enquire Now
                </button>
                <a href="product-details.php?slug=<?= urlencode($p['slug']) ?>" class="btn-tactile py-2.5 px-5 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] text-[13px] font-medium border border-[#d2d2d7] transition">
                    Specs
                </a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<!-- Apple Store Style Horizontal Value Rail ("The getradeCom difference.") -->
<section class="bg-[#f5f5f7] py-16 border-y border-black/[0.05] overflow-hidden">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">
        <div class="flex items-end justify-between gap-4 mb-8">
            <div>
                <h2 class="font-display text-3xl sm:text-[34px] font-semibold tracking-tight text-[#1d1d1f]">
                    The getradeCom difference. <span class="text-[#6e6e73] font-normal">Distributor-backed support across Assam.</span>
                </h2>
            </div>
            <div class="hidden sm:flex items-center gap-2 shrink-0">
                <button type="button" onclick="scrollValueRail(-340)" aria-label="Scroll left"
                        class="w-9 h-9 rounded-full bg-white border border-black/10 hover:bg-[#e8e8ed] flex items-center justify-center text-[#1d1d1f] transition cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" onclick="scrollValueRail(340)" aria-label="Scroll right"
                        class="w-9 h-9 rounded-full bg-white border border-black/10 hover:bg-[#e8e8ed] flex items-center justify-center text-[#1d1d1f] transition cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <div id="value-rail" class="flex gap-5 overflow-x-auto no-scrollbar snap-x snap-mandatory pb-2">
            <a href="dealers.php" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Assam Network</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Verified Dealer Locator</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Search by district, town, or PIN code across Guwahati, Nagaon, Dibrugarh, Jorhat &amp; Silchar.</p>
            </a>

            <a href="business.php" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">B2B &amp; SMEs</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Small Business Solutions</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Bulk enquiries, corporate consultations, and Apple deployment support for Assam businesses.</p>
            </a>

            <a href="services.php#trade-in" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Upgrade &amp; Finance</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Trade-In &amp; EMI Info</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Learn how partner-led device exchange and approved financing options work at local outlets.</p>
            </a>

            <a href="workshops.php" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Learn &amp; Grow</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Expert Workshops</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Register for upcoming hands-on sessions on Mac, iPad, and iPhone across Assam.</p>
            </a>

            <button type="button" onclick="openEnquiryModal('specialist', 'Product Specialist Consultation')" class="snap-start shrink-0 w-[290px] sm:w-[300px] text-left apple-card bg-[#161617] text-white rounded-[26px] p-7 block cursor-pointer">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#2997ff]">Concierge</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2">1-on-1 Specialist Advice</h3>
                <p class="text-[13px] text-[#a1a1a6] leading-relaxed">Unsure which MacBook M4 or iPhone configuration fits? Talk directly with our Assam specialists.</p>
            </button>
        </div>
    </div>
</section>

<!-- Talk to a Specialist Banner -->
<section class="max-w-[1200px] mx-auto px-4 sm:px-6 pt-16">
    <div class="reveal-card ai-ring bg-[#161617] text-white rounded-[32px] p-10 sm:p-14 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
        <div class="absolute -left-16 -top-16 w-64 h-64 rounded-full bg-[#2997ff]/15 blur-3xl pointer-events-none"></div>
        <div class="max-w-xl relative z-10">
            <span class="text-[11px] font-semibold uppercase tracking-widest text-[#2997ff]">Personalised Guidance</span>
            <h2 class="font-display text-3xl sm:text-4xl font-semibold tracking-tight mt-1 mb-3">Need expert guidance?</h2>
            <p class="text-[#a1a1a6] text-[15px] leading-relaxed">
                Whether you are choosing your next Mac, planning a corporate order, or looking for an authorised dealer near you, our product specialists are ready to help.
            </p>
        </div>
        <div class="flex flex-wrap gap-3 relative z-10">
            <button onclick="openEnquiryModal('specialist', 'Product Specialist Consultation')" class="btn-tactile px-6 py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[14px] font-medium transition cursor-pointer">
                Talk to a Specialist
            </button>
            <a href="dealers.php" class="btn-tactile px-6 py-3 rounded-full bg-white text-[#1d1d1f] hover:bg-[#f5f5f7] text-[14px] font-medium transition">
                Find a Dealer
            </a>
        </div>
    </div>
</section>

<script>
function scrollValueRail(delta) {
    document.getElementById('value-rail')?.scrollBy({ left: delta, behavior: 'smooth' });
}
</script>

<?php require_once 'includes/footer.php'; ?>
