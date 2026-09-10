<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $fishCat = Category::where('slug', 'fish')->first()?->id ?? 1;
        $prawnsCat = Category::where('slug', 'prawns')->first()?->id ?? 2;
        $shrimpCat = Category::where('slug', 'shrimp')->first()?->id ?? 3;
        $crabCat = Category::where('slug', 'crab')->first()?->id ?? 4;
        $lobsterCat = Category::where('slug', 'lobster')->first()?->id ?? 5;
        $squidCat = Category::where('slug', 'squid')->first()?->id ?? 6;
        $premiumCat = Category::where('slug', 'premium-seafood')->first()?->id ?? 7;

        $products = [
            // Fish Category (1-8)
            [
                'category_id' => $fishCat,
                'name' => 'Fresh White Pomfret (Safaid Paplet)',
                'slug' => 'fresh-white-pomfret',
                'short_description' => 'Delicate, sweet seawater pomfret. Perfect for frying and grilling whole.',
                'description' => 'White Pomfret is one of the most prized catches from the Arabian Sea off Karachi shore. Known for its firm, sweet white flesh and minimal central bone, it is ideal for rava fry, tandoori grill, or lemon garlic butter pan fry.',
                'price' => 2800,
                'weight_unit' => '1 kg (Whole)',
                'stock' => 25,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/white_pomfret.jpg',
                'meta_title' => 'Fresh White Pomfret in Karachi | Ocean Delight',
                'meta_description' => 'Buy 100% fresh White Pomfret (Safaid Paplet) delivered to your home in Karachi. Cash on delivery guaranteed.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Black Pomfret (Kala Paplet)',
                'slug' => 'black-pomfret',
                'short_description' => 'Rich flavored seawater black pomfret with tender flesh.',
                'description' => 'Freshly landed Karachi Black Pomfret. Slightly deeper, rich seafood flavor with flaky texture. Great for spicy coastal curries and deep frying.',
                'price' => 1950,
                'weight_unit' => '1 kg (Whole)',
                'stock' => 30,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/black_pomfret.jpg',
                'meta_title' => 'Black Pomfret Fish Karachi | Ocean Delight',
                'meta_description' => 'Order fresh Black Pomfret online in Karachi. Delivered cold-chain direct to your door.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Red Snapper (Hira Fish)',
                'slug' => 'red-snapper',
                'short_description' => 'Lean, firm red snapper fish. Excellent for roasting and steaming.',
                'description' => 'Authentic Arabian Sea Red Snapper (Hira). Highly sought after for its moist, sweet, nutty flavor and firm texture that holds shape during baking, steaming, or spicy fish curry prep.',
                'price' => 2400,
                'weight_unit' => '1 kg (Cleaned)',
                'stock' => 20,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/red_snapper.jpg',
                'meta_title' => 'Red Snapper (Hira Fish) Karachi | Ocean Delight',
                'meta_description' => 'Fresh Red Snapper delivery in Karachi. Cleaned, gutted and chilled for ultimate freshness.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'King Mackerel (Surmai Steaks)',
                'slug' => 'king-mackerel-surmai',
                'short_description' => 'Boneless cut Surmai fish steaks. Karachi favorite for fish fry.',
                'description' => 'Fresh King Mackerel sliced into clean center-cut steaks. High in omega-3 fatty acids, Surmai is thick, meaty, and virtually free of small bones, making it Karachi\'s top choice for fish biryani and tava fry.',
                'price' => 2600,
                'weight_unit' => '1 kg (Steaks)',
                'stock' => 35,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/surmai.jpg',
                'meta_title' => 'Surmai Fish Steaks Karachi | Ocean Delight',
                'meta_description' => 'Buy fresh Surmai steaks in Karachi. Fresh daily catch, Cash on delivery.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Fresh Grouper (Gissar Fish)',
                'slug' => 'fresh-grouper-gissar',
                'short_description' => 'Mild, moist reef fish fillet ideal for fish tikka and grilling.',
                'description' => 'Karachi Grouper (Gissar) features thick white meat with a mild, sweet flavor profile. Outstanding for fish finger battering, tikka marination, and slow pot stews.',
                'price' => 1850,
                'weight_unit' => '1 kg',
                'stock' => 18,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/grouper.jpg',
                'meta_title' => 'Fresh Grouper Fish Karachi | Ocean Delight',
                'meta_description' => 'Order fresh Grouper (Gissar) fish online in Karachi.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Sea Bass (Dambra / Barramundi)',
                'slug' => 'sea-bass-dambra',
                'short_description' => 'Buttery and flaky sea bass fillets. Restaurant grade quality.',
                'description' => 'Fresh Asian Sea Bass caught off the coastal sea. Rich, buttery flavor with crisp skin when pan-seared.',
                'price' => 2200,
                'weight_unit' => '1 kg (Whole/Cleaned)',
                'stock' => 15,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/seabass.jpg',
                'meta_title' => 'Fresh Sea Bass Karachi | Ocean Delight',
                'meta_description' => 'Buy Asian Sea Bass delivered fresh to Karachi homes.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Sole Fish Fillet (Kala Machli Fillet)',
                'slug' => 'sole-fish-fillet',
                'short_description' => '100% boneless sole fish fillets. Kid friendly and easy fry.',
                'description' => 'Pre-filleted boneless Sole fish. Light, smooth, tender meat perfect for fish & chips, pan frying, or grilling for healthy meal prep.',
                'price' => 1650,
                'weight_unit' => '1 kg (Boneless Fillets)',
                'stock' => 40,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/sole_fillet.jpg',
                'meta_title' => 'Boneless Sole Fish Fillet Karachi | Ocean Delight',
                'meta_description' => 'Fresh boneless Sole fish fillets delivered fast in Karachi.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Rohu Freshwater Fish (Rahu)',
                'slug' => 'rohu-freshwater-fish',
                'short_description' => 'Traditional river catch with rich authentic taste.',
                'description' => 'Sourced fresh from clean river streams, Rohu is famous for traditional Desi spicy fish curry preparations.',
                'price' => 1200,
                'weight_unit' => '1 kg',
                'stock' => 22,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/rohu.jpg',
                'meta_title' => 'Rohu Fish Delivery Karachi | Ocean Delight',
                'meta_description' => 'Order fresh Rohu fish in Karachi at affordable PKR rates.'
            ],

            // Prawns & Shrimp Category (9-16)
            [
                'category_id' => $prawnsCat,
                'name' => 'Jumbo Tiger Prawns (Jumbo Jhinga)',
                'slug' => 'jumbo-tiger-prawns',
                'short_description' => 'Extra large jumbo prawns. Perfect for garlic butter grill & skewers.',
                'description' => 'Super jumbo Arabian Sea Tiger Prawns. Juicy, crisp texture with natural oceanic sweetness. Ideal for prawns karahi, garlic butter sauté, and open flame grilling.',
                'price' => 3800,
                'weight_unit' => '1 kg (Unpeeled / Cleaned on request)',
                'stock' => 15,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/tiger_prawns.jpg',
                'meta_title' => 'Jumbo Tiger Prawns Karachi | Ocean Delight',
                'meta_description' => 'Fresh Jumbo Tiger Prawns delivered in Karachi. Cash on Delivery available.'
            ],
            [
                'category_id' => $prawnsCat,
                'name' => 'King Prawns (Bara Jhinga)',
                'slug' => 'king-prawns',
                'short_description' => 'Medium-large king prawns cleaned & deveined.',
                'description' => 'Fresh King Prawns caught off Karachi coast. Cleaned, deveined, and packed in cold chain to ensure maximum freshness for biryani and stir-fries.',
                'price' => 3200,
                'weight_unit' => '1 kg',
                'stock' => 25,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/king_prawns.jpg',
                'meta_title' => 'King Prawns Karachi | Ocean Delight',
                'meta_description' => 'Order fresh King Prawns online in Karachi with COD.'
            ],
            [
                'category_id' => $shrimpCat,
                'name' => 'White Shrimp Peeled & Deveined',
                'slug' => 'white-shrimp-peeled',
                'short_description' => 'Ready to cook peeled and deveined white sea shrimp.',
                'description' => 'Convenient 100% shell-free and tail-off peeled shrimp. Save prep time for quick pasta, fried rice, and shrimp tacos.',
                'price' => 2400,
                'weight_unit' => '1 kg (Peeled Meat)',
                'stock' => 50,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/peeled_shrimp.jpg',
                'meta_title' => 'Peeled Shrimp Karachi | Ocean Delight',
                'meta_description' => 'Fresh peeled & deveined white shrimp delivered in Karachi.'
            ],
            [
                'category_id' => $shrimpCat,
                'name' => 'Small Curry Shrimp (Chota Jhinga)',
                'slug' => 'small-curry-shrimp',
                'short_description' => 'Small sweet shrimp ideal for Pakistani seafood masala curry.',
                'description' => 'Fresh small sea shrimp packed with intense seafood flavor. Perfect for prawn masala, pulao, and traditional curries.',
                'price' => 1600,
                'weight_unit' => '1 kg',
                'stock' => 30,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/curry_shrimp.jpg',
                'meta_title' => 'Small Curry Shrimp Karachi | Ocean Delight',
                'meta_description' => 'Buy small curry shrimp in Karachi at reasonable prices.'
            ],
            [
                'category_id' => $prawnsCat,
                'name' => 'Banana Prawns (Killa Jhinga)',
                'slug' => 'banana-prawns',
                'short_description' => 'Sweet and delicate wild banana prawns from coastal bays.',
                'description' => 'Wild-caught Banana Prawns known for their delicate pink shell and rich sweet flavor. Outstanding for traditional prawn roast.',
                'price' => 2900,
                'weight_unit' => '1 kg',
                'stock' => 20,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/banana_prawns.jpg',
                'meta_title' => 'Banana Prawns Karachi | Ocean Delight',
                'meta_description' => 'Fresh Banana Prawns delivered in Karachi.'
            ],

            // Crabs, Lobster, Squid (14-22)
            [
                'category_id' => $crabCat,
                'name' => 'Fresh Blue Swimmer Crabs (Kekra)',
                'slug' => 'fresh-blue-swimmer-crabs',
                'short_description' => 'Sweet succulent meat blue sea crabs.',
                'description' => 'Freshly caught Blue Swimmer Crabs from coastal bay waters. Sweet, tender flesh perfect for crab soup, chili crab, and coastal curries.',
                'price' => 1800,
                'weight_unit' => '1 kg (Whole)',
                'stock' => 15,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/blue_crab.jpg',
                'meta_title' => 'Blue Swimmer Crabs Karachi | Ocean Delight',
                'meta_description' => 'Order fresh Blue Crabs online in Karachi.'
            ],
            [
                'category_id' => $crabCat,
                'name' => 'Live Mud Crabs (Mangrove Kekra)',
                'slug' => 'live-mud-crabs',
                'short_description' => 'Heavy meaty mud crabs with firm claws.',
                'description' => 'Premium thick-shelled Mud Crabs filled with dense sweet claw meat. A delicacy for crab lovers in Karachi.',
                'price' => 2500,
                'weight_unit' => '1 kg',
                'stock' => 10,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/mud_crab.jpg',
                'meta_title' => 'Mud Crabs Karachi | Ocean Delight',
                'meta_description' => 'Fresh meaty mud crabs delivered cold-chain in Karachi.'
            ],
            [
                'category_id' => $lobsterCat,
                'name' => 'Arabian Sea Rock Lobster (Whole)',
                'slug' => 'arabian-sea-rock-lobster',
                'short_description' => 'Luxury rock lobster for gourmet dining at home.',
                'description' => 'Wild Arabian Sea Rock Lobster featuring firm, succulent tail meat. High-end gourmet seafood option for romantic dinners and celebrations.',
                'price' => 5200,
                'weight_unit' => '1 kg (Whole)',
                'stock' => 8,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/rock_lobster.jpg',
                'meta_title' => 'Rock Lobster Delivery Karachi | Ocean Delight',
                'meta_description' => 'Buy fresh Arabian Sea Rock Lobster delivered in Karachi.'
            ],
            [
                'category_id' => $lobsterCat,
                'name' => 'Lobster Tails (Cleaned)',
                'slug' => 'lobster-tails-cleaned',
                'short_description' => 'Succulent lobster tails prepped and ready for butter basting.',
                'description' => 'Cleaned rock lobster tails packed with tender white lobster meat. Bake with butter, garlic, and herbs.',
                'price' => 6500,
                'weight_unit' => '1 kg (Tails)',
                'stock' => 6,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/lobster_tails.jpg',
                'meta_title' => 'Cleaned Lobster Tails Karachi | Ocean Delight',
                'meta_description' => 'Gourmet lobster tails home delivered in Karachi.'
            ],
            [
                'category_id' => $squidCat,
                'name' => 'Fresh Squid / Calamari Rings',
                'slug' => 'fresh-squid-calamari-rings',
                'short_description' => 'Cleaned calamari squid rings ready for frying.',
                'description' => 'Fresh ocean squid cleaned and cut into convenient calamari rings. Baste in seasoned flour and flash fry for crispy calamari.',
                'price' => 1750,
                'weight_unit' => '1 kg (Cleaned Rings)',
                'stock' => 20,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/calamari_rings.jpg',
                'meta_title' => 'Calamari Squid Rings Karachi | Ocean Delight',
                'meta_description' => 'Fresh squid and calamari rings delivered in Karachi.'
            ],
            [
                'category_id' => $squidCat,
                'name' => 'Whole Ocean Cuttlefish (Maina)',
                'slug' => 'whole-cuttlefish-maina',
                'short_description' => 'Thick cuttlefish meat ideal for grilled seafood skewers.',
                'description' => 'Ocean cuttlefish with firm texture and mild flavor. Cleaned and prepped for grilling and wok stir-fry.',
                'price' => 1550,
                'weight_unit' => '1 kg',
                'stock' => 15,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/cuttlefish.jpg',
                'meta_title' => 'Fresh Cuttlefish Karachi | Ocean Delight',
                'meta_description' => 'Fresh cuttlefish delivery in Karachi.'
            ],

            // Premium Seafood & Imports (23-30)
            [
                'category_id' => $premiumCat,
                'name' => 'Norwegian Salmon Fillet (Fresh Import)',
                'slug' => 'norwegian-salmon-fillet',
                'short_description' => 'Premium sushi grade Atlantic salmon fillet with skin on.',
                'description' => 'Air-flown fresh Norwegian Salmon fillets. Rich in Omega-3 oil with rich buttery flavor and vibrant coral orange color. Ideal for pan-searing, baking, or sashimi.',
                'price' => 4500,
                'weight_unit' => '1 kg (Skin-on Fillet)',
                'stock' => 12,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/salmon_fillet.jpg',
                'meta_title' => 'Norwegian Salmon Fillet Karachi | Ocean Delight',
                'meta_description' => 'Buy authentic Norwegian Salmon Fillets online in Karachi. Chilled delivery guaranteed.'
            ],
            [
                'category_id' => $premiumCat,
                'name' => 'Yellowfin Tuna Steaks (Dawan Steaks)',
                'slug' => 'yellowfin-tuna-steaks',
                'short_description' => 'Meaty red yellowfin tuna steaks perfect for searing.',
                'description' => 'Deep ocean Yellowfin Tuna steaks. Firm, beef-like texture that sear beautifully while remaining juicy inside.',
                'price' => 3200,
                'weight_unit' => '1 kg (Steaks)',
                'stock' => 15,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/tuna_steaks.jpg',
                'meta_title' => 'Yellowfin Tuna Steaks Karachi | Ocean Delight',
                'meta_description' => 'Fresh Yellowfin Tuna steaks delivered in Karachi.'
            ],
            [
                'category_id' => $premiumCat,
                'name' => 'Smoked Salmon Slices',
                'slug' => 'smoked-salmon-slices',
                'short_description' => 'Wood smoked ready to eat salmon slices.',
                'description' => 'Cold-smoked Norwegian salmon slices. Delicate aroma and salty-sweet smoked flavor for breakfast toast, salads, and gourmet canapés.',
                'price' => 4800,
                'weight_unit' => '500g Pack',
                'stock' => 10,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/smoked_salmon.jpg',
                'meta_title' => 'Smoked Salmon Slices Karachi | Ocean Delight',
                'meta_description' => 'Order premium smoked salmon slices in Karachi.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Lady Fish (Bambool / Bhambor)',
                'slug' => 'lady-fish-bambool',
                'short_description' => 'Slender tender seawater fish for crisp pan fry.',
                'description' => 'Fresh coastal Lady Fish featuring soft sweet white meat. Very popular in Karachi coastal homes for crispy semolina rava fry.',
                'price' => 1400,
                'weight_unit' => '1 kg',
                'stock' => 20,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/lady_fish.jpg',
                'meta_title' => 'Lady Fish Bambool Karachi | Ocean Delight',
                'meta_description' => 'Buy fresh Lady Fish (Bambool) online in Karachi.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Indian Mackerel (Bangda)',
                'slug' => 'indian-mackerel-bangda',
                'short_description' => 'Nutritious oil-rich fish perfect for spicy masala fry.',
                'description' => 'Fresh Arabian Sea Indian Mackerel. Rich in natural seafood oils and flavor, best paired with spicy chili coriander marination.',
                'price' => 950,
                'weight_unit' => '1 kg',
                'stock' => 35,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/mackerel.jpg',
                'meta_title' => 'Indian Mackerel Bangda Karachi | Ocean Delight',
                'meta_description' => 'Fresh Indian Mackerel delivered in Karachi at budget rates.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Silver Croaker (Dhotar Fish)',
                'slug' => 'silver-croaker-dhotar',
                'short_description' => 'Mild flaky white sea fish for daily meals.',
                'description' => 'Fresh Croaker fish from Karachi shores. Flaky white meat that absorbs spices well in daily fish curries and tava fry.',
                'price' => 1350,
                'weight_unit' => '1 kg',
                'stock' => 25,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/croaker.jpg',
                'meta_title' => 'Silver Croaker Dhotar Fish Karachi | Ocean Delight',
                'meta_description' => 'Fresh Silver Croaker fish delivered in Karachi.'
            ],
            [
                'category_id' => $fishCat,
                'name' => 'Catfish Fillet (Khagga Boneless)',
                'slug' => 'catfish-fillet-khagga',
                'short_description' => 'Firm boneless white meat fillet.',
                'description' => 'Cleaned boneless catfish fillet with firm texture. Ideal for fish finger battering and thick curries.',
                'price' => 1250,
                'weight_unit' => '1 kg',
                'stock' => 18,
                'is_active' => true,
                'is_featured' => false,
                'image' => 'products/catfish.jpg',
                'meta_title' => 'Boneless Catfish Fillet Karachi | Ocean Delight',
                'meta_description' => 'Order boneless catfish fillet in Karachi.'
            ],
            [
                'category_id' => $premiumCat,
                'name' => 'Mix Seafood Medley (Prawns, Squid & Fish)',
                'slug' => 'mix-seafood-medley',
                'short_description' => 'Assorted prepped seafood pieces for paella, pasta & soups.',
                'description' => 'Convenient mix of cleaned prawns, squid rings, and boneless fish cubes. Ready to toss into gourmet seafood soup, paella, or chowder.',
                'price' => 2700,
                'weight_unit' => '1 kg Pack',
                'stock' => 25,
                'is_active' => true,
                'is_featured' => true,
                'image' => 'products/seafood_mix.jpg',
                'meta_title' => 'Mixed Seafood Medley Karachi | Ocean Delight',
                'meta_description' => 'Buy prepped mixed seafood pack in Karachi with Cash on Delivery.'
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['slug' => $prod['slug']], $prod);
        }
    }
}
