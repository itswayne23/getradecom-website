<?php
require_once 'config/db.php';
$page_title = 'Student & Teacher Education Programme';
require_once 'includes/header.php';

$flash = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
?>

<?php if ($flash): ?>
<div class="bg-[#f5f5f7] border-b border-[#d2d2d7] text-[#1d1d1f] text-[13px] py-3 px-4 text-center font-medium">
    <span class="inline-block w-2 h-2 rounded-full bg-[#30d158] mr-2"></span><?= e($flash) ?>
</div>
<?php endif; ?>

<section class="hero-light-stage border-b border-black/[0.06] py-16">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Education Channel &middot; Assam</span>
        <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1">Student &amp; Teacher Programme</h1>
        <p class="text-[#6e6e73] text-[15px] sm:text-[17px] mt-2 max-w-2xl">
            Eligibility-led guidance for university students, educators, and academic institutions across Assam when approved education programmes are active.
        </p>
    </div>
</section>

<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14 space-y-12">
    <!-- 3-Step Verification Process -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Step 01 / Eligibility</span>
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">Academic Verification</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                Eligible students, parents buying for enrolled university students, and faculty members require a valid institutional ID or admission letter for verification.
            </p>
        </div>

        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Step 02 / Review</span>
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">Approved Programme Check</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                Our specialist team confirms currently approved education offers, eligible Mac or iPad models, and active offer dates without unverified retail promises.
            </p>
        </div>

        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Step 03 / Routing</span>
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">Verified Partner Fulfilment</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                Approved education enquiries are routed to a participating verified Assam dealer outlet for document review and hardware handover.
            </p>
        </div>
    </div>

    <!-- Eligible Lineup Highlights -->
    <div class="bg-[#161617] text-white rounded-[32px] p-9 sm:p-12 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
        <div class="max-w-2xl">
            <span class="text-[11px] font-semibold uppercase tracking-widest text-[#2997ff]">Eligible Study &amp; Research Hardware</span>
            <h2 class="font-display text-3xl font-semibold tracking-tight mt-1.5 mb-3">MacBook Neo, MacBook Air, iPad Air (M4) &amp; Apple Pencil Pro</h2>
            <p class="text-[#a1a1a6] text-[14px] leading-relaxed">
                Programme availability, verification document requirements, and applicable terms vary by active campaign period and participating Assam outlet approval.
            </p>
        </div>
        <div class="flex flex-wrap gap-3 shrink-0">
            <button type="button" onclick="openEnquiryModal('education', 'Student & Teacher Programme Verification')"
                    class="btn-tactile px-7 py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[14px] font-medium transition cursor-pointer">
                Request Eligibility Check
            </button>
            <a href="products.php?category=Mac" class="btn-tactile px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white text-[14px] font-medium transition">
                Explore Mac &amp; iPad
            </a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
