<?php
require_once 'config/db.php';
$page_title = 'Services, Trade-In, Financing & Support';
require_once 'includes/header.php';

// Fetch verified service centres safely (supports older schema gracefully)
$service_centres = [];
try {
    $sc_stmt = $pdo->query("SELECT * FROM service_centres WHERE is_active = 1 AND is_verified = 1 ORDER BY id ASC");
    $service_centres = $sc_stmt->fetchAll();
} catch (Throwable $e) {
    $service_centres = [];
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
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Channel &amp; Customer Guidance</span>
        <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1">Services &amp; Support Information</h1>
        <p class="text-[#6e6e73] text-[15px] sm:text-[17px] mt-2 max-w-2xl">
            Distributor-governed guidance on partner-led trade-in evaluations, approved financing plans, store pickup/delivery scope, verified service centres, and customer support across Assam.
        </p>
    </div>
</section>

<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14 space-y-12">
    <!-- Trade-In & Financing -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div id="trade-in" class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[30px] p-8 sm:p-9">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Upgrade Journey</span>
            <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mt-1.5 mb-3">Trade-In &amp; Upgrade Enquiries</h2>
            <p class="text-[14px] text-[#424245] leading-relaxed mb-4">
                Where supported by participating verified Assam partners, device exchange evaluations depend on physical in-store inspection, working condition, and eligible model lists. Valuation and exchange bonuses are determined solely at evaluation.
            </p>
            <ul class="text-[13px] text-[#6e6e73] space-y-2 mb-7 list-disc pl-5">
                <li>Back up your device data, transfer files, and sign out of Apple ID / Find My before evaluation.</li>
                <li>Final exchange eligibility and valuation are subject to inspection and participating partner terms.</li>
            </ul>
            <button onclick="openEnquiryModal('trade_in', 'Trade-In / Upgrade Enquiry')"
                    class="btn-tactile px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition cursor-pointer">
                Request Trade-In Guidance
            </button>
        </div>

        <div id="financing" class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[30px] p-8 sm:p-9">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Payment Options</span>
            <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mt-1.5 mb-3">Financing &amp; EMI Information</h2>
            <p class="text-[14px] text-[#424245] leading-relaxed mb-4">
                Financing or instalment plans&mdash;where available&mdash;are provided exclusively through currently approved bank, card, NBFC, or finance partners at participating outlets.
            </p>
            <ul class="text-[13px] text-[#6e6e73] space-y-2 mb-7 list-disc pl-5">
                <li>Eligible tenures, processing charges, down payments, and approval rules depend on the issuing partner and active programme terms.</li>
                <li>Confirm active financing availability directly with a verified Assam dealer or specialist before purchase.</li>
            </ul>
            <button onclick="openEnquiryModal('specialist', 'Financing & Payment Options Query')"
                    class="btn-tactile px-6 py-2.5 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[13px] font-medium transition cursor-pointer">
                Ask About Approved Options
            </button>
        </div>
    </div>

    <!-- Pickup / Delivery & Warranty / Returns -->
    <div id="pickup-delivery" class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="reveal-card motion-card bg-[#fbfbfd] border border-[#d2d2d7]/70 rounded-[28px] p-8">
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mb-2">Fulfilment &amp; Delivery Guidance</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed mb-5">
                GE Tradecom Pvt Ltd follows a distributor-first channel model across Assam. Fulfilment and delivery timelines are confirmed directly by our specialist team based on stock allocation and location.
            </p>
            <a href="contact.php" class="text-[13px] font-medium text-[#0071e3] hover:underline apple-link-arrow">
                <span>Contact Our Specialist Desk</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="reveal-card motion-card bg-[#fbfbfd] border border-[#d2d2d7]/70 rounded-[28px] p-8">
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mb-2">Warranty, Returns &amp; Escalation</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed mb-5">
                Official manufacturer warranty terms apply per product category. Order-level return or replacement queries follow the invoicing partner's policy, with escalation support through our Assam desk.
            </p>
            <a href="contact.php" class="text-[13px] font-medium text-[#0071e3] hover:underline apple-link-arrow">
                <span>Contact Support &amp; Escalation Desk</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    <!-- Verified Authorised Service-Centre Discovery -->
    <div id="service-centres" class="bg-[#f5f5f7] border border-black/[0.04] rounded-[32px] p-8 sm:p-11">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-7">
            <div>
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">Verified Care Network</span>
                <h2 class="font-display text-2xl sm:text-3xl font-semibold text-[#1d1d1f] mt-1">Authorised Service-Centre Discovery</h2>
                <p class="text-[13px] text-[#6e6e73] mt-1">Locations are published only after service status, repair scope, and contact details are verified.</p>
            </div>
            <a href="contact.php" class="text-[13px] font-medium text-[#0071e3] hover:underline shrink-0">Report a Service Query &rarr;</a>
        </div>

        <?php if (!empty($service_centres)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <?php foreach ($service_centres as $sc): ?>
            <div class="bg-white rounded-2xl p-6 border border-black/[0.05]">
                <div class="flex items-center justify-between gap-2 mb-2">
                    <span class="text-[11px] font-semibold text-[#0071e3]"><?= e($sc['city']) ?></span>
                    <span class="inline-flex items-center gap-1 text-[10px] font-semibold text-[#1d1d1f] bg-[#f5f5f7] px-2.5 py-0.5 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#30d158]"></span> Verified
                    </span>
                </div>
                <h3 class="font-display text-lg font-semibold text-[#1d1d1f] mb-2"><?= e($sc['centre_name']) ?></h3>
                <div class="space-y-1 text-[12px] text-[#424245]">
                    <p><strong class="text-[#1d1d1f]">Address:</strong> <?= e($sc['address']) ?></p>
                    <p><strong class="text-[#1d1d1f]">Services:</strong> <?= e($sc['services_offered']) ?></p>
                    <p><strong class="text-[#1d1d1f]">Phone:</strong> <?= e($sc['phone']) ?></p>
                    <p><strong class="text-[#1d1d1f]">Hours:</strong> <?= e($sc['hours']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="bg-white rounded-2xl p-6 border border-black/[0.05] text-[13px] text-[#6e6e73]">
            Contact our Assam specialist desk via <a href="contact.php" class="text-[#0071e3] hover:underline">Contact &amp; Escalation</a> for verified authorised service-centre guidance in your district.
        </div>
        <?php endif; ?>
    </div>

    <!-- FAQs & Privacy -->
    <div id="faqs" class="bg-[#f5f5f7] border border-black/[0.04] rounded-[32px] p-8 sm:p-11">
        <h2 class="font-display text-2xl sm:text-3xl font-semibold text-[#1d1d1f] mb-6">Frequently Asked Questions</h2>
        <div class="divide-y divide-[#d2d2d7]">
            <details class="py-4 group" open>
                <summary class="flex justify-between items-center font-semibold text-[15px] text-[#1d1d1f] cursor-pointer list-none">
                    <span>Can I buy directly on this website?</span>
                    <span class="text-[#6e6e73] text-lg group-open:rotate-45 transition-transform">+</span>
                </summary>
                <p class="text-[14px] text-[#6e6e73] mt-2 leading-relaxed">
                    This portal is GE Tradecom Pvt Ltd's corporate portfolio and Assam channel gateway for product discovery, specialist/business consultations, workshop registration, and routing visitors to verified Assam dealers.
                </p>
            </details>

            <details class="py-4 group">
                <summary class="flex justify-between items-center font-semibold text-[15px] text-[#1d1d1f] cursor-pointer list-none">
                    <span>How can I connect with GE Tradecom in Assam?</span>
                    <span class="text-[#6e6e73] text-lg group-open:rotate-45 transition-transform">+</span>
                </summary>
                <p class="text-[14px] text-[#6e6e73] mt-2 leading-relaxed">
                    Visit our <a href="contact.php" class="text-[#0071e3] hover:underline">Contact &amp; Escalation Desk</a> or explore <a href="about.php" class="text-[#0071e3] hover:underline">About GE Tradecom</a> to learn more about our Assam operations.
                </p>
            </details>

            <details id="privacy" class="py-4 group">
                <summary class="flex justify-between items-center font-semibold text-[15px] text-[#1d1d1f] cursor-pointer list-none">
                    <span>How is my enquiry, stock alert, or subscription information handled?</span>
                    <span class="text-[#6e6e73] text-lg group-open:rotate-45 transition-transform">+</span>
                </summary>
                <p class="text-[14px] text-[#6e6e73] mt-2 leading-relaxed">
                    Details submitted through enquiry, stock notification, workshop, or newsletter forms are protected and used solely to respond to your request or deliver opted-in updates, with clear consent and unsubscribe controls.
                </p>
            </details>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
