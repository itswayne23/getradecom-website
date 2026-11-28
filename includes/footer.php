</main>

<!-- Official Apple-Inspired Corporate Portfolio Footer -->
<footer class="bg-[#f5f5f7] border-t border-[#d2d2d7]/60 mt-24 text-[12px] text-[#6e6e73]">
    <div class="max-w-[1080px] mx-auto px-4 sm:px-6 pt-12 pb-20">
        <!-- Distributor Governance & Compliance Footnote -->
        <div class="pb-6 mb-8 border-b border-[#d2d2d7] leading-relaxed text-[11px] text-[#6e6e73] space-y-3">
            <img src="assets/images/getradecom-logo.png" alt="GE Tradecom Pvt. Ltd." class="h-9 w-auto object-contain">
            <p>
                <strong class="font-semibold text-[#1d1d1f]">Distributor Corporate Governance Notice:</strong>
                <?= e(SITE_NAME) ?> operates as an Apple Authorised Distributor in Assam focused on public product discovery, B2B consultation, education eligibility guidance, approved campaigns, and authorised service discovery. Trade-in evaluations, financing/EMI terms, and after-sales support are subject to official Apple &amp; partner programme terms.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
            <div>
                <h4 class="font-semibold text-[#1d1d1f] mb-3 tracking-tight">Product Portfolio</h4>
                <ul class="space-y-2">
                    <li><a href="products.php?category=iPhone" class="hover:text-[#1d1d1f] hover:underline transition">iPhone</a></li>
                    <li><a href="products.php?category=Mac" class="hover:text-[#1d1d1f] hover:underline transition">Mac</a></li>
                    <li><a href="products.php?category=iPad" class="hover:text-[#1d1d1f] hover:underline transition">iPad</a></li>
                    <li><a href="products.php?category=Watch" class="hover:text-[#1d1d1f] hover:underline transition">Apple Watch</a></li>
                    <li><a href="products.php?category=AirPods" class="hover:text-[#1d1d1f] hover:underline transition">AirPods</a></li>
                    <li><a href="products.php?category=TV+%26+Home" class="hover:text-[#1d1d1f] hover:underline transition">TV &amp; Home</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-[#1d1d1f] mb-3 tracking-tight">GE Tradecom &amp; Programmes</h4>
                <ul class="space-y-2">
                    <li><a href="about.php" class="hover:text-[#1d1d1f] hover:underline transition">About Us &amp; Story</a></li>
                    <li><a href="about.php#moments" class="hover:text-[#1d1d1f] hover:underline transition">Meetings &amp; Milestones</a></li>
                    <li><a href="business.php" class="hover:text-[#1d1d1f] hover:underline transition">Small Business Solutions</a></li>
                    <li><a href="education.php" class="hover:text-[#1d1d1f] hover:underline transition">Student &amp; Teacher Programme</a></li>
                    <li><a href="promotions.php" class="hover:text-[#1d1d1f] hover:underline transition">Approved Campaigns</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-[#1d1d1f] mb-3 tracking-tight">Services &amp; Support</h4>
                <ul class="space-y-2">
                    <li><a href="services.php#trade-in" class="hover:text-[#1d1d1f] hover:underline transition">Trade-In &amp; Upgrade Info</a></li>
                    <li><a href="services.php#financing" class="hover:text-[#1d1d1f] hover:underline transition">Financing &amp; EMI Info</a></li>
                    <li><a href="services.php#service-centres" class="hover:text-[#1d1d1f] hover:underline transition">Service-Centre Discovery</a></li>
                    <li><a href="services.php#faqs" class="hover:text-[#1d1d1f] hover:underline transition">FAQs &amp; Warranty Guidance</a></li>
                    <li><a href="contact.php" class="hover:text-[#1d1d1f] hover:underline transition">Contact &amp; Escalation Desk</a></li>
                    <li><button onclick="openEnquiryModal('specialist', 'Product Specialist')" class="hover:text-[#1d1d1f] hover:underline transition cursor-pointer text-left">Talk to a Product Specialist</button></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-[#1d1d1f] mb-3 tracking-tight">Launch &amp; Campaign Updates</h4>
                <p class="mb-3 text-[11px] leading-relaxed">Opt in for new Apple launches and approved Assam campaigns.</p>
                <form action="api/submit-enquiry.php" method="POST" class="space-y-2.5">
                    <?= csrf_field() ?>
                    <input type="hidden" name="action" value="subscribe">
                    <input type="email" name="email" required placeholder="name@example.com"
                           class="w-full px-3.5 py-2 rounded-xl border border-[#d2d2d7] bg-white text-[#1d1d1f] text-[12px] focus:outline-none focus:border-[#0071e3]">
                    <label class="flex items-start gap-2 text-[11px] leading-snug">
                        <input type="checkbox" name="consent" required class="mt-0.5 accent-[#0071e3]">
                        <span>I consent to receive product and event updates from <?= e(SITE_NAME) ?>. Unsubscribe anytime.</span>
                    </label>
                    <button type="submit" class="w-full py-2 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[12px] font-medium transition cursor-pointer">
                        Subscribe
                    </button>
                </form>
                <div class="mt-4 pt-3 border-t border-[#d2d2d7] text-[11px] space-y-1 text-[#424245]">
                    <div>Phone: <?= e(OFFICIAL_PHONE) ?></div>
                    <div>Email: <?= e(OFFICIAL_EMAIL) ?></div>
                </div>
            </div>
        </div>

        <div class="pt-5 border-t border-[#d2d2d7] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 text-[11px]">
            <p>Copyright &copy; <?= date('Y') ?> <?= e(SITE_NAME) ?> &mdash; <?= e(TERRITORY) ?>. All rights reserved.</p>
            <div class="flex flex-wrap items-center gap-4">
                <a href="services.php#privacy" class="hover:text-[#1d1d1f] hover:underline">Privacy Controls</a>
                <span class="text-[#d2d2d7]">|</span>
                <a href="services.php#faqs" class="hover:text-[#1d1d1f] hover:underline">Channel Terms</a>
                <span class="text-[#d2d2d7]">|</span>
                <a href="about.php" class="hover:text-[#1d1d1f] hover:underline">About Us</a>
            </div>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Quick Concierge -->
<a href="https://wa.me/<?= e(OFFICIAL_WHATSAPP) ?>?text=Hello%20GE%20Tradecom%20Assam%2C%20I%20have%20an%20enquiry." target="_blank" rel="noopener"
   class="fixed bottom-5 right-5 z-40 group flex items-center gap-2.5 bg-white/95 hover:bg-white backdrop-blur-xl text-[#1d1d1f] pl-1.5 pr-2 sm:pr-4 py-1.5 rounded-full shadow-[0_8px_28px_rgba(0,0,0,0.12)] hover:shadow-[0_12px_34px_rgba(0,0,0,0.16)] border border-black/[0.08] transition-all duration-300 hover:-translate-y-0.5"
   aria-label="Chat on WhatsApp" title="Chat with GE Tradecom on WhatsApp">
    <span class="w-8 h-8 rounded-full bg-[#25D366] text-white flex items-center justify-center shrink-0 shadow-sm group-hover:scale-105 transition-transform duration-300">
        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/></svg>
    </span>
    <span class="hidden sm:inline text-[13px] font-medium tracking-tight">Chat on WhatsApp</span>
</a>

<!-- Spotlight Quick Search Modal (Spring Animated) -->
<div id="spotlight-modal" class="apple-modal-overlay fixed inset-0 z-50 hidden bg-black/40 flex items-start justify-center pt-20 px-4">
    <div class="apple-modal-panel bg-[#fbfbfd] border border-black/10 rounded-[28px] max-w-xl w-full p-6 shadow-2xl relative">
        <div class="flex items-center justify-between mb-4">
            <span class="text-[11px] font-semibold uppercase tracking-widest text-[#6e6e73]">Quick Search &mdash; GE Tradecom Assam</span>
            <button onclick="closeSpotlightModal()" class="p-1.5 rounded-full hover:bg-black/5 text-[#6e6e73] cursor-pointer" aria-label="Close search">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="products.php" method="GET" class="flex gap-2 mb-5">
            <input id="spotlight-input" type="text" name="q" placeholder="Search iPhone Duo, iPhone 18 Pro, MacBook Neo, iPad..."
                   class="flex-1 px-4 py-3 rounded-2xl bg-white border border-[#d2d2d7] text-sm text-[#1d1d1f] focus:outline-none focus:border-[#0071e3]">
            <button type="submit" class="px-5 py-3 rounded-2xl bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition cursor-pointer">
                Search
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
            <div>
                <div class="text-[11px] font-semibold text-[#86868b] uppercase tracking-wider mb-2">Portfolio Categories</div>
                <ul class="space-y-1.5 text-[#1d1d1f]">
                    <li><a href="products.php?category=iPhone" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">iPhone &rarr;</a></li>
                    <li><a href="products.php?category=Mac" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">MacBook Air &amp; Pro &rarr;</a></li>
                    <li><a href="products.php?category=iPad" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">iPad &amp; Apple Pencil &rarr;</a></li>
                    <li><a href="products.php?category=Watch" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Apple Watch &rarr;</a></li>
                </ul>
            </div>
            <div>
                <div class="text-[11px] font-semibold text-[#86868b] uppercase tracking-wider mb-2">Assam Channel Shortcuts</div>
                <ul class="space-y-1.5 text-[#1d1d1f]">
                    <li><a href="about.php" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">About GE Tradecom &amp; Moments &rarr;</a></li>
                    <li><a href="business.php" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Small Business Solutions &rarr;</a></li>
                    <li><a href="education.php" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Student &amp; Teacher Programme &rarr;</a></li>
                    <li><a href="promotions.php" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Approved Campaigns &rarr;</a></li>
                    <li><a href="services.php#service-centres" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Authorised Service Centres &rarr;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Reusable Product / Specialist / Stock Notification / Dealer Onboarding / Workshop Enquiry Modal -->
<div id="enquiry-modal" class="apple-modal-overlay fixed inset-0 z-50 hidden bg-black/45 flex items-center justify-center p-4">
    <div class="apple-modal-panel bg-white rounded-[28px] max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-black/5 relative">
        <button onclick="closeEnquiryModal()" class="absolute top-5 right-5 w-8 h-8 rounded-full bg-[#f5f5f7] hover:bg-[#e8e8ed] flex items-center justify-center text-[#6e6e73] hover:text-[#1d1d1f] transition cursor-pointer" aria-label="Close modal">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <span id="modal-badge" class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">GE Tradecom Concierge</span>
        <h3 id="modal-title" class="font-display text-2xl font-semibold tracking-tight text-[#1d1d1f] mt-1 mb-1">Talk to a Product Specialist</h3>
        <p id="modal-subtitle" class="text-[13px] text-[#6e6e73] mb-6">We will route your request directly to our Assam specialist team in Guwahati.</p>

        <form action="api/submit-enquiry.php" method="POST" class="space-y-4">
            <?= csrf_field() ?>
            <input type="hidden" name="action" value="enquiry">
            <input type="hidden" name="enquiry_type" id="modal-enquiry-type" value="specialist">
            <input type="hidden" name="product_interest" id="modal-product-interest" value="">
            <input type="hidden" name="workshop_id" id="modal-workshop-id" value="">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <input type="text" name="full_name" required placeholder="Full Name *"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                <input type="tel" name="phone" required placeholder="Mobile Number *"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <input type="email" name="email" required placeholder="Email Address *"
                       class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]">
                <select name="district" required class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm bg-white focus:outline-none focus:border-[#0071e3]">
                    <option value="">Select Assam District *</option>
                    <option>Kamrup Metropolitan (Guwahati)</option>
                    <option>Nagaon</option>
                    <option>Dibrugarh</option>
                    <option>Jorhat</option>
                    <option>Cachar (Silchar)</option>
                    <option>Sonitpur (Tezpur)</option>
                    <option>Tinsukia</option>
                    <option>Other Assam District</option>
                </select>
            </div>
            <textarea name="message" rows="3" placeholder="Tell us your requirements (configuration, storage, quantity, or questions)..."
                      class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]"></textarea>

            <label class="flex items-start gap-2 text-[11px] text-[#6e6e73] leading-snug">
                <input type="checkbox" name="consent" required class="mt-0.5 accent-[#0071e3]">
                <span>I agree to be contacted by GE Tradecom Pvt Ltd or an authorised Assam partner regarding this request.</span>
            </label>

            <button type="submit" class="w-full py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white font-medium text-sm transition cursor-pointer">
                Submit Request
            </button>
        </form>
    </div>
</div>

<script>
// 1. Scroll-Reactive Navbar Shadow
const mainNavbar = document.getElementById('main-navbar');
function syncNavMetrics() {
    if (!mainNavbar) return;
    const rect = mainNavbar.getBoundingClientRect();
    document.documentElement.style.setProperty('--nav-bottom', Math.max(0, rect.bottom) + 'px');
    mainNavbar.classList.toggle('is-scrolled', window.scrollY > 12);
}
window.addEventListener('scroll', syncNavMetrics, { passive: true });
window.addEventListener('resize', syncNavMetrics);
syncNavMetrics();

// 2. Mobile Apple Animated Drawer + 2-Line Burger Morph
const mobileBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
const appleBurger = document.getElementById('apple-burger');
mobileBtn?.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.toggle('is-open');
    appleBurger?.classList.toggle('is-open', isOpen);
    mobileBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
});

