<?php
$pageTitle = "Produit";
if(isset($_GET['slug']) && ! empty($_GET['slug'])){
    $slug_produit = $_GET['slug'];
}
// $query = "SELECT * FROM product WHERE slug = :slug";
// $params = ['slug' => $slug_produit];
$all_info_product = $ProductManager->get_all_from_table("WHERE slug = \"" . $slug_produit . '"');
$categories = $CategoryManager->get_all_from_table();

ob_start();
?>
<h1>Produit</h1>

    <li><?php 
         echo $all_info_product[0]->name; ?></li>
    <li><?= $all_info_product[0]->description; ?></li>
    <li><?= $all_info_product[0]->price; ?></li>
    <li><?php foreach($categories as $category){
        if ($category->id == $all_info_product[0]->category_id){
            echo $category->name;
            }}?>
    </li>
<?php

$pageContent = ob_get_clean();
?>