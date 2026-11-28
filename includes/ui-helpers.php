<?php
/**
 * Shared UI presentation helpers for Apple-inspired hardware visuals,
 * finish swatches, and category iconography.
 */

function get_finish_hex(string $finishName): string {
    $name = strtolower(trim($finishName));
    $map = [
        'natural titanium' => '#bcb6ad',
        'desert titanium'  => '#c6a78b',
        'black titanium'   => '#2a2a2d',
        'white titanium'   => '#f1f1ef',
        'space black'      => '#222225',
        'space grey'       => '#6e6e73',
        'space gray'       => '#6e6e73',
        'cloud white'      => '#f6f6f4',
        'star white'       => '#f7f5f0',
        'pearl white'      => '#f2efe9',
        'soft pink'        => '#f3cdd5',
        'light pink'       => '#f4d3da',
        'light gold'       => '#e5d4b3',
        'radiant gold'     => '#dfc184',
        'dark bronze'      => '#6b5344',
        'night sky'        => '#1d263b',
        'night blue'       => '#1b2b48',
        'dark blue'        => '#1b3152',
        'navy blue'        => '#1e3050',
        'sky blue'         => '#8ec5e8',
        'mist blue'        => '#a5c0d1',
        'crisp blue'       => '#2b6cb0',
        'chambray blue'    => '#6c8aa6',
        'wildflower blue'  => '#4d6f9e',
        'slate blue'       => '#5a6f82',
        'dark green'       => '#233b30',
        'spark orange'     => '#ea580c',
        'light grey'       => '#c7c7cc',
        'burgundy'         => '#6b1d2f',
        'glacier'          => '#d4e2ea',
        'lavender'         => '#c8bfe7',
        'sage'             => '#9db2a0',
        'blush'            => '#ecc5c0',
        'indigo'           => '#3b4a7a',
        'citrus'           => '#e9d85c',
        'magenta'          => '#b8256b',
        'olive'            => '#646b4b',
        'camel'            => '#c19a6b',
        'sandstone'        => '#c2b6a3',
        'sand'             => '#d4c3a3',
        'taupe'            => '#8f8276',
        'volt'             => '#c7ea46',
        'navy'             => '#1e3050',
        'clear'            => '#eef2f6',
        'natural'          => '#bcb6ad',
        'midnight'         => '#1f2836',
        'starlight'        => '#ede6da',
        'silver'           => '#e3e4e6',
        'jet black'        => '#141416',
        'rose gold'        => '#dfb4a8',
        'blue'             => '#6a96b8',
        'purple'           => '#b8add2',
        'pink'             => '#f4c7d0',
        'yellow'           => '#f5df86',
        'green'            => '#95b8a4',
        'orange'           => '#e87a3d',
        'white'            => '#f5f5f7',
        'black'            => '#1d1d1f',
        'teal'             => '#6db6b0',
        'ultramarine'      => '#7c8ef4',
        'gold'             => '#d8be8d',
    ];
    foreach ($map as $key => $hex) {
        if (str_contains($name, $key)) {
            return $hex;
        }
    }
    return '#8e8e93';
}