// 3. Official Apple-Style Global Nav Curtain + Gliding Hover Pill
const CURTAIN_DATA = {
    Mac: {
        primaryTitle: 'Explore Mac',
        primary: [
            { label: 'Explore All Mac', href: 'products.php?category=Mac' },
            { label: 'MacBook Neo', href: 'product-details.php?slug=macbook-neo' },
            { label: 'MacBook Air 13" & 15"', href: 'product-details.php?slug=macbook-air' },
            { label: 'MacBook Pro 14" & 16"', href: 'product-details.php?slug=macbook-pro' },
            { label: 'Mac for Business Fleets', href: 'business.php' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'About GE Tradecom', href: 'about.php' },
            { label: 'Trade-In & Upgrade Info', href: 'services.php#trade-in' },
            { label: 'Financing & EMI Info', href: 'services.php#financing' }
        ],
        tertiaryTitle: 'Programmes & Support',
        tertiary: [
            { label: 'Student & Teacher Programme', href: 'education.php' },
            { label: 'Contact & Escalation Desk', href: 'contact.php' },
            { label: 'Talk to a Specialist', action: "openEnquiryModal('specialist', 'Mac Consultation')" }
        ]
    },
    iPad: {
        primaryTitle: 'Explore iPad',
        primary: [
            { label: 'Explore All iPad', href: 'products.php?category=iPad' },
            { label: 'iPad Pro', href: 'product-details.php?slug=ipad-pro' },
            { label: 'iPad Air', href: 'product-details.php?slug=ipad-air' },
            { label: 'Apple Pencil Pro', href: 'product-details.php?slug=apple-pencil-pro' },
            { label: 'iPad for Education', href: 'education.php' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'About GE Tradecom', href: 'about.php' },
            { label: 'Trade-In Guidance', href: 'services.php#trade-in' },
            { label: 'Partner Financing', href: 'services.php#financing' }
        ],
        tertiaryTitle: 'More from GE Tradecom',
        tertiary: [
            { label: 'Meetings & Milestones', href: 'about.php#moments' },
            { label: 'Stock Availability Alert', action: "openEnquiryModal('stock_notify', 'iPad Pro')" }
        ]
    },
    iPhone: {
        primaryTitle: 'Explore iPhone',
        primary: [
            { label: 'Explore All iPhone', href: 'products.php?category=iPhone' },
            { label: 'iPhone Duo', href: 'product-details.php?slug=iphone-duo' },
            { label: 'iPhone 18 Pro', href: 'product-details.php?slug=iphone-18-pro' },
            { label: 'iPhone Air', href: 'product-details.php?slug=iphone-air' },
            { label: 'iPhone for Business Mobility', href: 'business.php' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'About GE Tradecom', href: 'about.php' },
            { label: 'Trade-In Evaluation Info', href: 'services.php#trade-in' },
            { label: 'Approved Campaigns', href: 'promotions.php' }
        ],
        tertiaryTitle: 'Concierge',
        tertiary: [
            { label: 'Meetings & Milestones', href: 'about.php#moments' },
            { label: 'Stock Notification', action: "openEnquiryModal('stock_notify', 'iPhone 18 Pro')" },
            { label: 'Talk to a Specialist', action: "openEnquiryModal('product', 'iPhone 18 Pro')" }
        ]
    },
    Watch: {
        primaryTitle: 'Explore Watch',
        primary: [
            { label: 'Explore All Apple Watch', href: 'products.php?category=Watch' },
            { label: 'Apple Watch Series 12', href: 'product-details.php?slug=apple-watch-series-12' },
            { label: 'Apple Watch Ultra 4', href: 'product-details.php?slug=apple-watch-ultra-4' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'About GE Tradecom', href: 'about.php' },
            { label: 'Authorised Service Centres', href: 'services.php#service-centres' }
        ],
        tertiaryTitle: 'Concierge',
        tertiary: [
            { label: 'Enquire About Watch', action: "openEnquiryModal('product', 'Apple Watch Series 12')" }
        ]
    },
    AirPods: {
        primaryTitle: 'Explore AirPods',
        primary: [
            { label: 'Explore All AirPods', href: 'products.php?category=AirPods' },
            { label: 'AirPods Pro 3', href: 'product-details.php?slug=airpods-pro-3' },
            { label: 'AirPods 5', href: 'product-details.php?slug=airpods-5' },
            { label: 'AirPods Max 2', href: 'product-details.php?slug=airpods-max-2' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'About GE Tradecom', href: 'about.php' },
            { label: 'TV & Home', href: 'products.php?category=TV+%26+Home' }
        ],
        tertiaryTitle: 'Concierge',
        tertiary: [
            { label: 'Ask a Specialist', action: "openEnquiryModal('product', 'AirPods Pro 3')" }
        ]
    },
    TVHome: {
        primaryTitle: 'Explore TV & Home',
        primary: [
            { label: 'Explore All TV & Home', href: 'products.php?category=TV+%26+Home' },
            { label: 'Apple HomeView', href: 'product-details.php?slug=apple-homeview' },
            { label: 'Apple TV 4K', href: 'product-details.php?slug=apple-tv-4k' },
            { label: 'HomePod mini 2', href: 'product-details.php?slug=homepod-mini-2' },
            { label: 'HomePod', href: 'product-details.php?slug=homepod' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'About GE Tradecom', href: 'about.php' },
            { label: 'Bulk Corporate Orders', href: 'business.php' }
        ],
        tertiaryTitle: 'Support',
        tertiary: [
            { label: 'Ask a Specialist', action: "openEnquiryModal('product', 'Apple HomeView')" }
        ]
    },
    About: {
        primaryTitle: 'About GE Tradecom',
        primary: [
            { label: 'Our Story & Mission', href: 'about.php' },
            { label: 'Meetings & Milestones', href: 'about.php#moments' },
            { label: 'Leadership & Values', href: 'about.php#values' },
            { label: 'Contact Us', href: 'contact.php' }
        ],
        secondaryTitle: 'Programmes',
        secondary: [
            { label: 'Small Business Solutions', href: 'business.php' },
            { label: 'Student & Teacher Programme', href: 'education.php' },
            { label: 'Approved Campaigns', href: 'promotions.php' }
        ],
        tertiaryTitle: 'Connect',
        tertiary: [
            { label: 'Talk to a Specialist', action: "openEnquiryModal('specialist', 'Corporate Consultation')" }
        ]
    },
    Business: {
        primaryTitle: 'Business & Education',
        primary: [
            { label: 'Small Business Solutions', href: 'business.php' },
            { label: 'Student & Teacher Programme', href: 'education.php' },
            { label: 'Approved Assam Campaigns', href: 'promotions.php' }
        ],
        secondaryTitle: 'Enterprise Services',
        secondary: [
            { label: 'Bulk Deployment Enquiry', href: 'business.php#b2b-form' },
            { label: 'Compare Portfolio Models', href: 'products.php' }
        ],
        tertiaryTitle: 'Concierge',
        tertiary: [
            { label: 'Request B2B Consultation', action: "openEnquiryModal('business', 'Corporate / Institutional Enquiry')" }
        ]
    },
    Services: {
        primaryTitle: 'Services & Governance',
        primary: [
            { label: 'Services Overview', href: 'services.php' },
            { label: 'Trade-In & Upgrade Info', href: 'services.php#trade-in' },
            { label: 'Financing & EMI Info', href: 'services.php#financing' },
            { label: 'Service-Centre Discovery', href: 'services.php#service-centres' }
        ],
        secondaryTitle: 'Support & Policies',
        secondary: [
            { label: 'Pickup & Delivery Info', href: 'services.php#pickup-delivery' },
            { label: 'FAQs & Warranty Guidance', href: 'services.php#faqs' },
            { label: 'Contact & Escalation', href: 'contact.php' }
        ],
        tertiaryTitle: 'Quick Requests',
        tertiary: [
            { label: 'Request Trade-In Guidance', action: "openEnquiryModal('trade_in', 'Trade-In / Upgrade Enquiry')" }
        ]
    }
};

