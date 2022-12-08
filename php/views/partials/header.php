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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="container px-lg-5">
  <span class="navbar-brand">Le mauvais coin</span>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item"><a class="nav-link" href="?p=home">Accueil</a></li>
      <li class="nav-item"><a class="nav-link" href="?p=list">Shop</a></li>
      <?php if(!isset($_SESSION['user_id'])){ ?>
      <li class="nav-item"><a class="nav-link" href="?p=register">Inscription</a></li>
      <?php } ?>
      <?php if(isset($_SESSION['user_id'])){ ?>
        <li class="nav-item"><a class="nav-link" href="?p=panier">Panier</a></li>
        <li class="nav-item"><a class="nav-link" href="?p=mes_commandes">Mes commandes</a></li>
        <li class="nav-item"><a class="nav-link" href="actions/logout.php">Déconnexion (<?=$_SESSION['user_name']?>)</a></li>
      <?php }else { ?>
      <li class="nav-item"><a class="nav-link" href="?p=login">Connexion</a></li>
      <?php } if($is_admin) {?>
        <li class="nav-item"><a class="nav-link text-success" href="?p=admin_commande">Gérer commandes</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="?p=admin_contact">Gérer contacts</a></li>
        <li class="nav-item"><a class="nav-link text-success" href="?p=admin_add_product">Ajouter un produit</a></li>
        <?php } ?>
    </ul>
  </nav>
  </header>