function get_product_color_images(string $slug): array {
    $map = [
        'iphone-duo' => [
            'Star White' => 'assets/images/products/iphone-duo-star-white.png',
            'Night Sky'  => 'assets/images/products/iphone-duo-night-sky.png',
        ],
        'iphone-18-pro' => [
            'Burgundy' => 'assets/images/products/iphone-18-pro-burgundy.png',
            'Glacier'  => 'assets/images/products/iphone-18-pro-glacier.png',
            'Silver'   => 'assets/images/products/iphone-18-pro-silver.png',
            'Black'    => 'assets/images/products/iphone-18-pro-black.png',
        ],
        'iphone-air' => [
            'Sky Blue'    => 'assets/images/products/iphone-air-sky-blue.png',
            'Cloud White' => 'assets/images/products/iphone-air-cloud-white.png',
            'Space Black' => 'assets/images/products/iphone-air-space-black.png',
        ],
        'iphone-17' => [
            'Lavender'  => 'assets/images/products/iphone-17-lavender.png',
            'Sage'      => 'assets/images/products/iphone-17-sage.png',
            'Mist Blue' => 'assets/images/products/iphone-17-mist-blue.png',
            'White'     => 'assets/images/products/iphone-17-white.png',
            'Black'     => 'assets/images/products/iphone-17-black.png',
        ],
        'iphone-17e' => [
            'Soft Pink'   => 'assets/images/products/iphone-17e-soft-pink.png',
            'White'       => 'assets/images/products/iphone-17e-white.png',
            'Black'       => 'assets/images/products/iphone-17e-black.png',
        ],
        'iphone-16' => [
            'Black'       => 'assets/images/products/iphone-16-black.png',
            'Pink'        => 'assets/images/products/iphone-16-pink.png',
            'White'       => 'assets/images/products/iphone-16-white.png',
            'Teal'        => 'assets/images/products/iphone-16-teal.png',
            'Ultramarine' => 'assets/images/products/iphone-16-ultramarine.png',
        ],
        'apple-watch-series-12' => [
            'Dark Bronze'  => 'assets/images/products/watch-s12-dark-bronze.png',
            'Light Gold'   => 'assets/images/products/watch-s12-light-gold.png',
            'Black'        => 'assets/images/products/watch-s12-black.png',
            'Space Grey'   => 'assets/images/products/watch-s12-space-grey.png',
            'Radiant Gold' => 'assets/images/products/watch-s12-radiant-gold.png',
            'Natural'      => 'assets/images/products/watch-s12-natural.png',
            'Pearl White'  => 'assets/images/products/watch-s12-pearl-white.png',
            'Night Blue'   => 'assets/images/products/watch-s12-night-blue.png',
        ],
        'apple-watch-ultra-4' => [
            'Natural' => 'assets/images/products/watch-ultra4-natural.png',
            'Black'   => 'assets/images/products/watch-ultra4-black.png',
        ],
        'apple-watch-se-3' => [
            'Midnight'  => 'assets/images/products/watch-se3-midnight.png',
            'Starlight' => 'assets/images/products/watch-se3-starlight.png',
        ],
        'airpods-5' => [
            'White' => 'assets/images/products/airpods-5.png',
        ],
        'airpods-5-wireless-case' => [
            'White' => 'assets/images/products/airpods-5-wireless-case.png',
        ],
        'airpods-pro-3' => [
            'White' => 'assets/images/products/airpods-pro-3.png',
        ],
        'airpods-max-2' => [
            'Midnight'  => 'assets/images/products/airpods-max-2-midnight.png',
            'Starlight' => 'assets/images/products/airpods-max-2-starlight.png',
            'Blue'      => 'assets/images/products/airpods-max-2-blue.png',
            'Purple'    => 'assets/images/products/airpods-max-2-purple.png',
            'Orange'    => 'assets/images/products/airpods-max-2-orange.png',
        ],
        'ipad-pro' => [
            'Space Black' => 'assets/images/products/ipad-pro-space-black.png',
            'Silver'      => 'assets/images/products/ipad-pro-silver.png',
        ],
        'ipad-air' => [
            'Space Grey' => 'assets/images/products/ipad-air-space-grey.png',
            'Blue'       => 'assets/images/products/ipad-air-blue.png',
            'Purple'     => 'assets/images/products/ipad-air-purple.png',
            'Starlight'  => 'assets/images/products/ipad-air-starlight.png',
        ],
        'ipad-a16' => [
            'Blue'   => 'assets/images/products/ipad-blue.png',
            'Pink'   => 'assets/images/products/ipad-pink.png',
            'Yellow' => 'assets/images/products/ipad-yellow.png',
            'Silver' => 'assets/images/products/ipad-silver.png',
        ],
        'ipad-mini' => [
            'Space Grey' => 'assets/images/products/ipad-mini-space-grey.png',
            'Starlight'  => 'assets/images/products/ipad-mini-starlight.png',
        ],
        'apple-homeview' => [
            'Silver'     => 'assets/images/products/apple-homeview-silver.png',
            'Light Pink' => 'assets/images/products/apple-homeview-light-pink.png',
            'Starlight'  => 'assets/images/products/apple-homeview-starlight.png',
            'Natural'    => 'assets/images/products/apple-homeview-natural.png',
        ],
        'apple-tv-4k' => [
            'Black' => 'assets/images/products/apple-tv-4k-black.png',
        ],
        'homepod-mini-2' => [
            'Dark Green' => 'assets/images/products/homepod-mini-2-dark-green.png',
            'White'      => 'assets/images/products/homepod-mini-2-white.png',
            'Dark Blue'  => 'assets/images/products/homepod-mini-2-dark-blue.png',
            'Light Pink' => 'assets/images/products/homepod-mini-2-light-pink.png',
            'Midnight'   => 'assets/images/products/homepod-mini-2-midnight.png',
        ],
        'homepod' => [
            'Midnight' => 'assets/images/products/homepod-midnight.png',
            'White'    => 'assets/images/products/homepod-white.png',
        ],
        'macbook-neo' => [
            'Silver' => 'assets/images/products/macbook-neo-silver.png',
            'Blush'  => 'assets/images/products/macbook-neo-blush.png',
            'Citrus' => 'assets/images/products/macbook-neo-citrus.png',
            'Indigo' => 'assets/images/products/macbook-neo-indigo.png',
        ],
        'macbook-air' => [
            'Sky Blue'  => 'assets/images/products/macbook-air-sky-blue.png',
            'Starlight' => 'assets/images/products/macbook-air-starlight.png',
            'Midnight'  => 'assets/images/products/macbook-air-midnight.png',
            'Silver'    => 'assets/images/products/macbook-air-silver.png',
        ],
        'macbook-pro' => [
            'Space Black' => 'assets/images/products/macbook-pro-space-black.png',
            'Silver'      => 'assets/images/products/macbook-pro-silver.png',
        ],
        'macbook-pro-proled-xdr' => [
            'Space Black' => 'assets/images/products/macbook-pro-proled-xdr-space-black.png',
            'Silver'      => 'assets/images/products/macbook-pro-proled-xdr-silver.png',
        ],
        'imac' => [
            'Blue'   => 'assets/images/products/imac-blue.png',
            'Purple' => 'assets/images/products/imac-purple.png',
            'Pink'   => 'assets/images/products/imac-pink.png',
            'Orange' => 'assets/images/products/imac-orange.png',
            'Yellow' => 'assets/images/products/imac-yellow.png',
            'Green'  => 'assets/images/products/imac-green.png',
            'Silver' => 'assets/images/products/imac-silver.png',
        ],
        'mac-mini' => [
            'Silver' => 'assets/images/products/mac-mini.png',
        ],
        'mac-studio' => [
            'Silver' => 'assets/images/products/mac-studio.png',
        ],
        'studio-display' => [
            'Silver' => 'assets/images/products/studio-display.png',
        ],
        'studio-display-xdr' => [
            'Silver' => 'assets/images/products/studio-display-xdr.png',
        ],
    ];
    return $map[$slug] ?? [];
}

