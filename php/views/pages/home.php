<?php
$pageTitle = "Home - Site test";
ob_start();
?>
<h1>Home page</h1>
<?php
$pageContent = ob_get_clean();
?>