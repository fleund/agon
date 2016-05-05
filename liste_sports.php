<select name="sport" class="critere">
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
