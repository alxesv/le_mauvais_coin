<?php
require_once __DIR__ . '/../../php/init.php';

//depuis list
if(isset($_POST['add'])){
    $product_id = $_POST['product_id'];
    $paramsInsert = ['product_id' => $product_id, 'user_id' => 1, 'quantity'=> 1];
    $user_id = 1;
    $isHere = false; 
    $items= $PanierManager->get_all_from_table("WHERE user_id =" . $user_id); 
    if (count($items) < 1 ){
        $panier = $PanierManager->insert_into($paramsInsert);
        $isHere=true;
    }
    foreach($items as $i){
        if($i->product_id == $product_id){
            $isHere = true;
            $quantity = (int)$i->quantity;
            var_dump($quantity);
            $params = ['product_id' => $product_id, 'user_id' => 1, 'quantity'=> $quantity+ 1];
            $PanierManager->update_row($params, "product_id", $product_id);
        } 
        else{
            $isHere= false;
        }  
    }
    if ($isHere == false){
    $PanierManager->insert_into($paramsInsert);
        $isHere = true;}
    
    header('Location:../?p=list');
}
//depuis product
if(isset($_POST['addProduct'])){
    $product_id = $_POST['product_id'];
    $product_slug = $_POST['product_slug'];
    $paramsInsert = ['product_id' => $product_id, 'user_id' => 1, 'quantity'=> 1];
    $user_id = 1;
    $isHere = false; 
    $items= $PanierManager->get_all_from_table("WHERE user_id =" . $user_id); 
    if (count($items) < 1 ){
        $panier = $PanierManager->insert_into($paramsInsert);
        $isHere=true;
    }
    foreach($items as $i){
        if($i->product_id == $product_id){
            $isHere = true;
            $quantity = (int)$i->quantity;
            var_dump($quantity);
            $params = ['product_id' => $product_id, 'user_id' => 1, 'quantity'=> $quantity+ 1];
            $PanierManager->update_row($params, "product_id", $product_id);
        } 
        else{
            $isHere= false;
        }  
    }
    if ($isHere == false){
    $PanierManager->insert_into($paramsInsert);
        $isHere = true;}
    header('Location:../?p=product&slug='. $product_slug);
}
?>