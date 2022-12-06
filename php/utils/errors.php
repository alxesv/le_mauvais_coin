<?php

function save_error($message){
    $_SESSION['error_message'] = $message;
    header('Location:' . $_SERVER['HTTP_REFERER']);
    die();
}

function get_error(){
    $message = false;
    if(isset($_SESSION['error_message'])) {
        $message =  $_SESSION['error_message'];
        unset($_SESSION['error_message']);
    }
    return $message;
}