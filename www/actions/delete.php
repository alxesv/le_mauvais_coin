<?php
require_once __DIR__ . '/../../php/init.php';

if(isset($_POST['delete'])){
    $product_id = $_POST['product_id'];
    $ProductManager->delete_row('id', $_POST['product_id']);
    header('Location:../?p=list');
}