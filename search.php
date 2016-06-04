<form method="post" <?php echo 'action="resultats_recherche.php?avancee=' . $_GET['avancee'] . '#search-btn"' ?> class="champ_recherche" id="champ_recherche">
    <fieldset id="fieldset">
		<div class="selection">
        <?php
            include('liste_sports.php');
            include('liste_departements.php');
        ?>
		</div>
        <br/><br/>
        <span id="activer" onclick="javascript:recherche_avancee('recherche_avancee');"> <!-- Permet d'activer/désactiver la recherche avancée -->
            <?php
                if ($_GET['avancee']=='false') {
                    echo 'Activer ';
                    $_POST['nom']=$_POST['min']=$_POST['max']=''; // Si on a rempli des champs de la recherche avancée, avant de la désactiver, ces champs seront effacés
                }
                else {echo 'Désactiver ';}
            ?>
            la recherche avancée
        </span>
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

        <?php // Permet de faire en sorte que la recherche avancée soit activée/désactivée comme elle l'était avant de lancer la recherche
            if ($_GET['avancee']=='false') {echo '<script>recherche_avancee(\'recherche_avancee\');</script>';}
        ?>

        <div class="Rechercher">Rechercher...</div>
            <div id="checkbox">
				<div>
                <?php
                    $nom_table = array('groupe', 'club', 'événement');
                    $table = array('groupe', 'clubs', 'liste_compets');
                    for($i=0; $i<=2; $i++) { // Affichage des checkbox relatives aux recherches de clubs, groupes, événements
                        echo '<input type="checkbox" name="' . $table[$i] . '" id="' . $table[$i] . '"';
                        if(isset($_POST[$table[$i]]) or (isset($_GET['sport']))) {echo ' checked';} // On coche les cases qui étaient déjà cochées avant de lancer la recherche. Si on vient d'une recherche rapide depuis l'accueil, on coche par défaut toutes les cases
                        elseif (!isset($_POST['submit'])) { // Sinon, si on n'a pas encore lancé de recherche (=première visite de la page "search.php") on coche toutes les cases par défaut
                            echo ' checked';
                        }
                        echo '><label for="' . $table[$i] . '">Des ' . $nom_table[$i] . 's</label><br/>';
                    }
                ?>
				</div>
            </div>
        <input id="search-btn" type="submit" value="Rechercher" name="submit">
    </fieldset>
</form>
