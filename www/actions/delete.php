<?php
require_once __DIR__ . '/../../php/init.php';

if(isset($_POST['delete'])){
    $product_id = $_POST['product_id'];
    $ProductManager->delete_row('id', $product_id);
    header('Location:../?p=list');
}

if(isset($_POST['deletePanier'])){
    $product_id = $_POST['product_id'];
    $PanierManager->delete_row('product_id', $product_id);
    header('Location:../?p=panier');
}

if(isset($_POST['delete_comment'])){
    $comment_id = $_POST['comment_id'];
    $CommentsManager->delete_row('id', $comment_id);
    header('Location:' . $_SERVER['HTTP_REFERER']);
}