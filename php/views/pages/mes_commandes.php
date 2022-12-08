<?php
$pageTitle = "Mes commandes";

if(isset($_SESSION['user_id'])){
    $commandes = $CommandeManager->get_all_from_table("WHERE user_id =" . $_SESSION['user_id'] . " ORDER by dateCommande DESC");
}else {
    save_error('Veuillez vous connecter');
}
ob_start();
?>
<h1>Mes commandes</h1>
<?php foreach($commandes as $commande){ 
    $productCommande = $ProductCommandeManager->get_all_from_table("WHERE commande_id =" . $commande->id); 
    ?>
    <div>Numéro de commande <?= $commande->id ?></div>
    <div>Statut : <?= $commande->status ?></div>
    <div>Commandé le : <?= $commande->dateCommande ?></div>
    <div>Contenu : 
        <ul>
            <?php foreach($productCommande as $pc){
                $products = $ProductManager->get_all_from_table("WHERE id =" . $pc->product_id);
                foreach($products as $product){
                ?>
                <li>Produit : <?= $product->name?></li>
                <li>Description : <?= $product->description ?></li>
                <li>Prix : <?= $product->price?></li>
                <li>Quantité : <?= $pc->quantity?></li>
                <br>
            <?php } }?>
        </ul>
</div>
<?php } ?>
    
<?php
$pageContent = ob_get_clean();
?>