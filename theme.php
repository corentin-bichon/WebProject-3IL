<html> 
	<head> 
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<meta charset="utf-8"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Thèmes - Ruthen Quiz</title>
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

        <ul class="grid grid-theme">
          <?php foreach ($db->query('SELECT * FROM theme') as $nomtheme) { ?>
            <li class="theme">           
            <a href="index.html">           	
            	<div class="card">           		
    	        	<?php
                    echo '<img src="ressources/images/'.$nomtheme['nom'].'.jpg" class="img-theme"></img>' 
                ?>  		
             		<div class="card-text"> 
             			<div class="text-theme title">
    	        		 	<?php echo $nomtheme['nom'] ?>
    	        		</div> 		
    	        	</div>
    	        </div>
            </li>
          <?php } ?>
        </ul>   	        
	</body>

	<?php require_once 'extensions/footer.html'; ?>

</html>