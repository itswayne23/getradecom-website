<?php
require_once 'config/db.php';
$page_title = 'About Us — GE Tradecom Pvt Ltd';
require_once 'includes/header.php';

// Moments, Meetings & Milestones Gallery
// Drop real meeting photos into assets/images/about/ and set 'image' => 'assets/images/about/your-photo.jpg'
$moments = [
    [
        'title'    => 'Assam Leadership & Distribution Review',
        'category' => 'Leadership Meetings',
        'date'     => 'November 2026',
        'location' => 'Guwahati HQ, Assam',
        'caption'  => 'Quarterly executive alignment on Assam distribution targets, enterprise readiness, and Apple brand governance.',
        'image'    => '',
        'accent'   => 'from-[#0a192f] via-[#112240] to-[#1d4ed8]',
    ],
    [
        'title'    => 'Apple Channel Strategy Summit',
        'category' => 'Partner Summits',
        'date'     => 'October 2026',
        'location' => 'Guwahati, Assam',
        'caption'  => 'Strategic planning session covering upcoming Mac, iPad, and iPhone product launches across Northeast India.',
        'image'    => '',
        'accent'   => 'from-[#161617] via-[#2c1654] to-[#6d28d9]',
    ],
    [
        'title'    => 'Enterprise & Campus Enablement Briefing',
        'category' => 'Leadership Meetings',
        'date'     => 'October 2026',
        'location' => 'Kamrup Metro, Assam',
        'caption'  => 'Reviewing Apple Business Manager and institutional iPad/Mac deployment workflows with regional leads.',
        'image'    => '',
        'accent'   => 'from-[#0f172a] via-[#1e293b] to-[#0284c7]',
    ],
    [
        'title'    => 'GE Tradecom Annual Team Meet',
        'category' => 'Team & Events',
        'date'     => 'September 2026',
        'location' => 'Guwahati, Assam',
        'caption'  => 'Bringing together operations, B2B specialists, and support teams to celebrate milestones and service standards.',
        'image'    => '',
        'accent'   => 'from-[#18181b] via-[#3f1d2b] to-[#be185d]',
    ],
    [
        'title'    => 'Service Excellence & Care Desk Review',
        'category' => 'Team & Events',
        'date'     => 'August 2026',
        'location' => 'Assam Operations',
        'caption'  => 'Aligning escalation SLAs, customer support protocols, and official warranty guidance.',
        'image'    => '',
        'accent'   => 'from-[#06202a] via-[#0f3d4c] to-[#0d9488]',
    ],
    [
        'title'    => 'Northeast Business & Education Roundtable',
        'category' => 'Partner Summits',
        'date'     => 'July 2026',
        'location' => 'Guwahati, Assam',
        'caption'  => 'Engaging institutional decision-makers and corporate IT leaders on Apple Silicon adoption.',
        'image'    => '',
        'accent'   => 'from-[#1c1917] via-[#451a03] to-[#d97706]',
    ],
];
?>

<!-- Minimal About Hero -->
<section class="hero-titanium-glow text-white overflow-hidden border-b border-white/10">
    <div class="max-w-[960px] mx-auto px-4 sm:px-6 pt-16 sm:pt-20 pb-14 sm:pb-16 text-center">
        <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#2997ff]">About Us</span>
        <h1 class="font-display text-4xl sm:text-6xl font-semibold tracking-tight leading-[1.06] mt-3 mb-4">
            GE Tradecom <span class="ai-gradient-text">Pvt Ltd.</span>
        </h1>
        <p class="text-[16px] sm:text-[19px] text-[#a1a1a6] max-w-xl mx-auto leading-relaxed">
            Apple Authorised Distributor for Assam &mdash; based in Guwahati.
        </p>
    </div>
</section>

