<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle?></title>
</head>
<body>
    <header>
  <nav>
    <ul>
      <li><a href="?p=home">Accueil</a></li>
      <li><a href="?p=panier">Panier</a></li>
      <li><a href="?p=contact">Contact</a></li>
      <li><a href="?p=list">Liste</a></li>
      <li><a href="?p=register">Inscription</a></li>
      <?php if(isset($_SESSION['user_id'])){ ?>
        <li><a href="actions/logout.php">Déconnexion (<?=$_SESSION['user_name']?>)</a></li>
      <?php }else { ?>
      <li><a href="?p=login">Connexion</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>