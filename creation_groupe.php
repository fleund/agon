<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>
    <head>
        <title>Création d'un groupe</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Accueil.css">
    </head>

    <body>
        <?php
            include('header.php');
            if(isset($_POST['submit'])) {
                $champ=array('nom', 'description', 'sport', 'statut', 'departement', 'image', 'membres_max');
                include('champs_vides.php');
                if (!isset($vide)) {
                    for ($i=0; $i<=count($champ)-1; $i++) {$pre_array[$champ[$i]]=$contenu[$champ[$i]];}
                    $req = $bdd->prepare('INSERT INTO groupe(nom, description, sport, statut, departement, image, inscrits, membres_max) VALUES(:nom, :description, :sport, :statut, :departement, :image, 1, :membres_max)');
                    $req->execute($pre_array);
                    $reponse = $bdd->query('SELECT MAX(id) AS id FROM groupe');
                    $donnees = $reponse->fetch();
                    header('Location: groupe.php?id=' . $donnees['id']);
                }
                else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
            }
        ?>
        <div id="conteneur_groupe">
            <legend class="legend_groupe">Créer un groupe</legend>
            <form action="creation_groupe.php" method="post">
                <div id="Creer_un_groupe">
                    <div id="bloc_champ">
                        <p>Nom du groupe : <input type="text" name="nom" class="champ"<?php if (isset($contenu['nom'])) {echo ' value="' . $contenu['nom'] . '"';} ?>></p>
                        <p>Description (facultatif) :</br><textarea name="description" rows="8" maxlength="1000" class="champ" placeholder="Décrivez votre groupe ici..."><?php if (isset($contenu['description'])) {echo $contenu['description'];} ?></textarea></p>
                        <p>Sport principal : <?php include('liste_sports.php') ?></p>
                        <p>Statut :</br>
                            <select name='statut'>
                                <option>Public</option>
                                <option
                                <?php if (isset($contenu['statut'])) {
                                    if ($contenu['statut']=='Privé') {echo ' selected="selected"';}
                                } ?>
                                >Privé</option>
                            </select>
                        </p>
                        <p>Département : <?php include('liste_departements.php') ?></p>
                        <p>Nombre maximum de membres :
                        <input type="number" min="5" max="200" name="membres_max" maxlength="3"<?php if (isset($contenu['membres_max'])) {echo ' value="' . $contenu['membres_max'] . '"';} ?>></p>
                    </div>
                    <div id="bloc_image">
                        <p>Image du groupe : <input name="image"<?php if (isset($contenu['image'])) {echo ' value="' . $contenu['image'] . '"';} ?>>
                        </br><a href='http://www.hostingpics.net/' target="_blank">Lien vers un uploader de photos</a></p>
                        <input id="search-btn" type="submit" value="Créer la compétition" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