<!-- Corporate Story & Mission Bento -->
<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-7 reveal-card apple-card bg-[#f5f5f7] border border-black/[0.04] rounded-[30px] p-8 sm:p-11 flex flex-col justify-between">
            <div>
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Our Story</span>
                <h2 class="font-display text-3xl sm:text-4xl font-semibold tracking-tight text-[#1d1d1f] mt-2 mb-4">
                    Built on reliability, transparency, and Assam-first commitment.
                </h2>
                <p class="text-[15px] text-[#424245] leading-relaxed mb-4">
                    GE Tradecom Pvt Ltd was established with a clear purpose: to bring structured, dependable Apple product distribution and consultative expertise to Assam.
                </p>
                <p class="text-[15px] text-[#6e6e73] leading-relaxed">
                    From helping growing SMEs deploy MacBook and iPad fleets to guiding students, educators, and everyday customers toward the right Apple technology, our team operates with clarity and official manufacturer standards at every step.
                </p>
            </div>
            <div class="pt-8 mt-8 border-t border-black/[0.06] flex flex-wrap gap-3">
                <a href="products.php" class="btn-tactile px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition">
                    Explore Product Portfolio
                </a>
                <a href="contact.php" class="btn-tactile px-6 py-2.5 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[13px] font-medium transition">
                    Contact Our Team
                </a>
            </div>
        </div>

        <div class="lg:col-span-5 reveal-card apple-card bg-[#161617] text-white rounded-[30px] p-8 sm:p-11 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute -right-14 -bottom-14 w-56 h-56 rounded-full bg-[#2997ff]/20 blur-3xl pointer-events-none"></div>
            <div class="relative z-10">
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#2997ff]">Our Mission</span>
                <h3 class="font-display text-2xl sm:text-3xl font-semibold tracking-tight mt-2 mb-4">
                    Seamless access to genuine Apple innovation.
                </h3>
                <ul class="space-y-3.5 text-[14px] text-[#a1a1a6]">
                    <li class="flex items-start gap-2.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#2997ff] mt-2 shrink-0"></span>
                        <span>Deliver authentic Apple hardware and accessories backed by official warranty across Assam.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#30d158] mt-2 shrink-0"></span>
                        <span>Empower Assam enterprises and schools with tailored consultation and device lifecycle support.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#bf5af2] mt-2 shrink-0"></span>
                        <span>Maintain transparent pricing guidance, eligibility clarity, and responsive specialist support.</span>
                    </li>
                </ul>
            </div>
            <div class="relative z-10 pt-8">
                <button onclick="openEnquiryModal('specialist', 'Executive & Corporate Consultation')"
                        class="btn-tactile w-full py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition cursor-pointer">
                    Schedule a Consultation
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Animated Meetings, Events & Milestones Gallery -->
<section id="moments" class="bg-[#fbfbfd] border-y border-black/[0.06] py-16 overflow-hidden">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 mb-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Life at GE Tradecom</span>
                <h2 class="font-display text-3xl sm:text-4xl font-semibold tracking-tight text-[#1d1d1f] mt-1">
                    Meetings, Summits &amp; Milestones
                </h2>
                <p class="text-[14px] text-[#6e6e73] mt-2 max-w-xl">
                    Highlights from our executive reviews, partner summits, and team moments across Assam. Hover to pause or click any card to expand.
                </p>
            </div>

            <!-- Interactive Category Filter -->
            <div class="flex flex-wrap gap-2">
                <?php foreach (['All', 'Leadership Meetings', 'Partner Summits', 'Team & Events'] as $idx => $cat): ?>
                <button type="button" onclick="filterMoments('<?= e($cat) ?>', this)"
                        class="moment-filter px-4 py-1.5 rounded-full text-xs font-medium transition cursor-pointer <?= $idx === 0 ? 'bg-[#1d1d1f] text-white' : 'bg-white border border-[#d2d2d7] text-[#424245] hover:border-[#1d1d1f]' ?>">
                    <?= e($cat) ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Dual-Row Smooth Marquee Showcase -->
    <div id="moments-marquee-view" class="marquee-wrapper space-y-5">
        <?php for ($row = 0; $row < 2; $row++):
            $trackClass = $row === 0 ? 'marquee-track-left' : 'marquee-track-right';
            $rowItems = $row === 0 ? $moments : array_reverse($moments);
            $loopItems = array_merge($rowItems, $rowItems);
        ?>
        <div class="<?= $trackClass ?> gap-5 px-3">
            <?php foreach ($loopItems as $mIdx => $m):
                $origIdx = array_search($m, $moments, true);
            ?>
            <button type="button" onclick="openMomentLightbox(<?= (int)$origIdx ?>)" aria-label="<?= e($m['title']) ?>"
                    class="group relative w-[320px] sm:w-[370px] h-[230px] rounded-[26px] overflow-hidden shrink-0 border border-black/[0.06] shadow-sm hover:shadow-xl transition-all duration-500 cursor-pointer">
                <?php if (!empty($m['image'])): ?>
                    <img src="<?= e($m['image']) ?>" alt="<?= e($m['title']) ?>"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <?php else: ?>
                    <div class="absolute inset-0 bg-gradient-to-br <?= e($m['accent']) ?> transition-transform duration-700 group-hover:scale-105"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_75%_20%,rgba(255,255,255,0.16),transparent_55%)]"></div>
                <?php endif; ?>
            </button>
            <?php endforeach; ?>
        </div>
        <?php endfor; ?>
    </div>

    <!-- Filtered Grid View (Shown when a specific category tab is clicked) -->
    <div id="moments-grid-view" class="hidden max-w-[1200px] mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php foreach ($moments as $idx => $m): ?>
        <button type="button" data-moment-cat="<?= e($m['category']) ?>" onclick="openMomentLightbox(<?= $idx ?>)" aria-label="<?= e($m['title']) ?>"
                class="moment-grid-card group relative h-[250px] rounded-[26px] overflow-hidden border border-black/[0.06] shadow-sm hover:shadow-xl transition-all duration-500 cursor-pointer">
            <?php if (!empty($m['image'])): ?>
                <img src="<?= e($m['image']) ?>" alt="<?= e($m['title']) ?>"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            <?php else: ?>
                <div class="absolute inset-0 bg-gradient-to-br <?= e($m['accent']) ?> transition-transform duration-700 group-hover:scale-105"></div>
            <?php endif; ?>
        </button>
        <?php endforeach; ?>
    </div>
