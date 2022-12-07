<?php
require_once __DIR__ . '/../../php/init.php';

$url = "";

if (isset($_POST['category']) && !empty($_POST['category'])) {
    $cat = $_POST['category'];
    $url .= '&cat_slug=' . $cat;
}
if(isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $url .= '&search=' . $search;
}

header('Location:../?p=list' . $url);