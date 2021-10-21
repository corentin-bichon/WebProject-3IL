<html> 
<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Accueil - Ruthen Quiz</title>
	</head>

	<body>
		<?php require_once 'extensions/navbar.html'; ?>
	
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
					$limitetheme = 3;
					foreach ($db->query('SELECT * FROM theme LIMIT '.$limitetheme.'') as $nomtheme) { 
				?>
				<a href="index.html">
				<div class="mesThemes fade">
					<?php						
  					    echo '<img src="ressources/images/'.$nomtheme['nom'].'.jpg" class="img-viewer" style="width:100%">'
  					?>
				</div>

				<a class="prev" onclick="plusIndex(-1)">&#10094;</a>
				<a class="next" onclick="plusIndex(1)">&#10095;</a>
				<?php } ?>
			</div>
			<br>

			<div style="text-align:center">
				<?php 					
				    $nbtheme = $db->query('SELECT * FROM theme
				    					   ORDER BY RAND()
										   LIMIT '.$limitetheme.''); 
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
	
		</section>
	
			<?php require_once 'extensions/footer.html'; ?>
	
		<script>
			var indexViewer = 1;
			showTheme(indexViewer);

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

	</body>

</html>