</section>

<!-- Corporate Values & Governance -->
<section id="values" class="max-w-[1200px] mx-auto px-4 sm:px-6 py-16">
    <div class="max-w-2xl mb-10">
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Core Principles</span>
        <h2 class="font-display text-3xl font-semibold tracking-tight text-[#1d1d1f] mt-1">How GE Tradecom operates.</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[26px] p-7">
            <div class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3] mb-2">01 / Brand Integrity</div>
            <h3 class="font-display text-xl font-semibold text-[#1d1d1f] mb-2">Official Apple Standards</h3>
            <p class="text-[13px] text-[#6e6e73] leading-relaxed">
                Every product specification, campaign, and service recommendation follows official Apple India and distributor guidelines.
            </p>
        </div>
        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[26px] p-7">
            <div class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3] mb-2">02 / Consultative Approach</div>
            <h3 class="font-display text-xl font-semibold text-[#1d1d1f] mb-2">Right-Sized Solutions</h3>
            <p class="text-[13px] text-[#6e6e73] leading-relaxed">
                Whether sizing a 50-seat MacBook fleet or advising a student on iPad compatibility, our specialists focus on long-term fit.
            </p>
        </div>
        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[26px] p-7">
            <div class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3] mb-2">03 / Assam Commitment</div>
            <h3 class="font-display text-xl font-semibold text-[#1d1d1f] mb-2">Responsive Local Support</h3>
            <p class="text-[13px] text-[#6e6e73] leading-relaxed">
                Direct phone, email, and WhatsApp specialist access from our Guwahati desk with clear escalation paths.
            </p>
        </div>
    </div>
</section>

