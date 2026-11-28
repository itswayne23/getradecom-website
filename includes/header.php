<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/ui-helpers.php';
$current_page = basename($_SERVER['PHP_SELF']);
$current_cat = $_GET['category'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? e($page_title) . ' | ' . SITE_NAME : SITE_NAME . ' — ' . TERRITORY ?></title>
    <link rel="icon" type="image/png" href="assets/images/getradecom-logo.png">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/custom.css?v=<?= @filemtime(__DIR__ . '/../assets/css/custom.css') ?: '2' ?>">
</head>
<body class="bg-white text-[#1d1d1f] flex flex-col min-h-screen selection:bg-[#0071e3]/15 selection:text-[#0071e3]">

<!-- Top Corporate & Territory Ribbon -->
<div id="top-territory-bar" class="bg-[#161617] text-[#a1a1a6] text-[11px] leading-tight py-2 px-4 border-b border-white/10">
    <div class="max-w-[1080px] mx-auto flex flex-wrap justify-between items-center gap-2">
        <div class="flex items-center gap-3">
            <span class="font-medium text-[#f5f5f7] tracking-tight">GE Tradecom Pvt Ltd &middot; Assam</span>
            <span class="hidden sm:inline text-white/20">|</span>
            <a href="about.php" class="hover:text-white transition inline-flex items-center gap-1">
                <svg class="w-3 h-3 text-[#2997ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                <span>About GE Tradecom</span>
            </a>
        </div>
        <div class="flex items-center gap-4">
            <a href="business.php" class="hover:text-white transition">Small Business</a>
            <a href="education.php" class="hidden md:inline hover:text-white transition">Education</a>
            <a href="promotions.php" class="hidden sm:inline hover:text-white transition">Campaigns</a>
            <a href="contact.php" class="hidden sm:inline hover:text-white transition">Contact</a>
            <a href="admin/login.php" class="text-[#86868b] hover:text-white transition">Partner Admin</a>
        </div>
    </div>
</div>

<!-- Official Apple-Style Frosted Sticky Navigation -->
<header id="main-navbar" class="sticky top-0 z-40 glass-nav border-b border-black/[0.08]">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center h-12 gap-3">
            <!-- Brand Wordmark (Left) -->
            <a href="index.php" class="flex items-center group shrink-0" aria-label="GE Tradecom Pvt. Ltd. Home">
                <img src="assets/images/getradecom-logo.png" alt="GE Tradecom Pvt. Ltd." class="h-8 w-auto object-contain transition-transform duration-300 group-hover:scale-[1.03]">
            </a>

            <!-- Centered Single-Row Navigation with Gliding Hover Pill -->
            <nav id="desktop-nav" class="hidden lg:flex items-center relative text-[12px] font-normal text-[#1d1d1f]/85">
                <div id="nav-hover-pill"></div>
                <a href="products.php?category=Mac" data-curtain="Mac" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'Mac' ? 'text-[#0071e3] font-medium' : '' ?>">Mac</a>
                <a href="products.php?category=iPad" data-curtain="iPad" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'iPad' ? 'text-[#0071e3] font-medium' : '' ?>">iPad</a>
                <a href="products.php?category=iPhone" data-curtain="iPhone" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'iPhone' ? 'text-[#0071e3] font-medium' : '' ?>">iPhone</a>
                <a href="products.php?category=Watch" data-curtain="Watch" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'Watch' ? 'text-[#0071e3] font-medium' : '' ?>">Watch</a>
                <a href="products.php?category=AirPods" data-curtain="AirPods" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'AirPods' ? 'text-[#0071e3] font-medium' : '' ?>">AirPods</a>
                <a href="products.php?category=Accessories" data-curtain="Accessories" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'Accessories' ? 'text-[#0071e3] font-medium' : '' ?>">Accessories</a>
                <span class="text-black/15 px-1 select-none">|</span>
                <a href="about.php" data-curtain="About" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'about.php' ? 'text-[#0071e3] font-medium' : '' ?>">About Us</a>
                <a href="business.php" data-curtain="Business" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'business.php' ? 'text-[#0071e3] font-medium' : '' ?>">Business</a>
                <a href="services.php" data-curtain="Services" class="nav-trigger relative z-10 px-2 xl:px-2.5 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'services.php' ? 'text-[#0071e3] font-medium' : '' ?>">Services</a>
            </nav>

            <!-- Action Controls & Official Apple Authorised Dealer Lockup (Right) -->
            <div class="flex items-center gap-2 shrink-0">
                <button onclick="openSpotlightModal()" aria-label="Quick Search" title="Search products or Assam dealers (Ctrl+K)"
                        class="p-1.5 rounded-full text-[#1d1d1f]/80 hover:text-[#1d1d1f] hover:bg-black/[0.06] transition cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                <button onclick="openEnquiryModal('specialist', 'General Product Consultation')"
                        class="hidden sm:inline-flex items-center px-3.5 py-1.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[12px] font-medium transition shadow-[0_1px_2px_rgba(0,113,227,0.3)] cursor-pointer whitespace-nowrap">
                    Talk to a Specialist
                </button>
                <span class="hidden md:inline-block h-5 w-px bg-black/15 mx-1.5" aria-hidden="true"></span>
                <img src="assets/images/apple-authorised-distributor.png" alt="Apple Authorised Distributor" class="hidden md:block h-7 w-auto object-contain shrink-0">
                <button id="mobile-menu-btn" aria-label="Toggle Menu" aria-expanded="false"
                        class="lg:hidden p-2 rounded-full text-[#1d1d1f] hover:bg-black/[0.05] transition cursor-pointer">
                    <div id="apple-burger" class="apple-burger">
                        <span></span>
                        <span></span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Animated Apple Drawer -->
    <div id="mobile-menu" class="lg:hidden bg-[#fbfbfd]/95 backdrop-blur-xl border-t border-black/[0.06] px-5">
        <div class="mobile-drawer-inner">
            <div class="py-4 space-y-1 text-[17px] font-semibold font-display">
                <a href="products.php" class="mobile-nav-item block py-2 border-b border-black/[0.06] text-[#1d1d1f]" style="transition-delay: 40ms;">All Products</a>
                <a href="products.php?category=iPhone" class="mobile-nav-item block py-1.5 text-[#424245]" style="transition-delay: 80ms;">iPhone</a>
                <a href="products.php?category=Mac" class="mobile-nav-item block py-1.5 text-[#424245]" style="transition-delay: 120ms;">Mac</a>
                <a href="products.php?category=iPad" class="mobile-nav-item block py-1.5 text-[#424245]" style="transition-delay: 160ms;">iPad</a>
                <a href="products.php?category=Watch" class="mobile-nav-item block py-1.5 text-[#424245]" style="transition-delay: 200ms;">Watch</a>
                <a href="products.php?category=AirPods" class="mobile-nav-item block py-1.5 text-[#424245]" style="transition-delay: 240ms;">AirPods</a>
                <a href="products.php?category=Accessories" class="mobile-nav-item block py-1.5 text-[#424245]" style="transition-delay: 280ms;">Accessories</a>
                <div class="pt-3 mt-2 border-t border-black/[0.06] space-y-1 text-[15px] font-medium">
                    <a href="about.php" class="mobile-nav-item block py-1.5 text-[#0071e3]" style="transition-delay: 320ms;">About Us &amp; Moments &rarr;</a>
                    <a href="business.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 350ms;">Small Business Solutions</a>
                    <a href="services.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 380ms;">Services, Trade-In &amp; Support</a>
                    <a href="education.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 440ms;">Student &amp; Teacher Programme</a>
                    <a href="promotions.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 470ms;">Approved Campaigns</a>
                    <a href="contact.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 500ms;">Contact Us</a>
                </div>
                <div class="pt-3 pb-2 mobile-nav-item" style="transition-delay: 530ms;">
                    <button onclick="openEnquiryModal('specialist', 'General Product Consultation')" class="w-full py-2.5 rounded-full bg-[#0071e3] text-white text-sm font-medium cursor-pointer">
                        Talk to a Specialist
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Apple Global Nav Curtain Backdrop & Flyout Mega-Menu -->
<div id="nav-curtain-backdrop" aria-hidden="true"></div>
<div id="apple-nav-curtain" role="region" aria-label="Category Menu">
    <div class="curtain-inner">
        <div class="max-w-[1080px] mx-auto px-6 py-10">
            <div id="curtain-content" class="grid grid-cols-12 gap-8"></div>
        </div>
    </div>
</div>

<main class="flex-grow">
