<?php
$pageTitle = "Liste";
$sql = "SELECT product.name as 'Name', product.description as 'Description', product.price as 'Price', category.name as 'Category', product.id as 'id', product.slug as 'slug' FROM product
INNER JOIN category ON product.category_id = category.id";
if (isset($_GET['search'])) {
    $searchContent = $_GET['search'];
    $research = " WHERE product.name LIKE '%$searchContent%'";
    $sql .= $research;
}
$products = $ProductManager->custom_select($sql);
ob_start();
?>
<h1>Liste</h1>
<section>
    <table>
        <thead>
            <span><form action="actions/search.php" method="POST"><input type="text" placeholder="Chercher par nom..." name="search"><input type="submit" value="Go"></form></span>
            <span><a href="?p=list">Clear</a></span>
        </thead>
        <tbody>
        <?php
            foreach ($products as $pkey => $pvalue){ ?>
                <tr>
                    <td><a href="?p=product&?slug=<?= $pvalue['slug'] ?>"><?=$pvalue['Name']?></a></td>
                    <td><?=$pvalue['Description']?></td>
                    <td><?=$pvalue['Category']?></td>
                    <td><?=$pvalue['Price']?></td>
                    <!-- If admin -->
                    <td><a href="?p=admin_edit_product&?id=<?=$pvalue['id']?>">Modifier</a></td>
                    <td><form method="POST" action ="actions/delete.php"><input type="hidden" name="product_id" value="<?=$pvalue['id']?>"><input type="submit" name="delete" value="Supprimer" class="deleteButton"></form></td>
                <tr>
                <?php
                    }
                ?>
        </tbody>
    </table>
</section>
<?php
$pageContent = ob_get_clean();
?>