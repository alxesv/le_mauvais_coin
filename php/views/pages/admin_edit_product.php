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
    <input type="text" name="name" id="name" value="<?= $product[0]->name ?>" required>

    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="<?= $product[0]->description ?>" required>

    <label for="price">Price</label>
    <input type="number" step="0.01" min="0" name="price" id="price" value="<?= $product[0]->price ?>" required>

    <label for="stock">Stock</label>
    <input type="number" min="0" name="stock" id="stock" value="<?= $product[0]->stock ?>" required>

    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug" value="<?= $product[0]->slug ?>" required>

    <label for="category">Catégorie :</label>
    <select name="category" id="category" required>
    <?php foreach ($category as $cat){?>
        <option value="<?=$cat->id?>" <?php if($product[0]->category_id == $cat->id){ echo "selected"; } ?>><?=$cat->name?></option>
    <?php }
    ?>
    </select>
    <input type="hidden" name="product_id" value="<?= $product[0]->id ?>">
    <input type="submit" value ="Modifier" name="edit" class="submitButton btn btn-success mt-1">
</form>
<?php
$pageContent = ob_get_clean();
?>