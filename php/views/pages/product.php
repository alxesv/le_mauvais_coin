<?php
$pageTitle = "Produit";
if(isset($_GET['slug']) && ! empty($_GET['slug'])){
    $slug_produit = $_GET['slug'];
}
$all_info_product = $ProductManager->get_all_from_table("WHERE slug = \"" . $slug_produit . '"');
$categories = $CategoryManager->get_all_from_table();
$comments = $CommentsManager->get_all_from_table("WHERE product_id =" . $all_info_product[0]->id . " ORDER BY date DESC");
$users = $UserManager->get_all_from_table();
$ratings = $RatingsManager->custom_select("SELECT AVG(rating) from ratings WHERE product_id =?", [$all_info_product[0]->id]);
$can_comment = false;
$can_rate = true;

if(isset($_SESSION['user_id'])){
    $commandes = $CommandeManager->get_all_from_table("WHERE user_id =" . $_SESSION['user_id']);
    $user_ratings = $RatingsManager->get_all_from_table("WHERE user_id =" . $_SESSION['user_id'] . " AND product_id =". $all_info_product[0]->id);
    foreach ($commandes as $commande){
        $commandeProduct = $ProductCommandeManager->get_all_from_table("WHERE product_id =" . $all_info_product[0]->id . " AND commande_id =" . $commande->id);
        if(!empty($commandeProduct)){
            $can_comment = true;
        }
    }
    foreach($user_ratings as $r){
        if(!empty($user_ratings)){
            $can_rate = false;
        }
    }
}

$rating = round((float)$ratings[0][0], 2);
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
    <?php if($rating != 0){?>
    <span>Note : <?= $rating ?></span>
    <?php } ?>
    <?php if($can_rate && ($can_comment|| $is_admin)){ ?>
        <form action="actions/rating.php" method="POST">
        <input type="radio" id="rating1" name="rating" required value="1">
        <label for="rating1">1</label>
        <input type="radio" id="rating2" name="rating" required value="2">
        <label for="rating2">2</label>
        <input type="radio" id="rating3" name="rating" required value="3">
        <label for="rating3">3</label>
        <input type="radio" id="rating4" name="rating" required value="4">
        <label for="rating4">4</label>
        <input type="radio" id="rating5" name="rating" required value="5">
        <label for="rating5">5</label>
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
        <input type="hidden" name="product_id" value="<?= $all_info_product[0]->id ?>">
        <input type="submit" value="Noter">
        </form>
    <?php } ?>
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