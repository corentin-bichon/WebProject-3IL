<header>

	<div class=logoMenu>
		<img src="ressources/logo/logo_small.png" alt="Logo_RuthenQuiz" 	title="Logo_RuthenQuiz" id="logo"/>
	</div>
	
	<div class="navbar">
	    <a href="index.php">Accueil</a>
	    <a href="theme.php">Thèmes</a>
	   	<a href="quiz.php">Quiz</a>
	   	<a href="nouveauquiz.php">Créer</a>

   		<?php
             session_start();
             if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                  echo '<a href="administrateur.php"> Administrateur </a>';
             }

             if(isset($_SESSION['username']) && $_SESSION['username'] !== "") {
                 echo '<a href="extensions/deconnexion.php"> Deconnexion </a>';
             } else {
                 echo '<a href="compte.php"> Connexion </a>';
             }
           ?>
	</div>

</header>
