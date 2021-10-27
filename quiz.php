<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Quiz - Ruthen Quiz</title>
	</head>

	<body>
		<?php require_once 'extensions/navbar.html'; ?>

		<div class="quiz-header">
			<h1 class="quiz-title">Napoléon</h1>
			<div class="text-right">
				<span class="questions-affectuees">7</span>
				<span class="total-question">/10</span>
			</div>
		</div>
		<div class="quiz-progression">
			<div class="quiz-barre">
				
			</div>
		</div>
		<div class="quiz-body">
			<div class="quiz">
				<div class="quiz-image">
					<img src="ressources/images/zizou.jpg">
				</div>
				<div class="justify-quiz">
					<div class="quiz-question">
					    <p>Qui a été tué par Brutus en 44 av. J.-C par un coup de couteau ?</p>
					</div>
					<div class="quiz-propositions">	
						<a class="btn-quiz btn-proposition proposition-gauche" href="">
							<span class="text-proposition">Jules César</span>
						</a>
						<a class="btn-quiz btn-suivant btn-invisible">
					        <span>Continuer</span>
					    </a>	
						<a class="btn-quiz btn-proposition proposition-droite" href="">
							<span class="text-proposition">Auguste</span>
						</a>	
						
					</div>			
				</div>
			</div>
			<div class="quiz-supplement-reponse">
				<div class="quiz-reponse">
					Bonne réponse : Jules César
				</div>
				<div class="texte-supplement-reponse">
					<p>
					En effet, Jules César est tué par Brutus, son fils adoptif le 15 mars en 44 av. J.-C.
					</p>
				</div>
			</div>
		</div>
		<?php require_once 'extensions/footer.html'; ?>
	</body>
</html>