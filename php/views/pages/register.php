<?php
$pageTitle = "Inscription";

$error_message = get_error();
ob_start();
?>
<h1 class="text-center main-title">Inscription</h1>


<section class="form-inscription">

<form class="form-note" action = "actions/send_register.php" method="POST">
<?php
if($error_message){ ?>
    <p class ="error"><?=$error_message?></p>
<?php }
?>
  <label for="name">Name:</label><br>
  <input class="form-pseudo" type="text" id="name" name="name" required><br>
  <label for="email">Email:</label><br>
  <input class="form-email" type="email" id="email" name="email" required><br>
  <label for="phone">Téléphone:</label><br>
  <input class ="tel" type="tel" id="phone" name="phone" required><br>
  <label for="password">Password:</label><br>
  <input class="form-mdp" type="password" id="password" name="password" required><br>
  <label for="password">Confirm password:</label><br>
  <input class="form-confirm" type="password" id="conf_password" name="conf_password" required><br>
  <input class="button-inscription btn btn-primary" type="submit" value="S'inscrire">
</form>

</section>
<?php
$pageContent = ob_get_clean();
?>