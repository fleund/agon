<!DOCTYPE html>

<html>
    <head>
        <title>Nouvelle r�ponse</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Accueil.css">
    </head>
    <body>
        <?php
include("bdd.php");
include('header.php');
?>
<a href='index.php'>Retourner � l'index </a>;
<?php
if(isset($_POST['submit'])) {
    
    $correspondance_sujet=$_GET['id_topic'];
    $champ=array('message');
    include('champs_vides.php');
    if(!isset($vide)){
        for($j=0; $j<=count($champ)-1; $j++)
    {$pre_array[$champ[$j]]= $contenu[$champ[$j]];}
    $correspondance_sujet=$_GET['id_topic'];
    $req = $bdd->prepare('INSERT INTO forum_reponses(prenom_repondant, nom_repondant, message, correspondance_sujet, id_repondant) VALUES (:prenom_repondant, :nom_repondant, :message, :correspondance_sujet, :id_repondant)');
    $req->execute(array(
        'prenom_repondant' => $_SESSION['prenom'],
        'nom_repondant' => $_SESSION['nom'],
        'message' => $_POST['message'],
        'correspondance_sujet' => $correspondance_sujet,
        'id_repondant'=>$_SESSION['id'],
            ));
    
    //$req->execute($pre_array);
    $date = date("Y-m-d H:i:s");
    $sql=$bdd->query('UPDATE forum_reponses SET date_last_post="' . $date . '"WHERE correspondance_sujet="'.$_GET['id_topic']. '"');
    /*$sql->execute();
     *$reponse=$bdd->query('SELECT nombre_reponses FROM topic WHERE id_topic="'. $_GET['id_topic'].'"');
    var_dump($reponse);
    $nbre=$reponse->fetch();
    $nombre=$nbre['nombre_reponses'] ++;
     * 
     */
    
    $nouveau_nombre=$bdd->query('UPDATE topic SET nombre_reponses=nombre_reponses + 1 WHERE id_topic='.$_GET['id_topic'].'');
    }
}
?>
    <div id='content'></div>
    <?php if(!isset($_POST['submit'])) { ?>
        <form action="repondre.php?id_topic=<?php echo $_GET['id_topic']; ?>" method="post">
            <table>
                        <tr><td>
                                <label for='message'>Message : </label>
                            </td><td>
                                <input type='text' name='message'>
                            </td></tr><tr><td>
                                <input type='submit' name='submit' value='R�pondre'>
                            </td></tr>
            </table>
            </form>
    <?php 
    }
    else {
        echo '<h1> Votre message a bien été envoyé </h1>';
        $retour= $bdd->query('SELECT id_topic, nom_topic FROM topic WHERE id_topic="'.$correspondance_sujet.'"');
        $message=$retour->fetch();
        echo '<a href="lire_sujet.php?id_topic='. $message['id_topic']. '">'.'Retour au message concerné : '. htmlentities(trim($message['nom_topic'])). '</a>';
        echo '<br/><a href="index.php"> Retour à l\index du forum </a>';
        
    }
    ?>
    </body>
</html>
