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
    is_verified TINYINT(1) DEFAULT 1,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Enquiries Table (Product, Specialist, B2B, Trade-in, Workshop)
CREATE TABLE enquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enquiry_type ENUM('product','specialist','business','trade_in','workshop','general') NOT NULL,
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
    city VARCHAR(100) NOT NULL,
    venue VARCHAR(180) NOT NULL,
    session_date DATE NOT NULL,
    session_time VARCHAR(50) NOT NULL,
    seats_total INT DEFAULT 20,
    seats_booked INT DEFAULT 0,
    is_active TINYINT(1) DEFAULT 1
);

-- 5. Newsletter Subscribers
CREATE TABLE subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL UNIQUE,
    consent_given TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 6. Admin Users (Default login: admin@getradecom.com / Admin@123)
CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(120) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);

-- Seed Admin User (Password: Admin@123)
INSERT INTO admin_users (email, password_hash, name) VALUES
('admin@getradecom.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'getradeCom Admin');

-- Seed Sample Products (Distributor-Safe, No Unverified Retail Prices)
INSERT INTO products (category, name, slug, tagline, description, key_specs, colors, badge, is_featured) VALUES
('iPhone', 'iPhone 17 Pro', 'iphone-17-pro', 'Built for Apple Intelligence. Engineered in titanium.', 'Flagship performance with pro camera system and all-day battery life. Available through verified getradeCom channel partners across Assam.', 'A19 Pro chip | ProMotion XDR Display | 48MP Pro Camera System | USB-C', 'Natural Titanium, Black Titanium, Desert Titanium', 'NEW', 1),
('Mac', 'MacBook Air M4', 'macbook-air-m4', 'Lean. Mean. M4 machine.', 'Ultra-thin, fanless design with remarkable battery life for business professionals, creators, and students.', 'Apple M4 Chip | 13.6" & 15.3" Liquid Retina | Up to 18 hrs battery | MagSafe 3', 'Midnight, Starlight, Silver, Space Grey', 'NEW', 1),
('Mac', 'MacBook Pro M4 Pro', 'macbook-pro-m4-pro', 'Mind-blowing. Head-turning.', 'Workstation-class performance for enterprise, design, and software teams.', 'Apple M4 Pro | Liquid Retina XDR | Thunderbolt 5 | Up to 24 hrs battery', 'Space Black, Silver', 'PRO', 1),
('iPad', 'iPad Air', 'ipad-air', 'Fresh Air. Serious power.', 'Portable versatility with Apple Pencil Pro support for education and mobile business workflows.', 'M-series Chip | 11" & 13" Liquid Retina | Landscape 12MP Front Camera', 'Blue, Purple, Starlight, Space Grey', 'POPULAR', 1),
('Watch', 'Apple Watch Series 11', 'apple-watch-series-11', 'Thinner. Bigger display. Smarter health.', 'Advanced health sensors and seamless iPhone integration.', 'Always-On Retina Display | Health & Fitness Tracking | Fast Charging', 'Jet Black, Rose Gold, Silver', 'NEW', 1),
('AirPods', 'AirPods Pro (2nd Gen)', 'airpods-pro-2', 'Adaptive Audio. Now playing.', 'Active Noise Cancellation, Transparency mode, and Personalized Spatial Audio with USB-C charging.', 'H2 Chip | Active Noise Cancellation | USB-C MagSafe Case | IP54', 'White', 'POPULAR', 1),
('TV & Home', 'Apple TV 4K', 'apple-tv-4k', 'The Apple experience. Cinematic in every sense.', '4K Dolby Vision and HDR10+ entertainment hub with A15 Bionic performance.', 'A15 Bionic | 4K Dolby Vision | Wi-Fi & Ethernet | Siri Remote', 'Black', NULL, 0),
('Accessories', 'Apple Pencil Pro', 'apple-pencil-pro', 'Engineered for limitless creativity.', 'Pixel-perfect precision, squeeze gestures, barrel roll, and haptic feedback for iPad workflows.', 'Squeeze & Barrel Roll | Haptic Feedback | Magnetic Pairing | Find My', 'White', 'NEW', 0);

-- Seed Sample Assam Dealers
INSERT INTO dealers (store_name, district, town, pin_code, address, phone, email, opening_hours, categories_handled, map_url) VALUES
('getradeCom Partner — GS Road Hub', 'Kamrup Metropolitan (Guwahati)', 'Guwahati', '781005', 'GS Road, Christian Basti, Guwahati, Assam', '+91 361 234 5601', 'guwahati@getradecom.com', '10:30 AM – 8:30 PM (Mon–Sat)', 'iPhone, Mac, iPad, Watch, AirPods, Accessories', 'https://maps.google.com/?q=GS+Road+Guwahati+Assam'),
('Brahmaputra Digital Point', 'Dibrugarh', 'Dibrugarh', '786001', 'HS Road, Near Thana Chariali, Dibrugarh, Assam', '+91 373 232 4102', 'dibrugarh@getradecom.com', '10:00 AM – 8:00 PM (Mon–Sat)', 'iPhone, Mac, iPad, Watch, Accessories', 'https://maps.google.com/?q=Dibrugarh+Assam'),
('Upper Assam Tech Retail', 'Jorhat', 'Jorhat', '785001', 'AT Road, Gar-Ali, Jorhat, Assam', '+91 376 230 1188', 'jorhat@getradecom.com', '10:30 AM – 8:00 PM (Mon–Sat)', 'iPhone, iPad, Watch, AirPods', 'https://maps.google.com/?q=Jorhat+Assam'),
('Central Assam Apple Zone', 'Nagaon', 'Nagaon', '782001', 'Haibargaon Main Road, Nagaon, Assam', '+91 3672 220 450', 'nagaon@getradecom.com', '10:00 AM – 8:00 PM (Mon–Sat)', 'iPhone, Mac, Watch, Accessories', 'https://maps.google.com/?q=Nagaon+Assam'),
('Barak Valley Authorised Outlet', 'Cachar (Silchar)', 'Silchar', '788001', 'Central Road, Silchar, Cachar, Assam', '+91 3842 245 790', 'silchar@getradecom.com', '10:30 AM – 8:30 PM (Mon–Sat)', 'iPhone, Mac, iPad, AirPods, Accessories', 'https://maps.google.com/?q=Silchar+Assam');

-- Seed Sample Assam Workshops
INSERT INTO workshops (title, topic, city, venue, session_date, session_time, seats_total, seats_booked) VALUES
('Getting Started with MacBook M4', 'Productivity & Apple Silicon Workflows', 'Guwahati', 'getradeCom Experience Lounge, GS Road', '2026-12-05', '11:00 AM – 12:30 PM', 25, 9),
('iPhone Photography & Pro Video', '48MP Camera & Cinematic Editing', 'Dibrugarh', 'Brahmaputra Digital Studio, HS Road', '2026-12-12', '3:00 PM – 4:30 PM', 20, 6),
('iPad & Apple Pencil for Business', 'Mobile Workflows & Team Notes', 'Jorhat', 'Upper Assam Tech Hub, Gar-Ali', '2026-12-19', '11:30 AM – 1:00 PM', 18, 4);
