<?php

require_once __DIR__ . '/../../php/init.php';

if(!isset($_POST['name'], $_POST['email'], $_POST['message'])){
    save_error("Tous les champs ne sont pas remplis");
}

if (empty($_POST['name'])){
    save_error("Entrez votre nom");
}

if (empty($_POST['email'])){
    save_error("Entrez votre adresse email");
}

if (empty($_POST['message'])){
    save_error("Entrez votre message");
}

if(strlen($_POST['message']) < 10){
    save_error("Votre message est trop court");
}

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
    save_error("Votre email est invalide");
}

$name = htmlspecialchars($_POST['name']);
$message = htmlspecialchars($_POST['message']);

$data = [
    'name' => $name,
    'message' => $message,
    'email' => $_POST['email']
];

$ContactManager->insert_into($data);

//$contactFormManager->save_contact_form($name, $_POST['email'], $message);

header('Location:' . $_SERVER['HTTP_REFERER'] . '&success=1');