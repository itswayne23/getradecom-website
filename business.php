<?php
require_once 'config/db.php';
$page_title = 'Small Business & Corporate Solutions';
require_once 'includes/header.php';

$flash = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
?>

<?php if ($flash): ?>
<div class="bg-[#f5f5f7] border-b border-[#d2d2d7] text-[#1d1d1f] text-[13px] py-3 px-4 text-center font-medium">
    <span class="inline-block w-2 h-2 rounded-full bg-[#30d158] mr-2"></span><?= e($flash) ?>
</div>
<?php endif; ?>

<!-- Apple at Work Hero -->
<section class="hero-titanium-glow text-white py-20 border-b border-white/10">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">
        <span class="inline-block text-[11px] font-semibold uppercase tracking-widest text-[#2997ff] mb-3">
            getradeCom B2B &amp; Institutional Channel &mdash; Assam
        </span>
        <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-semibold tracking-tight max-w-3xl leading-[1.08]">
            Solutions Built for Growing Businesses &amp; Institutions.
        </h1>
        <p class="text-[#a1a1a6] text-[16px] sm:text-[18px] mt-5 max-w-2xl leading-relaxed">
            Connect with getradeCom for bulk product enquiries, deployment consultation, and channel-partner fulfilment across Assam enterprises, schools, clinics, and offices.
        </p>
    </div>
</section>

<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">01 / Productivity</span>
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">Modern Workstations &amp; Mobility</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                Equip teams with reliable Mac and iPad hardware suited for daily operations, remote collaboration, and field workflows.
            </p>
        </div>

        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">02 / Consultation</span>
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">Requirement &amp; Fleet Planning</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                Share your device mix, expected headcount, and timeline so our team can coordinate demonstrations or quotations through authorised channel partners.
            </p>
        </div>

        <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#0071e3]">03 / Fulfilment</span>
            <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mt-2 mb-2">Assam Channel Coordination</h2>
            <p class="text-[14px] text-[#6e6e73] leading-relaxed">
                Structured routing from initial business enquiry to consultation and fulfilment via verified channel partners across Assam.
            </p>
        </div>
    </div>

    <!-- Bulk & Business Enquiry Form -->
    <div class="bg-[#fbfbfd] border border-[#d2d2d7]/80 rounded-[32px] p-8 sm:p-12 shadow-sm max-w-4xl mx-auto">
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">B2B Concierge</span>
        <h2 class="font-display text-3xl font-semibold tracking-tight text-[#1d1d1f] mt-1 mb-2">Submit a Business or Bulk Enquiry</h2>
        <p class="text-[14px] text-[#6e6e73] mb-8">
            Provide your organisation details and requirements. Fulfilment and commercial terms are coordinated through authorised channel partners subject to approval.
        </p>

        <form action="api/submit-enquiry.php" method="POST" class="space-y-5">
            <?= csrf_field() ?>
            <input type="hidden" name="action" value="enquiry">
            <input type="hidden" name="enquiry_type" value="business">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Contact Full Name *</label>
                    <input type="text" name="full_name" required placeholder="Your name"
                           class="w-full px-4 py-3 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                </div>
                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Company / Institution Name *</label>
                    <input type="text" name="company_name" required placeholder="Business or organisation name"
                           class="w-full px-4 py-3 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Phone Number *</label>
                    <input type="tel" name="phone" required placeholder="+91 XXXXX XXXXX"
                           class="w-full px-4 py-3 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                </div>
                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Work Email *</label>
                    <input type="email" name="email" required placeholder="name@company.com"
                           class="w-full px-4 py-3 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">City / District in Assam *</label>
                    <input type="text" name="district" required placeholder="e.g. Guwahati, Dibrugarh"
                           class="w-full px-4 py-3 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                </div>
                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Primary Product Interest</label>
                    <select name="product_interest" class="w-full px-4 py-3 rounded-xl border border-[#d2d2d7] text-sm bg-white focus:outline-none focus:border-[#0071e3]">
                        <option value="Mac Fleet">Mac (MacBook Air / Pro / Desktop)</option>
                        <option value="iPad Fleet">iPad for Teams / Field / Education</option>
                        <option value="iPhone Mobility">iPhone for Business Mobility</option>
                        <option value="Mixed Hardware">Mixed Hardware &amp; Accessories</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Estimated Quantity</label>
                    <input type="number" name="quantity" min="1" value="5"
                           class="w-full px-4 py-3 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                </div>
            </div>

            <div>
                <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Requirements, Timeline &amp; Current Setup</label>
                <textarea name="message" rows="4" placeholder="Share your target deployment timeline, industry/use case, and any consultation questions..."
                          class="w-full px-4 py-3 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]"></textarea>
            </div>

            <label class="flex items-start gap-2.5 text-[12px] text-[#6e6e73]">
                <input type="checkbox" name="consent" required class="mt-0.5 accent-[#0071e3]">
                <span>I consent to getradeCom and authorised channel partners contacting me regarding this business enquiry.</span>
            </label>

            <button type="submit" class="px-8 py-3.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition cursor-pointer">
                Submit Business Enquiry
            </button>
        </form>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
