<?php
if(isset($_POST['submit'])) {
                $champ=array('nom', 'sport', 'lieu', 'departement', 'date', 'places_total', 'description');
                include('champs_vides.php');
                $grp=$bdd->prepare('SELECT * FROM groupe WHERE id=:id');
                $grp->execute(array(
                    ':id' => $_GET['id'],
                        ));
                $data=$grp->fetch();
                $nom_groupe=$data['nom'];
                $id_groupe=$data['id'];
                if (!isset($vide)) {
                    $pre_array=array('id_groupe'=>$id_groupe,
                        'groupe'=>$nom_groupe,);
                    for ($i=0; $i<=count($champ)-1; $i++) {$pre_array[$champ[$i]]=$contenu[$champ[$i]];
                    }
                    $req = $bdd->prepare('INSERT INTO liste_compets(nom, sport, date, lieu, departement, groupe, places_total, inscrits, description, id_groupe) VALUES(:nom, :sport, :date, :lieu, :departement, :groupe, :places_total, 0, :description, :id_groupe)');
                    $req->execute($pre_array);
                    $reponse = $bdd->query('SELECT MAX(id) AS id FROM liste_compets');
                    $donnees = $reponse->fetch();
                    //header('Location: événement.php?id=' . $donnees['id']);
                }
                else {echo '<strong class="erreur">Veuillez renseigner tous les champs indiqués.</strong></br>';}
            }
        ?>
        <legend class="titre_creer_compet">Créer votre competition</legend>
        <form method="post" class="champ_compet">
            <label for='nom'>Nom de la compétition : </label> 
                </br>&nbsp;&nbsp;&nbsp;<input type="text" name="nom" class="l300" <?php if (isset($contenu['nom'])) {echo ' value="' . $contenu['nom'] . '" ';} ?>>
                </br><label for='sport'>Sport principal : </label>
                </br>&nbsp;&nbsp;&nbsp;<?php include('liste_sports.php') ?>
                </br><label for='date'>Date de la compétition : 
                </br>&nbsp;&nbsp;&nbsp;<input type='date' name='date'/>
                </br><label for='lieu'>Lieu de la compétition </label>
                </br>&nbsp;&nbsp;&nbsp;<textarea name="lieu" maxlength="100" rows="3" placeholder="Exemple : Club de Football de Versailles, Gymnase Saint-Germain Paris 6è..." class="l300"><?php if (isset($contenu['lieu'])) {echo $contenu['lieu'];} ?></textarea>
                </br><label for='description'>Description de la compétition </label>
                </br><textarea name='description' maxlength='100' rows='5' placeholder='Décrivez votre compétition ici'></textarea>
                </br><label for='departement'>Département : </label>
                </br>&nbsp;&nbsp;&nbsp<?php include('liste_departements.php') ?>
                </br><label for='nombre_places'>Nombre total de places : <label>
                </br>&nbsp;&nbsp;&nbsp;<input type="number" name="places_total" maxlength="6" <?php if (isset($contenu['places'])) {echo ' value="' . $contenu['places'] . '" ';} ?>>
            <input class="agrandir_bouton" type="submit" value="Créer la compétition" name="submit"> 
            </form>
      