function render_color_swatches(?string $colorsStr, bool $showLabels = false, string $slug = '', string $visualId = ''): string {
    if (!$colorsStr) {
        return '';
    }
    $items = array_values(array_filter(array_map('trim', explode(',', $colorsStr))));
    if (empty($items)) {
        return '';
    }
    $colorImages = $slug !== '' ? get_product_color_images($slug) : [];
    $html = '<div class="flex flex-wrap items-center gap-2" data-swatch-group>';
    foreach ($items as $idx => $color) {
        $hex = get_finish_hex($color);
        $safeColor = htmlspecialchars($color, ENT_QUOTES, 'UTF-8');
        $imgUrl = $colorImages[$color] ?? '';
        $safeImg = htmlspecialchars($imgUrl, ENT_QUOTES, 'UTF-8');
        if ($showLabels && $visualId !== '') {
            $activeCls = $idx === 0 ? 'border-[#0071e3] ring-1 ring-[#0071e3]/30' : 'border-black/[0.08] hover:border-[#0071e3]/50';
            $html .= '<button type="button"'
                   . ' onclick="selectCardFinish(this, \'' . htmlspecialchars($visualId, ENT_QUOTES, 'UTF-8') . '\', \'' . $safeColor . '\', \'' . htmlspecialchars($hex, ENT_QUOTES, 'UTF-8') . '\', \'' . $safeImg . '\')"'
                   . ' class="card-swatch inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white border ' . $activeCls . ' text-[11px] font-medium text-[#1d1d1f] shadow-[0_1px_2px_rgba(0,0,0,0.03)] transition cursor-pointer">'
                   . '<span class="w-3 h-3 rounded-full border border-black/15 shadow-inner shrink-0" style="background-color:' . $hex . '"></span>'
                   . $safeColor
                   . '</button>';
        } elseif ($showLabels) {
            $html .= '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white border border-black/[0.06] text-[11px] font-medium text-[#1d1d1f] shadow-[0_1px_2px_rgba(0,0,0,0.03)]">'
                   . '<span class="w-3 h-3 rounded-full border border-black/15 shadow-inner shrink-0" style="background-color:' . $hex . '"></span>'
                   . $safeColor
                   . '</span>';
        } else {
            $html .= '<span title="' . $safeColor . '" class="w-3.5 h-3.5 rounded-full border border-black/15 shadow-inner inline-block" style="background-color:' . $hex . '"></span>';
        }
    }
    $html .= '</div>';
    return $html;
}

