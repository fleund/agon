<!DOCTYPE html>

<html>
    <head>
        <title>Creation topic</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Accueil.css">
    </head>
    
    <body>
        <?php
			include('bdd.php');
            include('header.php');
        ?>
        <div id="content">
        <?php
            if(isset($_POST['submit'])) {
                $champ=array('nom_topic', 'description_topic', 'sport', 'premier_message');
                include('champs_vides.php');
                if(!isset($vide)) {
                    for($i=0; $i<=count($champ)-1; $i++) {$pre_array[$champ[$i]] = $contenu[$champ[$i]];}
                    $req = $bdd->prepare('INSERT INTO topic(nom_topic, description_topic, sport, prenom_auteur, nom_auteur, premier_message, id_auteur) VALUES (:nom_topic, :description_topic, :sport, :prenom_auteur, :nom_auteur, :premier_message, :id_auteur)');
                    $req->execute(array(
                        'nom_topic'=>$_POST['nom_topic'],
                        'description_topic'=>$_POST['description_topic'],
                        'sport'=>$_POST['sport'],
                        'prenom_auteur'=>$_SESSION['prenom'],
                        'nom_auteur'=>$_SESSION['nom'],
                        'premier_message'=>$_POST['premier_message'],
                        'id_auteur'=>$_SESSION['id']
                    ));
                    $reponse = $bdd->query('SELECT MAX(id_topic) AS id FROM topic');
                    $donnees = $reponse->fetch();
                    header('Location : topic.php?id=' . $donnees['id']);
                    $requete = $bdd->query('SELECT * FROM topic');
                    $result = $requete->fetchAll();
                    echo '<h1> Votre message a bien été envoyé </h1>';
                    echo '<br/><a href="index.php"> Retour à l\index du forum </a>';
                    echo '<p>Ajouter nouveau message : </p>';
                }
                else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
            }
        ?>
        <div id="conteneur_groupe">
		<legend class="legend_groupe">Création topic</legend>
            <form method="post">
			<div id="Creer_un_groupe">
				<div id="bloc_champ">
                <label for="nom_topic">Nom :</br></label>
                <input type="text" class="champ" name="nom_topic">
                <br/><label for="description_topic">Description :</br></label>
                <input type="text" class="champ" name='description_topic'>
                <br/><label for='sport'>Sport concerné :</br></label>
                <select name="sport" class="champ">
                    <option value="">Choisir un sport</option>
                    <?php
                        $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                        while ($donnees = $reponse->fetch()) {
                            echo '<option';
                            if (isset($_POST['sport'])) {
                                if ($donnees['nom']==$_POST['sport']) {echo ' selected="selected"';}
                            }
                            echo '>' . $donnees['nom'] . '</option>';
                        }
                    ?>
                </select>
                <br/><label for='premier_message' >Message :</br></label>
                <textarea type='text' name='premier_message' class="champ"></textarea></br></br>
				</div>
				<div id="bloc_image">
                <br/><input type="submit" value="Créer le topic" name="submit" id="search-btn">
				</div>
			</div>
            </form>
        </div>
		</div>
    </body>
</html>
