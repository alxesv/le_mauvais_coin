<?php
$pageTitle = "Mon panier";

$query= "SELECT product.id, panier.quantity, product.name, product.price, product.slug FROM panier INNER JOIN product ON panier.product_id = product.id WHERE panier.user_id = 1";
$panier = $PanierManager->custom_select($query);


ob_start();
?>
<h1>Mon panier</h1>
<?php foreach($panier as $productPanier){ ?>
    <li><a href = "?p=product&slug=<?=$productPanier["slug"] ?>" ><?= $productPanier["name"] ?></a> : <?= $productPanier["price"] ?> --> <?= $productPanier['quantity']?></li>
    <form method="POST" action ="actions/delete.php"><input type="hidden" name="product_id" value="<?=$productPanier["id"]?>"><input type="submit" name="deletePanier" value="Supprimer" class="deleteButton"></form>
  
<?php }  ?>
  
    <a href="/?p=commande">
    <input type="submit" name="commande" value="Commander" class="commandeButton"></a>
<?php
$pageContent = ob_get_clean();
?>