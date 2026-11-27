CREATE DATABASE IF NOT EXISTS getradecom_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE getradecom_db;

-- 1. Products Table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category ENUM('iPhone','Mac','iPad','Watch','AirPods','TV & Home','Accessories') NOT NULL,
    name VARCHAR(150) NOT NULL,
    slug VARCHAR(160) NOT NULL UNIQUE,
    tagline VARCHAR(255),
    description TEXT,
    key_specs TEXT,
    colors VARCHAR(255),
    image_url VARCHAR(255) DEFAULT 'assets/images/placeholder-product.png',
    badge VARCHAR(50) DEFAULT NULL,
    is_featured TINYINT(1) DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Assam Dealers Table
CREATE TABLE dealers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    store_name VARCHAR(150) NOT NULL,
    district VARCHAR(100) NOT NULL,
    town VARCHAR(100) NOT NULL,
    pin_code VARCHAR(10) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(30) NOT NULL,
    email VARCHAR(120),
    opening_hours VARCHAR(120) DEFAULT '10:30 AM – 8:30 PM (Mon–Sat)',
    categories_handled VARCHAR(255) DEFAULT 'iPhone, Mac, iPad, Watch, Accessories',
    map_url VARCHAR(255),
    supports_pickup TINYINT(1) DEFAULT 1,
    supports_delivery TINYINT(1) DEFAULT 0,
    is_verified TINYINT(1) DEFAULT 1,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Enquiries Table (Product, Specialist, B2B, Trade-in, Workshop, Stock Notify, Dealer Onboarding, Education)
CREATE TABLE enquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enquiry_type ENUM('product','specialist','business','trade_in','workshop','stock_notify','dealer_onboarding','education','general') NOT NULL,
    full_name VARCHAR(120) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    email VARCHAR(120) NOT NULL,
    company_name VARCHAR(150) DEFAULT NULL,
    district VARCHAR(100) DEFAULT NULL,
    product_interest VARCHAR(150) DEFAULT NULL,
    quantity INT DEFAULT 1,
    message TEXT,
    consent_given TINYINT(1) NOT NULL DEFAULT 1,
    status ENUM('new','contacted','routed','closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Workshops & Training Sessions
CREATE TABLE workshops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(180) NOT NULL,
    topic VARCHAR(120),
    trainer VARCHAR(120) DEFAULT 'GE Tradecom Certified Specialist',
    city VARCHAR(100) NOT NULL,
    venue VARCHAR(180) NOT NULL,
    session_date DATE NOT NULL,
    session_time VARCHAR(50) NOT NULL,
    seats_total INT DEFAULT 20,
    seats_booked INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1
);

-- 5. Approved Campaigns & Promotions
CREATE TABLE campaigns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(180) NOT NULL,
    segment VARCHAR(100) NOT NULL,
    eligible_products VARCHAR(255) NOT NULL,
    summary TEXT NOT NULL,
    terms TEXT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    is_active TINYINT(1) DEFAULT 1
);

-- 6. Authorised Service Centres
CREATE TABLE service_centres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    centre_name VARCHAR(160) NOT NULL,
    city VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(30) NOT NULL,
    services_offered VARCHAR(255) NOT NULL,
    hours VARCHAR(120) NOT NULL,
    is_verified TINYINT(1) DEFAULT 1,
    is_active TINYINT(1) DEFAULT 1
);

-- 7. Newsletter Subscribers
CREATE TABLE subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL UNIQUE,
    consent_given TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 8. Admin Users (Default login: admin@getradecom.com / Admin@123)
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(120) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);

-- Seed Admin User (Password: Admin@123)
INSERT INTO admin_users (email, password_hash, name) VALUES
('admin@getradecom.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GE Tradecom Admin');

