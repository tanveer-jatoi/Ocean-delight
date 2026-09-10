<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fish',
                'slug' => 'fish',
                'description' => 'Fresh seawater fish caught daily from the Arabian Sea off Karachi shore.',
                'image' => 'categories/fish.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Prawns',
                'slug' => 'prawns',
                'description' => 'Juicy, wild-caught tiger and king prawns cleaned and prepped.',
                'image' => 'categories/prawns.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Shrimp',
                'slug' => 'shrimp',
                'description' => 'Tender white shrimp ideal for curries, frying, and seafood grills.',
                'image' => 'categories/shrimp.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Crab',
                'slug' => 'crab',
                'description' => 'Fresh blue & mud crabs direct from coastal mangrove waters.',
                'image' => 'categories/crab.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Lobster',
                'slug' => 'lobster',
                'description' => 'Premium Arabian sea rock lobsters for gourmet dining at home.',
                'image' => 'categories/lobster.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Squid',
                'slug' => 'squid',
                'description' => 'Fresh squid / calamari rings cleaned and ready to cook.',
                'image' => 'categories/squid.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Premium Seafood',
                'slug' => 'premium-seafood',
                'description' => 'Handpicked premium catch including Salmon, Tuna steaks, and Red Snapper.',
                'image' => 'categories/premium.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
