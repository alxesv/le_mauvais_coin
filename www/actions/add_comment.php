<?php
require_once __DIR__ . '/../../php/init.php';

if(!isset($_POST['comment']) || empty($_POST['comment'])){
    save_error("Veuillez écrire un commentaire !");
}

$comment = htmlspecialchars($_POST['comment']);

$data = [
    'comment' => $comment,
    'user_id' => $_POST['user_id'],
    'product_id' => $_POST['product_id']
];

$CommentsManager->insert_into($data);

header('Location:' . $_SERVER['HTTP_REFERER']);