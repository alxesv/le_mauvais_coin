<?php
require_once __DIR__ . '/../../php/init.php';

$succes = false;

if(!isset($_POST['name'], $_POST['password'])){
    save_error("Tous les champs ne sont pas remplis");
}

$password = htmlspecialchars($_POST['password']);
$name = htmlspecialchars($_POST['name']);

$user = $UserManager->get_all_from_table("WHERE name = '$name'");

if(empty($user)){
    save_error("Utilisateur introuvable");
}
if(password_verify($password, $user[0]->password)){
    $succes = true;
}else{
    save_error("Mauvais mot de passe");
}

if($succes) {
    $_SESSION['user_id'] = $user[0]->id;
    $_SESSION['admin'] = $user[0]->admin;
    $_SESSION['user_name'] = $user[0]->name;
    header('Location:../?p=home');
}else {
    header('Location:' . $_SERVER['HTTP_REFERER']);
}