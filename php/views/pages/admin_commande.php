<?php
$pageTitle = "Admin Commande - LMC";
$sql = null;
$order = " ORDER BY dateCommande DESC";

if(isset($_GET['tri'])){
    $order = " ORDER BY " . $_GET['tri'] . " DESC";
}

if (isset($_GET['statut'])) {
    $statut = "WHERE status = '" . $_GET['statut'] . "'";
}
if (!empty($statut)){
    $sql .= $statut;
}
$query = $sql . $order;
$commandes = $CommandeManager->get_all_from_table($query);
$users = $UserManager->get_all_from_table();
ob_start();
?>
<h1>Admin Commande page</h1>
<section>
    <ul>
        <form action="actions/search_commande.php" method="POST">
            <label for="tri">Trié par :</label>
            <select name="tri" id="tri">
            <option value="dateCommande">Date de commande</option>
            <option value="dateLastUpdate"<?php if(isset($_GET['tri'])){if("dateLastUpdate" == $_GET['tri']){echo 'selected';}}?>>Date de mise à jour</option>
            </select>
            <label for="statut">Filtrer par statut :</label>
            <select name="statut" id="statut">
                <option value=""<?php if(!isset($_GET['statut'])){echo 'selected';} ?>>Aucun</option>
                <option value="Nouvelle"<?php if(isset($_GET['statut'])){if("Nouvelle" == $_GET['statut']){echo 'selected';}}?>>Nouvelle</option>
                <option value="Expédiée"<?php if(isset($_GET['statut'])){if("Expédiée" == $_GET['statut']){echo 'selected';}}?>>Expédiée</option>
                <option value="Finie"<?php if(isset($_GET['statut'])){if("Finie" == $_GET['statut']){echo 'selected';}}?>>Finie</option>
                <option value="Retour Client"<?php if(isset($_GET['statut'])){if("Retour Client" == $_GET['statut']){echo 'selected';}}?>>Retour client</option>
            </select>
            <input type="submit" value="Go" class="btn btn-success">
        </form>
    <?php foreach($commandes as $commande){ ?>
        <li class="p-3 mb-2 bg-light text-dark shadow-sm">
            <div>Numéro commande : <?= $commande->id?></div>
            <div>Statut : <?= $commande->status?></div>
            <form action="actions/update_commande.php" method="POST">
                <label for="changeStatut">Changer le statut</label>
                <select name="changeStatut" id="changeStatut">
                    <option value="Nouvelle"<?php if($commande->status == "Nouvelle"){ echo 'disabled selected';}?>>Nouvelle</option>
                    <option value="Expédiée"<?php if($commande->status == "Expédiée"){ echo 'disabled selected';}?>>Expédiée</option>
                    <option value="Finie"<?php if($commande->status == "Finie"){ echo 'disabled selected';}?>>Finie</option>
                    <option value="Retour Client"<?php if($commande->status == "Retour Client"){ echo 'disabled selected';}?>>Retour Client</option>
                </select>
                <input type="hidden" value="<?= $commande->id ?>" name="commande_id">
                <input type="submit" value="Go" class="btn btn-success">
            </form>
            <div>Utilisateur : <?php foreach($users as $user) {if($commande->user_id == $user->id){ echo $user->name;} }?></div>
            <div>Date commande : <?= $commande->dateCommande?></div>
            <div>Derniere mise à jour : <?= $commande->dateLastUpdate?></div>
            <div>Adresse : <?= $commande->adresseLivraison?></div>
        </li>
    <?php } ?>
    <ul>
</section>
<?php
$pageContent = ob_get_clean();
?>