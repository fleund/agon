<!DOCTYPE html>

<?php include('bdd.php'); 
    
    if(isset($_SESSION['id']))
{
    $req = $bdd->prepare("SELECT * FROM liste_compets WHERE id=:id");
    $req ->execute(array('id' => $_GET['id']));
    $donnees= $req -> fetch();
    $sport_pre_rempli = $donnees['sport'];
    $departement_pre_rempli = $donnees['departement'];
    $places_max= $donnees['places_total'];
    $nbr_inscrit= $donnees['inscrits'];
    
    if(isset($_POST['nom']) AND ! empty ($_POST['nom']) AND $_POST['nom']!= $donnees['nom'] )
    {
        $nom = $_POST['nom'];
        $insertnom =$bdd->prepare("UPDATE liste_compets SET nom=:nom WHERE id=:id");
        $insertnom->execute(array('nom'=>$nom,'id' => $_GET['id']));
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
        $insertsport =$bdd->prepare("UPDATE liste_compets SET sport=:sport WHERE id=:id");
        $insertsport->execute(array('sport'=>$sport,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }
	
	if(isset($_POST['departement']) AND ! empty ($_POST['departement']) AND $_POST['departement']!= $donnees['departement'] )
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
    
    if(isset($_POST['places_total']) AND ! empty ($_POST['places_total']) AND $_POST['places_total']!= $donnees['places_total'] )
    {
        $places_total = $_POST['places_total'];
        $insertplaces_total =$bdd->prepare("UPDATE liste_compets SET places_total=:places_total WHERE id=:id");
        $insertplaces_total->execute(array('places_total'=>$places_total,'id' => $_GET['id']));
        header('Location:evenement.php?id='.$_GET['id']);
    }
    
}
?>
<html>
    <head>
        <title>Edition évènement</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Accueil.css">
    </head>
    <?php
	$id = $_GET['id'];	
	$req = $bdd -> query("SELECT * FROM liste_compets WHERE id = $id");
	$donnees = $req -> fetch();
	
	$id_groupe = $donnees['id_groupe'];
	
	
	$req = $bdd -> query("SELECT * FROM groupe WHERE id = $id_groupe");
	$donnees = $req -> fetch();
	
    if (isset($_SESSION['id'])) {
        if ($_SESSION['id']==$donnees['id_leader']) { // On vérifie que l'utilisateur est bien le leader
    ?>
    <body>
        <?php
		include('header.php');
        $req = $bdd->prepare("SELECT * FROM liste_compets WHERE id=:id");
        $req->execute(array('id' => $_GET['id']));
        $donnees= $req -> fetch();
        ?>
		<div id = "content">
		<div id="conteneur_groupe">
		<legend class="legend_groupe">Modifier les informations de l'évènement</legend>
        <form method="POST">
		<div id="Creer_un_groupe">
			<div id="bloc_champ">
            <label>Nom de l'evenement :</br></label>
            <input  name="nom"  class="champ" placeholder= "" value="<?php echo $donnees['nom']?>"><br/><br/>
            <label>Date de l'évènement :</br></label>
            <input  name="date"   class="champ" placeholder= "" value=" <?php echo $donnees['date']; ?>"><br/><br/>
            <label>Sport:</label>
            <?php include('liste_sports.php') ?><br/><br/>
            <label>Departement:</label>
            <?php include('liste_departements.php') ?><br/><br/>
            <label>Lieu : </br></label>
            <input  name="lieu"   class="champ" placeholder= "" value=" <?php echo $donnees['lieu']; ?>"><br/><br/>   
            
            
            <label>Nombre de place :</br></label>
                <input type="number" class="champ"   name="places_total" maxlength="3" placeholder="" value="<?php echo $places_max ; ?>"><br/><br>
            </div>
			<div id="bloc_image">        
            <input id="search-btn" type="submit" value="Valider la modification" name="submit">
			</div>
		</div>
        </form>
		</div>
		</div>
    </body>
	
<?php
        ;}
        else {echo '<strong class="erreur">Vous n\'avez pas les permissions requises pour accéder à cette page.</strong>';}
    }
    else {echo '<strong class="erreur">Vous n\'avez pas les permissions requises pour accéder à cette page.</strong>';}
?>

