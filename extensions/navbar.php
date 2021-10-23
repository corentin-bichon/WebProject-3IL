<header>

	<div class=logoMenu>
		<img src="ressources/logo/logo_small.png" alt="Logo_RuthenQuiz" 	title="Logo_RuthenQuiz" id="logo"/>
	</div>
	
	<div class="navbar">
	    <a href="index.php">Accueil</a> 
	   	<a href="forms.html">Formulaire</a>
	   	<a href="theme.php">Thèmes</a>
	   	<a href="create.html">Créer</a>

   		<?php
             session_start();
             if(isset($_SESSION['username']) && $_SESSION['username'] !== "") {
                 $user = $_SESSION['username'];
                 echo '<div> '.$user.' </div>' ;
                 echo '<a href="extensions/deconnexion.php"> Deconnexion </a>';
             } else {
                 echo '<a href="compte.php"> Connexion </a>';
             }
           ?>
	</div>

</header>
