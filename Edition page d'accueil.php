<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>
    
    <head>
            <meta charset="utf-8">
            <title>Édition de la page d'accueil</title>
            <link rel="stylesheet" href="Edition page d'accueil.css" />
    </head>

    <header>
        <img class="Logo" src="Logo.png" alt="Logo ISEP/Agon" />
        <p id="onglets_accueil">
        	<a href="">Accueil</a> |
        	<a href="">Forums</a> |
        	<a href="">Groupes</a> |
        	<a href="">Mon espace</a> |
        	<a href="">Déconnexion</a> |
        </p>
        <div id="identifiants">
            <p id="nom_utilisateur"> Nom d'utilisateur  </p>
            <form>
    	      	<input type="text" name="Nom d'utilisateur" /> <br/>
            </form>
            <p id="mot_passe"> Mot de passe  </p>
            <form>
                <input type="password" name="Nom d'utilisateur" /> <br/>
            </form>
            <button type="button" onclick="alert('Se connecter');"> 
                Se connecter 
            </button>
            &nbsp;&nbsp;
            <a href="">Mot de passe oublié ? </a>
        </div>
    </header>

    <body>
        <div id="Corps">
            <div id="barre_bleue_gauche"></div>
            <div id="barre_bleue_droite"></div>
            <div id="barre_mauve_gauche"></div>
            <div id="barre_mauve_droite"></div>
	    </div>
        
        <p class = "titre">Édition de la page d'accueil</p>

        <?php // Mise à jour de la base de données, suite au remplissage des champs
            if (isset($_GET['modifications'])) {
                for ($i = 1; $i <= 16; $i++) {
                    $req = $bdd->prepare('UPDATE sports_en_tete SET nom=:tmp1 WHERE ID = :i'); // Table de la liste des sports en en-tête
                    $req->execute(array(
                        'tmp1' => $_POST['en_tete' . $i],
                        'i' => $i
                    ));
                }
                $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                while($donnees = $reponse->fetch()) { // On teste si le sport à ajouter est déjà dans la liste
                    if ($donnees['nom']==$_POST['ajout_sport']) {
                        $doublon=True;
                        echo '</br><strong class="erreur">Le sport "' . $_POST['ajout_sport'] . '" est déjà dans la liste des sports. Il n\'a donc pas été ajouté.</strong></br>';
                    }
                }
                if (!isset($doublon)) {
                    $req = $bdd->prepare('INSERT INTO liste_sports(nom) VALUES (:tmp)'); // On ajoute le sport à la liste globale
                    $req->execute(array(
                        'tmp' => $_POST['ajout_sport']
                    ));
                }
                $req = $bdd->prepare('DELETE FROM liste_sports WHERE nom=:tmp'); // On supprime un sport de la liste globale
                $req->execute(array(
                    'tmp' => $_POST['suppr_sport']
                ));
                $req = $bdd->prepare('UPDATE sports_en_tete SET nom=\'\' WHERE nom=:tmp'); // Tant qu'à faire, on supprime aussi ce sport de l'en-tête
                $req->execute(array(
                    'tmp' => $_POST['suppr_sport']
                ));
                echo '<strong>Les ';
                if (isset($doublon)) {echo 'autres ';}
                echo 'modifications ont été enregistrées.</strong></br></br>';
            }
        ?>

        <form action="Edition page d'accueil.php?modifications=oui" method="post">
            <fieldset class="bloc">
                <legend>Modifier la liste des sports en en-tête de la page d'accueil</legend>
                </br><em>Note : ces champs déterminent également l'ordre des sports dans l'en-tête.</em></br></br>

                <?php // Affichage des champs pour modifier la liste des sports en en-tête, préremplis avec la liste actuelle
                    $reponse = $bdd->query('SELECT * FROM sports_en_tete ORDER BY ID');
                    for ($i = 1; $i <= 16; $i++) {
                        $donnees = $reponse->fetch();
                        echo $i . ' :&nbsp;<input type="text" name="en_tete' . $donnees['ID'] . '" id="sport" maxlength ="30" value="' . $donnees['nom'] . '">&nbsp;&nbsp;';
                    }
                ?>

            </fieldset></br></br>
            
            <fieldset class="bloc">
                <legend>Modifier la liste exhaustive des sports représentés sur ce site</legend> 

                </br>Sélectionner un sport à supprimer de la liste :&nbsp;&nbsp;
                <input type="text" list="choix_sport" name="suppr_sport" placeholder="Cliquez ici..."> 
                <datalist id="choix_sport">
                    <?php // Sélection d'un sport à supprimer
                        $bdd->exec('DELETE FROM liste_sports WHERE nom=\'\''); // Y avait un bug, quand je supprimais un sport il supprimait pas la ligne mais laissait à la place un champ vide, donc je supprime le champ vide pour corriger
                        $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                        while($donnees = $reponse->fetch()) {
                            echo '<option>' . $donnees['nom'] . '</option>';
                        }
                    ?>
                </datalist>

                </br></br>Ajouter un sport à la liste :
                <input name=ajout_sport type="text" maxlength="30">

            </fieldset></br></br>

            <div class="bouton">
                <input type="submit" value="Enregistrer les modifications" class ="agrandir_bouton">
            </div>
        </form>

        <form action="Edition page d'accueil.php#roulement_photos" method="post" enctype="multipart/form-data">
            <fieldset class="bloc" id="roulement_photos">
                
                <legend >Modifier le roulement des photos</legend>
                </br><em>L'envoi du fichier peut prendre quelques instants, merci de patienter.</br>
                Formats acceptés : .jpg, .jpeg, .gif ou .png. Taille : max 1 Mo.</em></br>

                <?php // Gestion des images sur la page d'accueil
                    if (isset($_GET['supprimer']) AND isset($_GET['nom'])) { // Traitement d'une demande de suppression d'une image
                        $ancien_nom = $_GET['nom'];
                        @unlink('uploads/' . $ancien_nom);
                        $req = $bdd->prepare('UPDATE liste_photos SET nom = \'\' WHERE ID = :i');
                        $req->execute(array('i' => $_GET['supprimer']));
                        echo '</br><strong>La photo n°' . $_GET['supprimer'] . ' (' . $ancien_nom . ') a été supprimée.</strong>';
                    }
                    $j=0;
                    $reponse = $bdd->query('SELECT * FROM liste_photos ORDER BY ID');
                    for ($i = 1; $i <= 10; $i++) { // Upload des photos dans le dossier "uploads"
                        $donnees = $reponse->fetch();
                        if (isset($_FILES['photo' . $i]) AND $_FILES['photo' . $i]['error'] == 0) { // On vérifie que l'utilisateur a bien mis une photo et qu'elle a été chargée correctement
                            if ($_FILES['photo' . $i]['size'] <= 1048576) { // On vérifie que la taille de la photo est inférieure à 1 Mo
                                $infosfichier = pathinfo($_FILES['photo' . $i]['name']);
                                $extension_upload = $infosfichier['extension'];
                                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                                if (in_array($extension_upload, $extensions_autorisees)) { // On vérifie que l'extension de la photo est bonne
                                    @unlink('uploads/' . $donnees['nom']); // Si il y avait déjà une photo dans ce champ, on la supprime du dossier "uploads"
                                    move_uploaded_file($_FILES['photo' . $i]['tmp_name'], 'uploads/' . basename($_FILES['photo' . $i]['name'])); // Toutes les conditions sont vérifiées, donc on stocke la photo dans le dossier "uploads"
                                    $req = $bdd->prepare('UPDATE liste_photos SET nom = :tmp WHERE ID = :i'); // On stocke également le nom de cette photo dans la table "liste_photos"
                                    $req->execute(array(
                                        'tmp' => basename($_FILES['photo' . $i]['name']),
                                        'i' => $i
                                    ));
                                    $j+=1; // on incrémente une variable qui compte le nombre de modifications effectuées
                                }
                                else {echo '</br><strong class="erreur">Photo n°' . $i . ' : ce format de fichier n\'est pas accepté.</strong>';}
                            }
                            else {echo '</br><strong class="erreur">Photo n°' . $i . ' : ce fichier est trop volumineux.</strong>';}
                        }
                    }
                    if ($j==1) {echo '</br><strong>1 modification enregistrée.</strong>';}
                    if ($j>1) {echo '</br><strong>' . $j . ' modifications enregistrées.</strong>';}
                    $reponse = $bdd->query('SELECT * FROM liste_photos ORDER BY ID');
                    while ($donnees = $reponse->fetch()) {
                        echo '</br></br>Photo n°' . $donnees['ID'] .' : <strong>' . $donnees['nom'] . '</strong>'; // Affichage du nom et de l'ID actuels de la photo
                        if ($donnees['nom']!='') { // Si il y avait déjà une photo, affichage d'un lien qui permet de la supprimer
                            echo '&nbsp;<a href="Edition page d\'accueil.php?supprimer=' . $donnees['ID'] . '&nom=' . $donnees['nom'] .'#roulement_photos" title="Supprimer cette photo"><img src="http://i84.servimg.com/u/f84/18/62/32/81/suppri10.jpg"></a>';
                        }
                        echo '</br><input type="file" name="photo' . $donnees['ID'] . '" id="photo">'; // On affiche les champs de sélection des photos
                    }
                ?>

            </fieldset></br></br>

            <div class="bouton">
                <input type="submit" value="Enregistrer les modifications" class ="agrandir_bouton">
            </div>
        </form>
    </body>
</html>
