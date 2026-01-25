<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($title ?? 'App') ?></title>
</head>
<body>

<?php require __DIR__ . '/header.php'; ?>

<main>
    <?= $content ?>
</main>

<?php require __DIR__ . '/footer.php'; ?>

</body>
</html>
