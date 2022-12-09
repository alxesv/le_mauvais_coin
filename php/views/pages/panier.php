<?php
$pageTitle = "Mon panier";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
$query= "SELECT product.id, panier.quantity, product.name, product.price, product.slug FROM panier INNER JOIN product ON panier.product_id = product.id WHERE panier.user_id =" .$user_id;
$panier = $PanierManager->custom_select($query);
$items= $PanierManager->get_all_from_table("WHERE user_id =" . $user_id); 
$totalPanier = 0;
ob_start();
?>
<h1>Mon panier</h1>
<?php foreach($panier as $productPanier){
        $totalPanier+= $productPanier['price'] * $productPanier['quantity'];
        ?>
    <div class="p-3 mb-2 bg-light text-dark shadow-sm">
            <li><a href = "?p=product&slug=<?=$productPanier["slug"] ?>" ><?= $productPanier["name"] ?></a> : <?= $productPanier["price"] ?> $</li>
        <div class="btn-group btn-panier">
            <form method="POST" action ="actions/delete.php" ><input type="hidden" name="product_id" value="<?=$productPanier["id"]?>"><input type="submit" name="deletePanier" value="-" class="deleteButton btn btn-light "></form>
            <div class="quantity-panier"><?= $productPanier['quantity']?></div>
            <form method="POST" action ="actions/addPanier.php" ><input type="hidden" name="product_id" value="<?=$productPanier["id"]?>"><input type="submit" name="addPanier" value="+" class="addButton btn btn-light "></form>
        </div>
    </div>
<?php }  if(empty($items)){?>
<p>Le panier est vide.</p>
<?php } else { ?>
    <div class="text-center">Prix total : <?= $totalPanier ?> $</div>
    <a href="?p=commande">
    <input type="submit" name="commande" value="Commander" class="commandeButton btn btn-primary"></a>
<?php
}
$pageContent = ob_get_clean();
?>