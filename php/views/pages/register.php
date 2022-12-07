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
  <input type="text" id="name" name="name" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="phone">Téléphone:</label><br>
  <input type="tel" id="phone" name="phone" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  <label for="password">Confirm password:</label><br>
  <input type="password" id="conf_password" name="conf_password" required><br>
  <input type="submit" value="S'inscrire">
</form>

<?php
$pageContent = ob_get_clean();
?>