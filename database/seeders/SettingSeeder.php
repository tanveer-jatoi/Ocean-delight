<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Ocean Delight', 'group' => 'general'],
            ['key' => 'business_city', 'value' => 'Karachi', 'group' => 'general'],
            ['key' => 'delivery_fee', 'value' => '250', 'group' => 'delivery'],
            ['key' => 'min_order_amount', 'value' => '1000', 'group' => 'delivery'],
            ['key' => 'supported_areas', 'value' => 'DHA, Clifton, Gulshan-e-Iqbal, PECHS, North Nazimabad, Saddar, Bahria Town, Korangi, Malir, Federal B Area, Defence View, Tariq Road, SMCHS, Bath Island', 'group' => 'delivery'],
            ['key' => 'payment_method', 'value' => 'Cash on Delivery', 'group' => 'payment'],
            ['key' => 'contact_phone', 'value' => '+92 300 8282363', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'support@oceandelight.pk', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Dockyard Road, Near Fishery Wharf, Karachi, Sindh, Pakistan', 'group' => 'contact'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
