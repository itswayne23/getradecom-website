<?php
require_once 'config/db.php';
$page_title = 'Services, Trade-In, Financing & Support';
require_once 'includes/header.php';

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
            Clear overview of trade-in enquiries, partner financing, outlet pickup/delivery availability, service verification, and support channels across Assam.
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
                Where supported by participating verified partners, device exchange evaluations depend on physical inspection, working condition, and eligible model lists. Any valuation or bonus is determined at evaluation and is subject to partner terms.
            </p>
            <ul class="text-[13px] text-[#6e6e73] space-y-2 mb-7 list-disc pl-5">
                <li>Back up your existing device data and sign out of accounts before any evaluation.</li>
                <li>Final exchange eligibility and valuation are subject to inspection and participating partner terms.</li>
            </ul>
            <button onclick="openEnquiryModal('trade_in', 'Trade-In / Upgrade Enquiry')"
                    class="px-6 py-2.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[13px] font-medium transition cursor-pointer">
                Request Trade-In Guidance
            </button>
        </div>

        <div id="financing" class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[30px] p-8 sm:p-9">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">Payment Options</span>
            <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mt-1.5 mb-3">Financing &amp; EMI Information</h2>
            <p class="text-[14px] text-[#424245] leading-relaxed mb-4">
                Financing or instalment options&mdash;when available&mdash;are offered through approved banks, cards, or finance partners at participating outlets.
            </p>
            <ul class="text-[13px] text-[#6e6e73] space-y-2 mb-7 list-disc pl-5">
                <li>Eligible tenures, processing charges, down payments, and approval rules depend on the issuing partner and current programme terms.</li>
                <li>Confirm active financing availability directly with a listed dealer or product specialist before purchase.</li>
            </ul>
            <button onclick="openEnquiryModal('specialist', 'Financing & Payment Options Query')"
                    class="px-6 py-2.5 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[13px] font-medium transition cursor-pointer">
                Ask About Partner Options
            </button>
        </div>
    </div>

    <!-- Pickup / Delivery & Service Centre Verification -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="reveal-card motion-card bg-[#fbfbfd] border border-[#d2d2d7]/70 rounded-[28px] p-8">
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mb-2">Store Pickup &amp; Delivery Availability</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed mb-5">
                getradeCom operates with a distributor-first channel model across Assam. In-store pickup or local delivery options apply only where a verified participating outlet explicitly supports and confirms them.
            </p>
            <a href="dealers.php" class="text-[13px] font-medium text-[#0071e3] hover:underline apple-link-arrow">
                <span>Check Verified Assam Dealers</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="reveal-card motion-card bg-[#fbfbfd] border border-[#d2d2d7]/70 rounded-[28px] p-8">
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mb-2">Authorised Service-Centre Discovery</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed mb-5">
                Service and repair support locations are published only after status, service scope, and contact details are verified and approved for public display.
            </p>
            <a href="contact.php" class="text-[13px] font-medium text-[#0071e3] hover:underline apple-link-arrow">
                <span>Contact Support &amp; Escalation Desk</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    <!-- FAQs & Privacy (Apple Accordion Style) -->
    <div id="faqs" class="bg-[#f5f5f7] border border-black/[0.04] rounded-[32px] p-8 sm:p-11">
        <h2 class="font-display text-2xl sm:text-3xl font-semibold text-[#1d1d1f] mb-6">Frequently Asked Questions</h2>
        <div class="divide-y divide-[#d2d2d7]">
            <details class="py-4 group" open>
                <summary class="flex justify-between items-center font-semibold text-[15px] text-[#1d1d1f] cursor-pointer list-none">
                    <span>Can I buy directly on this website?</span>
                    <span class="text-[#6e6e73] text-lg group-open:rotate-45 transition-transform">+</span>
                </summary>
                <p class="text-[14px] text-[#6e6e73] mt-2 leading-relaxed">
                    This portal is designed for product discovery, specialist/business enquiries, workshop registration, and routing visitors to verified dealers and channel partners across Assam.
                </p>
            </details>

            <details class="py-4 group">
                <summary class="flex justify-between items-center font-semibold text-[15px] text-[#1d1d1f] cursor-pointer list-none">
                    <span>How do I find a dealer in my town or PIN code?</span>
                    <span class="text-[#6e6e73] text-lg group-open:rotate-45 transition-transform">+</span>
                </summary>
                <p class="text-[14px] text-[#6e6e73] mt-2 leading-relaxed">
                    Visit the <a href="dealers.php" class="text-[#0071e3] hover:underline">Assam Dealer Locator</a> and filter by district or search by town, store name, or PIN code.
                </p>
            </details>

            <details id="privacy" class="py-4 group">
                <summary class="flex justify-between items-center font-semibold text-[15px] text-[#1d1d1f] cursor-pointer list-none">
                    <span>How is my enquiry or subscription information handled?</span>
                    <span class="text-[#6e6e73] text-lg group-open:rotate-45 transition-transform">+</span>
                </summary>
                <p class="text-[14px] text-[#6e6e73] mt-2 leading-relaxed">
                    Details submitted through enquiry, workshop, or newsletter forms are collected solely to respond to your request or send opted-in updates, subject to applicable privacy notices and consent preferences.
                </p>
            </details>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
