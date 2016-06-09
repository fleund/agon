<?php 
include('parametres_control.php'); 
$inscrit=initProfil($_SESSION['id']);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
         <link rel="stylesheet" href="Accueil.css" />

        <title>AGON, Paramètres du compte</title> <!-- Titre de l'onglet -->
    </head>

    <body>
    <div class="page_complete">


    <?php include ('header.php'); ?>


	<div id="page">
    <h1> Paramètres du compte</h1>		<!-- Titre de la page -->
    <div class = "premier_bloc"> 		<!-- Bloc gauche -->
    	<p class="photo_de_profil">
    		<img src="image.gif" alt="photoprofil" /> 
    		</p>
    		<div id="file"><input type="file" name="photoprofil" id="photoprofil"/></div>
    		<h2 style="line-height:65px;">Avatar</h2>
    		<p class="cliquer" >Cliquer sur l'image <br/> &nbsp; &nbsp; pour modifier </p>
    	

    	<?php
    	if (isset($email_erreur1)) echo $email_erreur1 . '<br />';
    	if (isset($email_erreur2)) echo $email_erreur2 . '<br />';
    	if (isset($email_erreur3)) echo $email_erreur3 . '<br />';
    	if (isset($mdp_erreur)) echo $mdp_erreur . '<br />'; ?>

    	<form method="post" action="parametres_view.php" >
    	<fieldset>
       		<legend>Profil</legend> <!-- Titre du fieldset --> 			
    		<p class="laisser_champ_vide">Laisser un champ vide pour que l'information <br/>
    		correspondante n'apparaisse pas sur le profil</p>
    		
			   <p>
					<!-- Séparation -->
			       <label for="nom">Nom : <br/></label>
			       <input type="text" name="nom" id="nom" placeholder="Ex : Dubois" size="50" maxlength="20" value="<?php echo $inscrit['nom'];?>"/>
			       <br />
					<!-- Séparation -->
			       <label for="prenom">Prénom : <br/></label>
			       <input type="text" name="prenom" id="prenom" placeholder="Ex : Jacques" size="50" maxlength="20" value="<?php echo $inscrit['prenom'];?>"/>
			       <br />
					<!-- Séparation -->
			       <label for="date_naissance">Date de naissance : <br/></label>
			       <input type="date" name="date_naissance" id="date_naissance" value="<?php echo $inscrit['date_naissance'];?>"/></code>
			       <br />
					<!-- Séparation -->
				   <label for="civilite">Civilité :</label><br />
			       <select name="civilite" id="civilite" value="<?php echo $inscrit['sexe'];?>">
			            <option value="Femme" <?php if ($inscrit['sexe'] == 1) echo "selected";?>>Femme</option>
						<option value="Homme" <?php if ($inscrit['sexe'] == 0) echo "selected";?>>Homme</option>	
			       </select>
			       </br>
			       <!-- Séparation -->
			       <label for="tel">Numéro de téléphone : <br/></label>
			       <input type="tel" name="tel" id="tel" placeholder="Ex : 0764207645" size="50" maxlength="20" value="<?php echo $inscrit['num_tel'];?>"/></code>
			       <br />
					<!-- Séparation -->
			       <label for="pays">Pays :</label><br />
			       <select name="pays" id="pays">
			           <optgroup label="Europe">
			               <option value="france">France</option>
			               <option value="espagne">Espagne</option>
			               <option value="italie">Italie</option>
			               <option value="royaume-uni">Royaume-Uni</option>
			           </optgroup>
			           <optgroup label="Amérique">
			               <option value="canada">Canada</option>
			               <option value="etats-unis">Etats-Unis</option>
			           </optgroup>
			           <optgroup label="Asie">
			               <option value="chine">Chine</option>
			               <option value="japon">Japon</option>
			           </optgroup>
			       </select>
			       <br />
					<!-- Séparation -->
			       <label for="code_postal">Département : <br/></label>
			       <input type="text" name="code_postal" id="code_postal" placeholder="Ex : Hauts-de-seine" size="50" maxlength="20" value="<?php echo $inscrit['departement'];?>" />
			       <br />
					<!-- Séparation -->
			       <label for="Sports favoris">Sports favoris : <br/></label>
			       <input type="text" name="Sports favoris" id="Sports favoris" placeholder="Ex : Football, Rugby,..." size="50" maxlength="20" />
			       <br />
			       	<!-- Séparation -->
			       <label for="CompteFacebook">Compte Facebook : <br/></label>
			       <input type="text" name="CompteFacebook" id="CompteFacebook" placeholder="Coller l'URL de votre profil" size="50" maxlength="150" />
			       <br />
			       	<!-- Séparation -->
			       <label for="CompteTwitter">Compte Twitter : <br/></label>
			       <input type="text" name="CompteTwitter" id="CompteTwitter" placeholder="Coller l'URL de votre profil" size="50" maxlength="150" />
			       <br />
			       	<!-- Séparation -->
			   </p>
			
		</fieldset>
    </div>

    <div class = "deuxieme_bloc"> 		<!-- Bloc droit -->
    <fieldset>
       <legend>Informations du compte</legend> <!-- Titre du fieldset --> 
		<!-- Séparation -->
		<label for="Pseudo">Pseudo : <br/></label>
		<input type="text" name="Pseudo" id="Pseudo" placeholder="Ex : Dubois78" size="50" maxlength="20" />
		<br />
		<p>Modifier le mot de passe</p>
		<!-- Séparation -->
		<label for="Ancien">Ancien mot de passe :</label>
		<input type="password" name="Ancien" id="Ancien" />
		<br>
		<!-- Séparation -->
		<label for="mot_de_passe">Nouveau mot de passe :</label>
		<input type="password" name="mot_de_passe" id="mot_de_passe" />
		<br>
		<!-- Séparation -->
		<label for="mot_de_passe_verif">Confirmer le mot de passe :</label>
		<input type="password" name="mot_de_passe_verif" id="mot_de_passe_verif" />
		<br>
		<label for="mail">Adresse e-mail : <br/></label>
		<input type="text" name="mail" id="mail" placeholder="dubois@net.fr" size="50" maxlength="20" value="<?php echo $inscrit['email'];?>"/>
		<br />
	</fieldset>
		<!-- Séparation -->
	<fieldset>		<!-- fieldset sert à créer des cadres -->
       	<legend>Préférences</legend> <!-- Titre du fieldset -->
       	<!--  Créer un formulaire de choix oui/non -->
       	<p>
           Recevoir la Newsletter :

           <input type="radio" name="newsletter" value="newsletterO" id="newsletterO" /> <label for="newsletterO">Oui</label>
           <input type="radio" name="newsletter" value="newsletterN" id="newsletterN" /> <label for="newsletterN">Non</label>
        </p>
        <p>
           Masquer mon adresse e-mail :

           <input type="radio" name="masqueremail" value="masqueremailO" id="masqueremailO" /> <label for="masqueremailO">Oui</label>
           <input type="radio" name="masqueremail" value="masqueremailN" id="newsletterN" /> <label for="newsletterN">Non</label>
        </p>
        <p>
           Masquer ma présence en ligne :

           <input type="radio" name="masquerprésence" value="masquerprésenceO" id="masquerprésenceO" /> <label for="masquerprésenceO">Oui</label>
           <input type="radio" name="masquerprésence" value="masquerprésenceN" id="masquerprésenceN" /> <label for="masquerprésenceN">Non</label>
        </p>
        <!--  Créer des cases à cocher -->
       <p>
       Recevoir une notification lorsque :<br />
       <input type="checkbox" name="messagerecu1" id="messagerecu1" /> <label for="messagerecu1">Je reçois un message privé</label><br />
       <input type="checkbox" name="invitationrecu1" id="invitationrecu1" /> <label for="invitationrecu1">Je reçois une invitation à rejoindre un groupe</label><br />
       <input type="checkbox" name="sujetreponse1" id="sujetreponse1" /> <label for="sujetreponse1">On répond à un sujer auquel j'ai participé</label><br />
       <input type="checkbox" name="pseudocité1" id="pseudocité1" /> <label for="pseudocité1">On me cite dans un message</label>
       </p>
       <p>
       Recevoir un e-mail lorsque :<br />
       <input type="checkbox" name="messagerecu2" id="messagerecu2" /> <label for="messagerecu2">Je reçois un message privé</label><br />
       <input type="checkbox" name="invitationrecu2" id="invitationrecu2" /> <label for="invitationrecu2">Je reçois une invitation à rejoindre un groupe</label><br />
       <input type="checkbox" name="sujetreponse2" id="sujetreponse2" /> <label for="sujetreponse2">On répond à un sujer auquel j'ai participé</label><br />
       <input type="checkbox" name="pseudocité2" id="pseudocité2" /> <label for="pseudocité2">On me cite dans un message</label>
       </p>
    </fieldset> 
    	
    </div>
    <!-- Bouton envoyé -->
    
    <input type="submit" value="Enregistrer les modifications" class="bouton" name='modif_profil' id='modif_profil' ></code>
    
    </form>
    <div id="Corps">
				<div id="barre_bleue_gauche">
				</div>
				<div id="barre_bleue_droite">
				</div>
				<div id="barre_mauve_gauche">
				</div>
				<div id="barre_mauve_droite">
				</div>
	</div>
	</div>
    </body>
</html>















