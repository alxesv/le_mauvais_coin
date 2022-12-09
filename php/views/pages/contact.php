<?php
$pageTitle = "Contact - LMC";

$error_message = get_error();
ob_start();
?>
<h1 class="text-center main-title">Contact page</h1>



<section class="form-inscription">
<form class="form-note" action="actions/send_contact.php" method="POST">
<?php 
if ($error_message){ ?>
    <p class="error"><?=$error_message?></p>
<?php }
?>
  <label for="name">Votre nom :</label><br>
  <input type="text" id="name" name="name"><br>
  
  <label for="email">Votre adresse e-mail :</label><br>
  <input type="email" id="email" name="email"><br>
  
  <label for="message">Votre message :</label><br>
  <textarea class= "message-contact" id="message" name="message"></textarea><br>
  
  <button class = "button-inscription btn btn-primary" type="submit" value="connexion">Envoyer</button>
</form>
</section>
<?php
$pageContent = ob_get_clean();
?>