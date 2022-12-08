<?php
require_once __DIR__ . '/../../php/init.php';

$url = "";

if(isset($_POST['tri']) && !empty($_POST['tri'])) {
    $tri = $_POST['tri'];
    $url .= '&tri=' . $tri;
}

if(isset($_POST['statut']) && !empty($_POST['statut'])) {
    $statut = $_POST['statut'];
    $url .= '&statut=' . $statut;
}

header('Location:../?p=admin_commande' . $url);