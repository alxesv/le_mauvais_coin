<?php
$pageTitle = "Produit";
if(isset($_GET['slug']) && ! empty($_GET['slug'])){
    $slug_produit = $_GET['slug'];
}
$all_info_product = $ProductManager->get_all_from_table("WHERE slug = \"" . $slug_produit . '"');
$categories = $CategoryManager->get_all_from_table();

ob_start();
?>
<h1>Produit</h1>
    <ul>
    <li><?php 
         echo $all_info_product[0]->name; ?></li>
    <li><?= $all_info_product[0]->description; ?></li>
    <li><?= $all_info_product[0]->price; ?></li>
    <li><?php foreach($categories as $category){
        if ($category->id == $all_info_product[0]->category_id){
            echo $category->name;
            }}?>
    </li>
    <!-- If admin -->
    <li><a href="?p=admin_edit_product&id=<?=$all_info_product[0]->id?>">Modifier</a></li>
    <li><form method="POST" action ="actions/delete.php"><input type="hidden" name="product_id" value="<?=$all_info_product[0]->id?>"><input type="submit" name="delete" value="Supprimer" class="deleteButton"></form></li>
    </ul>
<?php

$pageContent = ob_get_clean();
?>