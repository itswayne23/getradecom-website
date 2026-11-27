<?php
require_once 'config/db.php';
$page_title = 'Corporate Portfolio — Apple Distribution & Assam Channel Network';
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

<!-- Hero 1: GE Tradecom Pvt Ltd Executive Portfolio Stage -->
<section class="hero-titanium-glow text-white overflow-hidden border-b border-white/10">
    <div class="max-w-[1080px] mx-auto px-4 sm:px-6 pt-14 sm:pt-20 pb-14 text-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/[0.07] border border-white/15 backdrop-blur-md text-[12px] font-medium tracking-wide text-[#f5f5f7] mb-6">
            <svg class="w-3.5 h-3.5 text-[#2997ff] shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            <span>Apple Authorised Dealer</span>
        </div>

        <h1 class="font-display text-4xl sm:text-6xl lg:text-[68px] font-semibold tracking-tight leading-[1.05] mb-4">
            Apple Distribution <span class="text-[#86868b] font-normal">for</span> <span class="ai-gradient-text">Assam</span>
        </h1>

        <p class="text-[17px] sm:text-[21px] text-[#a1a1a6] font-normal max-w-2xl mx-auto leading-relaxed mb-8">
            Corporate portfolio &amp; channel hub for GE Tradecom Pvt Ltd &mdash; connecting Assam customers, verified dealers, institutions, and service partners with the official Apple ecosystem.
        </p>

        <div class="flex flex-wrap justify-center items-center gap-3.5 mb-12">
            <a href="products.php" class="btn-tactile px-7 py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white font-medium text-[15px] transition shadow-[0_6px_24px_rgba(0,113,227,0.35)]">
                Explore Product Portfolio
            </a>
            <a href="dealers.php" class="btn-tactile px-7 py-3 rounded-full bg-transparent hover:bg-white/10 text-[#2997ff] border border-[#2997ff]/60 font-medium text-[15px] transition">
                Assam Dealer Locator
            </a>
            <button onclick="openEnquiryModal('specialist', 'Executive Portfolio Consultation')" class="px-5 py-3 text-[15px] font-medium text-[#f5f5f7] hover:text-[#2997ff] apple-link-arrow transition cursor-pointer">
                <span>Talk to a Specialist</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

        <!-- Corporate Footprint Bar -->
        <div class="pt-8 border-t border-white/10 grid grid-cols-2 md:grid-cols-4 gap-6 text-left">
            <div>
                <div class="font-display text-2xl font-semibold text-white">Assam-Wide</div>
                <div class="text-[12px] text-[#86868b] mt-0.5">Guwahati, Dibrugarh, Jorhat, Nagaon &amp; Silchar hubs</div>
            </div>
            <div>
                <div class="font-display text-2xl font-semibold text-white">Distributor-First</div>
                <div class="text-[12px] text-[#86868b] mt-0.5">Verified partner routing without unapproved retail promises</div>
            </div>
            <div>
                <div class="font-display text-2xl font-semibold text-white">B2B &amp; Education</div>
                <div class="text-[12px] text-[#86868b] mt-0.5">Enterprise fleet sizing, SMEs &amp; eligibility programmes</div>
            </div>
            <div>
                <div class="font-display text-2xl font-semibold text-white">Enablement</div>
                <div class="text-[12px] text-[#86868b] mt-0.5">Workshops, dealer training &amp; verified service discovery</div>
            </div>
        </div>
    </div>
</section>

<!-- Corporate Portfolio Identity ("Who We Are" Bento) -->
<section class="hero-light-stage border-b border-black/[0.06]">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 py-16">
        <div class="max-w-3xl mb-10">
            <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Corporate Profile &middot; GE Tradecom Pvt Ltd</span>
            <h2 class="font-display text-3xl sm:text-4xl font-semibold tracking-tight text-[#1d1d1f] mt-1 mb-3">
                Built on clarity, partner verification, and Assam-first enablement.
            </h2>
            <p class="text-[15px] sm:text-[17px] text-[#6e6e73] leading-relaxed">
                GE Tradecom Pvt Ltd serves as a structured distribution and channel enablement gateway across Assam &mdash; bridging Apple product discovery with verified local dealers, corporate buyers, and authorised service desks.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="reveal-card apple-card bg-white rounded-[26px] p-8 border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">01 / Product Discovery</span>
                <h3 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">Verified Portfolio &amp; Specs</h3>
                <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                    Browse the Apple lineup across 7 categories, compare specifications side by side, and register for back-in-stock notifications.
                </p>
            </div>
            <div class="reveal-card apple-card bg-white rounded-[26px] p-8 border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">02 / Channel Governance</span>
                <h3 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">Verified Partner Fulfilment</h3>
                <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                    Trade-ins, financing plans, store pickup, and after-sales repairs are fulfilled strictly through verified Assam dealer and service partners.
                </p>
            </div>
            <div class="reveal-card apple-card bg-white rounded-[26px] p-8 border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">03 / Growth &amp; Training</span>
                <h3 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">B2B, Education &amp; Workshops</h3>
                <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                    Dedicated SME/institutional consultations, eligibility-led student/teacher guidance, and hands-on workshops across Assam cities.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Interactive 4 User Journeys Switcher (Adapted from iPlanet Reference Review) -->