-- Seed Sample Products (Distributor-Safe, No Unverified Retail Prices)
INSERT INTO products (category, name, slug, tagline, description, key_specs, colors, badge, is_featured) VALUES
('iPhone', 'iPhone Duo', 'iphone-duo', 'Foldable iPhone. Twice the canvas.', 'Foldable flagship iPhone listed on Apple India with 256GB to 2TB configurations. Available for Assam channel enquiries through GE Tradecom.', 'From ₹2,99,900 | 256GB / 512GB / 1TB / 2TB | Foldable Form Factor', 'Star White, Night Sky', 'NEW', 1),
('iPhone', 'iPhone 18 Pro', 'iphone-18-pro', 'Pro performance. Elevated to 2TB.', 'Pro iPhone lineup with capacities up to 2TB and four finishes. Fulfilled across Assam via verified GE Tradecom partners.', 'From ₹1,64,900 | 256GB / 512GB / 1TB / 2TB | Pro Camera System', 'Burgundy, Glacier, Silver, Black', 'PRO', 1),
('iPhone', 'iPhone 18 Pro Max', 'iphone-18-pro-max', 'Maximum display. Maximum Pro.', 'Large-format Pro Max model in the iPhone 18 Pro family with up to 2TB storage.', 'Family from ₹1,64,900 | 256GB / 512GB / 1TB / 2TB | Pro Max Display', 'Burgundy, Glacier, Silver, Black', 'PRO', 0),
('iPhone', 'iPhone Air', 'iphone-air', 'Remarkably thin. Built to move.', 'Ultra-light iPhone Air in four signature finishes, distributed across Assam partner outlets.', 'From ₹1,49,900 | Ultra-Thin Design | Apple India Lineup', 'Sky Blue, Light Gold, Cloud White, Space Black', 'NEW', 0),
('iPhone', 'iPhone 17', 'iphone-17', 'Everyday brilliance in five finishes.', 'Core iPhone 17 lineup with vibrant colour options and dependable all-day capability.', 'From ₹99,900 | Five Colour Finishes | Apple India Lineup', 'Lavender, Sage, Mist Blue, White, Black', 'POPULAR', 0),
('iPhone', 'iPhone 17e', 'iphone-17e', 'Essential iPhone. Smart value.', 'Accessible entry into the latest iPhone generation for consumers, students, and SMB fleets.', 'From ₹79,900 | Essential Lineup | Apple India Store', 'Soft Pink, White, Black', NULL, 0),
('iPhone', 'iPhone 16', 'iphone-16', 'Proven performance for daily workflows.', 'Dependable iPhone 16 family available through verified GE Tradecom Assam channel partners.', 'From ₹89,900 | Proven Generation | Apple India Store', 'Black, White', NULL, 0),
('Mac', 'MacBook Neo', 'macbook-neo', 'Fresh form. Everyday Mac.', 'Compact MacBook Neo in 256GB and 512GB configurations with four expressive finishes.', 'From ₹79,900 | 256GB / 512GB | 8 Colour & Storage Combinations', 'Blush, Indigo, Silver, Citrus', 'NEW', 1),
('Mac', 'MacBook Air', 'macbook-air', 'Thin, light, and ready for business or study.', 'Apple Silicon MacBook Air family ideal for SMEs, educators, and mobile professionals across Assam.', 'From ₹1,49,900 | Fanless Portability | Apple India Lineup', 'Midnight, Starlight, Silver, Space Grey', 'POPULAR', 0),
('Mac', 'MacBook Pro 14-inch (M6)', 'macbook-pro-14-m6', 'M6 power in a 14-inch pro chassis.', 'Workstation-class 14-inch MacBook Pro powered by Apple M6 silicon for creators and engineers.', 'From ₹2,39,900 | Apple M6 Chip | 14-inch Pro Display', 'Space Black, Silver', 'PRO', 1),
('Mac', 'MacBook Pro with PROLED XDR Display', 'macbook-pro-proled-xdr', 'Reference PROLED XDR clarity for demanding studios.', 'Flagship MacBook Pro featuring PROLED XDR display technology for colour-critical workflows.', 'From ₹3,49,900 | PROLED XDR Display | Pro Workstation', 'Space Black, Silver', 'PRO', 0),
('Mac', 'iMac', 'imac', 'All-in-one desktop. Effortlessly capable.', 'Sleek desktop iMac built for reception desks, creative teams, classrooms, and home offices.', 'From ₹1,74,900 | All-in-One Desktop | Apple India Lineup', 'Silver, Blue, Green, Pink', NULL, 0),
('Mac', 'Mac mini', 'mac-mini', 'Compact desktop power for any desk.', 'Small-footprint Mac mini ideal for office deployments, labs, and developers.', 'From ₹99,900 | Compact Desktop | Apple India Lineup', 'Silver', NULL, 0),
('Mac', 'Mac Studio', 'mac-studio', 'Compact powerhouse for studio workloads.', 'High-throughput Mac Studio engineered for 3D, video, audio, and software build pipelines.', 'From ₹2,79,900 | Studio Desktop | Apple India Lineup', 'Silver', 'PRO', 0),
('Mac', 'Studio Display', 'studio-display', 'Expansive 5K workspace with pro glass options.', 'Apple Studio Display with multiple glass, stand, and mount configurations for Mac desks.', 'From ₹1,89,900 | Studio Display | Multiple Glass & Stand Options', 'Silver', NULL, 0),
('Mac', 'Studio Display XDR', 'studio-display-xdr', 'Extreme dynamic range for reference grading.', 'Studio Display XDR offering multiple glass, stand, and VESA mount configurations.', 'From ₹3,49,900 | XDR Reference Display | Glass & Mount Options', 'Silver', 'PRO', 0),
('iPad', 'iPad Pro 11-inch (M5)', 'ipad-pro-11-m5', 'M5 Pro power in an ultra-portable 11-inch frame.', '11-inch iPad Pro (M5) with Wi-Fi and Wi-Fi + Cellular options, plus nano-texture glass on 1TB/2TB.', 'From ₹1,39,900 | Apple M5 | 256GB–2TB | Wi-Fi & Cellular', 'Space Black, Silver', 'PRO', 1),
('iPad', 'iPad Pro 13-inch (M5)', 'ipad-pro-13-m5', 'Expansive 13-inch M5 canvas for pro workflows.', '13-inch iPad Pro (M5) with up to 2TB storage and optional nano-texture display.', 'Family from ₹1,39,900 | Apple M5 | 256GB–2TB | Wi-Fi & Cellular', 'Space Black, Silver', 'PRO', 0),
('iPad', 'iPad Air 11-inch (M4)', 'ipad-air-11-m4', 'M4 performance. Everyday 11-inch versatility.', '11-inch iPad Air (M4) built for students, educators, and mobile business teams across Assam.', 'From ₹89,900 | Apple M4 | 11-inch Display', 'Blue, Purple, Starlight, Space Grey', 'POPULAR', 0),
('iPad', 'iPad Air 13-inch (M4)', 'ipad-air-13-m4', 'Bigger 13-inch Air canvas powered by M4.', '13-inch iPad Air (M4) ideal for split-screen productivity, classrooms, and presentations.', 'Family from ₹89,900 | Apple M4 | 13-inch Display', 'Blue, Purple, Starlight, Space Grey', NULL, 0),
('iPad', 'iPad (A16)', 'ipad-a16', 'Colourful, capable, and built for everyone.', 'Entry iPad powered by A16 in four bright finishes for schools, retail counters, and daily use.', 'From ₹49,900 | A16 Chip | Four Finishes', 'Blue, Pink, Yellow, Silver', NULL, 0),
('iPad', 'iPad mini (A20 Pro)', 'ipad-mini-a20-pro', 'Pocket-sized pro silicon.', 'Compact iPad mini powered by A20 Pro for field teams, healthcare, aviation, and note-taking.', 'From ₹82,900 | A20 Pro Chip | Ultra-Compact Form', 'Space Grey, Starlight', 'NEW', 0),
('Watch', 'Apple Watch Series 12', 'apple-watch-series-12', 'Advanced health, refined finishes.', 'Latest Apple Watch Series 12 across aluminium and premium case finishes with varied band pairings.', 'From ₹56,900 | Aluminium & Premium Cases | Multi-Size', 'Dark Bronze, Light Gold, Black, Space Grey, Radiant Gold, Natural, Pearl White, Night Blue', 'NEW', 1),
('Watch', 'Apple Watch Ultra 4', 'apple-watch-ultra-4', 'Rugged endurance. Titanium precision.', 'Built for outdoor endurance, adventure, and demanding conditions in Natural and Black titanium.', 'From ₹1,09,900 | Rugged Titanium Case | Ultra Lineup', 'Natural, Black', 'PRO', 0),
('Watch', 'Apple Watch SE 3', 'apple-watch-se-3', 'Essential fitness and connectivity.', 'Accessible Apple Watch SE 3 with core safety, fitness, and notification features.', 'From ₹29,900 | Midnight & Starlight | Essential Watch', 'Midnight, Starlight', NULL, 0),
('AirPods', 'AirPods 5', 'airpods-5', 'Active Noise Cancellation in an open-fit design.', 'AirPods 5 featuring Active Noise Cancellation on Apple India.', 'Active Noise Cancellation | Open-Fit Design | Apple India Lineup', 'White', 'NEW', 0),
('AirPods', 'AirPods 5 with Wireless Charging Case', 'airpods-5-wireless-case', 'Effortless wireless charging on the go.', 'AirPods 5 paired with a Wireless Charging Case for seamless desk and travel top-ups.', 'Wireless Charging Case | Apple India Lineup', 'White', NULL, 0),
('AirPods', 'AirPods Pro 3', 'airpods-pro-3', 'Pro-grade silence. USB-C MagSafe.', 'AirPods Pro 3 with MagSafe Charging Case (USB-C) for immersive noise cancellation.', 'MagSafe Charging Case (USB-C) | Pro ANC | Apple India', 'White', 'POPULAR', 0),
('AirPods', 'AirPods Max 2', 'airpods-max-2', 'Over-ear high-fidelity spatial audio.', 'AirPods Max 2 over-ear headphones listed on Apple India with updated colourways.', 'Over-Ear Headphones | Spatial Audio | Apple India', 'Purple, Midnight, Starlight', 'PRO', 0),
('TV & Home', 'Apple TV 4K', 'apple-tv-4k', 'Cinematic 4K for living rooms and boardrooms.', 'Apple TV 4K streaming and AirPlay presentation hub for homes, lounges, and meeting rooms.', '4K HDR | AirPlay Hub | Apple India Store', 'Black', NULL, 0),
('TV & Home', 'HomePod mini 2', 'homepod-mini-2', 'Room-filling sound in five finishes.', 'Compact HomePod mini 2 smart speaker available in five colourways.', '5 Finishes | Smart Home & Audio | Apple India', 'White, Dark Blue, Dark Green, Light Pink, Midnight', 'NEW', 0),
('Accessories', 'Beats 360', 'beats-360', 'Over-ear Beats with interchangeable cushions.', 'Beats 360 over-ear headphones featuring customizable interchangeable cushion kits.', 'Beats | Over-Ear | Interchangeable Cushions', 'Black, Pink, Sky, Cloud', 'BEATS', 0),
('Accessories', 'Powerbeats Pro 2', 'powerbeats-pro-2', 'Heart-rate monitoring meets secure-fit ANC.', 'Powerbeats Pro 2 wireless earbuds with built-in heart-rate monitoring and Active Noise Cancellation.', 'Beats | Heart-Rate Monitoring | ANC | Wireless Earbuds', 'Jet Black', 'BEATS', 0),
('Accessories', 'Powerbeats Fit', 'powerbeats-fit', 'Locked-in wingtips. Active Noise Cancellation.', 'Powerbeats Fit wireless earbuds with secure-fit wingtips and ANC.', 'Beats | Secure-Fit Wingtips | ANC', 'Spark Orange', 'BEATS', 0),
('Accessories', 'Beats Studio Pro', 'beats-studio-pro', 'Studio-tuned over-ear ANC.', 'Beats Studio Pro wireless over-ear headphones with Active Noise Cancellation.', 'Beats | Over-Ear | ANC', 'Sandstone', 'BEATS', 0),
('Accessories', 'Beats Solo 4', 'beats-solo-4', 'Iconic on-ear wireless sound.', 'Beats Solo 4 wireless on-ear headphones for everyday listening.', 'Beats | On-Ear Wireless', 'Slate Blue', 'BEATS', 0),
('Accessories', 'Beats 360 UltraPlush Cushion Kit', 'beats-360-ultraplush-cushion-kit', 'Plush comfort swap for Beats 360.', 'Replacement/interchangeable UltraPlush cushion kit designed for Beats 360.', 'Beats 360 Compatible | Cushion Kit', 'Black, Cloud', 'BEATS', 0),
('Accessories', 'Beats 360 Performance Knit Cushion Kit', 'beats-360-performance-knit-cushion-kit', 'Breathable knit cushions for Beats 360.', 'Replacement/interchangeable Performance Knit cushion kit for Beats 360.', 'Beats 360 Compatible | Cushion Kit', 'Volt, Navy', 'BEATS', 0),
('Accessories', 'iPhone Duo Case', 'iphone-duo-case', 'Tailored protection for iPhone Duo.', 'Official Apple protective case engineered specifically for the foldable iPhone Duo.', 'Compatible: iPhone Duo | Apple Accessories', 'Sand, Navy Blue', NULL, 0),
('Accessories', 'iPhone Duo Folio with Kickstand', 'iphone-duo-folio-kickstand', 'Folio protection with built-in viewing stand.', 'Official iPhone Duo Folio with integrated kickstand for hands-free viewing.', 'Compatible: iPhone Duo | Integrated Kickstand', 'Taupe, Navy Blue', NULL, 0),
('Accessories', 'iPhone 18 Pro Silicone Case with MagSafe', 'iphone-18-pro-silicone-case', 'Soft-touch silicone with MagSafe alignment.', 'Apple Silicone Case with MagSafe designed for iPhone 18 Pro.', 'Compatible: iPhone 18 Pro | MagSafe', 'Crisp Blue, Magenta, Navy, Black', NULL, 0),
('Accessories', 'iPhone 18 Pro TechWoven Case with MagSafe', 'iphone-18-pro-techwoven-case', 'Textured TechWoven finish with MagSafe.', 'Apple TechWoven Case with MagSafe tailored for iPhone 18 Pro.', 'Compatible: iPhone 18 Pro | TechWoven | MagSafe', 'Burgundy, Chambray Blue', NULL, 0),
('Accessories', 'iPhone 18 Pro Clear Case with MagSafe', 'iphone-18-pro-clear-case', 'Crystal-clear protection that shows the finish.', 'Apple Clear Case with MagSafe engineered for iPhone 18 Pro.', 'Compatible: iPhone 18 Pro | MagSafe | Clear', 'Clear', NULL, 0),
('Accessories', 'iPhone 18 Pro Max Silicone Case with MagSafe', 'iphone-18-pro-max-silicone-case', 'Silicone grip and MagSafe for 18 Pro Max.', 'Apple Silicone Case with MagSafe designed for iPhone 18 Pro Max.', 'Compatible: iPhone 18 Pro Max | MagSafe', 'Navy', NULL, 0),
('Accessories', 'iPhone 18 Pro Max TechWoven Case with MagSafe', 'iphone-18-pro-max-techwoven-case', 'TechWoven craftsmanship for 18 Pro Max.', 'Apple TechWoven Case with MagSafe tailored for iPhone 18 Pro Max.', 'Compatible: iPhone 18 Pro Max | TechWoven | MagSafe', 'Burgundy', NULL, 0),
('Accessories', 'iPhone 18 Pro Max Clear Case with MagSafe', 'iphone-18-pro-max-clear-case', 'Transparent protection for 18 Pro Max.', 'Apple Clear Case with MagSafe engineered for iPhone 18 Pro Max.', 'Compatible: iPhone 18 Pro Max | MagSafe | Clear', 'Clear', NULL, 0),
('Accessories', 'iPhone FineWoven Wallet with MagSafe', 'iphone-finewoven-wallet-magsafe', 'Snap-on MagSafe card carry.', 'Apple FineWoven Wallet with MagSafe for MagSafe-compatible iPhone models.', 'Compatible: MagSafe iPhone | FineWoven', 'Wildflower Blue, Navy, Burgundy, Magenta, Olive', NULL, 0),
('Accessories', 'Wrist Strap', 'wrist-strap', 'Secure everyday carry for cases & AirPods.', 'Apple Wrist Strap compatible with select iPhone cases and AirPods cases.', 'Compatible: iPhone Cases / AirPods Case', 'Crisp Blue', NULL, 0),
('Accessories', 'Crossbody Strap', 'crossbody-strap', 'Hands-free carry for compatible iPhone cases.', 'Apple Crossbody Strap designed for compatible iPhone cases.', 'Compatible: iPhone Cases', 'Crisp Blue, Burgundy, Light Grey', NULL, 0),
('Accessories', 'MagSafe Charger', 'magsafe-charger', 'Fast magnetic wireless charging for iPhone.', 'Official Apple MagSafe Charger with magnetic alignment and cable options.', 'Compatible: iPhone | Magnetic Wireless Charging', 'White', NULL, 0),
('Accessories', 'iPhone Air MagSafe Battery', 'iphone-air-magsafe-battery', 'Slim snap-on power for iPhone Air.', 'Dedicated MagSafe Battery pack engineered for iPhone Air.', 'Compatible: iPhone Air | MagSafe', 'White', 'NEW', 0),
('Accessories', 'Sport Band', 'apple-watch-sport-band', 'Durable fluoroelastomer band for Apple Watch.', 'Official Apple Watch Sport Band in seasonal colours.', 'Compatible: Apple Watch | Fluoroelastomer', 'Wildflower Blue', NULL, 0),
('Accessories', 'Sport Loop', 'apple-watch-sport-loop', 'Breathable woven nylon loop.', 'Soft, breathable Apple Watch Sport Loop with hook-and-loop fastener.', 'Compatible: Apple Watch | Woven Nylon', 'Burgundy', NULL, 0),
('Accessories', 'Magnetic Link', 'apple-watch-magnetic-link', 'Effortless magnetic wrap for Apple Watch.', 'Refined Apple Watch Magnetic Link band for everyday and business wear.', 'Compatible: Apple Watch | Magnetic Closure', 'Camel', NULL, 0),
('Accessories', 'AirTag', 'airtag', 'Keep track of keys, bags, and field gear.', 'Apple AirTag available in Single and 4-pack options for Find My tracking.', 'Single / 4-Pack | Find My Network', 'White', NULL, 0),
('Accessories', 'AirTag FineWoven Key Ring', 'airtag-finewoven-key-ring', 'Secure FineWoven loop for AirTag.', 'Official AirTag FineWoven Key Ring accessory.', 'Compatible: AirTag | FineWoven', 'Olive', NULL, 0),
('Accessories', 'Apple Pencil Pro', 'apple-pencil-pro', 'Precision stylus with squeeze & haptic feedback.', 'Apple Pencil Pro with squeeze gestures, barrel roll, and magnetic pairing for compatible iPads.', 'Squeeze & Barrel Roll | Haptic Feedback | Find My', 'White', 'NEW', 0),
('Accessories', 'Apple Pencil (USB-C)', 'apple-pencil-usbc', 'Everyday precision for notes and markup.', 'Apple Pencil (USB-C) ideal for classrooms, students, and daily iPad note-taking.', 'USB-C Pairing & Charging | Compatible iPads', 'White', NULL, 0),
('Accessories', 'Smart Folio', 'smart-folio', 'Slim front-and-back cover for iPad.', 'Apple Smart Folio for iPad mini and compatible iPad models.', 'Compatible: iPad mini & iPad | Magnetic Cover', 'Navy', NULL, 0),
('Accessories', 'Magic Keyboard for iPad Pro', 'magic-keyboard-ipad-pro', 'Floating cantilever typing & trackpad for iPad Pro.', 'Magic Keyboard engineered for iPad Pro with responsive keys and built-in trackpad.', 'Compatible: iPad Pro | Backlit Keys & Trackpad', 'White', 'PRO', 0),
('Accessories', 'Magic Keyboard', 'magic-keyboard', 'Wireless tactile typing for Mac.', 'Official Apple Magic Keyboard available in multiple layouts and configurations.', 'Compatible: Mac | Wireless Rechargeable', 'White, Black', NULL, 0),
('Accessories', 'Magic Mouse', 'magic-mouse', 'Multi-Touch wireless mouse for Mac.', 'Official Apple Magic Mouse with Multi-Touch surface.', 'Compatible: Mac | Multi-Touch Surface', 'White, Black', NULL, 0),
('Accessories', 'Magic Trackpad', 'magic-trackpad', 'Force Touch gesture control for Mac.', 'Official Apple Magic Trackpad supporting full Multi-Touch and Force Touch gestures.', 'Compatible: Mac | Force Touch', 'White, Black', NULL, 0),
('Accessories', '35W Dual USB-C Port Power Adapter', '35w-dual-usb-c-power-adapter', 'Charge two devices simultaneously.', 'Compact Apple 35W Dual USB-C Port Power Adapter for MacBook, iPad, and iPhone.', '35W Output | Dual USB-C Ports', 'White', NULL, 0),
('Accessories', 'USB-C Charge Cable', 'usb-c-charge-cable', 'Woven USB-C charging & sync cable.', 'Official Apple USB-C Charge Cable available in multiple lengths.', 'USB-C | Multiple Lengths', 'White', NULL, 0),
('Accessories', 'Polishing Cloth', 'polishing-cloth', 'Safe cleaning for nano-texture & XDR glass.', 'Soft, non-abrasive Apple Polishing Cloth safe for any Apple display.', 'Safe for Nano-Texture & XDR Displays', 'White', NULL, 0),
('Accessories', 'EarPods (USB-C)', 'earpods-usbc', 'Plug-and-play USB-C wired audio.', 'Apple EarPods (USB-C) with built-in remote and microphone.', 'USB-C Connector | Built-in Mic & Remote', 'White', NULL, 0),
('Accessories', 'Siri Remote', 'siri-remote', 'Precision touch clickpad for Apple TV.', 'Official Apple Siri Remote for Apple TV 4K.', 'Compatible: Apple TV | Touch Clickpad', 'Silver, Black', NULL, 0);

