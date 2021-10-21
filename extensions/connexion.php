<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {

     try {
        $user = 'root';
        $pass = '';

        // Connexion BDD
        $db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

        // Pour eviter les attaques à injection SQL
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);


         if($username !== "" && $password !== "") {

             $requete = "SELECT * FROM utilisateur where
                   login = '".$username."' and motdepasse = '".$password."' ";
             $rep = $db->query($requete);
             $count = $rep->rowCount();

             if($count!=0) {
                $_SESSION['username'] = $username;
                header('Location: ../index.php');
             } else {
                header('Location: ../compte.php?erreur=1');
             }

             $db = null;

         } else {
            header('Location: ../compte.php');
         }

         mysqli_close($db);

     } catch (PDOException $e) {
        print "Erreur : ".$e->getMessage()."<br/>";
        die();
     }

} else {
     header('Location: ../compte.php?erreur=2');
}

?>