const desktopNav = document.getElementById('desktop-nav');
const hoverPill = document.getElementById('nav-hover-pill');
const navCurtain = document.getElementById('apple-nav-curtain');
const curtainBackdrop = document.getElementById('nav-curtain-backdrop');
const curtainContent = document.getElementById('curtain-content');
let curtainCloseTimer = null;
let curtainOpenTimer = null;
let curtainSwitchTimer = null;
let activeCurtainKey = null;

function renderCurtainLinks(items, isPrimary) {
    return items.map((item, idx) => {
        const delay = (idx * 55) + 'ms';
        const cls = isPrimary
            ? 'curtain-stagger block font-display text-[22px] font-semibold tracking-tight text-[#1d1d1f] hover:text-[#0071e3] transition-colors py-1'
            : 'curtain-stagger block text-[13px] font-medium text-[#424245] hover:text-[#0071e3] transition-colors py-1';
        if (item.action) {
            return `<button type="button" onclick="closeNavCurtain(); ${item.action}" class="${cls} text-left cursor-pointer" style="transition-delay:${delay}">${item.label} &rarr;</button>`;
        }
        return `<a href="${item.href}" class="${cls}" style="transition-delay:${delay}">${item.label}</a>`;
    }).join('');
}

function buildCurtainHTML(data) {
    return `
        <div class="col-span-5">
            <div class="text-[11px] font-semibold uppercase tracking-wider text-[#86868b] mb-3 curtain-stagger">${data.primaryTitle}</div>
            <div class="space-y-0.5">${renderCurtainLinks(data.primary, true)}</div>
        </div>
        <div class="col-span-4 border-l border-black/[0.06] pl-8">
            <div class="text-[11px] font-semibold uppercase tracking-wider text-[#86868b] mb-3 curtain-stagger" style="transition-delay:60ms">${data.secondaryTitle}</div>
            <div class="space-y-1">${renderCurtainLinks(data.secondary, false)}</div>
        </div>
        <div class="col-span-3 border-l border-black/[0.06] pl-8">
            <div class="text-[11px] font-semibold uppercase tracking-wider text-[#86868b] mb-3 curtain-stagger" style="transition-delay:120ms">${data.tertiaryTitle}</div>
            <div class="space-y-1">${renderCurtainLinks(data.tertiary, false)}</div>
        </div>
    `;
}

