<?php include('parametres_model.php');



if (isset($_POST['modif_profil'])) {
	
	$i = 0;
	


		$mail = $_POST['mail'];
	
		$email_erreur1 = NULL;
		$email_erreur2 = NULL;
		$email_erreur3 = NULL;

		$mot_de_passe = md5($_POST['mot_de_passe']); //On crypte le mot de passe
		$confirm_mot_de_passe = md5($_POST['mot_de_passe_verif']);
		$mdp_erreur = NULL;		
				
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$postal = $_POST['code_postal'];
		$tel = $_POST['tel'];
		$date_naissance = $_POST['date_naissance'];
		$civilite = $_POST['civilite'];	


		//On vérifie la forme maintenant
		if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail) || empty($mail))
		{
				$email_erreur1 = "Votre adresse E-Mail n'a pas un format valide";
				$i++;
		}
		
		//Vérification de l'adresse mail
		if (empty($mail))
		{
				$email_erreur2 = "Votre adresse mail est vide";
				$i++;
		}

		$mail_exist = mail_exist($mail);
		if (!empty($mail_exist)) 
		{
				$email_erreur3 = "Votre adresse email est déjà utilisée par un membre";
				$i++;
		}


		//Vérification du mdp
		if ($mot_de_passe != $confirm_mot_de_passe || empty($confirm_mot_de_passe) || empty($mot_de_passe))
		{
				$mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
				$i++;
		}


		
		if ($i==0) { //On vérifie qu'il n'y a pas d'erreur		
			updateProfil($nom, $prenom, $postal, $tel, $date_naissance, $civilite, $mail, $mot_de_passe);
					
		}	
						
				
		
}

?>