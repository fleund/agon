<footer>
	<a href="Contact.php">Nous contacter</a>
	<a href="FAQ.php">FAQ</a>
    <p>Partage la page sur</p>
    <a href="http://www.facebook.com"><img src="tn_facebook.png"></a>
    <a href="http://www.twitter.com"><img src="tn_twitter.png"></a></br>
    <?php if (isset($_SESSION['id'])) {
        if ($_SESSION['id']==1) {echo '<div><a href="Edition page d\'accueil.php" class="bouton_accueil">Édition de la page d\'accueil</a></div>';}
    } ?>
</footer>