function moveNavPill(triggerEl) {
    if (!hoverPill || !triggerEl || !desktopNav) return;
    const navRect = desktopNav.getBoundingClientRect();
    const elRect = triggerEl.getBoundingClientRect();
    const wasVisible = hoverPill.classList.contains('is-visible');

    if (!wasVisible) {
        hoverPill.style.transition = 'none';
        hoverPill.style.width = elRect.width + 'px';
        hoverPill.style.transform = `translate3d(${elRect.left - navRect.left}px, -50%, 0)`;
        void hoverPill.offsetWidth;
        hoverPill.style.transition = '';
        hoverPill.classList.add('is-visible');
    } else {
        hoverPill.style.width = elRect.width + 'px';
        hoverPill.style.transform = `translate3d(${elRect.left - navRect.left}px, -50%, 0)`;
    }
}

function openNavCurtain(key, triggerEl) {
    clearTimeout(curtainCloseTimer);
    clearTimeout(curtainOpenTimer);
    syncNavMetrics();
    moveNavPill(triggerEl);

    const data = CURTAIN_DATA[key];
    if (!data || !navCurtain || !curtainContent) return;

    const alreadyOpen = navCurtain.classList.contains('is-open');

    if (alreadyOpen && activeCurtainKey !== key) {
        clearTimeout(curtainSwitchTimer);
        curtainContent.classList.add('is-switching');
        curtainSwitchTimer = setTimeout(() => {
            activeCurtainKey = key;
            curtainContent.innerHTML = buildCurtainHTML(data);
            void curtainContent.offsetWidth;
            requestAnimationFrame(() => {
                curtainContent.classList.remove('is-switching');
            });
        }, 110);
        return;
    }

    if (!alreadyOpen) {
        curtainOpenTimer = setTimeout(() => {
            activeCurtainKey = key;
            curtainContent.classList.remove('is-switching');
            curtainContent.innerHTML = buildCurtainHTML(data);
            void navCurtain.offsetWidth;
            requestAnimationFrame(() => {
                navCurtain.classList.add('is-open');
                curtainBackdrop?.classList.add('is-open');
                mainNavbar?.classList.add('curtain-open');
            });
        }, 45);
    }
}

