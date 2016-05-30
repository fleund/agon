<?php
	for ($i=0; $i<=count($nom_champ)-1; $i++) {
        $contenu_champ[$i]=htmlentities(trim($_POST[$nom_champ[$i]]));
        if (empty($contenu_champ[$i])) { // On vérifie qu'aucun champ n'est vide
	        $vide=true;
	        break;
        }
    }
?>