-- Seed Sample Assam Dealers
INSERT INTO dealers (store_name, district, town, pin_code, address, phone, email, opening_hours, categories_handled, map_url, supports_pickup, supports_delivery) VALUES
('GE Tradecom Partner — GS Road Hub', 'Kamrup Metropolitan (Guwahati)', 'Guwahati', '781005', 'GS Road, Christian Basti, Guwahati, Assam', '+91 361 234 5601', 'guwahati@getradecom.com', '10:30 AM – 8:30 PM (Mon–Sat)', 'iPhone, Mac, iPad, Watch, AirPods, Accessories', 'https://maps.google.com/?q=GS+Road+Guwahati+Assam', 1, 1),
('Brahmaputra Digital Point', 'Dibrugarh', 'Dibrugarh', '786001', 'HS Road, Near Thana Chariali, Dibrugarh, Assam', '+91 373 232 4102', 'dibrugarh@getradecom.com', '10:00 AM – 8:00 PM (Mon–Sat)', 'iPhone, Mac, iPad, Watch, Accessories', 'https://maps.google.com/?q=Dibrugarh+Assam', 1, 0),
('Upper Assam Tech Retail', 'Jorhat', 'Jorhat', '785001', 'AT Road, Gar-Ali, Jorhat, Assam', '+91 376 230 1188', 'jorhat@getradecom.com', '10:30 AM – 8:00 PM (Mon–Sat)', 'iPhone, iPad, Watch, AirPods', 'https://maps.google.com/?q=Jorhat+Assam', 1, 0),
('Central Assam Apple Zone', 'Nagaon', 'Nagaon', '782001', 'Haibargaon Main Road, Nagaon, Assam', '+91 3672 220 450', 'nagaon@getradecom.com', '10:00 AM – 8:00 PM (Mon–Sat)', 'iPhone, Mac, Watch, Accessories', 'https://maps.google.com/?q=Nagaon+Assam', 1, 0),
('Barak Valley Authorised Outlet', 'Cachar (Silchar)', 'Silchar', '788001', 'Central Road, Silchar, Cachar, Assam', '+91 3842 245 790', 'silchar@getradecom.com', '10:30 AM – 8:30 PM (Mon–Sat)', 'iPhone, Mac, iPad, AirPods, Accessories', 'https://maps.google.com/?q=Silchar+Assam', 1, 1);

