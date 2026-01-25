<?php
ob_start();
?>

<h1>Welcome</h1>
<p>Clean slate PHP app.</p>

<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';
