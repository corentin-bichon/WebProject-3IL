<html> 
	<head> 
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<meta charset="utf-8"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Thèmes - Ruthen Quiz</title>
	</head>
	<body>
		
		<?php require_once 'extensions/navbar.php'; ?>

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

      <!-- Affichage des thèmes  -->

       <ul class="grid grid-theme">
          <?php foreach ($db->query('SELECT * FROM theme') as $nomtheme) {
            echo '<li class="theme">';

            echo     '<div class="card" onclick="commencerQuiz(\''.$nomtheme['nom'].'\')" >' ;
            echo     '<img src="ressources/images/'.$nomtheme['nom'].'.jpg" class="img-theme"></img>' ;

            echo	    '<div class="card-text">';
            echo		    '<div class="text-theme title">';
    	    echo                   $nomtheme['nom'];
    	    echo		    '</div>';
    	    echo    	'</div>';
    	    echo    '</div>';
            echo '</li>';
           }
          ?>
       </ul>

	</body>

	<!-- Redirection vers le quiz  -->
    <script type="text/javascript">
         function commencerQuiz(nomtheme) {
             document.location.href="quiz.php?theme=" + nomtheme + "";
         }

    </script


	<?php require_once 'extensions/footer.html'; ?>

</html>