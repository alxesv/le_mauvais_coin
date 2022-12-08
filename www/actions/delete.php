<?php
require_once __DIR__ . '/../../php/init.php';
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}

if(isset($_POST['delete'])){
    $product_id = $_POST['product_id'];
    $ProductManager->delete_row('id', $product_id);
    header('Location:../?p=list');
}

if(isset($_POST['deletePanier'])){
    $product_id = $_POST['product_id'];

    $panier= $PanierManager->get_all_from_table("WHERE user_id =" . $user_id . " AND product_id=" . $product_id); 
    $quantity = (int)$panier[0]->quantity;
    $params = ['quantity'=> $quantity- 1];
    if($quantity <= 1){
        $PanierManager->delete_row('product_id', $product_id);
        
    }
    else {
        $PanierManager->update_row($params, "product_id", $product_id);
    }
    
    header('Location:../?p=panier');
}

if(isset($_POST['delete_comment'])){
    $comment_id = $_POST['comment_id'];
    $CommentsManager->delete_row('id', $comment_id);
    header('Location:' . $_SERVER['HTTP_REFERER']);
}