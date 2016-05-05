<select name="departement" class="critere">
	<option value="">Choisir un département</option>
	<?php
	    $reponse = $bdd->query('SELECT * FROM departement ORDER BY numero');
	    while ($donnees = $reponse->fetch()) {
            echo '<option value="' . $donnees['nom'] . '"';
            if (isset($_POST['departement'])) {
                if ($donnees['nom']==$_POST['departement']) {echo ' selected="selected"';}
            }
            echo '>' . $donnees['numero'] . ' - ' . $donnees['nom'] . '</option>';
        }
	?>
</select>
