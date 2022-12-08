<?php
require_once __DIR__ . '/../../php/init.php';
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
 
//depuis list
if(isset($_POST['add'])){
    add_panier( $_POST['product_id'],$user_id, $PanierManager);
        header('Location:' . $_SERVER['HTTP_REFERER']);
    
}
//depuis product
if(isset($_POST['addProduct'])){
    add_panier( $_POST['product_id'],$user_id, $PanierManager);
        header('Location:' . $_SERVER['HTTP_REFERER']);
    
}
//depuis panier
if(isset($_POST['addPanier'])){
    add_panier( $_POST['product_id'],$user_id, $PanierManager);
        header('Location:' . $_SERVER['HTTP_REFERER']);
}


?>