<section class="bg-white border-b border-black/[0.06]">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 py-16">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div>
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Channel Journeys</span>
                <h2 class="font-display text-3xl sm:text-[34px] font-semibold tracking-tight text-[#1d1d1f] mt-1">
                    Designed for every stakeholder.
                </h2>
            </div>

            <!-- Segmented Journey Tabs -->
            <div class="inline-flex flex-wrap gap-1.5 bg-[#f5f5f7] p-1.5 rounded-full border border-black/[0.05]">
                <button type="button" onclick="selectJourney('customer', this)" class="journey-tab px-4 py-1.5 rounded-full text-[12px] font-medium bg-[#1d1d1f] text-white transition cursor-pointer">Customer</button>
                <button type="button" onclick="selectJourney('dealer', this)" class="journey-tab px-4 py-1.5 rounded-full text-[12px] font-medium text-[#424245] hover:text-[#1d1d1f] transition cursor-pointer">Dealer Partner</button>
                <button type="button" onclick="selectJourney('business', this)" class="journey-tab px-4 py-1.5 rounded-full text-[12px] font-medium text-[#424245] hover:text-[#1d1d1f] transition cursor-pointer">Business Buyer</button>
                <button type="button" onclick="selectJourney('workshop', this)" class="journey-tab px-4 py-1.5 rounded-full text-[12px] font-medium text-[#424245] hover:text-[#1d1d1f] transition cursor-pointer">Workshop Attendee</button>
            </div>
        </div>

        <div id="journey-panel" class="bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8 sm:p-10 transition-opacity duration-300">
            <!-- Populated cleanly via JS + initial Customer default -->
        </div>
    </div>
</section>

<!-- Category Quick Strip (Apple Store Shelf) -->
<section class="bg-white border-b border-black/[0.06]">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 mb-8">
            <h2 class="font-display text-2xl sm:text-[32px] font-semibold tracking-tight text-[#1d1d1f]">
                Portfolio. <span class="text-[#6e6e73] font-normal">Explore every Apple category.</span>
            </h2>
            <a href="products.php" class="text-[14px] font-medium text-[#0071e3] hover:underline apple-link-arrow shrink-0">
                <span>Browse &amp; compare all models</span>
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

