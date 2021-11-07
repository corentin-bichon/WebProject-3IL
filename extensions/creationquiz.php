<?php
session_start();

if(isset($_POST['nomquiz'])) {

     try {
        $user = 'root';
        $pass = '';

        // Connexion BDD
        $db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

     } catch (PDOException $e) {
        print "Erreur : ".$e->getMessage()."<br/>";
        die();
     }


      // Creation du thème
      // Pour eviter les attaques à injection SQL
      $nomquiz = htmlspecialchars($_POST['nomquiz']);

      //Telechargement de l'image
      if ( isset($_FILES['image'])) {
          $target_dir = '../ressources/images/';
          $target_file = $target_dir . basename($_FILES["image"]["name"]);
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
               print "SUCCES lors du téléchargement de l'image <br/>";
          } else {
               print "Erreur lors du téléchargement de l'image : ".$e->getMessage()."<br/>";
          }
      }

      if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1)  {
           $requete = "INSERT INTO `theme`(`nom`,`image`) VALUES ('".$nomquiz."','".basename($_FILES["image"]["name"])."')";
           $rep = $db->query($requete);

           $requete1 = "SELECT `id_theme` FROM `theme` WHERE `nom` = '".$nomquiz."'";
           $rep1 = $db->query($requete1);
           $tableTheme = $rep1->fetch();

           $theme = $tableTheme['id_theme'];

      } else {
           header('Location: ../nouveauquiz.php?erreur=1');
      }

      if(isset($theme) && $theme != "")  {

          for ( $i = 1; $i <= 2; $i++ ) {
              $bonne_reponse =  ((($_POST['reponseCorrect'.$i.'']) == "reponseA") ? $_POST['reponseA'.$i.''] : $_POST['reponseB'.$i.'']) ;
              $requete2 = "INSERT INTO `quiz`(`question`, `bonne_reponse`, `reponse_A`, `reponse_B`, `supplement_reponse`, `id_theme`) VALUES ('".$_POST['question'.$i.'']."','".$bonne_reponse."','".$_POST['reponseA'.$i.'']."','".$_POST['reponseB'.$i.'']."','".$_POST['inforeponse'.$i.'']."','".$theme."')" ;
              $rep2 = $db->query($requete2);
          }

          header('Location: ../theme.php?creationquiz=1');

      } else {
          header('Location: ../nouveauquiz.php?erreur=1');
      }



} else {
     header('Location: ../nouveauquiz.php?erreur=2');
}

?>