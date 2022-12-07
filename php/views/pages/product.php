<?php
$pageTitle = "Produit";
if(isset($_GET['slug']) && ! empty($_GET['slug'])){
    $slug_produit = $_GET['slug'];
}
$all_info_product = $ProductManager->get_all_from_table("WHERE slug = \"" . $slug_produit . '"');
$categories = $CategoryManager->get_all_from_table();
$comments = $CommentsManager->get_all_from_table("WHERE product_id =" . $all_info_product[0]->id . " ORDER BY date DESC");
$users = $UserManager->get_all_from_table();

$can_comment = false;

if(isset($_SESSION['user_id'])){
    $commandes = $CommandeManager->get_all_from_table("WHERE user_id =" . $_SESSION['user_id']);
    foreach ($commandes as $commande){
        $commandeProduct = $ProductCommandeManager->get_all_from_table("WHERE product_id =" . $all_info_product[0]->id . " AND commande_id =" . $commande->id);
        if(!empty($commandeProduct)){
            $can_comment = true;
        }
    }
}

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
    <?php if(isset($_SESSION['user_id'])){?>
    <li><form method="POST" action ="actions/addPanier.php"><input type="hidden" name="product_id" value="<?=$all_info_product[0]->id?>"><input type="hidden" name="product_slug" value="<?=$all_info_product[0]->slug?>"><input type="submit" name="addProduct" value="Ajouter" class="addButton"></form></li>
    <?php } ?>
    <?php if($is_admin){ ?>
    <li><a href="?p=admin_edit_product&id=<?=$all_info_product[0]->id?>">Modifier</a></li>
    <li><form method="POST" action ="actions/delete.php"><input type="hidden" name="product_id" value="<?=$all_info_product[0]->id?>"><input type="submit" name="delete" value="Supprimer" class="deleteButton"></form></li>
    <?php } ?>
    <?php ?>
    <h2>Commentaires</h2>
    <?php if($can_comment || $is_admin){ ?> 
        <form action="actions/add_comment.php" method="POST">
            <label for="comment">Ajouter un commentaire:</label><br>
            <textarea name="comment" id="comment" cols="20" rows="5"></textarea><br>
            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
            <input type="hidden" name="product_id" value="<?= $all_info_product[0]->id ?>">
            <input type="submit" valeur="Commenter">
        </form>
    <?php } ?>
    <?php if(empty($comments)){?>
        <p>Pas de commentaires pour l'instant.</p>
    <?php }else{foreach($comments as $comment){ ?>
        <div>
            <span><?php foreach($users as $user) { if($comment->user_id == $user->id){ echo $user->name; }}?></span>
            <small><?= $comment->date ?></small>
            <p><?= $comment->comment ?></p>
            <?php if($is_admin) { ?> 
                <form action="actions/delete.php" method="POST"><input type="submit" value="Supprimer" name="delete_comment"><input type="hidden" name="comment_id" value="<?= $comment->id ?>"></form>
            <?php } ?>
        </div>
    <?php } } ?>
</ul>
<?php
$pageContent = ob_get_clean();
?>