function scheduleCloseNavCurtain() {
    clearTimeout(curtainOpenTimer);
    clearTimeout(curtainCloseTimer);
    curtainCloseTimer = setTimeout(closeNavCurtain, 180);
}

function closeNavCurtain() {
    clearTimeout(curtainOpenTimer);
    clearTimeout(curtainCloseTimer);
    clearTimeout(curtainSwitchTimer);
    activeCurtainKey = null;
    navCurtain?.classList.remove('is-open');
    curtainBackdrop?.classList.remove('is-open');
    mainNavbar?.classList.remove('curtain-open');
    hoverPill?.classList.remove('is-visible');
}

document.querySelectorAll('.nav-trigger').forEach(link => {
    const key = link.getAttribute('data-curtain');
    link.addEventListener('mouseenter', () => openNavCurtain(key, link));
    link.addEventListener('focus', () => openNavCurtain(key, link));
});

desktopNav?.addEventListener('mouseleave', () => {
    hoverPill?.classList.remove('is-visible');
});
mainNavbar?.addEventListener('mouseenter', () => clearTimeout(curtainCloseTimer));
mainNavbar?.addEventListener('mouseleave', scheduleCloseNavCurtain);
navCurtain?.addEventListener('mouseenter', () => clearTimeout(curtainCloseTimer));
navCurtain?.addEventListener('mouseleave', scheduleCloseNavCurtain);
curtainBackdrop?.addEventListener('mouseenter', closeNavCurtain);
curtainBackdrop?.addEventListener('click', closeNavCurtain);