<!-- Lightbox Modal for Moments Gallery -->
<div id="moment-lightbox" class="apple-modal-overlay fixed inset-0 z-50 hidden bg-black/75 backdrop-blur-md flex items-center justify-center p-4">
    <div class="apple-modal-panel bg-[#161617] text-white border border-white/15 rounded-[30px] max-w-3xl w-full overflow-hidden shadow-2xl relative">
        <button onclick="closeMomentLightbox()" class="absolute top-4 right-4 z-20 w-9 h-9 rounded-full bg-black/50 hover:bg-black/80 text-white flex items-center justify-center transition cursor-pointer" aria-label="Close">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <div id="lb-visual" class="h-64 sm:h-80 w-full relative flex items-center justify-center bg-gradient-to-br from-[#0a192f] to-[#1d4ed8]"></div>

        <div class="p-7 sm:p-8">
            <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                <span id="lb-category" class="text-[11px] font-semibold uppercase tracking-wider text-[#2997ff]"></span>
                <span id="lb-meta" class="text-[12px] text-[#a1a1a6]"></span>
            </div>
            <h3 id="lb-title" class="font-display text-2xl font-semibold mb-2"></h3>
            <p id="lb-caption" class="text-[14px] text-[#a1a1a6] leading-relaxed mb-6"></p>

            <div class="flex justify-between items-center pt-4 border-t border-white/10">
                <button type="button" onclick="stepMomentLightbox(-1)" class="px-4 py-2 rounded-full bg-white/10 hover:bg-white/20 text-xs font-medium transition cursor-pointer">&larr; Previous</button>
                <button type="button" onclick="stepMomentLightbox(1)" class="px-4 py-2 rounded-full bg-white/10 hover:bg-white/20 text-xs font-medium transition cursor-pointer">Next &rarr;</button>
            </div>
        </div>
    </div>
</div>

<script>
const MOMENTS = <?= json_encode($moments, JSON_UNESCAPED_SLASHES) ?>;
let currentMomentIdx = 0;

function filterMoments(cat, btn) {
    document.querySelectorAll('.moment-filter').forEach(el => {
        el.classList.remove('bg-[#1d1d1f]', 'text-white');
        el.classList.add('bg-white', 'border', 'border-[#d2d2d7]', 'text-[#424245]');
    });
    if (btn) {
        btn.classList.add('bg-[#1d1d1f]', 'text-white');
        btn.classList.remove('bg-white', 'border', 'border-[#d2d2d7]', 'text-[#424245]');
    }

    const marquee = document.getElementById('moments-marquee-view');
    const grid = document.getElementById('moments-grid-view');
    if (cat === 'All') {
        marquee.classList.remove('hidden');
        grid.classList.add('hidden');
    } else {
        marquee.classList.add('hidden');
        grid.classList.remove('hidden');
        grid.querySelectorAll('.moment-grid-card').forEach(card => {
            card.style.display = card.getAttribute('data-moment-cat') === cat ? '' : 'none';
        });
    }
}

function openMomentLightbox(idx) {
    currentMomentIdx = (idx + MOMENTS.length) % MOMENTS.length;
    const m = MOMENTS[currentMomentIdx];
    if (!m) return;

    const vis = document.getElementById('lb-visual');
    if (m.image) {
        vis.className = 'h-64 sm:h-80 w-full relative bg-black';
        vis.innerHTML = `<img src="${m.image}" alt="${m.title}" class="w-full h-full object-cover">`;
    } else {
        vis.className = `h-64 sm:h-80 w-full relative flex items-center justify-center bg-gradient-to-br ${m.accent}`;
        vis.innerHTML = `<div class="text-center px-6"><div class="text-xs uppercase tracking-widest text-white/60 mb-2">Photo Slot Ready</div><div class="font-display text-xl text-white/90">${m.title}</div></div>`;
    }

    document.getElementById('lb-category').textContent = m.category;
    document.getElementById('lb-meta').textContent = `${m.date} · ${m.location}`;
    document.getElementById('lb-title').textContent = m.title;
    document.getElementById('lb-caption').textContent = m.caption;

    showSpringModal(document.getElementById('moment-lightbox'));
}

function stepMomentLightbox(delta) {
    openMomentLightbox(currentMomentIdx + delta);
}

function closeMomentLightbox() {
    hideSpringModal(document.getElementById('moment-lightbox'));
}

document.getElementById('moment-lightbox')?.addEventListener('click', (e) => {
    if (e.target.id === 'moment-lightbox') closeMomentLightbox();
});
document.addEventListener('keydown', (e) => {
    const lb = document.getElementById('moment-lightbox');
    if (lb && !lb.classList.contains('hidden')) {
        if (e.key === 'Escape') closeMomentLightbox();
        if (e.key === 'ArrowRight') stepMomentLightbox(1);
        if (e.key === 'ArrowLeft') stepMomentLightbox(-1);
    }
});
</script>

<?php require_once 'includes/footer.php'; ?>
