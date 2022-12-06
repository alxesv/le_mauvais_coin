<?php
$pageTitle = "Contact - Site test";

$error_message = get_error();
ob_start();
?>
<h1>Contact page</h1>

<?php 
if ($error_message){ ?>
    <p class="error"><?=$error_message?></p>
<?php }
?>

<form action="actions/send_contact.php" method="POST">
  <label for="name">Votre nom :</label><br>
  <input type="text" id="name" name="name"><br>
  
  <label for="email">Votre adresse e-mail :</label><br>
  <input type="email" id="email" name="email"><br>
  
  <label for="message">Votre message :</label><br>
  <textarea id="message" name="message"></textarea><br>
  
  <button type="submit">Envoyer</button>
</form>
<?php
$pageContent = ob_get_clean();
?>