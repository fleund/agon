<!DOCTYPE html>
<html>
    
    <head>
            <meta charset="utf-8">
            <title>Ã‰dition de la page d'accueil</title>
            <link rel="stylesheet" href="Edition page d'accueil.css" />
    </head>

   

    <body>
        
        <p class = "titre">Ã‰dition de la page d'accueil</p>

        <?php // Mise Ã  jour de la base de donnÃ©es, suite au remplissage des champs
            if (isset($_GET['modifications'])) {
                try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                for ($i = 1; $i <= 16; $i++) {
                    $req = $bdd->prepare('UPDATE sports_en_tete SET nom=:tmp1 WHERE ID = :i'); // Table de la liste des sports en en-tÃªte
                    $req->execute(array(
                        'tmp1' => $_POST['en_tete' . $i],
                        'i' => $i
                    ));
                    $req = $bdd->prepare('UPDATE liste_compets SET nom=:tmp2 WHERE ID = :i'); // Table de la liste des compÃ©titions
                    $req->execute(array(
                        'tmp2' => $_POST['compet' . $i],
                        'i' => $i
                    ));
                }
                $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                while($donnees = $reponse->fetch()) { // On teste si le sport Ã  ajouter est dÃ©jÃ  dans la liste
                    if ($donnees['nom']==$_POST['ajout_sport']) {
                        $doublon=True;
                        echo '</br><strong class="erreur">Le sport "' . $_POST['ajout_sport'] . '" est dÃ©jÃ  dans la liste des sports. Il n\'a donc pas Ã©tÃ© ajoutÃ©.</strong></br>';
                    }
                }
                if (!isset($doublon)) {
                    $reponse->closeCursor();
                    $req = $bdd->prepare('INSERT INTO liste_sports(nom) VALUES(:tmp)'); // On ajoute le sport Ã  la liste globale
                    $req->execute(array(
                        'tmp' => $_POST['ajout_sport']
                    ));
                }
                $req = $bdd->prepare('DELETE FROM liste_sports WHERE nom=:tmp'); // On supprime un sport de la liste globale
                $req->execute(array(
                    'tmp' => $_POST['suppr_sport']
                ));
                $req = $bdd->prepare('UPDATE sports_en_tete SET nom=\'\' WHERE nom=:tmp'); // Tant qu'Ã  faire, on supprime aussi ce sport de l'en-tÃªte
                $req->execute(array(
                    'tmp' => $_POST['suppr_sport']
                ));
                echo '<strong>Les ';
                if (isset($doublon)) {echo 'autres ';}
                echo 'modifications ont Ã©tÃ© enregistrÃ©es.</strong></br></br>';
            }
        ?>

        <form action="Edition page d'accueil.php?modifications=oui" method="post">
            <div id="bloc1">
                <p class="tb1">Modifier la liste des sports en en-tÃªte de la page d'accueil<p>
                </br><em>Note : ces champs dÃ©terminent Ã©galement l'ordre des sports dans l'en-tÃªte.</em></br></br>
				
				<div id="essai">

                <?php // Affichage des champs pour modifier la liste des sports en en-tÃªte, prÃ©remplis avec la liste actuelle
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    $reponse = $bdd->query('SELECT * FROM sports_en_tete ORDER BY ID');
                    for ($i = 1; $i <= 16; $i++) {
                        $donnees = $reponse->fetch();
                        echo $i . ' :&nbsp;<input type="text" name="en_tete' . $donnees['ID'] . '" id="sport" maxlength ="30" value="' . $donnees['nom'] . '">&nbsp;&nbsp;';
                    }
                    $reponse->closeCursor();
                ?>
				
				</div>

            </div></br></br>
            
            <fieldset class="bloc">
                <legend>Modifier la liste exhaustive des sports reprÃ©sentÃ©s sur ce site</legend> 

                </br>SÃ©lectionner un sport Ã  supprimer de la liste :&nbsp;&nbsp;
                <input type="text" list="choix_sport" name="suppr_sport" placeholder="Cliquez ici..."> 
                <datalist id="choix_sport">
                    <?php // SÃ©lection d'un sport Ã  supprimer
                        try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                        catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                        $bdd->exec('DELETE FROM liste_sports WHERE nom=\'\''); // Y avait un bug, quand je supprimais un sport il supprimait pas la ligne mais laissait Ã  la place un champ vide, donc je supprime le champ vide pour corriger
                        $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
                        while($donnees = $reponse->fetch()) {
                            echo '<option>' . $donnees['nom'] . '</option>';
                        }
                        $reponse->closeCursor();
                    ?>
                </datalist>

                </br></br>Ajouter un sport Ã  la liste :
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
                Formats acceptÃ©s : .jpg, .jpeg, .gif ou .png. Taille : max 1 Mo.</em></br>

                <?php // Gestion des images sur la page d'accueil
                    try {$bdd = new PDO('mysql:host=localhost;dbname=agon;charset=utf8', 'root', '');}
                    catch (Exception $e) {die('Erreur : ' . $e->getMessage());}
                    if (isset($_GET['supprimer']) AND isset($_GET['nom'])) { // Traitement d'une demande de suppression d'une image
                        $ancien_nom = $_GET['nom'];
                        @unlink('uploads/' . $ancien_nom);
                        $req = $bdd->prepare('UPDATE liste_photos SET nom = \'\' WHERE ID = :i');
                        $req->execute(array('i' => $_GET['supprimer']));
                        echo '</br><strong>La photo nÂ°' . $_GET['supprimer'] . ' (' . $ancien_nom . ') a Ã©tÃ© supprimÃ©e.</strong>';
                    }
                    $j=0;
                    $reponse = $bdd->query('SELECT * FROM liste_photos ORDER BY ID');
                    for ($i = 1; $i <= 10; $i++) { // Upload des photos dans le dossier "uploads"
                        $donnees = $reponse->fetch();
                        if (isset($_FILES['photo' . $i]) AND $_FILES['photo' . $i]['error'] == 0) { // On vÃ©rifie que l'utilisateur a bien mis une photo et qu'elle a Ã©tÃ© chargÃ©e correctement
                            if ($_FILES['photo' . $i]['size'] <= 1048576) { // On vÃ©rifie que la taille de la photo est infÃ©rieure Ã  1 Mo
                                $infosfichier = pathinfo($_FILES['photo' . $i]['name']);
                                $extension_upload = $infosfichier['extension'];
                                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                                if (in_array($extension_upload, $extensions_autorisees)) { // On vÃ©rifie que l'extension de la photo est bonne
                                    @unlink('uploads/' . $donnees['nom']); // Si il y avait dÃ©jÃ  une photo dans ce champ, on la supprime du dossier "uploads"
                                    move_uploaded_file($_FILES['photo' . $i]['tmp_name'], 'uploads/' . basename($_FILES['photo' . $i]['name'])); // Toutes les conditions sont vÃ©rifiÃ©es, donc on stocke la photo dans le dossier "uploads"
                                    $req = $bdd->prepare('UPDATE liste_photos SET nom = :tmp WHERE ID = :i'); // On stocke Ã©galement le nom de cette photo dans la table "liste_photos"
                                    $req->execute(array(
                                        'tmp' => basename($_FILES['photo' . $i]['name']),
                                        'i' => $i
                                    ));
                                    $j+=1; // on incrÃ©mente une variable qui compte le nombre de modifications effectuÃ©es
                                }
                                else {echo '</br><strong class="erreur">Photo nÂ°' . $i . ' : ce format de fichier n\'est pas acceptÃ©.</strong>';}
                            }
                            else {echo '</br><strong class="erreur">Photo nÂ°' . $i . ' : ce fichier est trop volumineux.</strong>';}
                        }
                    }
                    if ($j==1) {echo '</br><strong>1 modification enregistrÃ©e.</strong>';}
                    if ($j>1) {echo '</br><strong>' . $j . ' modifications enregistrÃ©es.</strong>';}
                    $reponse = $bdd->query('SELECT * FROM liste_photos ORDER BY ID');
                    while ($donnees = $reponse->fetch()) {
                        echo '</br></br>Photo nÂ°' . $donnees['ID'] .' : <strong>' . $donnees['nom'] . '</strong>'; // Affichage du nom et de l'ID actuels de la photo
                        if ($donnees['nom']!='') { // Si il y avait dÃ©jÃ  une photo, affichage d'un lien qui permet de la supprimer
                            echo '&nbsp;<a href="Edition page d\'accueil.php?supprimer=' . $donnees['ID'] . '&nom=' . $donnees['nom'] .'#roulement_photos" title="Supprimer cette photo"><img src="http://i84.servimg.com/u/f84/18/62/32/81/suppri10.jpg"></a>';
                        }
                        echo '</br><input type="file" name="photo' . $donnees['ID'] . '" id="photo">'; // On affiche les champs de sÃ©lection des photos
                    }
                    $reponse->closeCursor();
                ?>

            </fieldset></br></br>

            <div class="bouton">
                <input type="submit" value="Enregistrer les modifications" class ="agrandir_bouton">
            </div>
        </form>
    </body>
</html>
