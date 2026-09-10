-- ========================================================
-- Ocean Delight Seafood E-Commerce Database Structure & Seed Data
-- Database Name: ocean_delight
-- Compatible with MySQL / MariaDB / phpMyAdmin / XAMPP
-- ========================================================

CREATE DATABASE IF NOT EXISTS `ocean_delight` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ocean_delight`;

-- --------------------------------------------------------
-- Table structure for `users`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `order_items`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `password_reset_tokens`;
DROP TABLE IF EXISTS `contact_messages`;
DROP TABLE IF EXISTS `settings`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL DEFAULT 'Karachi',
  `address` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Default Users (Password for both is: password123)
INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `area`, `address`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Ocean Delight Admin', 'admin@oceandelight.pk', '+923001234567', '$2y$12$4L1yNf1c6zS.3B2L5A6Q4.3tS0j8q8x9y0z1a2b3c4d5e6f7g8h9i', 'DHA Phase 6, Karachi', 'Ocean Delight HQ, Khayaban-e-Shahbaz, DHA Phase 6, Karachi', 'admin', 1, NOW(), NOW()),
(2, 'Tariq Mahmood', 'customer@oceandelight.pk', '+923339876543', '$2y$12$4L1yNf1c6zS.3B2L5A6Q4.3tS0j8q8x9y0z1a2b3c4d5e6f7g8h9i', 'Clifton Block 5, Karachi', 'Apartment 402, Sea Breeze Heights, Clifton Block 5, Karachi', 'customer', 1, NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `password_reset_tokens`
-- --------------------------------------------------------

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `categories`
-- --------------------------------------------------------

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Fish', 'fish', 'Fresh seawater fish caught daily from the Arabian Sea off Karachi shore.', 'categories/fish.jpg', 1, NOW(), NOW()),
(2, 'Prawns', 'prawns', 'Juicy, wild-caught tiger and king prawns cleaned and prepped.', 'categories/prawns.jpg', 1, NOW(), NOW()),
(3, 'Shrimp', 'shrimp', 'Tender white shrimp ideal for curries, frying, and seafood grills.', 'categories/shrimp.jpg', 1, NOW(), NOW()),
(4, 'Crab', 'crab', 'Fresh blue & mud crabs direct from coastal mangrove waters.', 'categories/crab.jpg', 1, NOW(), NOW()),
(5, 'Lobster', 'lobster', 'Premium Arabian sea rock lobsters for gourmet dining at home.', 'categories/lobster.jpg', 1, NOW(), NOW()),
(6, 'Squid', 'squid', 'Fresh squid / calamari rings cleaned and ready to cook.', 'categories/squid.jpg', 1, NOW(), NOW()),
(7, 'Premium Seafood', 'premium-seafood', 'Handpicked premium catch including Salmon, Tuna steaks, and Red Snapper.', 'categories/premium.jpg', 1, NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `products`
-- --------------------------------------------------------

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `weight_unit` varchar(255) NOT NULL DEFAULT '1 kg',
  `stock` int(11) NOT NULL DEFAULT 10,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `short_description`, `description`, `price`, `weight_unit`, `stock`, `is_active`, `is_featured`, `image`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fresh White Pomfret (Safaid Paplet)', 'fresh-white-pomfret', 'Delicate, sweet seawater pomfret. Perfect for frying and grilling whole.', 'White Pomfret is one of the most prized catches from the Arabian Sea off Karachi shore. Known for its firm, sweet white flesh and minimal central bone, it is ideal for rava fry, tandoori grill, or lemon garlic butter pan fry.', 2800.00, '1 kg (Whole)', 25, 1, 1, 'images/products/white_pomfret.jpg', 'Fresh White Pomfret in Karachi | Ocean Delight', 'Buy 100% fresh White Pomfret (Safaid Paplet) delivered to your home in Karachi. Cash on delivery guaranteed.', NOW(), NOW()),
(2, 1, 'Black Pomfret (Kala Paplet)', 'black-pomfret', 'Rich flavored seawater black pomfret with tender flesh.', 'Freshly landed Karachi Black Pomfret. Slightly deeper, rich seafood flavor with flaky texture. Great for spicy coastal curries and deep frying.', 1950.00, '1 kg (Whole)', 30, 1, 0, 'images/products/black_pomfret.jpg', 'Black Pomfret Fish Karachi | Ocean Delight', 'Order fresh Black Pomfret online in Karachi. Delivered cold-chain direct to your door.', NOW(), NOW()),
(3, 1, 'Red Snapper (Hira Fish)', 'red-snapper', 'Lean, firm red snapper fish. Excellent for roasting and steaming.', 'Authentic Arabian Sea Red Snapper (Hira). Highly sought after for its moist, sweet, nutty flavor and firm texture that holds shape during baking, steaming, or spicy fish curry prep.', 2400.00, '1 kg (Cleaned)', 20, 1, 1, 'images/products/red_snapper.jpg', 'Red Snapper (Hira Fish) Karachi | Ocean Delight', 'Fresh Red Snapper delivery in Karachi. Cleaned, gutted and chilled for ultimate freshness.', NOW(), NOW()),
(4, 1, 'King Mackerel (Surmai Steaks)', 'king-mackerel-surmai', 'Boneless cut Surmai fish steaks. Karachi favorite for fish fry.', 'Fresh King Mackerel sliced into clean center-cut steaks. High in omega-3 fatty acids, Surmai is thick, meaty, and virtually free of small bones, making it Karachi\'s top choice for fish biryani and tava fry.', 2600.00, '1 kg (Steaks)', 35, 1, 1, 'images/products/surmai.jpg', 'Surmai Fish Steaks Karachi | Ocean Delight', 'Buy fresh Surmai steaks in Karachi. Fresh daily catch, Cash on delivery.', NOW(), NOW()),
(5, 1, 'Fresh Grouper (Gissar Fish)', 'fresh-grouper-gissar', 'Mild, moist reef fish fillet ideal for fish tikka and grilling.', 'Karachi Grouper (Gissar) features thick white meat with a mild, sweet flavor profile. Outstanding for fish finger battering, tikka marination, and slow pot stews.', 1850.00, '1 kg', 18, 1, 0, 'images/products/grouper.jpg', 'Fresh Grouper Fish Karachi | Ocean Delight', 'Order fresh Grouper (Gissar) fish online in Karachi.', NOW(), NOW()),
(6, 1, 'Sea Bass (Dambra / Barramundi)', 'sea-bass-dambra', 'Buttery and flaky sea bass fillets. Restaurant grade quality.', 'Fresh Asian Sea Bass caught off the coastal sea. Rich, buttery flavor with crisp skin when pan-seared.', 2200.00, '1 kg (Whole/Cleaned)', 15, 1, 0, 'images/products/seabass.jpg', 'Fresh Sea Bass Karachi | Ocean Delight', 'Buy Asian Sea Bass delivered fresh to Karachi homes.', NOW(), NOW()),
(7, 1, 'Sole Fish Fillet (Kala Machli Fillet)', 'sole-fish-fillet', '100% boneless sole fish fillets. Kid friendly and easy fry.', 'Pre-filleted boneless Sole fish. Light, smooth, tender meat perfect for fish & chips, pan frying, or grilling for healthy meal prep.', 1650.00, '1 kg (Boneless Fillets)', 40, 1, 0, 'images/products/sole_fillet.jpg', 'Boneless Sole Fish Fillet Karachi | Ocean Delight', 'Fresh boneless Sole fish fillets delivered fast in Karachi.', NOW(), NOW()),
(8, 1, 'Rohu Freshwater Fish (Rahu)', 'rohu-freshwater-fish', 'Traditional river catch with rich authentic taste.', 'Sourced fresh from clean river streams, Rohu is famous for traditional Desi spicy fish curry preparations.', 1200.00, '1 kg', 22, 1, 0, 'images/products/rohu.jpg', 'Rohu Fish Delivery Karachi | Ocean Delight', 'Order fresh Rohu fish in Karachi at affordable PKR rates.', NOW(), NOW()),
(9, 2, 'Jumbo Tiger Prawns (Jumbo Jhinga)', 'jumbo-tiger-prawns', 'Extra large jumbo prawns. Perfect for garlic butter grill & skewers.', 'Super jumbo Arabian Sea Tiger Prawns. Juicy, crisp texture with natural oceanic sweetness. Ideal for prawns karahi, garlic butter sauté, and open flame grilling.', 3800.00, '1 kg (Unpeeled)', 15, 1, 1, 'images/products/tiger_prawns.jpg', 'Jumbo Tiger Prawns Karachi | Ocean Delight', 'Fresh Jumbo Tiger Prawns delivered in Karachi. Cash on Delivery available.', NOW(), NOW()),
(10, 2, 'King Prawns (Bara Jhinga)', 'king-prawns', 'Medium-large king prawns cleaned & deveined.', 'Fresh King Prawns caught off Karachi coast. Cleaned, deveined, and packed in cold chain to ensure maximum freshness for biryani and stir-fries.', 3200.00, '1 kg', 25, 1, 0, 'images/products/king_prawns.jpg', 'King Prawns Karachi | Ocean Delight', 'Order fresh King Prawns online in Karachi with COD.', NOW(), NOW()),
(11, 3, 'White Shrimp Peeled & Deveined', 'white-shrimp-peeled', 'Ready to cook peeled and deveined white sea shrimp.', 'Convenient 100% shell-free and tail-off peeled shrimp. Save prep time for quick pasta, fried rice, and shrimp tacos.', 2400.00, '1 kg (Peeled Meat)', 50, 1, 1, 'images/products/peeled_shrimp.jpg', 'Peeled Shrimp Karachi | Ocean Delight', 'Fresh peeled & deveined white shrimp delivered in Karachi.', NOW(), NOW()),
(12, 3, 'Small Curry Shrimp (Chota Jhinga)', 'small-curry-shrimp', 'Small sweet shrimp ideal for Pakistani seafood masala curry.', 'Fresh small sea shrimp packed with intense seafood flavor. Perfect for prawn masala, pulao, and traditional curries.', 1600.00, '1 kg', 30, 1, 0, 'images/products/curry_shrimp.jpg', 'Small Curry Shrimp Karachi | Ocean Delight', 'Buy small curry shrimp in Karachi at reasonable prices.', NOW(), NOW()),
(13, 2, 'Banana Prawns (Killa Jhinga)', 'banana-prawns', 'Sweet and delicate wild banana prawns from coastal bays.', 'Wild-caught Banana Prawns known for their delicate pink shell and rich sweet flavor. Outstanding for traditional prawn roast.', 2900.00, '1 kg', 20, 1, 0, 'images/products/banana_prawns.jpg', 'Banana Prawns Karachi | Ocean Delight', 'Fresh Banana Prawns delivered in Karachi.', NOW(), NOW()),
(14, 4, 'Fresh Blue Swimmer Crabs (Kekra)', 'fresh-blue-swimmer-crabs', 'Sweet succulent meat blue sea crabs.', 'Freshly caught Blue Swimmer Crabs from coastal bay waters. Sweet, tender flesh perfect for crab soup, chili crab, and coastal curries.', 1800.00, '1 kg (Whole)', 15, 1, 1, 'images/products/blue_crab.jpg', 'Blue Swimmer Crabs Karachi | Ocean Delight', 'Order fresh Blue Crabs online in Karachi.', NOW(), NOW()),
(15, 4, 'Live Mud Crabs (Mangrove Kekra)', 'live-mud-crabs', 'Heavy meaty mud crabs with firm claws.', 'Premium thick-shelled Mud Crabs filled with dense sweet claw meat. A delicacy for crab lovers in Karachi.', 2500.00, '1 kg', 10, 1, 0, 'images/products/mud_crab.jpg', 'Mud Crabs Karachi | Ocean Delight', 'Fresh meaty mud crabs delivered cold-chain in Karachi.', NOW(), NOW()),
(16, 5, 'Arabian Sea Rock Lobster (Whole)', 'arabian-sea-rock-lobster', 'Luxury rock lobster for gourmet dining at home.', 'Wild Arabian Sea Rock Lobster featuring firm, succulent tail meat. High-end gourmet seafood option for romantic dinners and celebrations.', 5200.00, '1 kg (Whole)', 8, 1, 1, 'images/products/rock_lobster.jpg', 'Rock Lobster Delivery Karachi | Ocean Delight', 'Buy fresh Arabian Sea Rock Lobster delivered in Karachi.', NOW(), NOW()),
(17, 5, 'Lobster Tails (Cleaned)', 'lobster-tails-cleaned', 'Succulent lobster tails prepped and ready for butter basting.', 'Cleaned rock lobster tails packed with tender white lobster meat. Bake with butter, garlic, and herbs.', 6500.00, '1 kg (Tails)', 6, 1, 0, 'images/products/lobster_tails.jpg', 'Cleaned Lobster Tails Karachi | Ocean Delight', 'Gourmet lobster tails home delivered in Karachi.', NOW(), NOW()),
(18, 6, 'Fresh Squid / Calamari Rings', 'fresh-squid-calamari-rings', 'Cleaned calamari squid rings ready for frying.', 'Fresh ocean squid cleaned and cut into convenient calamari rings. Baste in seasoned flour and flash fry for crispy calamari.', 1750.00, '1 kg (Cleaned Rings)', 20, 1, 0, 'images/products/calamari_rings.jpg', 'Calamari Squid Rings Karachi | Ocean Delight', 'Fresh squid and calamari rings delivered in Karachi.', NOW(), NOW()),
(19, 6, 'Whole Ocean Cuttlefish (Maina)', 'whole-cuttlefish-maina', 'Thick cuttlefish meat ideal for grilled seafood skewers.', 'Ocean cuttlefish with firm texture and mild flavor. Cleaned and prepped for grilling and wok stir-fry.', 1550.00, '1 kg', 15, 1, 0, 'images/products/cuttlefish.jpg', 'Fresh Cuttlefish Karachi | Ocean Delight', 'Fresh cuttlefish delivery in Karachi.', NOW(), NOW()),
(20, 7, 'Norwegian Salmon Fillet (Fresh Import)', 'norwegian-salmon-fillet', 'Premium sushi grade Atlantic salmon fillet with skin on.', 'Air-flown fresh Norwegian Salmon fillets. Rich in Omega-3 oil with rich buttery flavor and vibrant coral orange color. Ideal for pan-searing, baking, or sashimi.', 4500.00, '1 kg (Skin-on Fillet)', 12, 1, 1, 'images/products/salmon_fillet.jpg', 'Norwegian Salmon Fillet Karachi | Ocean Delight', 'Buy authentic Norwegian Salmon Fillets online in Karachi. Chilled delivery guaranteed.', NOW(), NOW()),
(21, 7, 'Yellowfin Tuna Steaks (Dawan Steaks)', 'yellowfin-tuna-steaks', 'Meaty red yellowfin tuna steaks perfect for searing.', 'Deep ocean Yellowfin Tuna steaks. Firm, beef-like texture that sear beautifully while remaining juicy inside.', 3200.00, '1 kg (Steaks)', 15, 1, 1, 'images/products/tuna_steaks.jpg', 'Yellowfin Tuna Steaks Karachi | Ocean Delight', 'Fresh Yellowfin Tuna steaks delivered in Karachi.', NOW(), NOW()),
(22, 7, 'Smoked Salmon Slices', 'smoked-salmon-slices', 'Wood smoked ready to eat salmon slices.', 'Cold-smoked Norwegian salmon slices. Delicate aroma and salty-sweet smoked flavor for breakfast toast, salads, and gourmet canapés.', 4800.00, '500g Pack', 10, 1, 0, 'images/products/smoked_salmon.jpg', 'Smoked Salmon Slices Karachi | Ocean Delight', 'Order premium smoked salmon slices in Karachi.', NOW(), NOW()),
(23, 1, 'Lady Fish (Bambool / Bhambor)', 'lady-fish-bambool', 'Slender tender seawater fish for crisp pan fry.', 'Fresh coastal Lady Fish featuring soft sweet white meat. Very popular in Karachi coastal homes for crispy semolina rava fry.', 1400.00, '1 kg', 20, 1, 0, 'images/products/lady_fish.jpg', 'Lady Fish Bambool Karachi | Ocean Delight', 'Buy fresh Lady Fish (Bambool) online in Karachi.', NOW(), NOW()),
(24, 1, 'Indian Mackerel (Bangda)', 'indian-mackerel-bangda', 'Nutritious oil-rich fish perfect for spicy masala fry.', 'Fresh Arabian Sea Indian Mackerel. Rich in natural seafood oils and flavor, best paired with spicy chili coriander marination.', 950.00, '1 kg', 35, 1, 0, 'images/products/mackerel.jpg', 'Indian Mackerel Bangda Karachi | Ocean Delight', 'Fresh Indian Mackerel delivered in Karachi at budget rates.', NOW(), NOW()),
(25, 1, 'Silver Croaker (Dhotar Fish)', 'silver-croaker-dhotar', 'Mild flaky white sea fish for daily meals.', 'Fresh Croaker fish from Karachi shores. Flaky white meat that absorbs spices well in daily fish curries and tava fry.', 1350.00, '1 kg', 25, 1, 0, 'images/products/croaker.jpg', 'Silver Croaker Dhotar Fish Karachi | Ocean Delight', 'Fresh Silver Croaker fish delivered in Karachi.', NOW(), NOW()),
(26, 1, 'Catfish Fillet (Khagga Boneless)', 'catfish-fillet-khagga', 'Firm boneless white meat fillet.', 'Cleaned boneless catfish fillet with firm texture. Ideal for fish finger battering and thick curries.', 1250.00, '1 kg', 18, 1, 0, 'images/products/catfish.jpg', 'Boneless Catfish Fillet Karachi | Ocean Delight', 'Order boneless catfish fillet in Karachi.', NOW(), NOW()),
(27, 7, 'Mix Seafood Medley (Prawns, Squid & Fish)', 'mix-seafood-medley', 'Assorted prepped seafood pieces for paella, pasta & soups.', 'Convenient mix of cleaned prawns, squid rings, and boneless fish cubes. Ready to toss into gourmet seafood soup, paella, or chowder.', 2700.00, '1 kg Pack', 25, 1, 1, 'images/products/seafood_mix.jpg', 'Mixed Seafood Medley Karachi | Ocean Delight', 'Buy prepped mixed seafood pack in Karachi with Cash on Delivery.', NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `orders`
-- --------------------------------------------------------

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `delivery_area` varchar(255) NOT NULL,
  `delivery_address` text NOT NULL,
  `order_notes` text DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `delivery_fee` decimal(10,2) NOT NULL DEFAULT 250.00,
  `grand_total` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'Cash on Delivery',
  `order_status` enum('Pending','Confirmed','Preparing','Out for Delivery','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample Initial Order
INSERT INTO `orders` (`id`, `order_number`, `user_id`, `customer_name`, `customer_email`, `customer_phone`, `delivery_area`, `delivery_address`, `order_notes`, `subtotal`, `delivery_fee`, `grand_total`, `payment_method`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 'OD-20260910-A91B8', 2, 'Tariq Mahmood', 'customer@oceandelight.pk', '+923339876543', 'Clifton Block 5, Karachi', 'Apartment 402, Sea Breeze Heights, Clifton Block 5, Karachi', 'Clean and slice Surmai into steaks please.', 5400.00, 250.00, 5650.00, 'Cash on Delivery', 'Confirmed', NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `order_items`
-- --------------------------------------------------------

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `weight_unit` varchar(255) NOT NULL DEFAULT '1 kg',
  `unit_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `line_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `weight_unit`, `unit_price`, `quantity`, `line_total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Fresh White Pomfret (Safaid Paplet)', '1 kg (Whole)', 2800.00, 1, 2800.00, NOW(), NOW()),
(2, 1, 4, 'King Mackerel (Surmai Steaks)', '1 kg (Steaks)', 2600.00, 1, 2600.00, NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `contact_messages`
-- --------------------------------------------------------

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `settings`
-- --------------------------------------------------------

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Ocean Delight', 'general', NOW(), NOW()),
(2, 'business_city', 'Karachi', 'general', NOW(), NOW()),
(3, 'delivery_fee', '250', 'delivery', NOW(), NOW()),
(4, 'min_order_amount', '1000', 'delivery', NOW(), NOW()),
(5, 'supported_areas', 'DHA, Clifton, Gulshan-e-Iqbal, PECHS, North Nazimabad, Saddar, Bahria Town, Korangi, Malir, Federal B Area, Defence View, Tariq Road, SMCHS, Bath Island', 'delivery', NOW(), NOW()),
(6, 'payment_method', 'Cash on Delivery', 'payment', NOW(), NOW()),
(7, 'contact_phone', '+92 300 8282363', 'contact', NOW(), NOW()),
(8, 'contact_email', 'support@oceandelight.pk', 'contact', NOW(), NOW()),
(9, 'contact_address', 'Dockyard Road, Near Fishery Wharf, Karachi, Sindh, Pakistan', 'contact', NOW(), NOW());
