<?php
$pageTitle = "Liste";
$sql = null;
$research = "";
$category = $CategoryManager->get_all_from_table();

if (isset($_GET['cat_slug'])){
    foreach($category as $cat){
        if($cat->slug == $_GET['cat_slug']){
            $research = " WHERE category_id = '$cat->id'";
        }
    }
}

if (isset($_GET['search'])) {
    $searchContent = $_GET['search'];
    if(!empty($research)){
        $research .= " AND name LIKE '%$searchContent%'";
    }else{
        $research = " WHERE name LIKE '%$searchContent%'";
    }
}

if (!empty($research)){
    $sql .= $research;
}

$product = $ProductManager->get_all_from_table($sql . " ORDER BY name ASC");
ob_start();
?>
<h1>Liste</h1>
<section>
    <table><thead>
            <span>
                <form action="actions/search.php" method="POST">
                    <label for="category">Filtrer par catégorie :</label>
                    <select name="category" id="category">
                        <option value="" <?php if(!isset($_GET['cat_slug'])){echo 'selected';}?>>Pas de filtre</option>
                    <?php foreach ($category as $cat){?>
                        <option value="<?=$cat->slug?>" <?php if(isset($_GET['cat_slug'])){if($cat->slug == $_GET['cat_slug']){echo 'selected';}}?>><?=$cat->name?></option>
                    <?php }
                    ?>
                    </select>
                    <input type="text" placeholder="Chercher par nom..." name="search">
                    <input type="submit" value="Go">
                </form>
            </span>
            <span><a href="?p=list">Clear</a></span>
            <?php if($is_admin){ ?>
            <span><a href="?p=admin_add_product">Add product</a></span>
            <?php } ?>
            <th>Nom</th>
            <th>Description</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <?php if($is_admin){ ?>
            <th>Stock</th>
            <?php } ?>
        </thead>
        <tbody>
        <?php
            foreach ($product as $p){
                if($is_admin || ($p->stock > 1)) {  
                ?>
                <tr>
                    <td><a href="?p=product&slug=<?= $p->slug ?>"><?=$p->name?></a></td>
                    <td><?=$p->description?></td>
                    <td><?php foreach($category as $c){if($c->id == $p->category_id){ echo $c->name;}} ?></td>
                    <td><?=$p->price?>$</td>
                    <?php if($is_admin){ ?>
                    <td><?= $p->stock?></td>
                    <td><a href="?p=admin_edit_product&id=<?=$p->id?>">Modifier</a></td>
                    <td><form method="POST" action ="actions/delete.php"><input type="hidden" name="product_id" value="<?=$p->id?>"><input type="submit" name="delete" value="Supprimer" class="deleteButton"></form></td>
                    <?php } ?>
                    <?php if(isset($_SESSION['user_id'])){?>
                    <td><form method="POST" action ="actions/addPanier.php"><input type="hidden" name="product_id" value="<?=$p->id?>"><input type="submit" name="add" value="Ajouter" class="addButton"></form></td>
                    <?php } ?>
                </tr>

                <?php
                    }}
                ?>
        </tbody>
    </table>
</section>
<?php
$pageContent = ob_get_clean();
?>