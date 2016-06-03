<!DOCTYPE html>
    <?php
include("bdd.php");
?>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>FAQ agon</title>
        <link rel="stylesheet" href="Accueil.css" />
    </head>
    <body>
        
        <?php
        var_dump($_POST);
        if(isset($_POST['submit'])){
        $champ=array('question', 'reponse');
        var_dump($champ);
            include('champs_vides.php');
            if(!isset($vide)){
                for($i=0; $i<=count($champ)-1; $i++) 
                        {$pre_array[$champ[$i]] = $contenu[$champ[$i]];}
                $req = $bdd->prepare('INSERT INTO faq(question, reponse) VALUES(:question, :reponse)');
                $req->execute($pre_array);
                var_dump($req);
            }
        else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
            
        }
       
        ?>       
                
                
        <form method="post">
        <label for="question">Question posée : </label>
        <br/><input type="text" name="question">
        <br/><label for="reponse">Réponse à la question : </label>
        <br/><input type="text" name="reponse">
        <br/><br/><input type="submit" name="submit" value="Envoyer question-réponse">
        
        </form>
        
        
    </body>
</html>
        
