<?php
$pageTitle = "Admin Contact - Site test";
$all_forms = $ContactManager->get_all_from_table();

ob_start();
?>
<h1>Admin Contact page</h1>
<?php 
foreach ($all_forms as $form) {?>
    <li><?= $form->name?></li>
<?php }

?>

<?php
$pageContent = ob_get_clean();
?>