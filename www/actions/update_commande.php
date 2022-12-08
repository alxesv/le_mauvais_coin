<?php
require_once __DIR__ . '/../../php/init.php';

if(!isset($_POST['changeStatut'])) {
    save_error('Veuillez renseigner les champs');
}

$timestamp = new DateTime();
$formatted_timestamp = $timestamp->format('Y-m-d H:i:s');

$data = [
    'status' => $_POST['changeStatut'],
    'dateLastUpdate' => $formatted_timestamp
];

$CommandeManager->update_row($data, 'id', $_POST['commande_id']);

var_dump($data);
header('Location:' . $_SERVER['HTTP_REFERER']);