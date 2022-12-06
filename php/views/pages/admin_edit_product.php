<?php
$pageTitle = "Admin edit product";

if (isset($_GET['id'])){
    $productId = $_GET['id'];
}

$product = $ProductManager->get_all_from_table("WHERE id = " . $productId);
$category = $CategoryManager->get_all_from_table();
ob_start();
?>
<h1>Admin edit product page</h1>
<!-- If Admin -->
<form action="actions/edit.php" method ="POST">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="" required>

    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="" required>

    <label for="price">Price</label>
    <input type="number" step="0.01" min="0" name="price" id="price" value="" required>

    <label for="stock">Stock</label>
    <input type="number" min="0" name="stock" id="stock" value="" required>

    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug" value="" required>

    <label for="category">Catégorie :</label>
    <select name="category" id="category" required>
    <?php foreach ($category as $cat){?>
        <option value="<?=$cat->id?>" <?php if(false){ echo "selected"; } ?>><?=$cat->name?></option>
    <?php }
    ?>
    </select>
    <input type="hidden" name="product_id" value="">
    <input type="submit" value ="Modifier" name="edit"  class="submitButton">
</form>
<?php
$pageContent = ob_get_clean();
?>