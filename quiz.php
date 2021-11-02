<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<script type="text/javascript" src="script/quiz.js"></script>
		<title>Quiz - Ruthen Quiz</title>
	</head>

	<body>


		<?php require_once 'extensions/navbar.php'; ?>

		<?php
			/*class Quiz {
				private $question = "";
				private $reponse_A = "";
				private $reponse_B = "";
				private $bonne_reponse = "";
				private $supplement_reponse = "";
			}*/

		    if(isset($_GET['theme']) && $theme = $_GET['theme']) {
                 //Le quiz commence
            } else {
                header('Location: theme.php');
            }

            try {
        		$user = 'root';
        		$pass = '';

        		// Connexion BDD
        		$db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

      		} catch (PDOException $e) {
        		print "Erreur : ".$e->getMessage()."<br/>";
        		die();
      		}

            foreach($db->query("SELECT * FROM quiz WHERE id_theme = '$theme' ORDER BY RAND() LIMIT 5") as $listeQuiz) {

            }

        ?>

		<div class="quiz-header">
		    <h1 class="quiz-title"> <?php echo $theme; ?></h1>
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

	<?php 
		function open_db() {
			try {
        		$user = 'root';
        		$pass = '';

        		// Connexion BDD
        		$db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

      		} catch (PDOException $e) {
        		print "Erreur : ".$e->getMessage()."<br/>";
        		die();
      		}

      		return $db;
		}

		function quiz_est_fini() {
			
		}

		function reponse_quiz() {
			
		}
	 ?>
</html>