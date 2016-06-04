<!DOCTYPE html>

<?php include('bdd.php') ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Résultats de la recherche</title>
        <link rel="stylesheet" href="Accueil.css">
        <script src="jquery.js"></script>
        <script src="recherche_avancee.js"></script>
    </head>

    <body>
        <?php include('header.php'); ?>
		<div id="content">
    	<h1>Résultats de la recherche</h1></br></br>
    	<?php
            include('search.php'); // Affichage de la recherche

            // Traitement de la recherche et affichage des résultats

            if (isset($_GET['groupe'])) { // Lien de recherche rapide cliqué sur l'accueil : seul le sport prend une valeur
                $_POST['groupe']=True;
                $sport='';
                $departement='';
                $nom='';
                $min='';
                $max='';
            }
            if (isset($_GET['sport'])) { // Lien de recherche rapide cliqué sur l'accueil : seul le sport prend une valeur
                $sport=$_GET['sport'];
                $departement='';
                $nom='';
                $min='';
                $max='';
            }
            if (isset($_POST['sport'])) {
                $sport=$_POST['sport'];
                $departement=$_POST['departement'];
                $nom=$_POST['nom'];
                $min=$_POST['min'];
                $max=$_POST['max'];
            }
            if (isset($sport)) {
                for ($i=0; $i<=2; $i++) { // La boucle tourne 3 fois : pour club, pour événement et pour groupe
                    if (isset($_POST[$table[$i]]) or isset($_GET['sport'])) {
                        if (empty($min)) {$min=0;} // On donne des valeurs par défaut à min et max
                        if (empty($max)) {$max=1000000;}
                        if ($min>$max) {
                            echo '<strong class="erreur">Le nombre maximum de membres doit être supérieur au nombre minimum !</strong>';
                            break;
                        }
                        $pre_requete = ' FROM ' . $table[$i] . ' WHERE sport LIKE :sport AND departement LIKE :departement AND nom LIKE :nom AND inscrits >= :min AND inscrits <= :max ORDER BY inscrits DESC';
                        $pre_array = array(
                            'sport' => '%' . $sport . '%',
                            'departement' => '%' . $departement . '%',
                            'nom' => '%' . $nom . '%',
                            'min' => $min,
                            'max' => $max
                        );
                        $reponse = $bdd->prepare('SELECT *' . $pre_requete);
                        $nb_resultats = $bdd->prepare('SELECT COUNT(*) AS nb_resultats' . $pre_requete);
                        $reponse->execute($pre_array);
                        $nb_resultats->execute($pre_array);
                        $donnees = $nb_resultats->fetch();
                        if ($donnees['nb_resultats']!=0) {
                            echo '<table class="tableau_res_recherche"><caption>' . $donnees['nb_resultats'] . ' ' . $nom_table[$i];
                            if ($donnees['nb_resultats']==1) {echo ' trouvé';}
                            else {echo 's trouvés';}
                            echo '</caption>
                            <tr>
                                <th>Nom</th>
                                <th>Sport pratiqué</th>
                                <th>Département</th>
                                <th>Inscrits</th>
                            </tr>'; // Affichage de l'en-tête du tableau des résultats
                            while ($donnees = $reponse->fetch()) {
                                echo '<tr>'
                                    . '<td><a href="' . $nom_table[$i] . '.php?id=' . $donnees['id'] . '">' . $donnees['nom'] . '</a></td>'
                                    . '<td>' . $donnees['sport'] . '</td>'
                                    . '<td>' . $donnees['departement'] . '</td>'
                                    . '<td>' . $donnees['inscrits'] . '</td>'
                                . '</tr>'; // Affichage des résultats ligne par ligne
                            }
                            echo '</table>';
                        }
                        else {echo 'Aucun ' . $nom_table[$i] . ' ne correspond à cette recherche.<br/><br/>';}
                    }
                }
            }
        ?>
		</div>
    </body>
</html>
