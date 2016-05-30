<?php
	for ($i=0; $i<=count($champ)-1; $i++) {
        $contenu[$champ[$i]]=strip_tags(trim($_POST[$champ[$i]]));
        if (empty($contenu[$champ[$i]])) {$vide=true;} // On vérifie qu'aucun champ n'est vide
    }
?>
