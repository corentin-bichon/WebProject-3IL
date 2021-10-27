<?php

        header("Content-Type: text/plain");

         if(isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
         // Redirection page 404
         // Vous n'êtes pas autoriser à accéder à cette page

         } else {

             $pseudo = (isset($_GET['login'])) ? $_GET['login'] : NULL ;
             $prenom = (isset($_GET['prenom'])) ? $_GET['prenom'] : '%' ;
             $nom = (isset($_GET['nom'])) ? $_GET['nom'] : '%' ;

             try {
                  $user = 'root';
                  $pass = '';

                  // Connexion BDD
                  $db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

                  $requete = "DELETE FROM `utilisateur` WHERE `login` LIKE '".$pseudo."' AND `prenom` LIKE '".$prenom."' AND `nom` LIKE '".$nom."' ";
                  $rep = $db->query($requete);

                  header('Location: ../administrateur.php?suppression=1');

             } catch (PDOException $e) {
                  print "Erreur : ".$e->getMessage()."<br/>";
                  header('Location: ../administrateur.php?suppression=0');
                  die();
             }

             header('Location: ../administrateur.php?suppression=0');
         }
?>