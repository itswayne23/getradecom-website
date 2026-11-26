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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="bg-white text-[#1d1d1f] flex flex-col min-h-screen selection:bg-[#0071e3]/15 selection:text-[#0071e3]">

<!-- Top Territory & Channel Ribbon -->
<div id="top-territory-bar" class="bg-[#161617] text-[#a1a1a6] text-[11px] leading-tight py-2 px-4 border-b border-white/10">
    <div class="max-w-[1024px] mx-auto flex flex-wrap justify-between items-center gap-2">
        <div class="flex items-center gap-3">
            <span class="font-medium text-[#f5f5f7] tracking-tight">Assam Channel Network</span>
            <span class="hidden sm:inline text-white/20">|</span>
            <a href="dealers.php" class="hover:text-white transition inline-flex items-center gap-1">
                <svg class="w-3 h-3 text-[#2997ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Find an Authorised Dealer in Assam</span>
            </a>
        </div>
        <div class="flex items-center gap-4">
            <a href="business.php" class="hover:text-white transition">Small Business &amp; Corporate</a>
            <a href="contact.php" class="hidden sm:inline hover:text-white transition">Contact</a>
            <a href="admin/login.php" class="text-[#86868b] hover:text-white transition">Partner Admin</a>
        </div>
    </div>
</div>

<!-- Official Apple-Style Frosted Sticky Navigation -->
<header id="main-navbar" class="sticky top-0 z-40 glass-nav border-b border-black/[0.08]">
    <div class="max-w-[1024px] mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center h-12">
            <!-- Brand Wordmark -->
            <a href="index.php" class="flex items-center gap-2 group shrink-0">
                <span class="w-6 h-6 rounded-full bg-[#1d1d1f] text-white flex items-center justify-center text-[11px] font-semibold tracking-tight group-hover:bg-[#0071e3] group-hover:scale-105 transition-all duration-300">g</span>
                <span class="font-display text-[17px] font-semibold tracking-tight text-[#1d1d1f]">getradeCom</span>
                <span class="hidden xl:inline-block text-[10px] tracking-wide uppercase bg-black/[0.05] text-[#6e6e73] px-2 py-0.5 rounded-full font-medium">Assam</span>
            </a>

            <!-- Centered Single-Row Navigation with Gliding Hover Pill -->
            <nav id="desktop-nav" class="hidden lg:flex items-center relative text-[12px] font-normal text-[#1d1d1f]/85">
                <div id="nav-hover-pill"></div>
                <a href="products.php?category=Mac" data-curtain="Mac" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'Mac' ? 'text-[#0071e3] font-medium' : '' ?>">Mac</a>
                <a href="products.php?category=iPad" data-curtain="iPad" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'iPad' ? 'text-[#0071e3] font-medium' : '' ?>">iPad</a>
                <a href="products.php?category=iPhone" data-curtain="iPhone" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'iPhone' ? 'text-[#0071e3] font-medium' : '' ?>">iPhone</a>
                <a href="products.php?category=Watch" data-curtain="Watch" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'Watch' ? 'text-[#0071e3] font-medium' : '' ?>">Watch</a>
                <a href="products.php?category=AirPods" data-curtain="AirPods" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'AirPods' ? 'text-[#0071e3] font-medium' : '' ?>">AirPods</a>
                <a href="products.php?category=Accessories" data-curtain="Accessories" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'products.php' && $current_cat === 'Accessories' ? 'text-[#0071e3] font-medium' : '' ?>">Accessories</a>
                <span class="text-black/15 px-1 select-none">|</span>
                <a href="dealers.php" data-curtain="Dealers" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'dealers.php' ? 'text-[#0071e3] font-medium' : '' ?>">Dealers</a>
                <a href="services.php" data-curtain="Services" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'services.php' ? 'text-[#0071e3] font-medium' : '' ?>">Services</a>
                <a href="workshops.php" data-curtain="Workshops" class="nav-trigger relative z-10 px-3 py-1.5 hover:text-[#1d1d1f] transition <?= $current_page === 'workshops.php' ? 'text-[#0071e3] font-medium' : '' ?>">Workshops</a>
            </nav>

            <!-- Action Controls -->
            <div class="flex items-center gap-2.5 shrink-0">
                <button onclick="openSpotlightModal()" aria-label="Quick Search" title="Search products or Assam dealers (Ctrl+K)"
                        class="p-1.5 rounded-full text-[#1d1d1f]/80 hover:text-[#1d1d1f] hover:bg-black/[0.06] transition cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                <button onclick="openEnquiryModal('specialist', 'General Product Consultation')"
                        class="hidden sm:inline-flex items-center px-3.5 py-1.5 rounded-full bg-[#0071e3] hover:bg-[#0077ed] text-white text-[12px] font-medium transition shadow-[0_1px_2px_rgba(0,113,227,0.3)] cursor-pointer">
                    Talk to a Specialist
                </button>
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
                <a href="dealers.php" class="mobile-nav-item block py-1.5 text-[#0071e3]" style="transition-delay: 320ms;">Find an Assam Dealer &rarr;</a>
                <a href="business.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 355ms;">Business Solutions</a>
                <a href="services.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 390ms;">Services &amp; Support</a>
                <a href="workshops.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 425ms;">Workshops</a>
                <a href="contact.php" class="mobile-nav-item block py-1.5 text-[#1d1d1f]" style="transition-delay: 460ms;">Contact Us</a>
            </div>
            <div class="pt-3 pb-2 mobile-nav-item" style="transition-delay: 495ms;">
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
        <div class="max-w-[1024px] mx-auto px-6 py-10">
            <div id="curtain-content" class="grid grid-cols-12 gap-8"></div>
        </div>
    </div>
</div>

<main class="flex-grow">
