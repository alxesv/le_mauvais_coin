<?php
require_once __DIR__ . '/../../php/init.php';

session_unset();
session_destroy();

header('Location:../?p=home');
