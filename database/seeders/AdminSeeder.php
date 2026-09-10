<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Administrator
        User::updateOrCreate(
            ['email' => 'admin@oceandelight.pk'],
            [
                'name' => 'Ocean Delight Admin',
                'phone' => '+923001234567',
                'password' => Hash::make('password123'),
                'area' => 'DHA Phase 6, Karachi',
                'address' => 'Ocean Delight HQ, Khayaban-e-Shahbaz, DHA Phase 6, Karachi',
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // Seed Sample Customer
        User::updateOrCreate(
            ['email' => 'customer@oceandelight.pk'],
            [
                'name' => 'Tariq Mahmood',
                'phone' => '+923339876543',
                'password' => Hash::make('password123'),
                'area' => 'Clifton Block 5, Karachi',
                'address' => 'Apartment 402, Sea Breeze Heights, Clifton Block 5, Karachi',
                'role' => 'customer',
                'is_active' => true,
            ]
        );
    }
}
