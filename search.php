<form method="post" action="resultats_recherche.php#search-btn" class="champ_recherche">
    <?php
        include('liste_sports.php');
        include('liste_departements.php');
    ?>
    <br/><br/>
    <span id="activer" onclick="javascript:recherche_avancee('recherche_avancee');">Activer la recherche avancée</span> <!-- Permet d'activer/désactiver la recherche avancée -->
    <div id="recherche_avancee">
        <?php // Les 3 critères supplémentaires de la recherche avancée
            echo '<input type="text" name="nom" class="critere" placeholder="Chercher un nom"';
            if (isset($_POST['nom'])) {
                if (!empty($_POST['nom'])) {echo ' value="'. $_POST['nom'] . '"';} // Permet de garder la valeur recherchée dans le champ, une fois la recherche lancée
            }
            echo '><input type="number" name="min" class="critere" placeholder="Nombre minimum d\'inscrits"';
            if (isset($_POST['min'])) {
                if (!empty($_POST['min'])) {echo ' value="'. $_POST['min'] . '"';}
            }
            echo '><input type="number" name="max" class="critere" placeholder="Nombre maximum d\'inscrits"';
            if (isset($_POST['max'])) {
                if (!empty($_POST['max'])) {echo ' value="'. $_POST['max'] . '"';}
            }
            echo '>';
        ?>
    </div>
    <script>recherche_avancee('recherche_avancee');</script> <!-- Permet de faire en sorte que la recherche avancée soit désactivée par défaut -->
    <p><br/>Rechercher...</p>
    <?php
        $nom_table = array('groupe', 'club', 'événement');
        $table = array('groupe', 'clubs', 'liste_compets');
        for($i=0; $i<=2; $i++) { // Affichage des checkbox relatives aux recherches de clubs, groupes, événements
            echo '<input type="checkbox" name="' . $table[$i] . '" id="' . $table[$i] . '"';
            if(isset($_POST[$table[$i]]) or (isset($_GET['sport']))) {echo ' checked';}
            echo '><label for="' . $table[$i] . '">Des ' . $nom_table[$i] . 's</label><br/>';
        }
    ?>
    <input id="search-btn" type="submit" value="Rechercher" name="submit">
</form>

<?php
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
        for($i=0; $i<=2; $i++) { // La boucle tourne 3 fois : pour club, pour événement et pour groupe
            if (isset($_POST[$table[$i]]) or isset($_GET['sport'])) {
                if (empty($min)) {$min=0;} // On donne des valeurs par défaut à min et max
                if (empty($max)) {$max=1000000;}
                if ($min>$max) {
                    echo '<strong class="erreur">Le nombre maximum de membres doit être supérieur au nombre minimum !</strong>';
                    break;
                }
                $pre_requete = ' FROM ' . $table[$i] . ' WHERE sport LIKE :sport AND departement LIKE :departement AND nom LIKE :nom AND inscrits >= :min AND inscrits <= :max ORDER BY nom';
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
                    echo '<table><caption>' . $donnees['nb_resultats'] . ' ' . $nom_table[$i];
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
                            . '<td><a href="">' . $donnees['nom'] . '</a></td>'
                            . '<td>' . $donnees['sport'] . '</td>'
                            . '<td>' . $donnees['departement'] . '</td>'
                            . '<td>' . $donnees['inscrits'] . '</td>'
                        . '</tr>'; // Affichage des résultats ligne par ligne
                    }
                    echo '</table><br/><br/>';
                }
                else {echo 'Aucun ' . $nom_table[$i] . ' ne correspond à cette recherche.<br/><br/>';}
            }
        }
    }
?>
