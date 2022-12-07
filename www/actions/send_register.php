<?php

require_once __DIR__ . '/../../php/init.php';

$users = $UserManager->get_all_from_table();

$email = htmlspecialchars($_POST['email']);
$name = htmlspecialchars($_POST['name']);
$password = htmlspecialchars($_POST['password']);
$conf_password = htmlspecialchars($_POST['conf_password']);
$phone = htmlspecialchars($_POST['phone']);
$name_taken = false;
$succes = false;

foreach($users as $user){
    if($user->name == $name){
        $name_taken = true;
    }
}
if($name_taken) {
    save_error("Nom déjà pris");
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // check si email valide
    save_error("Email invalide");
}else if ($password !== $conf_password){ // check si les mdp correspondent
    save_error("Les mots de passe ne correspondent pas");
}else if(strlen($name) < 4) { // check si le pseudo fait au moins 4 caractères
    save_error("Votre nom doit faire au minimum 4 caractères.");
}elseif(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}$/",$password)){
    save_error("Votre mot de passe doit faire au minimum 5 caractères, contenir une majuscule une minuscule et un chiffre.");
}else{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $data = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'password' => $hash,
        'admin' => 0
    ];
    $UserManager->insert_into($data);
    $succes = true;
}

if($succes){
    header('Location:../?p=home');
}else {
    header('Location:' . $_SERVER['HTTP_REFERER']);
}