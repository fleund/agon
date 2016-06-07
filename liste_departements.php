<div class="champ">
    <select name="departement" class="critere">
    	<option value=""><?php if (isset($departement_pre_rempli)){echo $departement_pre_rempli;}else{echo'Choisir un departement';} ?></option>
    	<?php
    	    $reponse = $bdd->query('SELECT * FROM departement ORDER BY numero');
    	    while ($donnees = $reponse->fetch()) {
                echo '<option value="' . $donnees['numero'] . ' - ' . $donnees['nom'] . '"';
                if (isset($_POST['departement'])) {
                    if ($donnees['numero'] . ' - ' . $donnees['nom']==$_POST['departement']) {echo ' selected="selected"';}
                }
                if (isset($_GET['departement'])) {
                    if ($donnees['numero'] . ' - ' . $donnees['nom']==$_GET['departement']) {echo ' selected="selected"';}
                }
                echo '>' . $donnees['numero'] . ' - ' . $donnees['nom'] . '</option>';
            }
    	?>
    </select>
</div>
