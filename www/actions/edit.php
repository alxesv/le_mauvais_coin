<?php
require_once __DIR__ . '/../../php/init.php';

if(!isset($_POST['name'], $_POST['description'], $_POST['price'], $_POST['stock'], $_POST['slug'], $_POST['category'])){
    save_error("Tous les champs ne sont pas remplis");
}

$name = htmlspecialchars($_POST['name']);
$slug = htmlspecialchars($_POST['slug']);
$description = htmlspecialchars($_POST['description']);

$data = [
    'name' => $name,
    'slug' => $slug,
    'description' => $description,
    'price' => $_POST['price'],
    'stock' => $_POST['stock'],
    'category_id' => $_POST['category']
];

$ProductManager->update_row($data, 'id', $_POST['product_id']);

header('Location:../?p=product&slug=' . $slug);