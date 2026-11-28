<?php
require_once 'config/db.php';
$page_title = 'Contact & Specialist Desk';
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
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">GE Tradecom Pvt Ltd &mdash; Assam</span>
        <h1 class="font-display text-4xl sm:text-5xl font-semibold tracking-tight text-[#1d1d1f] mt-1">Contact &amp; Escalation Desk</h1>
        <p class="text-[#6e6e73] text-[15px] sm:text-[17px] mt-2 max-w-2xl">
            Reach out for product consultations, stock notifications, corporate enquiries, education programmes, or service escalation.
        </p>
    </div>
</section>

<section class="max-w-[1200px] mx-auto px-4 sm:px-6 py-14">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Contact Channels -->
        <div class="lg:col-span-5 space-y-6">
            <div class="reveal-card motion-card bg-[#f5f5f7] border border-black/[0.04] rounded-[28px] p-8">
                <h2 class="font-display text-xl font-semibold text-[#1d1d1f] mb-4">Official Support &amp; Routing</h2>
                <div class="space-y-3 text-[14px] text-[#424245]">
                    <p><strong class="text-[#1d1d1f]">Company:</strong> <?= e(SITE_NAME) ?></p>
                    <p><strong class="text-[#1d1d1f]">Territory:</strong> <?= e(TERRITORY) ?></p>
                    <p><strong class="text-[#1d1d1f]">Phone:</strong> <?= e(OFFICIAL_PHONE) ?></p>
                    <p><strong class="text-[#1d1d1f]">Email:</strong> <?= e(OFFICIAL_EMAIL) ?></p>
                    <p><strong class="text-[#1d1d1f]">WhatsApp:</strong> +<?= e(OFFICIAL_WHATSAPP) ?></p>
                    <p><strong class="text-[#1d1d1f]">Hours:</strong> 10:00 AM &ndash; 6:30 PM (Mon&ndash;Sat)</p>
                </div>
                <div class="mt-6 pt-5 border-t border-black/[0.06] flex flex-wrap gap-3">
                    <a href="about.php" class="px-5 py-2.5 rounded-full bg-white hover:bg-[#e8e8ed] text-[#1d1d1f] border border-[#d2d2d7] text-[12px] font-medium transition">
                        About GE Tradecom
                    </a>
                    <a href="https://wa.me/<?= e(OFFICIAL_WHATSAPP) ?>?text=Hello%20GE%20Tradecom%20Assam%2C%20I%20would%20like%20to%20speak%20with%20a%20specialist." target="_blank" rel="noopener"
                       class="px-5 py-2.5 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[12px] font-medium transition inline-flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-[#30d158]"></span>
                        Chat on WhatsApp
                    </a>
                </div>
            </div>

            <div class="reveal-card motion-card bg-[#161617] text-white rounded-[28px] p-8">
                <span class="text-[11px] font-semibold uppercase tracking-widest text-[#2997ff]">Channel Governance</span>
                <h3 class="font-display text-lg font-semibold mt-1.5 mb-2">B2B, Campaigns &amp; Escalations</h3>
                <p class="text-[13px] text-[#a1a1a6] leading-relaxed">
                    Interested in enterprise deployments, approved campaign coordination, or service escalation? Choose your topic in the form and our Assam operations team will review and route it.
                </p>
            </div>
        </div>

        <!-- Enquiry Form -->
        <div class="lg:col-span-7 bg-[#fbfbfd] border border-[#d2d2d7]/80 rounded-[32px] p-8 sm:p-10 shadow-sm">
            <h2 class="font-display text-2xl font-semibold text-[#1d1d1f] mb-1">Send an Enquiry</h2>
            <p class="text-[13px] text-[#6e6e73] mb-6">All fields marked with * are required.</p>

            <form action="api/submit-enquiry.php" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <input type="hidden" name="action" value="enquiry">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Enquiry Type *</label>
                        <select name="enquiry_type" class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm bg-white focus:outline-none focus:border-[#0071e3]">
                            <option value="specialist">Talk to a Product Specialist</option>
                            <option value="product">Product Availability / Specification</option>
                            <option value="stock_notify">Back-in-Stock Notification</option>
                            <option value="business">Business / Institutional Enquiry</option>
                            <option value="trade_in">Trade-In / Upgrade Guidance</option>
                            <option value="education">Student / Teacher Verification</option>
                            <option value="general">Support Escalation / General Query</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">District in Assam *</label>
                        <input type="text" name="district" required placeholder="e.g. Kamrup Metro, Nagaon, Jorhat"
                               class="w-full px-4 py-2.5 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Full Name *</label>
                        <input type="text" name="full_name" required placeholder="Your full name"
                               class="w-full px-4 py-2.5 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                    </div>
                    <div>
                        <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 XXXXX XXXXX"
                               class="w-full px-4 py-2.5 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                    </div>
                </div>

                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Email Address *</label>
                    <input type="email" name="email" required placeholder="you@example.com"
                           class="w-full px-4 py-2.5 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                </div>

                <div>
                    <label class="block text-[12px] font-semibold text-[#1d1d1f] mb-1.5">Message / Details *</label>
                    <textarea name="message" rows="4" required placeholder="How can our team help you?"
                              class="w-full px-4 py-2.5 rounded-xl bg-white border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]"></textarea>
                </div>

                <label class="flex items-start gap-2.5 text-[12px] text-[#6e6e73]">
                    <input type="checkbox" name="consent" required class="mt-0.5 accent-[#0071e3]">
                    <span>I consent to GE Tradecom Pvt Ltd or an authorised channel partner contacting me regarding my enquiry.</span>
                </label>

                <button type="submit" class="btn-tactile px-8 py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition cursor-pointer">
                    Submit Enquiry
                </button>
            </form>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