-- Seed Sample Assam Workshops
INSERT INTO workshops (title, topic, trainer, city, venue, session_date, session_time, seats_total, seats_booked) VALUES
('Getting Started with MacBook M4', 'Productivity & Apple Silicon Workflows', 'Rohan Sarma (Apple Channel Trainer)', 'Guwahati', 'GE Tradecom Experience Lounge, GS Road', '2026-12-05', '11:00 AM – 12:30 PM', 25, 9),
('iPhone Photography & Pro Video', '48MP Camera & Cinematic Editing', 'Ananya Das (Creative Specialist)', 'Dibrugarh', 'Brahmaputra Digital Studio, HS Road', '2026-12-12', '3:00 PM – 4:30 PM', 20, 6),
('iPad & Apple Pencil for Business', 'Mobile Workflows & Team Notes', 'Kangkan Bora (B2B Solutions Lead)', 'Jorhat', 'Upper Assam Tech Hub, Gar-Ali', '2026-12-19', '11:30 AM – 1:00 PM', 18, 4);

-- Seed Sample Approved Campaigns
INSERT INTO campaigns (title, segment, eligible_products, summary, terms, start_date, end_date) VALUES
('Assam Enterprise Mac M4 Deployment Drive', 'SMEs & Institutions', 'MacBook Air M4, MacBook Pro M4 Pro', 'Structured consultation, team sizing, and partner-coordinated fleet fulfilment for Assam businesses and educational institutions.', 'Subject to corporate verification, stock allocation, and participating Assam channel partner commercial terms.', '2026-11-01', '2026-12-31'),
('Verified Outlet Trade-In Evaluation Week', 'Individual & Business Upgrades', 'iPhone 17 Pro, MacBook Air M4, iPad Air', 'Bring eligible existing devices for physical inspection and upgrade guidance at participating verified GE Tradecom partner outlets.', 'Valuation depends on physical inspection, working condition, and participating partner programme rules.', '2026-11-15', '2026-12-20');

-- Seed Sample Service Centres
INSERT INTO service_centres (centre_name, city, address, phone, services_offered, hours) VALUES
('Guwahati Authorised Service Desk', 'Guwahati', 'GS Road, Christian Basti, Guwahati, Assam 781005', '+91 361 234 5699', 'Hardware Diagnostics, Battery Service, Warranty Verification', '10:00 AM – 6:30 PM (Mon–Sat)'),
('Upper Assam Care Point', 'Dibrugarh', 'HS Road, Dibrugarh, Assam 786001', '+91 373 232 4199', 'iPhone & Mac Diagnostics, Software Support, Escalation Intake', '10:00 AM – 6:00 PM (Mon–Sat)');