// 4. Spring-Animated Enquiry & Spotlight Modals
function showSpringModal(el) {
    if (!el) return;
    closeNavCurtain();
    el.classList.remove('hidden');
    requestAnimationFrame(() => {
        requestAnimationFrame(() => el.classList.add('is-open'));
    });
}

function hideSpringModal(el) {
    if (!el || el.classList.contains('hidden')) return;
    el.classList.remove('is-open');
    setTimeout(() => el.classList.add('hidden'), 360);
}

function openEnquiryModal(type, productLabel, workshopId) {
    const badgeEl = document.getElementById('modal-badge');
    const subEl = document.getElementById('modal-subtitle');
    document.getElementById('modal-enquiry-type').value = type || 'specialist';
    document.getElementById('modal-product-interest').value = productLabel || '';
    document.getElementById('modal-workshop-id').value = workshopId || '';

    const labels = {
        stock_notify: ['Stock Notification', 'Stock Alert: ' + (productLabel || 'Apple Product'), 'Register your details to be notified when this model or configuration becomes available via verified Assam partners.'],
        dealer_onboarding: ['Partner Registration', 'Assam Dealer Partner Onboarding', 'Submit your business details for GE Tradecom verification and authorised channel onboarding across Assam.'],
        education: ['Education Eligibility', 'Student & Teacher Verification', 'Submit institutional details for eligibility verification and partner-routed education guidance.'],
        trade_in: ['Upgrade Evaluation', 'Trade-In / Upgrade Guidance', 'Request partner-led exchange guidance. Final valuation depends on physical inspection and eligible model terms.']
    };

    if (labels[type]) {
        badgeEl.textContent = labels[type][0];
        document.getElementById('modal-title').textContent = labels[type][1];
        subEl.textContent = labels[type][2];
    } else {
        badgeEl.textContent = 'GE Tradecom Concierge';
        document.getElementById('modal-title').textContent = productLabel ? 'Enquire: ' + productLabel : 'Talk to a Product Specialist';
        subEl.textContent = 'We will route your request directly to our Assam specialist team in Guwahati.';
    }

    showSpringModal(document.getElementById('enquiry-modal'));
}

