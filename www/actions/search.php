<?php
require_once __DIR__ . '/../../php/init.php';

if(isset($_POST['search'])) {
    $search = $_POST['search'];
}
header('Location:' . $_SERVER['HTTP_REFERER'] . '&search=' . $search);