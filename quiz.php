<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<script type="text/javascript" src="script/quiz.js"></script>
		<title>Quiz - Ruthen Quiz</title>
	</head>

	<body onload="chargementDonneesQuiz();">

		<?php 
			if(isset($_GET['theme']) && $theme = $_GET['theme']) {
        		//Le quiz commence
    		} else {
        		header('Location: theme.php');
    		} 

    		if(isset($_GET['idtheme']) && $idtheme = $_GET['idtheme'] ) {  
    			//Le quiz commence
    		} else {
        		header('Location: theme.php');
    		}		
		?>

		<?php require_once 'extensions/navbar.php'; ?>

		<?php echo '<input type="hidden" name="Id du theme courant" id="id-theme" value="'.$idtheme.'">' ?>
		<div class="quiz-header">
		    <h1 class="quiz-title"><?php echo $theme; ?></h1>
		    <div id="text-right">
				<span id="indexQuestion">1</span>
				<span id="totalQuestion">/5</span>
			</div>
		</div>
		<div class="quiz-progression">
			<div id="barreProgression" style="width: 20%;"></div>
		</div>
		<div class="quiz-body">
			<div class="quiz">
				<div class="quiz-image">
					<?php echo '<img src="ressources/images/'.$theme.'.jpg">' ?>
				</div>
				<div class="justify-quiz">
					<div class="quiz-question">	
					</div>
					<div class="quiz-propositions">	
						<a class="btn-quiz btn-proposition proposition-gauche" onclick="reponseQuestion('reponse_A');">
							<span class="text-proposition" id="premiere-proposition"></span>
						</a>
						<a class="btn-quiz btn-suivant" onclick="chargerQuestion();" style="display: none">
					        <span>Continuer</span>
					    </a>	
						<a class="btn-quiz btn-proposition proposition-droite" onclick="reponseQuestion('reponse_B');">
							<span class="text-proposition" id="deuxieme-proposition"></span>
						</a>							
					</div>			
				</div>
			</div>
			<div class="quiz-supplement-reponse" id="supplement_reponse">				
				<div class="text-reponse">
					<div class="quiz-bonne-reponse" style="display: none;">
						Bonne réponse !
					</div>
					<div class="quiz-mauvaise-reponse" style="display: none;">
						Mauvaise réponse...
					</div>
					<div class="quiz-reponse">
						La bonne réponse est : 					
					</div>
				</div>
				<div class="container-supplement-reponse">
					<p class="texte-supplement-reponse">
					
					</p>
				</div>
			</div>
			<div class="quiz-fin">
				<div class="container-score">
					<div class="texte-resultat"> 
						Votre score
					</div>
					<div class="quiz-score">
					</div>
					<div class="quiz-redirection">
						<a class="btn-quiz btn-suivant" href="index.php"><span>Accueil</span></a>
						<a class="btn-quiz btn-suivant" href="theme.php"><span>Thèmes</span></a>
					</div>
				</div>
			</div>
		</div>

		
		<?php require_once 'extensions/footer.html'; ?>
	</body>

	<script type="text/javascript">document.addEventListener('DOMContentLoaded', set_quiz());</script>
</html>