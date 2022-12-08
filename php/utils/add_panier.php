<?php

function add_panier($idProduit,$user_id,$PanierManager){

        $product_id = $idProduit;
        $paramsInsert = ['product_id' => $product_id, 'user_id' => $user_id, 'quantity'=> 1];  
        $items= $PanierManager->get_all_from_table("WHERE user_id =" . $user_id . " AND product_id=" . $product_id); 
        if(empty($items)){
            
                $PanierManager->insert_into($paramsInsert);
        }
        else{
            $quantity = (int)$items[0]->quantity;
            $params = ['quantity'=> $quantity+ 1];
            $PanierManager->update_row($params, "product_id", $product_id);
        } 
    
}

?>