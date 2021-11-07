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
                      echo '<div class="card" onclick="commencerQuiz(\''.$theme['nom'].'\', \''.$theme['id_theme'].'\')">' ;
                          $image = (($theme['image'] != NULL) ? $theme['image'] : 'logo_icon.png' ) ;
                          echo '<img src="ressources/images/'.$image.'" class="img-theme"></img>' ;
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

    <!-- Popups création du thème SUCCES  -->

    <div class="popup-succes" id="popup-theme-succes" onclick="popupSuccesTheme()">
            <img src="ressources/icon/valider.png" id="popup-icon" />
            <span id="popup-texte"> Quiz crée avec succés </span>
    </div>

    <?php
        if(isset($_GET['creationquiz'])){
              $creationquiz = $_GET['creationquiz'];
              if($creationquiz==1) {
                  echo '<script type="text/javascript">  document.addEventListener("DOMContentLoaded", function() { popupSuccesTheme(); }, false); </script>';
             }
        }
     ?>

    </section>

    <script type="text/javascript">
           var affichageTheme = 0 ;

           function popupSuccesTheme() {
               if (affichageTheme == 0 ) {
                   document.getElementById("popup-theme-succes").style.display = "block";
                   affichageTheme = 1 ;
                   setTimeout(popupSuccesConnexion, 10000);
               } else {
                   document.getElementById("popup-theme-succes").style.display = "none";
                   affichageTheme = 0 ;
                   document.location.href="theme.php";
               }
           }
    </script>

    <?php require_once 'extensions/footer.html'; ?>

	</body>

</html>