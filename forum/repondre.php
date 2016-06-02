<?php
include("bdd.php");
?>
<a href='index.php'>Retourner à l'index </a>;
<?php

if(isset($_POST['submit'])) {
    
    $correspondance_sujet=$_GET['id_topic'];
    $champ=array('prenom_repondant', 'nom_repondant', 'message');
    include('champs_vides.php');
    if(!isset($vide)){
        for($j=0; $j<=count($champ)-1; $j++)
    {$pre_array[$champ[$j]]= $contenu[$champ[$j]];}
    $correspondance_sujet=$_GET['id_topic'];
    $req = $bdd->prepare('INSERT INTO forum_reponses(prenom_repondant, nom_repondant, message, correspondance_sujet) VALUES (:prenom_repondant, :nom_repondant, :message, :correspondance_sujet)');
    $req->execute(array(
        'prenom_repondant' => $_POST['prenom_repondant'],
        'nom_repondant' => $_POST['nom_repondant'],
        'message' => $_POST['message'],
        'correspondance_sujet' => $correspondance_sujet,
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




<!DOCTYPE html>

<html>
    <head>
        <title>Nouvelle réponse</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="repondre.php?id_topic=<?php echo $_GET['id_topic']; ?>" method="post">
            <table>
                        <tr><td>
                                <label for="prenom_repondant">Prenom de l'auteur : </label>
                            </td><td>
                                <input type='text' name='prenom_repondant'>
                            </td></tr><tr><td>
                                <label for='nom_repondant'>Nom de l'auteur : </label>
                            </td><td>
                                <input type='text' name='nom_repondant'>
                            </td></tr><tr><td>                           
                                <label for='message'>Message : </label>
                            </td><td>
                                <input type='text' name='message'>
                            </td></tr><tr><td>
                                <input type='submit' name='submit' value='Répondre'>
                            </td></tr>
            </table>
            </form>
    </body>
</html>