<!-- Two-Up Apple Promo Grid (Assam Network + B2B/Education) -->
<section class="max-w-[1200px] mx-auto px-4 sm:px-6 pt-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Tile 1: Assam Verified Dealer Network -->
        <div class="reveal-card apple-card rounded-[28px] bg-[#161617] text-white p-9 sm:p-11 flex flex-col justify-between min-h-[320px] relative overflow-hidden">
            <div class="absolute -right-12 -bottom-12 w-56 h-56 rounded-full bg-[#0071e3]/20 blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#2997ff]">Assam Territory</span>
                <h3 class="font-display text-3xl font-semibold tracking-tight mt-2 mb-2">Authorised Dealer Network</h3>
                <p class="text-[15px] text-[#a1a1a6] max-w-md leading-relaxed mb-5">
                    Search verified Assam outlets by district or PIN code, view outlet pickup/delivery support, or apply for dealer onboarding.
                </p>
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
                <button onclick="openEnquiryModal('dealer_onboarding', 'Assam Dealer Partner Registration')" class="btn-tactile px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 text-white text-[13px] font-medium transition cursor-pointer">
                    Partner Onboarding
                </button>
            </div>
        </div>

        <!-- Tile 2: B2B & Education -->
        <div class="reveal-card apple-card rounded-[28px] bg-[#f5f5f7] text-[#1d1d1f] p-9 sm:p-11 flex flex-col justify-between min-h-[320px] border border-black/[0.04] relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-52 h-52 rounded-full bg-[#0071e3]/10 blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Enterprise &amp; Campus</span>
                <h3 class="font-display text-3xl font-semibold tracking-tight mt-2 mb-2">Business &amp; Education Solutions</h3>
                <p class="text-[15px] text-[#6e6e73] max-w-md leading-relaxed">
                    Structured Mac &amp; iPad fleet consultation for Assam SMEs and institutions, plus eligibility-led student and teacher guidance.
                </p>
            </div>
            <div class="relative z-10 pt-8 flex flex-wrap gap-3">
                <a href="business.php" class="btn-tactile px-5 py-2.5 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[13px] font-medium transition">
                    Small Business
                </a>
                <a href="education.php" class="btn-tactile px-5 py-2.5 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[13px] font-medium transition">
                    Education Programme
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Grid (Live from MySQL) -->
<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-16">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 mb-8">
        <div>
            <h2 class="font-display text-3xl sm:text-[34px] font-semibold tracking-tight text-[#1d1d1f]">
                Featured lineup. <span class="text-[#6e6e73] font-normal">Hardware across our Assam channel.</span>
            </h2>
            <p class="text-[#6e6e73] text-[14px] mt-1">Explore official specifications, request stock alerts, or connect with a verified dealer.</p>
        </div>
        <a href="products.php" class="text-[14px] font-medium text-[#0071e3] hover:underline apple-link-arrow shrink-0">
            <span>View &amp; compare all</span>
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

            <div class="flex items-center gap-2 pt-1">
                <button onclick="openEnquiryModal('product', '<?= e($p['name']) ?>')" class="btn-tactile flex-1 py-2.5 px-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[12px] font-medium transition cursor-pointer">
                    Enquire
                </button>
                <button onclick="openEnquiryModal('stock_notify', '<?= e($p['name']) ?>')" class="btn-tactile py-2.5 px-3.5 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] text-[12px] font-medium border border-[#d2d2d7] transition cursor-pointer" title="Notify when configuration is in stock">
                    Notify
                </button>
                <a href="product-details.php?slug=<?= urlencode($p['slug']) ?>" class="btn-tactile py-2.5 px-4 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] text-[12px] font-medium border border-[#d2d2d7] transition">
                    Specs
                </a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<!-- Apple Store Style Horizontal Value Rail ("Channel Services & Programmes") -->
<section class="bg-[#f5f5f7] py-16 border-y border-black/[0.05] overflow-hidden">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">
        <div class="flex items-end justify-between gap-4 mb-8">
            <div>
                <h2 class="font-display text-3xl sm:text-[34px] font-semibold tracking-tight text-[#1d1d1f]">
                    Channel ecosystem. <span class="text-[#6e6e73] font-normal">Services, campaigns &amp; enablement.</span>
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
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Filter outlets across Guwahati, Nagaon, Dibrugarh, Jorhat &amp; Silchar with pickup/delivery visibility.</p>
            </a>

            <a href="promotions.php" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Approved Offers</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Campaigns &amp; Launches</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">View active Assam channel campaigns with transparent eligibility dates and terms.</p>
            </a>

            <a href="education.php" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Campus &amp; Faculty</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Student &amp; Teacher Programme</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Eligibility-led verification workflow for students and educators across Assam institutions.</p>
            </a>

            <a href="services.php#trade-in" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Upgrade &amp; Finance</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Trade-In &amp; EMI Info</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Understand partner-led exchange evaluation, device prep, and approved bank/NBFC financing.</p>
            </a>

            <a href="services.php#service-centres" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Care &amp; Warranty</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Authorised Service Centres</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Verified service-centre locations, repair scope, hours, and escalation contacts.</p>
            </a>

            <a href="workshops.php" class="snap-start shrink-0 w-[290px] sm:w-[300px] apple-card bg-white rounded-[26px] p-7 block border border-black/[0.04]">
                <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Learn &amp; Grow</span>
                <h3 class="font-display text-xl font-semibold mt-2 mb-2 text-[#1d1d1f]">Expert Workshops</h3>
                <p class="text-[13px] text-[#6e6e73] leading-relaxed">Reserve seats for hands-on sessions on Mac, iPad, and iPhone workflows across Assam.</p>
            </a>
        </div>
    </div>