function closeEnquiryModal() {
    hideSpringModal(document.getElementById('enquiry-modal'));
}

function selectCardFinish(btn, visualId, colorName, hex, imgUrl) {
    const group = btn.closest('[data-swatch-group]');
    if (group) {
        group.querySelectorAll('.card-swatch').forEach(el => {
            el.classList.remove('border-[#0071e3]', 'ring-1', 'ring-[#0071e3]/30');
            el.classList.add('border-black/[0.08]');
        });
        btn.classList.remove('border-black/[0.08]');
        btn.classList.add('border-[#0071e3]', 'ring-1', 'ring-[#0071e3]/30');
    }

    const visual = document.getElementById(visualId);
    if (!visual) return;
    if (visual.tagName === 'IMG' && imgUrl) {
        visual.style.opacity = '0.45';
        visual.src = imgUrl;
        visual.onload = () => { visual.style.opacity = '1'; };
    } else if (hex) {
        const frame = visual.querySelector('div');
        if (frame) {
            frame.style.borderColor = hex;
            frame.style.boxShadow = `0 20px 38px -14px ${hex}66`;
        }
    }
}

function openSpotlightModal() {
    const modal = document.getElementById('spotlight-modal');
    showSpringModal(modal);
    setTimeout(() => document.getElementById('spotlight-input')?.focus(), 120);
}

