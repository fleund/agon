<?php
	for ($i=0; $i<=$nb_champs; $i++) {
        $nom_champ[$i]=htmlentities(trim($_POST[$nom_champ[$i]]));
        if (empty($nom_champ[$i])) { // On vérifie qu'aucun champ n'est vide
	        $vide=true;
	        break;
        }
    }
?>
