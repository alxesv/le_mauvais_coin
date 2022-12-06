<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/db.php';

//Config

$router_pages = ['home', 'contact', 'admin_contact', 'product', 'panier', 'commande', 'category', 'admin_edit_product', 'admin_commande', 'admin_add_product', 'list', 'register'];

// utilitaires

require_once __DIR__ . '/utils/errors.php';


// classes

require_once __DIR__ . '/class/DatabaseManager.class.php';
require_once __DIR__ . '/class/ContactForm.class.php';
require_once __DIR__ . '/class/User.class.php';

//$contactFormManager = new ContactFormManager($db);
$UserManager = new DatabaseManager($db, 'user', 'User');
$ContactManager = new DatabaseManager($db, 'contacts', 'ContactForm');
?>