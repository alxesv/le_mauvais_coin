<?php
require_once __DIR__ . '/../../php/init.php';
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
// $isHere = false; 
//depuis list
if(isset($_POST['add'])){
    $product_id = $_POST['product_id'];
    $paramsInsert = ['product_id' => $product_id, 'user_id' => $user_id, 'quantity'=> 1];
   
    $items= $PanierManager->get_all_from_table("WHERE user_id =" . $user_id . " AND product_id=" . $product_id); 
    if(empty($items)){
        $PanierManager->insert_into($paramsInsert);
    }
    else{
        $quantity = (int)$items[0]->quantity;
        $params = [ 'quantity'=> $quantity+ 1];
        $PanierManager->update_row($params, "product_id", $product_id);
       
    }
    
    header('Location:../?p=list');
}
//depuis product
if(isset($_POST['addProduct'])){
    $product_id = $_POST['product_id'];
    $product_slug = $_POST['product_slug'];
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
    header('Location:../?p=product&slug='. $product_slug);
}
?>