<?php 
require_once __DIR__ . '/../../php/init.php';

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
if(isset($_POST["validCommand"])&& isset($_POST["adresse"]) && ! empty($_POST["adresse"]) ){
    $addresse = $_POST['adresse'];
    $panier = $PanierManager->get_all_from_table("WHERE user_id =" .$user_id);

    foreach($panier as $p){
        $product = $ProductManager->get_all_from_table("WHERE id =" . $p->product_id . " ORDER BY stock ASC");
        if ($p->quantity > $product[0]->stock ){
            save_error("Cette article n'est plus en stock"); 
        }
    }
    $CommandeManager->insert_into(['user_id' => $user_id,'adresseLivraison' => $addresse]);
    foreach($panier as $p){
        $product = $ProductManager->get_all_from_table("WHERE id =" . $p->product_id . " ORDER BY stock ASC");
            
                $tab = ["stock " => $product[0]->stock - $p->quantity ];
                $ProductManager->update_row($tab, 'id', $p->product_id);
                $commande = $CommandeManager->get_all_from_table("WHERE user_id=".$user_id);
                foreach($commande as $c){ 
                    $productCommande = $ProductCommandeManager->insert_into(['product_id' => $p->product_id, 'commande_id' => $c->id, 'quantity' => $p-> quantity]); 
                }
        }   
}
else {
    save_error("Entrez une adresse valide");
}
$PanierManager->delete_row("user_id" ,$user_id);
header('Location:../?p=mes_commandes');
?>