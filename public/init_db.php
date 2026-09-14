<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;

echo "<h2>🌊 Ocean Delight Database Auto-Initializer</h2>";

try {
    if (Product::count() < 5) {
        echo "<p>Seeding categories, Karachi seafood items, admin account & settings...</p>";
        (new Database\Seeders\DatabaseSeeder())->run();
    }

    echo "<h3 style='color:green;'>✓ Database ready! Total products in catalog: " . Product::count() . "</h3>";
    echo "<p><a href='/'>Go to Storefront &rarr;</a> | <a href='/admin'>Go to Admin Panel &rarr;</a></p>";

} catch (\Exception $e) {
    echo "<h3 style='color:red;'>Initialization Error: " . $e->getMessage() . "</h3>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}
