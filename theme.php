<html> 
	<head> 
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<meta charset="utf-8"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
    <script type="text/javascript" src="script/quiz.js"></script>
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
    <section>
      <!-- Affichage des thèmes  -->

       <ul class="grid grid-theme">
          <?php 
              foreach ($db->query('SELECT * FROM theme') as $theme) {
                  echo '<li class="theme">';
                      echo '<div class="card" onclick="commencerQuiz(\''.$theme['nom'].'\')">' ;
                          echo '<img src="ressources/images/'.$theme['nom'].'.jpg" class="img-theme"></img>' ;
                          echo '<div class="card-text">';
                              echo '<div class="text-theme title">';
    	                            echo $theme['nom'];
    	                        echo '</div>';
    	                    echo '</div>';
    	                echo '</div>';
                  echo '</li>';
              }
          ?>
       </ul>
    </section>

	</body>


	<?php require_once 'extensions/footer.html'; ?>

	<!-- Redirection vers le quiz  -->


	<?php require_once 'extensions/footer.html'; ?>

</html>