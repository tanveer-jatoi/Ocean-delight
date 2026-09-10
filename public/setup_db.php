<?php

/*
|--------------------------------------------------------------------------
| Ocean Delight Database Automated Installer Script
| Connects to local MySQL server, creates `ocean_delight` DB, tables & seeders
| Access via browser: http://localhost/Ocean-Delight/public/setup_db.php
|--------------------------------------------------------------------------
*/

$dbHost = env_get('DB_HOST', '127.0.0.1');
$dbPort = env_get('DB_PORT', '3306');
$dbName = env_get('DB_DATABASE', 'ocean_delight');
$dbUser = env_get('DB_USERNAME', 'root');
$dbPass = env_get('DB_PASSWORD', '');

function env_get($key, $default = '') {
    $envFile = __DIR__ . '/../.env';
    if (!file_exists($envFile)) return $default;
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($k, $v) = array_pad(explode('=', $line, 2), 2, null);
        if (trim($k) === $key) {
            return trim(trim($v), '"\'');
        }
    }
    return $default;
}

$message = '';
$statusClass = '';

if (isset($_GET['run']) && $_GET['run'] === '1') {
    try {
        // Connect to MySQL server without selecting database first
        $pdo = new PDO("mysql:host={$dbHost};port={$dbPort}", $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE => PDO.ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]);

        // Create Database if not exists
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
        $pdo->exec("USE `{$dbName}`;");

        // Read and execute ocean_delight.sql
        $sqlFile = __DIR__ . '/../ocean_delight.sql';
        if (file_exists($sqlFile)) {
            $sqlContent = file_get_contents($sqlFile);
            
            // Execute batch statements
            $pdo->exec($sqlContent);
            
            $message = "Database `{$dbName}` created and populated successfully with all tables and 30 seafood products!";
            $statusClass = "success";
        } else {
            $message = "SQL seed file not found at path: " . $sqlFile;
            $statusClass = "error";
        }
    } catch (PDOException $e) {
        $message = "Database Connection / Migration Error: " . $e->getMessage();
        $statusClass = "error";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Setup - Ocean Delight</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background: #0B192C; color: #ffffff; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #1E3E62; padding: 2.5rem; border-radius: 12px; max-width: 540px; width: 100%; box-shadow: 0 10px 25px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); text-align: center; }
        h1 { color: #E5C378; margin-top: 0; font-size: 1.8rem; }
        p { color: #CBD5E1; line-height: 1.6; }
        .btn { display: inline-block; background: #008DDA; color: #ffffff; padding: 0.85rem 1.75rem; text-decoration: none; border-radius: 6px; font-weight: bold; margin-top: 1.5rem; transition: background 0.2s; border: none; cursor: pointer; font-size: 1rem; }
        .btn:hover { background: #006BB3; }
        .alert { padding: 1rem; border-radius: 6px; margin-top: 1.5rem; text-align: left; font-size: 0.95rem; }
        .alert.success { background: #065F46; color: #D1FAE5; border: 1px solid #059669; }
        .alert.error { background: #991B1B; color: #FEE2E2; border: 1px solid #DC2626; }
        code { background: rgba(0,0,0,0.3); padding: 0.2rem 0.5rem; border-radius: 4px; color: #38BDF8; font-family: monospace; }
        ul { text-align: left; font-size: 0.9rem; color: #E2E8F0; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🌊 Ocean Delight Database Setup</h1>
        <p>This automated script will create the MySQL database <code><?= htmlspecialchars($dbName) ?></code> and seed all initial data (categories, 30 Karachi seafood items, admin account, settings).</p>
        
        <div style="background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 8px; margin: 1rem 0;">
            <div style="font-size: 0.85rem; color: #94A3B8;">Target Server:</div>
            <strong>Host:</strong> <?= htmlspecialchars($dbHost) ?>:<?= htmlspecialchars($dbPort) ?> | <strong>DB:</strong> <?= htmlspecialchars($dbName) ?>
        </div>

        <?php if ($message): ?>
            <div class="alert <?= $statusClass ?>">
                <?= htmlspecialchars($message) ?>
            </div>
            <?php if ($statusClass === 'success'): ?>
                <a href="../public/" class="btn" style="background: #E5C378; color: #0B192C;">🌐 Open Ocean Delight Storefront &rarr;</a>
            <?php endif; ?>
        <?php else: ?>
            <a href="setup_db.php?run=1" class="btn">⚡ Build Database & Seed Initial Data</a>
        <?php endif; ?>

        <div style="margin-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
            <p style="font-size: 0.8rem; color: #94A3B8; margin: 0;">
                Alternatively, you can import <code>ocean_delight.sql</code> directly into phpMyAdmin.
            </p>
        </div>
    </div>
</body>
</html>
