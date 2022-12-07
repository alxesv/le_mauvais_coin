<?php
$pageTitle = "Admin add product";
$category = $CategoryManager->get_all_from_table();
ob_start();
?>
<h1>Admin add product page</h1>
<!-- If Admin -->
<form action="actions/add.php" method ="POST">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description</label>
    <input type="text" name="description" id="description" required>

    <label for="price">Price</label>
    <input type="number" step="0.01" min="0" name="price" id="price" required>

    <label for="stock">Stock</label>
    <input type="number" min="0" name="stock" id="stock" required>

    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug" required>

    <label for="category">Catégorie :</label>
    <select name="category" id="category" required>
    <?php foreach ($category as $cat){?>
        <option value="<?=$cat->id?>"><?=$cat->name?></option>
    <?php }
    ?>
    </select>
    <input type="submit" value ="Ajouter" name="edit" class="submitButton">
</form>
<?php
$pageContent = ob_get_clean();
?>