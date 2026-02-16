<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Single-File PHP App (with local config)
|--------------------------------------------------------------------------
| One folder. One executable file.
| Optional local config via config.local.php.
|--------------------------------------------------------------------------
*/

// -------------------------------------------------
// Local configuration (required)
// -------------------------------------------------
## RENAME OR MAKE A COPY OF config.example.local.php
## TO config.local.php
$configPath = __DIR__ . '/config.local.php';

if (!file_exists($configPath)) {
    throw new RuntimeException('Missing config.local.php');
}

$config = require $configPath;

// -------------------------------------------------
// Error handling (controlled by config)
// -------------------------------------------------
$debug = isset($config['debug']) && $config['debug'] === true;

if ($debug) {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    error_reporting(0);
}


// -------------------------------------------------
// Page selection (explicit, simple)
// -------------------------------------------------
$page = $_GET['page'] ?? 'home';

// -------------------------------------------------
// Page content
// -------------------------------------------------
ob_start();

switch ($page) {

    case 'page1':
        ?>
        <h1>Page 1</h1>
        <p>This is Page 1, handled inside the same file.</p>
        <p><a href="./">Back to home</a></p>
        <?php
        break;

    case 'page2':
        ?>
        <h1>Page 2</h1>
        <p>This is Page 2, handled inside the same file.</p>
        <p><a href="./">Back to home</a></p>
        <?php
        break;

    default:
        ?>
        <h1>Home</h1>
        <p>This is the home page.</p>

        <ul>
            <li><a href="?page=page1">Go to Page 1</a></li>
            <li><a href="?page=page2">Go to Page 2</a></li>
        </ul>
        <?php
        break;
}

$content = ob_get_clean();

// -------------------------------------------------
// Layout
// -------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($config['app_name']) ?></title>
</head>
<body>

<header>
    <h2><?= htmlspecialchars($config['app_name']) ?></h2>
    <hr>
</header>

<main>
    <?= $content ?>
</main>

<footer>
    <hr>
    <small>&copy; <?= date('Y') ?></small>
</footer>

</body>
</html>
