<?php 
require_once __DIR__ . '/../../php/init.php';
$in_stock = true;
$dejaFait = 0;
if(isset($_POST["validCommand"])&& isset($_POST["adresse"]) && ! empty($_POST["adresse"]) ){
    $addresse = $_POST['adresse'];
    $panier = $PanierManager->get_all_from_table("WHERE user_id = 1");

    foreach($panier as $p){
        $product = $ProductManager->get_all_from_table("WHERE id =" . $p->product_id . " ORDER BY stock ASC");
        if ($p->quantity > $product[0]->stock ){
            
            $in_stock = false;
        }
        elseif($in_stock) {
            if($dejaFait == 0){
                $CommandeManager->insert_into(['user_id' => 1,'adresseLivraison' => $addresse]);
                $tab = ["stock " => $product[0]->stock - $p->quantity ];
                $product = $ProductManager->update_row($tab, 'id', $p->product_id);
                $commande = $CommandeManager->get_all_from_table("WHERE user_id=1");
                $dejaFait = 1;
            }else {
                foreach($commande as $c){ 
                    $ProductCommandeManager->insert_into(['product_id' => $p->product_id, 'commande_id' => $c->id]);
                }
            }
        }else {
            save_error("Cette article n'est plus en stock"); 
            
        }
}
header('Location:../?p=commande');
   

        
}
else {
    save_error("Entrez une adresse valide");
}

?>