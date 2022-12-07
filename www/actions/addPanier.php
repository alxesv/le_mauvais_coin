<?php
require_once __DIR__ . '/../../php/init.php';

//depuis list
if(isset($_POST['add'])){
    $product_id = $_POST['product_id'];
    $params = ['product_id' => $product_id, 'user_id' => 1];
    $PanierManager->insert_into($params);
    header('Location:../?p=list');
}
//depuis product
if(isset($_POST['addProduct'])){
    $product_id = $_POST['product_id'];
    $product_slug = $_POST['product_slug'];
    $params = ['product_id' => $product_id, 'user_id' => 1];
    $PanierManager->insert_into($params);
  
    header('Location:../?p=product&slug='. $product_slug);
}
?>