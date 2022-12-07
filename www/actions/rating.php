<?php
require_once __DIR__ . '/../../php/init.php';

if(!isset($_POST['rating'])){
    save_error("Veuillez choisir une valeur");
}

$data = [
    'product_id' => $_POST['product_id'],
    'user_id' => $_POST['user_id'],
    'rating' => $_POST['rating']
];

$RatingsManager->insert_into($data);

header('Location:'. $_SERVER['HTTP_REFERER']);