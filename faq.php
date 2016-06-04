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
            $id_supprimer=$_POST['select'];
            $del= $bdd->prepare('DELETE FROM faq WHERE id_faq=:id_supprimer');
            $del->execute(array('id_supprimer'=>$id_supprimer));
        }
        ?>       
                
                
        <?php
        $req= $bdd->query('SELECT * FROM faq ORDER BY id_faq ASC');
        var_dump($req);
        
            ?>
        <a href='Accueil.php'>Retourner Accueil</a>
                <br/><table>
                    <tr>
                        <td>
                            Question
                        </td><td>
                            Réponse
                            <?php
                            if (isset($_SESSION['id'])) {
                                if ($_SESSION['id']==1) {
                                    echo'</td><td>';
                                    echo'Numéro question/réponse';}}?>
                        </td></tr>
                    <?php
                    //On crée un tableau stack
                    $stack=array();
                    //On initialise le début du remplissage pour arriver jusqu'au premier id
                    $id_fill_debut=0;
                    
                    
                    
                    while($data=$req->fetch()){
                        $id_faq=$data['id_faq'];
                        echo'<tr><td>';
                        echo $data['question'];
                        echo'</td><td>';
                        echo $data['reponse'];
                        if (isset($_SESSION['id'])) {
                            if ($_SESSION['id']==1) {
                            echo'</td><td>';
                            echo $data['id_faq'];                    
                            }    
                        }
                    
                    }
                    $req->closeCursor();
                    
                    
        ?>
                </td></tr></table>
        
        <?php
        if (isset($_SESSION['id'])) {
                        if ($_SESSION['id']==1) {
                            ?>
        <h2>Supprimer une ligne</h2> 
        <form method="post">
        <select name="select">
            <?php
            $req= $bdd->query('SELECT * FROM faq ORDER BY id_faq ASC');
            while($data=$req->fetch()){
                echo '<option>'.$data['id_faq'].'</option>';
            }
            ?>
        </select>
        <input type="submit" name="supprimer" value="Supprimer cette ligne">
        </form>
        <?php
        }
        }
        ?>
        
        <h2>Ajouter une ligne</h2>
        
        
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
        
