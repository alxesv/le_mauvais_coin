<?php
$pageTitle = "Inscription";

$error_message = get_error();
ob_start();
?>
<h1>Inscription</h1>

<?php
if($error_message){ ?>
    <p class ="error"><?=$error_message?></p>
<?php }
?>

<form action = "actions/send_register.php" method="POST">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>

  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>

  <input type="submit" value="connexion">
</form>

<?php
$pageContent = ob_get_clean();
?>