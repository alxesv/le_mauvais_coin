<?php
$pageTitle = "Admin Contact - LMC";
$all_forms = $ContactManager->get_all_from_table();

ob_start();
?>
<h1>Admin Contact page</h1>
<?php 
foreach ($all_forms as $form) {?>
    <div>Nom : <?= $form->name?></div>
    <div>Mail : <?= $form->email?></div>
    <div>Message :<?= $form->message?></div>
<?php }

?>

<?php
$pageContent = ob_get_clean();
?>