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
        $password = password_hash($password, PASSWORD_BCRYPT);

        //Hachage du mot de passe
        $pepper = "c1isvFdxMDdmjOlvxpecFw";
        $password_hachage = hash_hmac("sha256", $password, $pepper);

         if($username !== "" && $password !== "") {

             $requete = "SELECT * FROM utilisateur where login = '".$username."' ";
             $rep = $db->query($requete);
             $count = $rep->rowCount();
             $utilisateur = $rep->fetch();

             if( $password_hachage = $utilisateur['motdepasse']) {
                $_SESSION['username'] =$utilisateur['login'];
                $_SESSION['admin'] = $utilisateur['admin'];

                //Ajouter la date de connexion
                $requete2 = "UPDATE `utilisateur` SET `date`=NOW() WHERE login = '".$username."' ";
                $db->query($requete2);

                header('Location: ../index.php?connexion=1');
             } else {
                echo
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