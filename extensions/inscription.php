<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['prenom']) && isset($_POST['nom'])) {

     try {
        $user = 'root';
        $pass = '';

        // Connexion BDD
        $db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

        // Pour eviter les attaques à injection SQL
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $firstname = htmlspecialchars($_POST['prenom']);
        $name = htmlspecialchars($_POST['nom']);

         //Hachage du mot de passe
         $pepper = "c1isvFdxMDdmjOlvxpecFw";
         $password_haché = hash_hmac("sha256", $password, $pepper);

         if($username !== "" && $password !== "" && $firstname !== "" && $name !== "") {

             $requete = "SELECT * FROM utilisateur where
                               login = '".$username."' ";

              echo $requete ;
              $rep = $db->query($requete);
              $count = $rep->rowCount();

              if($count!=0) {
                 header('Location: ../compte.php?erreur=1');
              } else {
                 $requete2 = "INSERT INTO `utilisateur` (`login`, `motdepasse`, `admin`, `nom`, `prenom`)
                             VALUES ('".$username."','".$password_haché."','0','".$name."','".$firstname."')" ;
                 echo $requete2 ;
                  $rep = $db->query($requete2);

                 if($rep) {

                    header('Location: ../index.php?connexion=1');
                 } else {
                    header('Location: ../compte.php?erreur=2');
                 }

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
     header('Location: ../compte.php?erreur=3');
}

?>