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
        include("header.php");
        /*var_dump($_POST);
        if(isset($_POST['submit'])){
        $champ=array('question', 'reponse');
        var_dump($champ);
            include('champs_vides.php');
            if(!isset($vide)){
                for($i=0; $i<=count($champ)-1; $i++) 
                        {$pre_array[$champ[$i]] = $contenu[$champ[$i]];}
                $req = $bdd->prepare('INSERT INTO faq(question, reponse) VALUES(:question, :reponse)');
                $req->execute($pre_array);
            }
        else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
          
        }
        */
        if(isset($_POST['supprimer'])){
            $id_supprimer=$data['id_faq'];
            $req= $bdd->prepare('DELETE FROM faq WHERE id_faq=:id_supprimer');
            $req->execute(array('$id_supprimer'=>$id_supprimer));
        }
        ?>       
                
                
        <?php
        $req= $bdd->query('SELECT * FROM faq');
        var_dump($req);
        
            ?>
                <table>
                    <tr>
                        <td>
                            Question
                        </td><td>
                            Réponse
                        </td><td>
                            Numéro question/réponse
                        </td></tr>
                    <?php
                    while($data=$req->fetch()){
                    echo'<tr><td>';
                    echo $data['question'];
                    echo'</td><td>';
                    echo $data['reponse'];
                    echo'</td><td>';
                    echo $data['id_faq'];
                    
                    if (isset($_SESSION['id'])) {
                        if ($_SESSION['id']==1) 
                            {echo '</td><td>';
                            echo '<input type="button" value="supprimer ligne" name="supprimer">';
                            }    
                        }
                    }          
                    
        ?>
                </td></tr></table>
        
        
        
        
    </body>
</html>
        
