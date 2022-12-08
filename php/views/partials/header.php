<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title><?=$pageTitle?></title>
</head>
<body>
    <header>
  <nav>
    <ul>
      <li><a href="?p=home">Accueil</a></li>
      <li><a href="?p=contact">Contact</a></li>
      <li><a href="?p=list">Liste</a></li>
      <li><a href="?p=register">Inscription</a></li>
      <?php if(isset($_SESSION['user_id'])){ ?>
        <li><a href="?p=panier">Panier</a></li>
        <li> <a href="?p=mes_commandes">Mes commandes</a></li>
        <li><a href="actions/logout.php">Déconnexion (<?=$_SESSION['user_name']?>)</a></li>
      <?php }else { ?>
      <li><a href="?p=login">Connexion</a></li>
      <?php } if($is_admin) {?>
        <li><a href="?p=admin_commande">Gérer commandes</a></li>
        <li><a href="?p=admin_contact">Gérer contacts</a></li>
        <li><a href="?p=admin_add_product">Ajouter un produit</a></li>
        <?php } ?>
    </ul>
  </nav>
</header>