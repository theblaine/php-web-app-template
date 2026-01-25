<?php
declare(strict_types=1);

// Error handling
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Load local config
$configPath = __DIR__ . '/config.local.php';

if (!file_exists($configPath)) {
    throw new RuntimeException('Missing config.local.php');
}

$config = require $configPath;
