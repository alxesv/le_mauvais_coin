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
    $prixTotal = 0;
    $productCommande = $ProductCommandeManager->get_all_from_table("WHERE commande_id =" . $commande->id); 
    ?>
    <div class="p-3 mb-2 bg-light text-dark shadow-sm">
    <div class="text-center">Numéro de commande <?= $commande->id ?></div>
    <div class="fw-bold">Statut : <?= $commande->status ?></div>
    <div>Commandé le : <?= $commande->dateCommande ?></div>
    <div>Contenu : 
        <ul class="list-group">
            <?php foreach($productCommande as $pc){
                $products = $ProductManager->get_all_from_table("WHERE id =" . $pc->product_id);
                foreach($products as $product){
                    $prixTotal += $pc->quantity*$product->price;
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">Produit : <?= $product->name?></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Description : <?= $product->description ?></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Prix : <?= $product->price?> $</li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Quantité : <?= $pc->quantity?></li>
                <br>
            <?php } }?>
        </ul>
    </div>
    <div class="text-center">Prix total : <?= $prixTotal ?> $</div>
    </div>
<?php } ?>
    
<?php
$pageContent = ob_get_clean();
?>