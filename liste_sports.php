<div class="champ">
    <select name="sport" class="critere">
       <option value=""><?php if (isset($donnees['sport'])){echo $donnees['sport'];}else{echo'Choisir un sport';} ?></option>
        <?php
            $reponse = $bdd->query('SELECT * FROM liste_sports ORDER BY nom');
            while ($donnees = $reponse->fetch()) {
                echo '<option';
                if (isset($_POST['sport'])) {
                    if ($donnees['nom']==$_POST['sport']) {echo ' selected="selected"';}
                }
                if (isset($_GET['sport'])) {
                    if ($donnees['nom']==$_GET['sport']) {echo ' selected="selected"';}
                }
                echo '>' . $donnees['nom'] . '</option>';
            }
        ?>
    </select>
</div>
