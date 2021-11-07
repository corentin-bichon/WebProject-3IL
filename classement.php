<html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<script type="text/javascript" src="script/chargementXML.js"></script>
        <title>Classement - Ruthen Quiz</title>
	</head>

	<body>
		<?php require_once 'extensions/navbar.php'; ?>

         <h2> Classement </h2> </br> </br>

        <?php

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
                <div class="ligne-tableau" id="titre-tableau-classement">

                </div>

                <script> loadXMLDoc('ressources/classement.xml') </script>

          <?php
              foreach ($db->query('SELECT `login`, SUM(score) as score, COUNT(score) as nbparties
                                   FROM `score`
                                   JOIN utilisateur ON score.id_utilisateur = utilisateur.id_utilisateur
                                   GROUP BY login
                                   ORDER BY SUM(score) DESC') as $score) {

                   echo '<div class="ligne-tableau">' ;
                   echo         '<div> '.$score['login'].' </div>' ;
                   echo         '<div> '.$score["score"].' </div>' ;
                   echo         '<div> '.$score["nbparties"].' </div>' ;
                   echo '</div>' ;

              }
         ?>

         </div>

         <?php require_once 'extensions/footer.html'; ?>


	</body>

</html>