function closeSpotlightModal() {
    hideSpringModal(document.getElementById('spotlight-modal'));
}

document.getElementById('enquiry-modal')?.addEventListener('click', (e) => {
    if (e.target.id === 'enquiry-modal') closeEnquiryModal();
});
document.getElementById('spotlight-modal')?.addEventListener('click', (e) => {
    if (e.target.id === 'spotlight-modal') closeSpotlightModal();
});
document.addEventListener('keydown', (e) => {
    if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
        e.preventDefault();
        openSpotlightModal();
    } else if (e.key === 'Escape') {
        closeNavCurtain();
        closeEnquiryModal();
        closeSpotlightModal();
    }
});

// 5. Staggered Fluid Scroll Reveal Observer
const revealObserver = new IntersectionObserver((entries) => {
    let visibleInBatch = 0;
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.transitionDelay = (visibleInBatch * 85) + 'ms';
            visibleInBatch++;
            entry.target.classList.add('is-visible');
            revealObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal-card').forEach(el => revealObserver.observe(el));

// 6. Silky rAF-Interpolated 3D Hardware Stage Tilt
document.querySelectorAll('[data-tilt-stage]').forEach(stage => {
    let targetX = 0, targetY = 0;
    let currentX = 0, currentY = 0;
    let rafId = null;

    function tick() {
        currentX += (targetX - currentX) * 0.085;
        currentY += (targetY - currentY) * 0.085;
        stage.style.transform = `perspective(1200px) rotateY(${currentX.toFixed(3)}deg) rotateX(${currentY.toFixed(3)}deg)`;

        if (Math.abs(targetX - currentX) > 0.005 || Math.abs(targetY - currentY) > 0.005) {
            rafId = requestAnimationFrame(tick);
        } else {
            rafId = null;
        }
    }

    stage.addEventListener('mousemove', (e) => {
        const rect = stage.getBoundingClientRect();
        const nx = (e.clientX - rect.left) / rect.width - 0.5;
        const ny = (e.clientY - rect.top) / rect.height - 0.5;
        targetX = nx * 6.5;
        targetY = -ny * 4.5;
        if (!rafId) rafId = requestAnimationFrame(tick);
    });

    stage.addEventListener('mouseleave', () => {
        targetX = 0;
        targetY = 0;
        if (!rafId) rafId = requestAnimationFrame(tick);
    });
});
</script>

</body>
</html>
