<?php
$pageTitle = "Connexion";
ob_start();
?>
<h1>Connexion</h1>
<form action = "actions/login.php" method="POST">
<label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>

  <input type="submit" value="connexion">
</form>
<?php
$pageContent = ob_get_clean();
?>