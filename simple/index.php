<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Simple single-file PHP app
| Purpose: known-good reference implementation
|--------------------------------------------------------------------------
*/

// -------------------------------------------------
// Error handling
// -------------------------------------------------
ini_set('display_errors', '1');
error_reporting(E_ALL);

// -------------------------------------------------
// Config (inline replacement for config.local.php)
// -------------------------------------------------
$config = [
    'app_name' => 'My PHP App',
    'debug' => true,
];

// -------------------------------------------------
// Page variables
// -------------------------------------------------
$title = 'Home';

// -------------------------------------------------
// Page content
// -------------------------------------------------
ob_start();
?>

<h1>Welcome</h1>
<p>This is the <strong>simple</strong> single-file version.</p>

<?php
$content = ob_get_clean();

// -------------------------------------------------
// Layout
// -------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($title) ?></title>
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
