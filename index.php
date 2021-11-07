<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<script type="text/javascript" src="script/quiz.js"></script>
		<title>Accueil - Ruthen Quiz</title>
	</head>

	<body>
		<?php require_once 'extensions/navbar.php'; ?>

		<!-- Message de bienvenue -->

		<?php
		            if(isset($_SESSION['username']) && $_SESSION['username'] !== "") {
                         $user = $_SESSION['username'];
                         echo "<div class='message-bienvenue'> Bonjour $user et bienvenue sur Ruthen Quiz </div>" ;
                     } else {
                         echo "<div class='message-bienvenue'> Bonjour et bienvenue sur Ruthen Quiz </div>" ;
                     }
        ?>

	   <!-- Thèmes -->
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

			<div class="viewer-container">
				<?php 
					$limitetheme = 5;
					foreach ($db->query('SELECT * FROM theme WHERE image != "null" ORDER BY RAND() LIMIT '.$limitetheme.'') as $nomtheme) {
				?>
				<div class="mesThemes fade">
					<?php		
  					    echo '<img src="ressources/images/'.$nomtheme['image'].'" class="img-viewer" style="width:100%"
  					    onclick="commencerQuiz(\''.$nomtheme['nom'].'\', \''.$nomtheme['id_theme'].'\')">';
  					    echo '<div class="text-background">';
  					    	echo '<div class="text-viewer">'.$nomtheme['nom'].'</div>';
  					    echo '</div>'
  					?>
				</div>
				<?php } ?>
				<a class="prev" onclick="plusIndex(-1)">&#10094;</a>
				<a class="next" onclick="plusIndex(1)">&#10095;</a>	
			</div>
			<br>

			<div style="text-align:center">
				<?php 					
				    for ($i=1; $i<=$limitetheme; $i++) {
  				        echo '<span class="point" onclick="currentIndex('.$i.')"></span>'; 
  				    } 
  				?>				
			</div>

			<div class="presentation angle-haut angle-bas"> 
				<div>
				    Ruthen Quiz
	
				</div>
	
						<br><br><br><br><br>
						<br><br><br><br><br>
	
	
				<div> 
					Présentation du site de Quiz
				</div>
	
			</div>

			<!-- Popup Connexion/Deconnexion Réussie -->
			<?php
               if(isset($_GET['connexion'])){
                      $connexion = $_GET['connexion'];
                      if($connexion==1) {
                            echo '<script type="text/javascript">  document.addEventListener("DOMContentLoaded", function() { popupSuccesConnexion(); }, false); </script>';
                      }
               }
                if(isset($_GET['deconnexion'])){
                        $deconnexion = $_GET['deconnexion'];
                        if($deconnexion==1) {
                             echo '<script type="text/javascript">  document.addEventListener("DOMContentLoaded", function() { popupSuccesDeconnexion(); }, false); </script>';
                       }
                }
            ?>

			<div class="popup-succes" id="popup-connexion" onclick="popupSuccesConnexion()">
                 <img src="ressources/icon/valider.png" id="popup-icon" />
                 <span id="popup-texte"> Connexion réussie ! </span>
            </div>

            <div class="popup-succes" id="popup-deconnexion" onclick="popupSuccesDeconnexion()">
                  <img src="ressources/icon/valider.png" id="popup-icon" />
                  <span id="popup-texte"> Deconnexion réussie ! </span>
            </div>
	
		</section>
	
			<?php require_once 'extensions/footer.html'; ?>

		<!-- Affichage Thèmes Viewer -->
		<script>
			var indexViewer = 1;
			showTheme(indexViewer);
			autoChange();

			function plusIndex(n) {
  				showTheme(indexViewer += n);
			}

			function currentIndex(n) {
  				showTheme(indexViewer = n);
			}

			function showTheme(n) {
  				var i;
  				var themes = document.getElementsByClassName("mesThemes");
  				var points = document.getElementsByClassName("point");

  				if (n > themes.length) {
  					indexViewer = 1;
  				} 
  				if (n < 1) {
  					indexViewer = themes.length;
  				}

 				for (i = 0; i < themes.length; i++) {
      				themes[i].style.display = "none";  
  				}

  				for (i = 0; i < points.length; i++) {
      				points[i].className = points[i].className.replace(" active", "");
  				}

  				themes[indexViewer-1].style.display = "block";  
  				points[indexViewer-1].className += " active";
			}
		</script>


		<!-- Popup Connexion/Deconnexion Réussie  -->

		<script type="text/javascript">
                     var affichageDeconnexion = 0 ;
                     var affichageConnexion = 0 ;

                     function popupSuccesConnexion() {
                         if (affichageConnexion == 0 ) {
                             document.getElementById("popup-connexion").style.display = "block";
                             affichageConnexion = 1 ;
                             setTimeout(popupSuccesConnexion, 10000);
                         } else {
                             document.getElementById("popup-connexion").style.display = "none";
                             affichageConnexion = 0 ;
                             document.location.href="index.php";
                         }
                     }

                     function popupSuccesDeconnexion() {
                         if (affichageDeconnexion == 0 ) {
                             document.getElementById("popup-deconnexion").style.display = "block";
                             affichageDeconnexion = 1 ;
                             setTimeout(popupSuccesDeconnexion, 10000);
                         } else {
                             document.getElementById("popup-deconnexion").style.display = "none";
                             affichageDeconnexion = 0 ;
                             document.location.href="index.php";
                         }
                     }
        </script>

	</body>

</html>