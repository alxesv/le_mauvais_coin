<?php
$pageTitle = "Mon panier";
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
$query= "SELECT product.id, panier.quantity, product.name, product.price, product.slug FROM panier INNER JOIN product ON panier.product_id = product.id WHERE panier.user_id =" .$user_id;
$panier = $PanierManager->custom_select($query);
$items= $PanierManager->get_all_from_table("WHERE user_id =" . $user_id); 

ob_start();
?>
<h1>Mon panier</h1>
<?php foreach($panier as $productPanier){ ?>
    <li><a href = "?p=product&slug=<?=$productPanier["slug"] ?>" ><?= $productPanier["name"] ?></a> : <?= $productPanier["price"] ?> --> <?= $productPanier['quantity']?></li>
    <form method="POST" action ="actions/delete.php"><input type="hidden" name="product_id" value="<?=$productPanier["id"]?>"><input type="submit" name="deletePanier" value="-" class="deleteButton"></form>
    <form method="POST" action ="actions/addPanier.php"><input type="hidden" name="product_id" value="<?=$productPanier["id"]?>"><input type="submit" name="addPanier" value="+" class="addButton"></form></td>

  
<?php }  if(empty($items)){?>
<p>Le panier est vide.</p>
<?php } else { ?>
    <a href="?p=commande">
    <input type="submit" name="commande" value="Commander" class="commandeButton"></a>
<?php
}
$pageContent = ob_get_clean();
?>