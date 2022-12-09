<?php
$pageTitle = "Ma commande";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
$error_message = get_error();
$query= "SELECT product.id, product.name, product.price , product.description, panier.quantity FROM panier INNER JOIN product ON panier.product_id = product.id WHERE panier.user_id =". $user_id;
$panier = $PanierManager->custom_select($query);
$totalCommande = 0;
ob_start();
?>
<h1>Ma commande</h1>
<div class="p-3 mb-2 bg-light text-dark shadow-sm" >
<h2>Récapitulatif</h2>
<?php 
foreach($panier as $productPanier){ ?>
    <?php $totalCommande += $productPanier['quantity'] * $productPanier['price'] ?>
    <div class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center"><?= $productPanier["name"] ?> : <?= $productPanier["price"] ?> $</li>        
    <li class="list-group-item d-flex justify-content-between align-items-center">Quantité : <?= $productPanier['quantity']?></li>
    <li class="list-group-item d-flex justify-content-between align-items-center"><?= $productPanier["description"] ?> </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">Total : <?= $productPanier['quantity'] * $productPanier['price']?> $</li>
</div></br>
      
<?php } ?>
<div class="text-center">Total de la commande : <?= $totalCommande?> $</div>
<form action= "actions/addCommande.php" method="POST" >
<?php if($error_message){ ?>    
    <p class= "error"><?= $error_message?></p>
<?php } ?>
    <div class="adresse d-flex flex-column align-items-center">
        <div class="input-group mb-3 align-items-center">
        <label for="adresse" class="input-group-text" >Adresse de Livraison</label>    
        <input type="text" name="adresse" id="adresse" class="form-control"></div>
        <input type="submit" name="validCommand" value="Valider la commande" class="commandeButton btn btn-primary"></form>
    </div>
</div>
<?php
$pageContent = ob_get_clean();
?>