<form method="post" action="resultats_recherche.php" class="champ_recherche">
    <?php include('liste_sports.php') ?><br/>
    <?php include('liste_departements.php') ?><br/>
    <input id="search-btn" type="submit" value="Rechercher" name="submit">           
</form>

<?php
    if (isset($_GET['sport'])) {
        $sport=$_GET['sport'];
        $departement='';
    }
    if (isset($_POST['sport'])) {
        $sport=$_POST['sport'];
        $departement=$_POST['departement'];
    }
    if (isset($_POST['sport']) or isset($_GET['sport'])) {
        echo '<table><caption>Résultats de la recherche</caption>
            <tr>
                <th>Nom du groupe</th>
                <th>Sport pratiqué</th>
                <th>Département</th>
                <th>Nombre de membres</th>
            </tr>';
        $reponse = $bdd->prepare('SELECT * FROM groupe WHERE sport LIKE :tmp1 AND departement LIKE :tmp2 ORDER BY nom');
        $reponse->execute(array(
            'tmp1' => '%' . $sport . '%',
            'tmp2' => '%' . $departement . '%'
        ));
        while ($donnees = $reponse->fetch()) {
            $verif=True;
            echo '<tr>'
                . '<td><a href="">' . $donnees['nom'] . '</a></td>'
                . '<td>' . $donnees['sport'] . '</td>'
                . '<td>' . $donnees['departement'] . '</td>'
                . '<td>' . $donnees['participants'] . '</td>'
            . '</tr>';
        }
        echo '</table>';
        if (!isset($verif)) {echo "Pas de résultat !";}
    }
?>
