<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/db.php';

//Config

$router_pages = ['home', 'contact', 'admin_contact', 'product', 'panier', 'commande', 'admin_edit_product', 'admin_commande', 'admin_add_product', 'list', 'register', 'login'];

// utilitaires

require_once __DIR__ . '/utils/errors.php';


// classes

require_once __DIR__ . '/class/DatabaseManager.class.php';
require_once __DIR__ . '/class/ContactForm.class.php';
require_once __DIR__ . '/class/User.class.php';
require_once __DIR__ . '/class/Category.class.php';
require_once __DIR__ . '/class/Panier.class.php';
require_once __DIR__ . '/class/Product.class.php';
require_once __DIR__ . '/class/Commande.class.php';
require_once __DIR__ . '/class/Comments.class.php';
require_once __DIR__ . '/class/ProductCommande.class.php';
require_once __DIR__ . '/class/Ratings.class.php';



$UserManager = new DatabaseManager($db, 'user', 'User');
$ContactManager = new DatabaseManager($db, 'contacts', 'ContactForm');
$ProductManager = new DatabaseManager($db, 'product', "Product");
$CommandeManager = new DatabaseManager($db, 'commande', "Commande");
$PanierManager =  new DatabaseManager($db, 'panier', 'Panier');
$CategoryManager = new DatabaseManager($db, 'category', 'Category');

$ProductCommandeManager = new DatabaseManager($db, 'product_commande', 'ProductCommande');
$CommentsManager = new DatabaseManager($db, 'comments', 'Comments');
$RatingsManager = new DatabaseManager($db, 'ratings', 'Ratings');


$is_admin = false;
if(isset($_SESSION['admin'])){
    $is_admin = $_SESSION['admin'];
}

?>