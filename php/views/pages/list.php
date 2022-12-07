<?php
$pageTitle = "Liste";
$sql = null;
if (isset($_GET['search'])) {
    $searchContent = $_GET['search'];
    $research = " WHERE name LIKE '%$searchContent%'";
    $sql = $research;
}
$product = $ProductManager->get_all_from_table($sql);
$category = $CategoryManager->get_all_from_table();
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
            foreach ($product as $p){ ?>
                <tr>
                    <td><a href="?p=product&slug=<?= $p->slug ?>"><?=$p->name?></a></td>
                    <td><?=$p->description?></td>
                    <td><?php foreach($category as $c){if($c->id == $p->category_id){ echo $c->name;}} ?></td>
                    <td><?=$p->price?></td>
                    <!-- If admin -->
                    <td><a href="?p=admin_edit_product&id=<?=$p->id?>">Modifier</a></td>
                    <td><form method="POST" action ="actions/delete.php"><input type="hidden" name="product_id" value="<?=$p->id?>"><input type="submit" name="delete" value="Supprimer" class="deleteButton"></form></td>
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