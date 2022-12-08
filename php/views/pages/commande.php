<?php
$pageTitle = "Ma commande";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
$error_message = get_error();
$query= "SELECT product.id, product.name, product.price , product.description FROM panier INNER JOIN product ON panier.product_id = product.id WHERE panier.user_id =". $user_id;
$panier = $PanierManager->custom_select($query);
ob_start();
?>
<h1>Ma commande</h1>
<h2>Récapitulatif</h2>
<?php 
foreach($panier as $productPanier){ ?>
    <li><?= $productPanier["name"] ?> : <?= $productPanier["price"] ?> </li>
    <li><?= $productPanier["description"] ?> </li>
      
<?php } ?>
<form action= "actions/addCommande.php" method="POST" >
<?php if($error_message){ ?>    
    <p class= "error"><?= $error_message?></p>
<?php } ?>
<label for="adresse">Adresse de Livraison : </label>    
<input type="text" name="adresse" id="adresse" >
<input type="submit" name="validCommand" value="Valider la commande" class="commandeButton"></form>
    
<?php
$pageContent = ob_get_clean();
?>