function render_category_icon(string $category): string {
    switch ($category) {
        case 'iPhone':
            return '<svg class="w-7 h-7" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="9" y="3" width="14" height="26" rx="3.2"/><line x1="14" y1="6.5" x2="18" y2="6.5" stroke-linecap="round"/><line x1="13" y1="26" x2="19" y2="26" stroke-linecap="round"/></svg>';
        case 'Mac':
            return '<svg class="w-7 h-7" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="5" y="6" width="22" height="15" rx="2"/><path d="M2.5 24.5h27" stroke-linecap="round"/><path d="M13 21v3.5M19 21v3.5"/></svg>';
        case 'iPad':
            return '<svg class="w-7 h-7" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="6.5" y="3.5" width="19" height="25" rx="2.5"/><circle cx="16" cy="25.5" r="0.8" fill="currentColor"/></svg>';
        case 'Watch':
            return '<svg class="w-7 h-7" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="9" y="8" width="14" height="16" rx="4"/><path d="M12 8V4.5a1 1 0 011-1h6a1 1 0 011 1V8M12 24v3.5a1 1 0 001 1h6a1 1 0 001-1V24"/><path d="M23 13v4" stroke-linecap="round"/></svg>';
        case 'AirPods':
            return '<svg class="w-7 h-7" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M10 9a4 4 0 014 4v9.5a1.5 1.5 0 01-3 0V16a4 4 0 01-1-7zM22 9a4 4 0 00-4 4v9.5a1.5 1.5 0 003 0V16a4 4 0 001-7z"/></svg>';
        case 'TV & Home':
            return '<svg class="w-7 h-7" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="4" y="7" width="24" height="15" rx="2"/><path d="M11 25h10" stroke-linecap="round"/></svg>';
        default:
            return '<svg class="w-7 h-7" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="7" y="7" width="18" height="18" rx="4"/><circle cx="16" cy="16" r="4"/></svg>';
    }
}

