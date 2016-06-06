<!DOCTYPE html>

<?php include('bdd.php'); 
    session_start();
    if(isset($_SESSION['id']))
{
    $req = $bdd->prepare("SELECT * FROM liste_compets WHERE id=:id");
    $req ->execute(array('id' => $_GET['id']));
    $donnees= $req -> fetch();
    $sport_pre_rempli = $donnees['sport'];
    $departement_pre_rempli = $donnees['departement'];
    $places_max= $donnees['places_total'];
    $nbr_inscrit= $donnees['inscrtis'];
    
    if(isset($_POST['nom']) AND ! empty ($_POST['nom']) AND $_POST['nom']!= $donnees['nom'] )
    {
        $nom = $_POST['nom'];
        $insertnom =$bdd->prepare("UPDATE liste_compets SET nom=:nom WHERE id=:id");
        $insertnom->execute(array('nom'=>$nom_groupe,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }
    if(isset($_POST['date']) AND ! empty ($_POST['date']) AND $_POST['date']!= $donnees['date'] )
    {
        $date = $_POST['date'];
        $insertdate =$bdd->prepare("UPDATE liste_compets SET date=:date WHERE id=:id");
        $insertdate->execute(array('date'=>$date,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }
    if(isset($_POST['sport']) AND ! empty ($_POST['sport']) AND $_POST['sport']!= $donnees['sport'] )
    {
        $sport = $_POST['sport'];
        $insertsport =$bdd->prepare("UPDATE liste_compet SET sport=:sport WHERE id=:id");
        $insertsport->execute(array('sport'=>$sport,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }if(isset($_POST['departement']) AND ! empty ($_POST['departement']) AND $_POST['departement']!= $donnees['departement'] )
    {
        $departement = $_POST['departement'];
        $insertdepart =$bdd->prepare("UPDATE liste_compets SET departement=:departement WHERE id=:id");
        $insertdepart->execute(array('departement'=>$departement,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }
    if(isset($_POST['lieu']) AND ! empty ($_POST['lieu']) AND $_POST['lieu']!= $donnees['lieu'] )
    {
        $lieu = $_POST['lieu'];
        $insertlieu =$bdd->prepare("UPDATE liste_compets SET lieu=:lieu WHERE id=:id");
        $insertlieu->execute(array('lieu'=>$lieu,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }
    if(isset($_POST['groupe']) AND ! empty ($_POST['groupe']) AND $_POST['groupe']!= $donnees['groupe'] )
    {
        $groupe = $_POST['groupe'];
        $insertgroupe =$bdd->prepare("UPDATE liste_compets SET groupe=:groupe WHERE id=:id");
        $insertgroupe->execute(array('groupe'=>$groupe,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }
    if(isset($_POST['places_total']) AND ! empty ($_POST['places_total']) AND $_POST['places_total']!= $donnees['places_total'] )
    {
        $places_total = $_POST['places_total'];
        $insertplaces_total =$bdd->prepare("UPDATE liste_compets SET places_total=:places_total WHERE id=:id");
        $insertplaces_total->execute(array('places_total'=>$places_total,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }
    if(isset($_POST['inscrits']) AND ! empty ($_POST['inscrits']) AND $_POST['inscrits']!= $donnees['inscrits'] )
    {
        $inscrits = $_POST['inscrits'];
        $insertinscrits =$bdd->prepare("UPDATE liste_compets SET inscrits=:inscrits WHERE id=:id");
        $insertinscrits->execute(array('inscrits'=>$inscrits,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
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
    $reponse = $bdd->prepare('SELECT * FROM liste_compets WHERE id = :id');
    $reponse->execute(array('id' => $_GET['id']));
    $donnees = $reponse->fetch();
    if (isset($_SESSION['id'])) {
        if ($_SESSION['id']==$donnees['id_leader']) { // On vérifie que l'utilisateur est bien le leader
    ?>
    <body>
        <?php
        $req = $bdd->prepare("SELECT * FROM liste_compets WHERE id=:id");
        $req->execute(array('id' => $_GET['id']));
        $donnees= $req -> fetch();
        ?>
        <form method="POST" action="">
            <label>Nom de l'evenement:</label>
            
            <input  name="nom"  class="l300" placeholder= "" value="<?php echo $donnees['nom']?>"><br/><br/>
            <label>Date de l'evenement</label>
            <input  name="date de l'évenement"   class="l300" placeholder= "" value=" <?php echo $donnees['date']; ?>"><br/><br/>
            <label>Sport:</label>
            <?php include('liste_sports.php') ?><br/><br/>
            <label>Departement:</label>
            <?php include('liste_departements.php') ?><br/><br/>
            <label>Lieu : </label>
            <input  name="Lieu"   class="l300" placeholder= "" value=" <?php echo $donnees['lieu']; ?>"><br/><br/>   
            <label>Groupe organisateur : </label>
            <input name="groupe organisateur"class="l300" placeholder= "" value=" <?php echo $donnees['groupe']; ?>"><br/><br/>
            
            <label>Nombre de place :</label>
                <input type="number"   name="membres_max" maxlength="3" placeholder="" value="<?php echo $places_max ; ?>"><br/><br
            <label>Nombre d'inscrit a l'evenement :</label>
                <input type="number"   name="membres_max" maxlength="3" placeholder="" value="<?php echo $nbr_inscrit ; ?>"><br/><br/>        
            <input id="search-btn" type="submit" value="Valider la modification" name="submit">
        </form>
    </body>
<?php
        ;}
        else {echo '<strong class="erreur">Vous n\'avez pas les permissions requises pour accéder à cette page.</strong>';}
    }
    else {echo '<strong class="erreur">Vous n\'avez pas les permissions requises pour accéder à cette page.</strong>';}
?>

