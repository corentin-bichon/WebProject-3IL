<html> 
<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Admin - Ruthen Quiz</title>
	</head>

	<body>
		<?php require_once 'extensions/navbar.php'; ?>


         <h2> Gestion des comptes </h2> </br> </br>

        <?php

         if(isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
         // Redirection page 404
         // Vous n'êtes pas autoriser à accéder à cette page

         } else {

          try {
                 $user = 'root';
                 $pass = '';

                 // Connexion BDD
                 $db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

          } catch (PDOException $e) {
                 print "Erreur : ".$e->getMessage()."<br/>";
                 die();
          }

          ?>

          <div class="tableau-utilisateur">
                <div class="titre-tableau ligne-tableau">
                      <div> Identifiant </div>
                      <div> Prenom </div>
                      <div> Nom </div>
                      <div> Administrateur </div>
                      <div> Date dernière connexion </div>
                </div>

          <?php
              foreach ($db->query('SELECT * FROM utilisateur') as $utilisateur) {

                   echo '<div class="ligne-tableau">' ;
                   echo         '<div> '.$utilisateur['login'].' </div>' ;
                   echo         '<div> '.$utilisateur["prenom"].' </div>' ;
                   echo         '<div> '.$utilisateur["nom"].' </div>' ;
                   if ( $utilisateur["admin"] != 1) {  echo '<div> NON </div>' ; } else {  echo '<div> OUI </div>' ;}
                   echo         '<div> '.$utilisateur["date"].' </div>' ;
                   echo '</div>' ;

              }
         }
         ?>

         </div>


	    <?php require_once 'extensions/footer.html'; ?>

	</body>

</html>