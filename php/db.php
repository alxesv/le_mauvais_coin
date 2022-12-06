<?php
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=mauvais_coin;charset=utf8','root','root');
    }
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}