</section>

<!-- Talk to a Specialist Banner -->
<section class="max-w-[1200px] mx-auto px-4 sm:px-6 pt-16">
    <div class="reveal-card ai-ring bg-[#161617] text-white rounded-[32px] p-10 sm:p-14 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
        <div class="absolute -left-16 -top-16 w-64 h-64 rounded-full bg-[#2997ff]/15 blur-3xl pointer-events-none"></div>
        <div class="max-w-xl relative z-10">
            <span class="text-[11px] font-semibold uppercase tracking-widest text-[#2997ff]">GE Tradecom Pvt Ltd &middot; Concierge</span>
            <h2 class="font-display text-3xl sm:text-4xl font-semibold tracking-tight mt-1 mb-3">Ready to connect across Assam?</h2>
            <p class="text-[#a1a1a6] text-[15px] leading-relaxed">
                Whether you are evaluating Apple hardware, registering as an authorised Assam dealer, or planning an institutional rollout, our specialist team routes every enquiry accurately.
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

const JOURNEYS = {
    customer: {
        badge: 'Customer Journey',
        title: 'From Discovery to Verified Local Outlet',
        steps: ['Browse Category Portfolio', 'Compare Specs & Finishes', 'Ask a Product Specialist', 'Locate Verified Assam Dealer', 'Visit or Contact Outlet'],
        ctaText: 'Explore & Compare Products',
        ctaHref: 'products.php'
    },
    dealer: {
        badge: 'Dealer Partner Journey',
        title: 'Onboarding Into the Assam Channel Network',
        steps: ['Register Partner Interest', 'Submit Business & Outlet Details', 'GE Tradecom Verification', 'Verified Profile Publication', 'Receive Campaigns & Training'],
        ctaText: 'Start Partner Onboarding',
        ctaAction: "openEnquiryModal('dealer_onboarding', 'Assam Dealer Partner Registration')"
    },
    business: {
        badge: 'Business & Institutional Journey',
        title: 'Structured B2B Deployment Across Assam',
        steps: ['Select Business Solution', 'Submit Fleet Requirements', 'Specialist Consultation', 'Demo / Partner Quotation', 'Authorised Channel Fulfilment'],
        ctaText: 'Submit Business Enquiry',
        ctaHref: 'business.php'
    },
    workshop: {
        badge: 'Workshop Attendee Journey',
        title: 'Hands-On Learning Across Assam Cities',
        steps: ['Select City / Venue', 'Review Topic & Trainer', 'Reserve Available Seat', 'Receive Confirmation', 'Attend Live Session'],
        ctaText: 'Browse Workshop Calendar',
        ctaHref: 'workshops.php'
    }
};

function selectJourney(key, btn) {
    document.querySelectorAll('.journey-tab').forEach(el => {
        el.classList.remove('bg-[#1d1d1f]', 'text-white');
        el.classList.add('text-[#424245]');
    });
    if (btn) {
        btn.classList.add('bg-[#1d1d1f]', 'text-white');
        btn.classList.remove('text-[#424245]');
    }

    const panel = document.getElementById('journey-panel');
    const data = JOURNEYS[key];
    if (!panel || !data) return;

    const stepsHtml = data.steps.map((s, i) => `
        <div class="bg-white rounded-2xl p-4 border border-black/[0.04] flex flex-col justify-between">
            <span class="text-[11px] font-semibold text-[#0071e3]">Step 0${i + 1}</span>
            <div class="text-[14px] font-semibold text-[#1d1d1f] mt-2 leading-snug">${s}</div>
        </div>
    `).join('');

    const ctaHtml = data.ctaAction
        ? `<button type="button" onclick="${data.ctaAction}" class="btn-tactile px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition cursor-pointer">${data.ctaText}</button>`
        : `<a href="${data.ctaHref}" class="btn-tactile inline-block px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition">${data.ctaText}</a>`;

    panel.style.opacity = '0';
    setTimeout(() => {
        panel.innerHTML = `
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">${data.badge}</span>
                    <h3 class="font-display text-2xl font-semibold text-[#1d1d1f] mt-1">${data.title}</h3>
                </div>
                ${ctaHtml}
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">${stepsHtml}</div>
        `;
        panel.style.opacity = '1';
    }, 140);
}

selectJourney('customer', document.querySelector('.journey-tab'));
</script>

<?php require_once 'includes/footer.php'; ?>
