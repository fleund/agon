<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
        <title>Nom de forum</title>
        <link rel="stylesheet" href="Forums.css" />
	</head>

	<body>
		<div id="page">
			<div id="barre_bleue_gauche"></div>
			<div id="barre_bleue_droite"></div>
			<div id="barre_mauve_gauche"></div>
			<div id="barre_mauve_droite"></div>
			<div class="taille_min" style="text-align: center"><h1>Nom de forum</h1></div>
			<br><br><br>
			<div class="taille_min">
				<a href="nouveaux_messages" title="Voir les nouveaux messages depuis votre dernière visite">Nouveaux messages</a>
				<a href="sujets_populaires" title="Voir les sujets les plus populaires" class="sujets_populaires">Sujets populaires</a>
			</div>
			<div class="categorie">
				<h2 class="titre_categorie">Nom de forum</h2>
				<h2 class="titre_messages">Messages</h2>
				<h2 class="titre_dernier_message">Dernier message</h2>
				<ul class="colonne_forums">
					<li>
						<div class="ligne_forum">
							<h3 class="titre_forum"><a href="Sujet.php">Sujet 1</a></h3>
							<h3 class="nb_messages">N</h3>
							<h3 class="dernier_message">
								<a href="dernier_message_1" title="Voir le dernier message">Message 1</a> par <a href="Profil.php" title="Voir le profil de l'utilisateur">XXXX</a>
							</h3>
						</div>
					</li>
					<li>
						<div class="ligne_forum">
							<h3 class="titre_forum"><a href="Sujet.php">Sujet 2</a></h3>
							<h3 class="nb_messages">N</h3>
							<h3 class="dernier_message">
								<a href="dernier_message_2" title="Voir le dernier message">Message 2</a> par <a href="Profil.php" title="Voir le profil de l'utilisateur">XXXX</a>
							</h3>
						</div>
					</li>
					<li>
						<div class="ligne_forum">
							<h3 class="titre_forum"><a href="Sujet.php">Sujet 3</a></h3>
							<h3 class="nb_messages">N</h3>
							<h3 class="dernier_message">
								<a href="dernier_message_3" title="Voir le dernier message">Message 3</a> par <a href="Profil.php" title="Voir le profil de l'utilisateur">XXXX</a>
							</h3>
						</div>
					</li>
				</ul>
			</div>
			<div class="taille_min"><center><a href="Index des forums.php">Retourner à l'index des forums</a></center></div>
			<a href="Nouveau sujet.php"><button type="button" class="bouton_creation"><h2>Créer un sujet</h2></button></a>
		</div>
	</body>
</html>
