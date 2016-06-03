<?php include ('bdd.php');


function initProfil($id)
{
	global $bdd;

	$reponse = $bdd->prepare('SELECT * FROM inscrit WHERE id = ? ');
	// $reponse_>binparam(':id',$id, PDO::PARAM_INT);
	$reponse->execute(array($id));

	$donnee = $reponse -> fetch();

	return $donnee;

	//$req->closeCursor();
	
}



function updateProfil($nom, $prenom, $postal, $tel, $date_naissance, $civilite, $mail, $mot_de_passe) {
	global $bdd;
	$update = $bdd->prepare('UPDATE inscrit SET nom=?, prenom=?, departement=?, num_tel=?, date_naissance=?, sexe=?, mdp=?, email=? WHERE id = ?');
	$update->bindParam(1, $nom);
	$update->bindParam(2, $prenom);
	$update->bindParam(3, $postal);
	$update->bindParam(4, $tel);
	$update->bindParam(5, $date_naissance);
	$update->bindParam(6, $civilite);
	$update->bindParam(7, $mot_de_passe);
	$update->bindParam(8, $mail);
	$update->bindParam(9, $_SESSION['id']);
	$update->execute();
}


// Fonction de vérification de l'adresse mail
function mail_exist($mail) {
	global $bdd;
	$req = $bdd->prepare('SELECT email FROM inscrit WHERE email=? ');
	$req -> execute(array($mail));
	$mailbdd = $req->fetchAll();
	return $mailbdd;
}


?>




