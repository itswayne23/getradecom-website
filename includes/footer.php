</main>

<!-- Official Apple-Inspired Directory Footer -->
<footer class="bg-[#f5f5f7] border-t border-[#d2d2d7]/60 mt-24 text-[12px] text-[#6e6e73]">
    <div class="max-w-[1024px] mx-auto px-4 sm:px-6 py-12">
        <!-- Compliance Footnote -->
        <div class="pb-6 mb-8 border-b border-[#d2d2d7] leading-relaxed text-[11px] text-[#6e6e73] space-y-2">
            <p>
                <strong class="font-semibold text-[#1d1d1f]">Channel &amp; Availability Notice:</strong>
                Product availability, trade-in evaluations, financing options, and store pickup or local delivery services are fulfilled exclusively through verified participating dealers and authorised service partners across Assam. Specifications, stock, and financing terms are subject to official partner confirmation and approval.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
            <div>
                <h4 class="font-semibold text-[#1d1d1f] mb-3 tracking-tight">Shop &amp; Explore</h4>
                <ul class="space-y-2">
                    <li><a href="products.php?category=iPhone" class="hover:text-[#1d1d1f] hover:underline transition">iPhone</a></li>
                    <li><a href="products.php?category=Mac" class="hover:text-[#1d1d1f] hover:underline transition">Mac</a></li>
                    <li><a href="products.php?category=iPad" class="hover:text-[#1d1d1f] hover:underline transition">iPad</a></li>
                    <li><a href="products.php?category=Watch" class="hover:text-[#1d1d1f] hover:underline transition">Apple Watch</a></li>
                    <li><a href="products.php?category=AirPods" class="hover:text-[#1d1d1f] hover:underline transition">AirPods</a></li>
                    <li><a href="products.php?category=TV+%26+Home" class="hover:text-[#1d1d1f] hover:underline transition">TV &amp; Home</a></li>
                    <li><a href="products.php?category=Accessories" class="hover:text-[#1d1d1f] hover:underline transition">Accessories</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-[#1d1d1f] mb-3 tracking-tight">Assam Channel &amp; Services</h4>
                <ul class="space-y-2">
                    <li><a href="dealers.php" class="hover:text-[#1d1d1f] hover:underline transition">Assam Dealer Locator</a></li>
                    <li><a href="business.php" class="hover:text-[#1d1d1f] hover:underline transition">Small Business Solutions</a></li>
                    <li><a href="services.php#trade-in" class="hover:text-[#1d1d1f] hover:underline transition">Trade-In &amp; Upgrade Info</a></li>
                    <li><a href="services.php#financing" class="hover:text-[#1d1d1f] hover:underline transition">Financing &amp; EMI Info</a></li>
                    <li><a href="workshops.php" class="hover:text-[#1d1d1f] hover:underline transition">Workshops &amp; Training</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-[#1d1d1f] mb-3 tracking-tight">Support</h4>
                <ul class="space-y-2">
                    <li><a href="services.php#faqs" class="hover:text-[#1d1d1f] hover:underline transition">FAQs &amp; Warranty Guidance</a></li>
                    <li><a href="contact.php" class="hover:text-[#1d1d1f] hover:underline transition">Contact Us</a></li>
                    <li><button onclick="openEnquiryModal('specialist', 'Product Specialist')" class="hover:text-[#1d1d1f] hover:underline transition cursor-pointer text-left">Talk to a Product Specialist</button></li>
                    <li class="pt-1 text-[#424245]">Phone: <?= e(OFFICIAL_PHONE) ?></li>
                    <li class="text-[#424245]">Email: <?= e(OFFICIAL_EMAIL) ?></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-[#1d1d1f] mb-3 tracking-tight">Stay Updated</h4>
                <p class="mb-3 text-[11px] leading-relaxed">Receive updates on new product launches, workshops, and approved Assam campaigns.</p>
                <form action="api/submit-enquiry.php" method="POST" class="space-y-2.5">
                    <?= csrf_field() ?>
                    <input type="hidden" name="action" value="subscribe">
                    <input type="email" name="email" required placeholder="name@example.com"
                           class="w-full px-3.5 py-2 rounded-xl border border-[#d2d2d7] bg-white text-[#1d1d1f] text-[12px] focus:outline-none focus:border-[#0071e3]">
                    <label class="flex items-start gap-2 text-[11px] leading-snug">
                        <input type="checkbox" name="consent" required class="mt-0.5 accent-[#0071e3]">
                        <span>I consent to receive product and event updates. I can unsubscribe anytime.</span>
                    </label>
                    <button type="submit" class="w-full py-2 rounded-full bg-[#1d1d1f] hover:bg-black text-white text-[12px] font-medium transition cursor-pointer">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <div class="pt-5 border-t border-[#d2d2d7] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 text-[11px]">
            <p>Copyright &copy; <?= date('Y') ?> <?= e(SITE_NAME) ?> &mdash; <?= e(TERRITORY) ?>. All rights reserved.</p>
            <div class="flex flex-wrap items-center gap-4">
                <a href="services.php#privacy" class="hover:text-[#1d1d1f] hover:underline">Privacy Policy</a>
                <span class="text-[#d2d2d7]">|</span>
                <a href="services.php#faqs" class="hover:text-[#1d1d1f] hover:underline">Terms of Use</a>
                <span class="text-[#d2d2d7]">|</span>
                <a href="dealers.php" class="hover:text-[#1d1d1f] hover:underline">Assam Network</a>
            </div>
        </div>
    </div>
</footer>

<!-- Floating Apple-Polished WhatsApp Quick Concierge -->
<a href="https://wa.me/<?= e(OFFICIAL_WHATSAPP) ?>?text=Hello%20getradeCom%20Assam%2C%20I%20have%20a%20product%20enquiry." target="_blank" rel="noopener"
   class="btn-tactile fixed bottom-6 right-6 z-40 flex items-center gap-2 bg-[#1d1d1f]/90 hover:bg-[#000000] backdrop-blur-md text-white px-4 py-2.5 rounded-full shadow-[0_12px_32px_rgba(0,0,0,0.22)] border border-white/15 transition font-medium text-xs"
   title="WhatsApp getradeCom Assam">
    <span class="w-2.5 h-2.5 rounded-full bg-[#30d158] shadow-[0_0_8px_#30d158]"></span>
    <svg class="w-4 h-4 fill-current text-[#30d158]" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/></svg>
    <span class="hidden sm:inline">WhatsApp Specialist</span>
</a>

<!-- Spotlight Quick Search Modal (Spring Animated) -->
<div id="spotlight-modal" class="apple-modal-overlay fixed inset-0 z-50 hidden bg-black/40 flex items-start justify-center pt-20 px-4">
    <div class="apple-modal-panel bg-[#fbfbfd] border border-black/10 rounded-[28px] max-w-xl w-full p-6 shadow-2xl relative">
        <div class="flex items-center justify-between mb-4">
            <span class="text-[11px] font-semibold uppercase tracking-widest text-[#6e6e73]">Quick Search &mdash; getradeCom Assam</span>
            <button onclick="closeSpotlightModal()" class="p-1.5 rounded-full hover:bg-black/5 text-[#6e6e73] cursor-pointer" aria-label="Close search">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="products.php" method="GET" class="flex gap-2 mb-5">
            <input id="spotlight-input" type="text" name="q" placeholder="Search iPhone 17 Pro, MacBook Air M4, iPad..."
                   class="flex-1 px-4 py-3 rounded-2xl bg-white border border-[#d2d2d7] text-sm text-[#1d1d1f] focus:outline-none focus:border-[#0071e3]">
            <button type="submit" class="px-5 py-3 rounded-2xl bg-[#0071e3] hover:bg-[#0077ed] text-white text-sm font-medium transition cursor-pointer">
                Search
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
            <div>
                <div class="text-[11px] font-semibold text-[#86868b] uppercase tracking-wider mb-2">Popular Lineup</div>
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
                    <li><a href="dealers.php" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Locate Assam Dealers &rarr;</a></li>
                    <li><a href="business.php" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Business &amp; Bulk Orders &rarr;</a></li>
                    <li><a href="services.php#trade-in" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Trade-In &amp; Financing &rarr;</a></li>
                    <li><a href="workshops.php" class="block px-3 py-1.5 rounded-lg hover:bg-black/[0.04]">Assam Workshops &rarr;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Reusable Product / Specialist / Workshop Enquiry Modal (Spring Animated) -->
<div id="enquiry-modal" class="apple-modal-overlay fixed inset-0 z-50 hidden bg-black/45 flex items-center justify-center p-4">
    <div class="apple-modal-panel bg-white rounded-[28px] max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-black/5 relative">
        <button onclick="closeEnquiryModal()" class="absolute top-5 right-5 w-8 h-8 rounded-full bg-[#f5f5f7] hover:bg-[#e8e8ed] flex items-center justify-center text-[#6e6e73] hover:text-[#1d1d1f] transition cursor-pointer" aria-label="Close modal">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <span class="text-[11px] font-semibold uppercase tracking-widest text-[#0071e3]">getradeCom Concierge</span>
        <h3 id="modal-title" class="font-display text-2xl font-semibold tracking-tight text-[#1d1d1f] mt-1 mb-1">Talk to a Product Specialist</h3>
        <p class="text-[13px] text-[#6e6e73] mb-6">We will route your enquiry to our Assam specialist team or your nearest verified dealer.</p>

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
            <textarea name="message" rows="3" placeholder="Tell us what you are looking for (model, storage, quantity, or questions)..."
                      class="w-full px-4 py-2.5 rounded-xl border border-[#d2d2d7] text-sm focus:outline-none focus:border-[#0071e3]"></textarea>

            <label class="flex items-start gap-2 text-[11px] text-[#6e6e73] leading-snug">
                <input type="checkbox" name="consent" required class="mt-0.5 accent-[#0071e3]">
                <span>I agree to be contacted by getradeCom Assam or an authorised local dealer regarding this enquiry.</span>
            </label>

            <button type="submit" class="w-full py-3 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white font-medium text-sm transition cursor-pointer">
                Submit Enquiry
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
            { label: 'MacBook Air M4', href: 'product-details.php?slug=macbook-air-m4' },
            { label: 'MacBook Pro M4 Pro', href: 'product-details.php?slug=macbook-pro-m4-pro' },
            { label: 'Mac for Business Fleets', href: 'business.php' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'Locate an Assam Dealer', href: 'dealers.php' },
            { label: 'Trade-In & Upgrade Info', href: 'services.php#trade-in' },
            { label: 'Financing & EMI Options', href: 'services.php#financing' }
        ],
        tertiaryTitle: 'More from getradeCom',
        tertiary: [
            { label: 'Mac M4 Workshops', href: 'workshops.php' },
            { label: 'Talk to a Specialist', action: "openEnquiryModal('specialist', 'Mac Consultation')" }
        ]
    },
    iPad: {
        primaryTitle: 'Explore iPad',
        primary: [
            { label: 'Explore All iPad', href: 'products.php?category=iPad' },
            { label: 'iPad Air', href: 'product-details.php?slug=ipad-air' },
            { label: 'Apple Pencil Pro', href: 'product-details.php?slug=apple-pencil-pro' },
            { label: 'iPad for Teams & Education', href: 'business.php' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'Find Authorised Dealers', href: 'dealers.php' },
            { label: 'Trade-In Guidance', href: 'services.php#trade-in' },
            { label: 'Partner Financing', href: 'services.php#financing' }
        ],
        tertiaryTitle: 'More from getradeCom',
        tertiary: [
            { label: 'iPad Creative Sessions', href: 'workshops.php' },
            { label: 'Enquire About iPad', action: "openEnquiryModal('product', 'iPad Lineup')" }
        ]
    },
    iPhone: {
        primaryTitle: 'Explore iPhone',
        primary: [
            { label: 'Explore All iPhone', href: 'products.php?category=iPhone' },
            { label: 'iPhone 17 Pro', href: 'product-details.php?slug=iphone-17-pro' },
            { label: 'iPhone for Business Mobility', href: 'business.php' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'Locate Nearest Outlet', href: 'dealers.php' },
            { label: 'Trade-In Evaluation Info', href: 'services.php#trade-in' },
            { label: 'Bank & EMI Options', href: 'services.php#financing' }
        ],
        tertiaryTitle: 'More from getradeCom',
        tertiary: [
            { label: 'iPhone Photography Workshops', href: 'workshops.php' },
            { label: 'Talk to a Specialist', action: "openEnquiryModal('product', 'iPhone 17 Pro')" }
        ]
    },
    Watch: {
        primaryTitle: 'Explore Watch',
        primary: [
            { label: 'Explore All Apple Watch', href: 'products.php?category=Watch' },
            { label: 'Apple Watch Series 11', href: 'product-details.php?slug=apple-watch-series-11' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'Verified Assam Dealers', href: 'dealers.php' },
            { label: 'Support & Warranty FAQs', href: 'services.php#faqs' }
        ],
        tertiaryTitle: 'Concierge',
        tertiary: [
            { label: 'Enquire About Watch', action: "openEnquiryModal('product', 'Apple Watch Series 11')" }
        ]
    },
    AirPods: {
        primaryTitle: 'Explore AirPods',
        primary: [
            { label: 'Explore All AirPods', href: 'products.php?category=AirPods' },
            { label: 'AirPods Pro (2nd Gen)', href: 'product-details.php?slug=airpods-pro-2' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'Find an Outlet in Assam', href: 'dealers.php' },
            { label: 'TV & Home Audio', href: 'products.php?category=TV+%26+Home' }
        ],
        tertiaryTitle: 'Concierge',
        tertiary: [
            { label: 'Ask a Specialist', action: "openEnquiryModal('product', 'AirPods Lineup')" }
        ]
    },
    Accessories: {
        primaryTitle: 'Explore Accessories',
        primary: [
            { label: 'All Accessories', href: 'products.php?category=Accessories' },
            { label: 'Apple Pencil Pro', href: 'product-details.php?slug=apple-pencil-pro' },
            { label: 'TV & Home', href: 'products.php?category=TV+%26+Home' }
        ],
        secondaryTitle: 'Assam Channel',
        secondary: [
            { label: 'Check Outlet Stock', href: 'dealers.php' },
            { label: 'Bulk Corporate Orders', href: 'business.php' }
        ],
        tertiaryTitle: 'Support',
        tertiary: [
            { label: 'Contact Support Desk', href: 'contact.php' }
        ]
    },
    Dealers: {
        primaryTitle: 'Assam Dealer Network',
        primary: [
            { label: 'Find All Assam Dealers', href: 'dealers.php' },
            { label: 'Guwahati (Kamrup Metro)', href: 'dealers.php?district=Kamrup+Metropolitan+(Guwahati)' },
            { label: 'Dibrugarh & Jorhat', href: 'dealers.php?district=Dibrugarh' },
            { label: 'Nagaon & Silchar', href: 'dealers.php?district=Nagaon' }
        ],
        secondaryTitle: 'Channel Services',
        secondary: [
            { label: 'Store Pickup & Delivery Info', href: 'services.php' },
            { label: 'Service Centre Verification', href: 'services.php' }
        ],
        tertiaryTitle: 'Partner Desk',
        tertiary: [
            { label: 'Partner Onboarding Query', href: 'contact.php' }
        ]
    },
    Services: {
        primaryTitle: 'Services & Guidance',
        primary: [
            { label: 'Services Overview', href: 'services.php' },
            { label: 'Trade-In & Upgrade Info', href: 'services.php#trade-in' },
            { label: 'Financing & EMI Info', href: 'services.php#financing' },
            { label: 'FAQs & Privacy', href: 'services.php#faqs' }
        ],
        secondaryTitle: 'Business & Support',
        secondary: [
            { label: 'Small Business Solutions', href: 'business.php' },
            { label: 'Contact Specialist Desk', href: 'contact.php' }
        ],
        tertiaryTitle: 'Concierge',
        tertiary: [
            { label: 'Request Trade-In Guidance', action: "openEnquiryModal('trade_in', 'Trade-In / Upgrade Enquiry')" }
        ]
    },
    Workshops: {
        primaryTitle: 'Learn & Enablement',
        primary: [
            { label: 'Upcoming Assam Workshops', href: 'workshops.php' },
            { label: 'Corporate Team Training', href: 'business.php' }
        ],
        secondaryTitle: 'Explore Hardware',
        secondary: [
            { label: 'Mac M4 Lineup', href: 'products.php?category=Mac' },
            { label: 'iPad & Apple Pencil', href: 'products.php?category=iPad' }
        ],
        tertiaryTitle: 'Updates',
        tertiary: [
            { label: 'Request Session Updates', action: "openEnquiryModal('workshop', 'Upcoming Workshop Notification')" }
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
    hoverPill.style.width = elRect.width + 'px';
    hoverPill.style.transform = `translate3d(${elRect.left - navRect.left}px, -50%, 0)`;
    hoverPill.classList.add('is-visible');
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
        // Cross-fade inner content smoothly without closing/re-opening the curtain
        clearTimeout(curtainSwitchTimer);
        curtainContent.classList.add('is-switching');
        curtainSwitchTimer = setTimeout(() => {
            activeCurtainKey = key;
            curtainContent.innerHTML = buildCurtainHTML(data);
            requestAnimationFrame(() => curtainContent.classList.remove('is-switching'));
        }, 120);
        return;
    }

    if (!alreadyOpen) {
        curtainOpenTimer = setTimeout(() => {
            activeCurtainKey = key;
            curtainContent.innerHTML = buildCurtainHTML(data);
            curtainContent.classList.remove('is-switching');
            requestAnimationFrame(() => {
                navCurtain.classList.add('is-open');
                curtainBackdrop?.classList.add('is-open');
                mainNavbar?.classList.add('curtain-open');
            });
        }, 55);
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

desktopNav?.addEventListener('mouseleave', scheduleCloseNavCurtain);
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
    document.getElementById('modal-enquiry-type').value = type || 'specialist';
    document.getElementById('modal-product-interest').value = productLabel || '';
    document.getElementById('modal-workshop-id').value = workshopId || '';
    document.getElementById('modal-title').textContent = productLabel ? 'Enquire: ' + productLabel : 'Talk to a Product Specialist';
    showSpringModal(document.getElementById('enquiry-modal'));
}

function closeEnquiryModal() {
    hideSpringModal(document.getElementById('enquiry-modal'));
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