function render_product_visual(string $category, bool $dark = false, ?string $imageUrl = null, string $alt = '', string $visualId = '', string $size = 'card'): string {
    if ($imageUrl && !str_contains($imageUrl, 'placeholder-product.png')) {
        $idAttr = $visualId !== '' ? ' id="' . htmlspecialchars($visualId, ENT_QUOTES, 'UTF-8') . '"' : '';
        $imgH = $size === 'detail' ? 'h-[240px] sm:h-[270px]' : 'h-[196px]';
        $safeSrc = htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8');
        $safeAlt = htmlspecialchars($alt ?: $category, ENT_QUOTES, 'UTF-8');
        return '<img' . $idAttr . ' src="' . $safeSrc . '" alt="' . $safeAlt . '" class="' . $imgH . ' w-auto object-contain mx-auto drop-shadow-[0_18px_32px_rgba(0,0,0,0.16)] transition-opacity duration-200">';
    }
    $wrapId = $visualId !== '' ? ' id="' . htmlspecialchars($visualId, ENT_QUOTES, 'UTF-8') . '"' : '';
    $stroke = $dark ? '#f5f5f7' : '#1d1d1f';
    switch ($category) {
        case 'iPhone':
            $html = '
            <div class="relative mx-auto w-[108px] h-[196px] rounded-[26px] border-[3.5px] border-[#484540] bg-gradient-to-br from-[#161822] via-[#262f46] to-[#0b0b0f] shadow-[0_22px_40px_-14px_rgba(0,0,0,0.45)] flex flex-col justify-between p-2.5 hardware-sheen">
                <div class="absolute -right-[5px] top-12 w-[2px] h-7 rounded-r bg-[#68645e]"></div>
                <div class="absolute -left-[5px] top-10 w-[2px] h-4 rounded-l bg-[#68645e]"></div>
                <div class="absolute -left-[5px] top-16 w-[2px] h-5 rounded-l bg-[#68645e]"></div>
                <div class="mx-auto w-11 h-[11px] rounded-full bg-black border border-white/10 flex items-center justify-end pr-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#1a2c4e] border border-[#2997ff]/40"></span>
                </div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_28%,rgba(41,151,255,0.48),transparent_55%),radial-gradient(circle_at_75%_74%,rgba(191,90,242,0.38),transparent_55%),radial-gradient(circle_at_50%_50%,rgba(255,159,10,0.18),transparent_60%)] pointer-events-none"></div>
                <div class="relative z-10 text-center my-auto space-y-1.5">
                    <div class="text-[18px] font-display font-semibold tracking-tight text-white/90 leading-none">9:41</div>
                    <div class="w-8 h-8 mx-auto rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center">
                        <span class="w-2.5 h-2.5 rounded-full bg-gradient-to-tr from-[#2997ff] to-[#bf5af2] shadow-[0_0_12px_#2997ff]"></span>
                    </div>
                </div>
                <div class="mx-auto w-10 h-[3px] rounded-full bg-white/45 relative z-10"></div>
            </div>';
            break;
        case 'Mac':
            $html = '
            <div class="relative mx-auto w-60 pt-2 pb-1">
                <div class="mx-auto w-[204px] h-[126px] rounded-t-[12px] border-[3.5px] border-[#26262a] bg-gradient-to-br from-[#121626] via-[#1b2b4e] to-[#090a0e] shadow-[0_18px_36px_-12px_rgba(0,0,0,0.4)] relative overflow-hidden flex flex-col items-center justify-between py-2 hardware-sheen">
                    <div class="w-6 h-1.5 bg-black rounded-b-sm absolute top-0 left-1/2 -translate-x-1/2"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_68%_28%,rgba(41,151,255,0.48),transparent_58%),radial-gradient(circle_at_24%_75%,rgba(255,55,95,0.3),transparent_55%)]"></div>
                    <div class="relative z-10 my-auto text-center">
                        <div class="text-[9px] font-semibold tracking-[0.22em] uppercase text-[#2997ff]">Apple Silicon</div>
                        <div class="font-display text-sm font-semibold text-white/95 tracking-tight">M-Series</div>
                    </div>
                    <div class="relative z-10 flex items-center gap-1 px-2 py-0.5 rounded-full bg-white/15 backdrop-blur-md border border-white/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#2997ff]"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#30d158]"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#ff9f0a]"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#bf5af2]"></span>
                    </div>
                </div>
                <div class="mx-auto w-60 h-2.5 rounded-b-lg bg-gradient-to-b from-[#d8d8dd] to-[#a1a1a6] shadow-md flex justify-center items-start">
                    <div class="w-12 h-1 rounded-b bg-[#86868b]/60"></div>
                </div>
            </div>';
            break;
        case 'iPad':
            $html = '
            <div class="relative mx-auto flex flex-col items-center gap-2">
                <div class="relative w-48 h-[132px] rounded-[16px] border-[3.5px] border-[#28282c] bg-gradient-to-br from-[#171f36] via-[#2b3c6c] to-[#0f1118] shadow-[0_20px_38px_-14px_rgba(0,0,0,0.4)] p-2 flex items-center justify-center hardware-sheen">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_25%_25%,rgba(90,200,250,0.5),transparent_55%),radial-gradient(circle_at_80%_80%,rgba(175,82,222,0.42),transparent_55%)]"></div>
                    <div class="relative z-10 w-11 h-11 rounded-2xl border border-white/25 bg-white/10 backdrop-blur-md flex items-center justify-center">
                        <span class="w-3 h-3 rounded-full bg-[#64d2ff] shadow-[0_0_12px_#64d2ff]"></span>
                    </div>
                </div>
                <div class="w-32 h-1.5 rounded-full bg-gradient-to-r from-[#e5e5ea] via-[#ffffff] to-[#d1d1d6] border border-black/10 shadow-sm"></div>
            </div>';
            break;
        case 'Watch':
            $html = '
            <div class="relative mx-auto flex flex-col items-center">
                <div class="w-11 h-5 rounded-t-xl bg-gradient-to-b from-[#252529] to-[#343438]"></div>
                <div class="relative w-24 h-28 rounded-[24px] border-[3.5px] border-[#424247] bg-black shadow-[0_20px_38px_-14px_rgba(0,0,0,0.45)] flex items-center justify-center hardware-sheen">
                    <div class="absolute -right-[6px] top-6 w-[4px] h-5 rounded-r bg-[#68686e]"></div>
                    <div class="absolute -right-[5px] top-14 w-[2.5px] h-5 rounded-r bg-[#525257]"></div>
                    <div class="w-16 h-16 rounded-full border-[3.5px] border-[#ff375f]/90 flex items-center justify-center shadow-[0_0_12px_rgba(255,55,95,0.25)]">
                        <div class="w-11 h-11 rounded-full border-[3.5px] border-[#30d158]/90 flex items-center justify-center">
                            <div class="w-6 h-6 rounded-full border-[3.5px] border-[#64d2ff]/95"></div>
                        </div>
                    </div>
                </div>
                <div class="w-11 h-5 rounded-b-xl bg-gradient-to-t from-[#252529] to-[#343438]"></div>
            </div>';
            break;
        case 'AirPods':
            $html = '
            <div class="relative mx-auto w-32 h-32 rounded-[30px] bg-gradient-to-b from-[#ffffff] via-[#f7f7fa] to-[#e4e4ea] border border-black/10 shadow-[0_20px_38px_-16px_rgba(0,0,0,0.25)] flex flex-col items-center justify-center gap-2.5 hardware-sheen">
                <div class="w-20 h-[2px] bg-black/10 rounded-full"></div>
                <div class="w-2.5 h-2.5 rounded-full bg-[#30d158] shadow-[0_0_10px_#30d158]"></div>
                <span class="text-[10px] font-semibold tracking-wider uppercase text-[#6e6e73]">Spatial Audio</span>
            </div>';
            break;
        default:
            $html = '
            <div class="relative mx-auto w-36 h-32 rounded-[28px] bg-gradient-to-br from-[#ffffff] to-[#e6e6eb] border border-black/10 shadow-[0_18px_34px_-16px_rgba(0,0,0,0.22)] flex items-center justify-center text-[' . $stroke . '] hardware-sheen">
                ' . render_category_icon($category) . '
            </div>';
            break;
    }
    return '<div' . $wrapId . ' data-mockup-wrap class="transition-all duration-300">' . $html . '</div>';
}
