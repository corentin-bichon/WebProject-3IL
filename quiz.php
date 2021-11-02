<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<script type="text/javascript" src="script/quiz.js"></script>
		<title>Quiz - Ruthen Quiz</title>
	</head>

	<body onload="maFonc();">


		<?php require_once 'extensions/navbar.php'; ?>

		<?php 
			if(isset($_GET['theme']) && $theme = $_GET['theme']) {
                 //Le quiz commence
            } else {
                header('Location: theme.php');
            }

			$array = array();

			$con = mysqli_connect('localhost', 'root', '', 'bdd_application_ruthenquiz');

			if (mysqli_connect_errno()) {
				echo json_encode("Erreur de connexion");
			} else {
				
				$rep = mysqli_query($con, "SELECT * from theme where id_theme = '".$theme."'");
				while ($row = mysqli_fetch_assoc($rep)) {
    				echo $row['id_theme'];
				}				

				$result = mysqli_query($con, "SELECT * FROM quiz WHERE id_theme = 1 ORDER BY RAND() LIMIT 5");
				
				while($row = mysqli_fetch_assoc($result)) {
					$array[] = array("id_quiz" => $row['id_quiz'], "question" => $row['question'], "reponse_A" => $row['reponse_A'], 
					"reponse_B" => $row['reponse_B'], "supplement_reponse" => $row['supplement_reponse'], "bonne_reponse" => $row['bonne_reponse']);				
				}
				mysqli_close($con);
				echo json_encode($array);
			}
		?>

		<div class="quiz-header">
		    <h1 class="quiz-title"> <?php /*echo $theme;*/ ?></h1>
		    <div id="text-right">
				<span id="indexQuestion">1</span>
				<span id="totalQuestion">/5</span>
			</div>
		</div>
		<div class="quiz-progression">
			<div id="barreProgression" style="width: 20%;">
				
			</div>
		</div>
		<div class="quiz-body">
			<div class="quiz">
				<div class="quiz-image">
					<img src="ressources/images/zizou.jpg">
				</div>
				<div class="justify-quiz">
					<div class="quiz-question">
						Qui a été tué par Brutus ?
					    <?php
					    	
					    ?>
					</div>
					<div class="quiz-propositions">	
						<a class="btn-quiz btn-proposition proposition-gauche" onclick="reponseQuestion('reponse_A');">
							<span class="text-proposition">Jules César</span>
						</a>
						<a class="btn-quiz btn-suivant" onclick="chargerQuestion();" style="display: none">
					        <span>Continuer</span>
					    </a>	
						<a class="btn-quiz btn-proposition proposition-droite" onclick="reponseQuestion('reponse_B');">
							<span class="text-proposition">Auguste</span>
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
						<?php 
							echo 'La bonne réponse est';
						?> 
					</div>
				</div>
				<div class="container-supplement-reponse">
					<p class="texte-supplement-reponse">
					En effet, Jules César est tué par Brutus, son fils adoptif le 15 mars en 44 av. J.-C.
					</p>
				</div>
			</div>
		</div>

		
		<?php require_once 'extensions/footer.html'; ?>
	</body>

	<script type="text/javascript">document.addEventListener('DOMContentLoaded', set_quiz());</script>
</html>