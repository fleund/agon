<input type="number" name="jour" maxlength="2" placeholder="JJ" class="champ_date"<?php if (isset($_POST['jour'])) {echo ' value="' . $_POST['jour'] . '" ';} ?>> / 
<input type="number" name="mois" maxlength="2" placeholder="MM" class="champ_date"<?php if (isset($_POST['mois'])) {echo ' value="' . $_POST['mois'] . '" ';} ?>> / 
<input type="number" name="annee" maxlength="4" placeholder="AAAA" class="champ_date"<?php if (isset($_POST['annee'])) {echo ' value="' . $_POST['annee'] . '" ';} ?>>
<?php
	if (isset($_POST['submit'])) {
		if (!empty($_POST['jour']) AND !empty($_POST['mois']) AND !empty($_POST['annee'])) {
			$date=$_POST['annee'] . '-' . $_POST['mois'] . '-' . $_POST['jour'];
		}
		else {$vide=true;}
	}
?>
