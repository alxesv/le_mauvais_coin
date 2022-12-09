<?php
$pageTitle = "Connexion";
$error_message = get_error();

ob_start();
?>
<h1 class="text-center main-title">Connexion</h1>


<section class="form-inscription">
<form class="form-note" action = "actions/send_login.php" method="POST">
<?php
if($error_message){ ?>
    <p class ="error"><?=$error_message?></p>
<?php }
?>
<label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>

  <input class = "button-inscription btn btn-primary"type="submit" value="connexion">
</form>
</section>
<?php
$pageContent = ob_get_clean();
?>