<?php
$pageTitle = "Connexion";
$error_message = get_error();

ob_start();
?>
<h1>Connexion</h1>

<?php
if($error_message){ ?>
    <p class ="error"><?=$error_message?></p>
<?php }
?>

<form action = "actions/send_login.php" method="POST">
<label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>

  <input type="submit" value="connexion">
</form>
<?php
$pageContent = ob_get_clean();
?>