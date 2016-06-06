<!DOCTYPE html>

<?php include('bdd.php'); 
   
    if(isset($_SESSION['id']))
{
    $req = $bdd->prepare("SELECT * FROM groupe WHERE id=:id");
    $req ->execute(array('id' => $_GET['id']));
    $donnees= $req -> fetch();
    $sport_pre_rempli = $donnees['sport'];
    $departement_pre_rempli = $donnees['departement'];
    $membres_maximum= $donnees['membres_max'];
    
    if(isset($_POST['nom_groupe']) AND ! empty ($_POST['nom_groupe']) AND $_POST['nom_groupe']!= $donnees['nom_groupe'] )
    {
        $nom_groupe = $_POST['nom_groupe'];
        $insertnom_g =$bdd->prepare("UPDATE groupe SET nom_groupe=:nom_groupe WHERE id=:id");
        $insertnom_g->execute(array('nom_groupe'=>$nom_groupe,'id' => $_GET['id']));
        header('Location:groupe.php?id='.$_GET['id']);
    }
    if(isset($_POST['description']) AND ! empty ($_POST['description']) AND $_POST['description']!= $donnees['description'] )
    {
        $description = $_POST['description'];
        $insertdescrip =$bdd->prepare("UPDATE groupe SET description=:description WHERE id=:id");
        $insertdescrip->execute(array('description'=>$description,'id' => $_GET['id']));
        header('Location:groupe.php?id='.$_GET['id']);
    }
    if(isset($_POST['sport']) AND ! empty ($_POST['sport']) AND $_POST['sport']!= $donnees['sport'] )
    {
        $sport = $_POST['sport'];
        $insertsport =$bdd->prepare("UPDATE groupe SET sport=:sport WHERE id=:id");
        $insertsport->execute(array('sport'=>$sport,'id' => $_GET['id']));
        header('Location:groupe.php?id='.$_GET['id']);
    }if(isset($_POST['departement']) AND ! empty ($_POST['departement']) AND $_POST['departement']!= $donnees['departement'] )
    {
        $departement = $_POST['departement'];
        $insertdepart =$bdd->prepare("UPDATE groupe SET departement=:departement WHERE id=:id");
        $insertdepart->execute(array('departement'=>$departement,'id' => $_GET['id']));
        header('Location:groupe.php?id='.$_GET['id']);
    }
    if(isset($_POST['membres_max']) AND ! empty ($_POST['membres_max']) AND $_POST['membres_max']!= $donnees['membres_max'] )
    {
        $membremax = $_POST['membres_max'];
        $insertmax =$bdd->prepare("UPDATE groupe SET membres_max=:membres_max WHERE id=:id");
        $insertmax->execute(array('membres_max'=>$membres_max,'id' => $_GET['id']));
        header('Location:groupe.php?id='.$_GET['id']);
    }
    if(isset($_POST['statut']) AND ! empty ($_POST['statut']) AND $_POST['statut']!= $donnees['statut'] )
    {
        $statut = $_POST['statut'];
        $insertstatut =$bdd->prepare("UPDATE groupe SET statut=:statut WHERE id=:id");
        $insertstatut->execute(array('statut'=>$statut,'id' => $_GET['id']));
        header('Location:groupe.php?id='.$_GET['id']);
    }
    if(isset($_POST['image']) AND ! empty ($_POST['image']) AND $_POST['image']!= $donnees['image'] )
    {
        $image = $_POST['image'];
        $insertimage =$bdd->prepare("UPDATE groupe SET image=:image WHERE id=:id");
        $insertimage->execute(array('image'=>$image,'id' => $_GET['id']));
        header('Location:groupe.php?id='.$_GET['id']);
    }
}
?>
<html>
    <head>
        <title>Edition du groupe</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Accueil.css">
    </head>
    <?php
    
    include('header.php');
	$reponse = $bdd->prepare('SELECT * FROM groupe WHERE id = :id');
    $reponse->execute(array('id' => $_GET['id']));
    $donnees = $reponse->fetch();
    if (isset($_SESSION['id'])) {
        if ($_SESSION['id']==$donnees['id_leader']) { // On vérifie que l'utilisateur est bien le leader
    ?>
    <body>
        <?php
        $req = $bdd->prepare("SELECT * FROM groupe WHERE id=:id");
        $req->execute(array('id' => $_GET['id']));
        $donnees= $req -> fetch();
        ?>
        <form method="POST" action="">
            <label>Nom du groupe:</label>
            
            <input  name="nom"  class="l300" placeholder= "" value="<?php echo $donnees['nom_groupe']?>"><br/><br/>
            <label>Descritif:</label>
            <textarea name="description" rows="8" maxlength="1000" > <?php echo $donnees['description']; ?></textarea><br/><br/>
            <label>Sport:</label>
            <?php include('liste_sports.php') ?><br/><br/>
            <label>Departement:</label>
            <?php include('liste_departements.php') ?><br/><br/>
            <label>Statut : </label>
                <select name='statut'>
                    <option>Public</option>
                    <option
                    <?php if (isset($contenu['statut'])) {
                        if ($contenu['statut']=='Privé') {echo ' selected="selected"';}
                    } ?>
                    >Privé</option>
                </select><br/><br/>
            <label>Image du groupe : </label>
            <input name="image"<?php if (isset($contenu['image'])) {echo ' value="' . $contenu['image'] . '"';} ?>>
            </br><a href='http://www.hostingpics.net/' target="_blank">Lien vers un uploader de photos</a>
            <label>Nombre maximum de membres :</label>
            
                <input type="number" min="5" max="200" name="membres_max" maxlength="3" placeholder="" value="<?php echo $membres_maximum; ?>"><br/><br/>
            <input id="search-btn" type="submit" value="Valider la modification" name="submit">
        </form>
    </body>
<?php
        ;}
        else {echo '<strong class="erreur">Vous n\'avez pas les permissions requises pour accéder à cette page.</strong>';}
    }
    else {echo '<strong class="erreur">Vous n\'avez pas les permissions requises pour accéder à cette page.</strong>';}
?>