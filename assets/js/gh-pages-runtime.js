// Client-side interactive runtime for static GitHub Pages portfolio preview
(function () {
    const DATA = window.GETRADECOM_DATA || { products: [], dealers: [], workshops: [] };

    function esc(str) {
        return String(str ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    }

    function showDemoToast(msg) {
        const existing = document.getElementById('demo-flash-banner');
        if (existing) existing.remove();
        const bar = document.createElement('div');
        bar.id = 'demo-flash-banner';
        bar.className = 'fixed top-16 left-1/2 -translate-x-1/2 z-50 bg-[#161617]/95 text-white text-[13px] font-medium px-5 py-3 rounded-full shadow-2xl border border-white/15 flex items-center gap-2.5 max-w-[92vw]';
        bar.innerHTML = `<span class="w-2 h-2 rounded-full bg-[#30d158] shrink-0"></span><span>${esc(msg)}</span>`;
        document.body.appendChild(bar);
        setTimeout(() => {
            bar.style.transition = 'opacity 0.4s ease';
            bar.style.opacity = '0';
            setTimeout(() => bar.remove(), 420);
        }, 4500);
    }

    // Intercept static form submissions so GitHub Pages gives instant realistic feedback
    document.addEventListener('submit', (e) => {
        const form = e.target;
        const action = (form.getAttribute('action') || '');
        if (action.includes('submit-enquiry') || action.includes('api/')) {
            e.preventDefault();
            const fd = new FormData(form);
            const name = fd.get('full_name') || fd.get('email') || 'Visitor';
            const type = fd.get('action') === 'subscribe' ? 'subscription' : (fd.get('enquiry_type') || 'enquiry');
            if (typeof window.closeEnquiryModal === 'function') window.closeEnquiryModal();
            form.reset();
            const labelMap = {
                subscription: 'Subscribed! Launch & campaign updates enabled (Portfolio Demo Mode).',
                stock_notify: `Stock notification registered for ${name} (Portfolio Demo Mode).`,
                dealer_onboarding: `Thank you, ${name}! Partner onboarding interest recorded (Portfolio Demo Mode).`,
                education: `Thank you, ${name}! Education verification request recorded (Portfolio Demo Mode).`
            };
            showDemoToast(labelMap[type] || `Thank you, ${name}! Your request has been captured (Portfolio Demo Mode).`);
        }
    });

    const page = location.pathname.split('/').pop() || 'index.html';
    const qs = new URLSearchParams(location.search);

    // 1. Dynamic Product Details Page (?slug=...)
    if (page === 'product-details.html') {
        const slug = qs.get('slug') || (DATA.products[0] && DATA.products[0].slug);
        const prod = DATA.products.find(p => p.slug === slug) || DATA.products[0];
        if (prod) {
            document.title = `${prod.name} — Specifications & Enquiry | GE Tradecom Pvt Ltd`;
            const h1 = document.querySelector('main h1');
            if (h1) h1.textContent = prod.name;
            const crumbSpan = document.querySelector('main nav span.text-\\[\\#1d1d1f\\]');
            if (crumbSpan) crumbSpan.textContent = prod.name;
            const catLink = document.querySelector('main nav a[href*="category="]');
            if (catLink) {
                catLink.textContent = prod.category;
                catLink.href = 'products.html?category=' + encodeURIComponent(prod.category);
            }
            const taglines = document.querySelectorAll('main .lg\\:col-span-7 p');
            if (taglines[0]) taglines[0].textContent = prod.tagline;
            if (taglines[1]) taglines[1].textContent = prod.description;

            const specUl = document.querySelector('main ul.grid');
            if (specUl) {
                const specs = (prod.key_specs || '').split('|').map(s => s.trim()).filter(Boolean);
                specUl.innerHTML = specs.map(s => `<li class="bg-[#f5f5f7] border border-black/[0.04] rounded-2xl px-4 py-3.5 text-[14px] font-medium text-[#1d1d1f]">${esc(s)}</li>`).join('');
            }
            const interestTitle = document.querySelector('main h2.font-display.text-xl');
            if (interestTitle) interestTitle.textContent = `Interested in ${prod.name}?`;

            const colorImgs = (window.GETRADECOM_COLOR_IMAGES && window.GETRADECOM_COLOR_IMAGES[prod.slug]) || {};
            const finishes = (prod.colors || '').split(',').map(s => s.trim()).filter(Boolean);
            if (finishes.length && typeof window.selectProductFinish === 'function') {
                const label = document.getElementById('selected-finish-label');
                if (label) label.textContent = finishes[0];
                const dotsWrap = label?.parentElement?.nextElementSibling;
                if (dotsWrap) {
                    const hexMap = window.GETRADECOM_HEX || {};
                    dotsWrap.innerHTML = finishes.map((f, idx) => {
                        const hex = hexMap[f.toLowerCase()] || '#8e8e93';
                        const imgUrl = colorImgs[f] || '';
                        return `<button type="button" onclick="selectProductFinish('${esc(f)}', this, '${esc(imgUrl)}', '${esc(hex)}')" title="${esc(f)}" class="finish-dot w-7 h-7 rounded-full border-2 transition cursor-pointer ${idx === 0 ? 'border-[#0071e3] scale-110' : 'border-black/15 hover:scale-105'}" style="background-color:${hex}"></button>`;
                    }).join('');
                }
                window.baseProductName = prod.name;
                window.activeProductFinish = finishes[0];
            }

            const stageBox = document.querySelector('[data-tilt-stage] > div:first-child');
            if (stageBox) {
                const initialImg = (finishes[0] && colorImgs[finishes[0]]) || Object.values(colorImgs)[0] || '';
                if (initialImg) {
                    stageBox.innerHTML = `<img id="detail-product-visual" src="${esc(initialImg)}" alt="${esc(prod.name)}" class="h-[240px] sm:h-[270px] w-auto object-contain mx-auto drop-shadow-[0_18px_32px_rgba(0,0,0,0.16)] transition-opacity duration-200">`;
                } else if (window.GETRADECOM_VISUALS && window.GETRADECOM_VISUALS[prod.category]) {
                    stageBox.innerHTML = window.GETRADECOM_VISUALS[prod.category];
                }
            }
        }
    }

    // Highlight active navbar link cleanly without touching background styles
    const curCat = qs.get('category') || '';
    document.querySelectorAll('#desktop-nav a.nav-trigger').forEach(a => {
        const href = a.getAttribute('href') || '';
        const isMatch = (page === 'products.html' && href.includes('category=' + encodeURIComponent(curCat)) && curCat !== '')
            || (page !== 'index.html' && page !== 'products.html' && href === page);
        a.classList.toggle('text-[#0071e3]', isMatch);
        a.classList.toggle('font-medium', isMatch);
    });

    // 2. Dynamic Products Filter (?category=...&q=...)
    if (page === 'products.html') {
        const cat = qs.get('category') || 'All';
        const q = (qs.get('q') || '').trim().toLowerCase();
        const searchInput = document.querySelector('form[action="products.html"] input[name="q"]');
        if (searchInput && q) searchInput.value = qs.get('q');

        document.querySelectorAll('#category-filter-bar a').forEach(a => {
            const urlCat = new URL(a.href, location.origin).searchParams.get('category') || 'All';
            const isActive = urlCat === cat;
            a.classList.toggle('bg-[#1d1d1f]', isActive);
            a.classList.toggle('text-white', isActive);
            a.classList.toggle('bg-white', !isActive);
            a.classList.toggle('text-[#424245]', !isActive);
        });

        const cards = document.querySelectorAll('main section article[data-category]');
        let visible = 0;
        cards.forEach(card => {
            const cCat = card.getAttribute('data-category');
            const cText = card.textContent.toLowerCase();
            const matchCat = (cat === 'All' || cCat === cat);
            const matchQ = (!q || cText.includes(q));
            const show = matchCat && matchQ;
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        const emptyBox = document.getElementById('gh-products-empty');
        if (emptyBox) emptyBox.classList.toggle('hidden', visible > 0);
    }

    // 3. Dynamic Dealers Filter (?district=...&q=...)
    if (page === 'dealers.html') {
        const dist = qs.get('district') || 'All';
        const q = (qs.get('q') || '').trim().toLowerCase();
        const sel = document.querySelector('form[action="dealers.html"] select[name="district"]');
        if (sel && dist) sel.value = dist;
        const inp = document.querySelector('form[action="dealers.html"] input[name="q"]');
        if (inp && q) inp.value = qs.get('q');

        document.querySelectorAll('#district-filter-bar a').forEach(a => {
            const urlDist = new URL(a.href, location.origin).searchParams.get('district') || 'All';
            const isActive = urlDist === dist;
            a.classList.toggle('bg-[#1d1d1f]', isActive);
            a.classList.toggle('text-white', isActive);
            a.classList.toggle('bg-white', !isActive);
            a.classList.toggle('text-[#424245]', !isActive);
        });

        const cards = document.querySelectorAll('[data-dealer-district]');
        let count = 0;
        cards.forEach(card => {
            const dDist = card.getAttribute('data-dealer-district');
            const dText = card.textContent.toLowerCase();
            const matchD = (dist === 'All' || !dist || dDist === dist);
            const matchQ = (!q || dText.includes(q));
            const show = matchD && matchQ;
            card.style.display = show ? '' : 'none';
            if (show) count++;
        });
        const countEl = document.querySelector('main p strong.text-\\[\\#1d1d1f\\]');
        if (countEl) countEl.textContent = String(count);
    }

    // 4. Dynamic Workshops City Filter (?city=...)
    if (page === 'workshops.html') {
        const city = qs.get('city') || 'All';
        document.querySelectorAll('#city-filter-bar a').forEach(a => {
            const urlCity = new URL(a.href, location.origin).searchParams.get('city') || 'All';
            const isActive = urlCity === city;
            a.classList.toggle('bg-[#1d1d1f]', isActive);
            a.classList.toggle('text-white', isActive);
            a.classList.toggle('bg-white', !isActive);
            a.classList.toggle('text-[#424245]', !isActive);
        });
        document.querySelectorAll('[data-workshop-city]').forEach(card => {
            const wCity = card.getAttribute('data-workshop-city');
            card.style.display = (city === 'All' || !city || wCity === city) ? '' : 'none';
        });
    }
})();
