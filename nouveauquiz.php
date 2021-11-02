<html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Création de Quiz - Ruthen Quiz</title>
	</head>

	<body>

		<?php require_once 'extensions/navbar.php'; ?>

		<section>
	
			<div class="cadre-nouveauquiz">

				<div class="logo-arrondi"> </div>

				<div class="connexion-titre">
					<span> Créer un nouveau Quiz </span>
				</div>

				<form action="extensions/creationquiz.php" class="formulaire-nouveauquiz" method="POST" enctype="multipart/form-data">

                    <div class="information-nouveauquiz">
                         <div class="entree-nouveauquiz nom-nouveauquiz">
                         	<input type="text" name="nomquiz" placeholder="nomquiz" required>
                         </div>

                         <div class="entree-nouveauquiz image-nouveauquiz">
                              <input type="file" name="image"  accept="image/png, image/jpeg"  id="imageicon-nouveau">
                          </div>
                    </div>

                <?php for ( $i = 1; $i <= 2; $i++ ) {
                    echo '<div class="ligne-nouveauquiz">
					    <div class="entree-nouveauquiz question-nouveauquiz">
					    	<input type="text" name="question'.$i.'" placeholder="question" required>
					    </div>

					    <div class="entree-nouveauquiz reponse-nouveauquiz">
					        <input type="radio" id="reponseA" name="reponseCorrect'.$i.'" value="reponseA" checked>
                        	<input type="text" name="reponseA'.$i.'" placeholder="reponseA" required>
                        </div>

                        <div class="entree-nouveauquiz reponse-nouveauquiz">
                        	<input type="radio" id="reponseB" name="reponseCorrect'.$i.'" value="reponseB">
                            <input type="text" name="reponseB'.$i.'" placeholder="reponseB" required>
                        </div>

                        <div class="entree-nouveauquiz reponse-nouveauquiz">
                        	 <img src="ressources/icon/information.png" id="imageicon-nouveau" />
                             <input type="text" name="inforeponse'.$i.'" placeholder="Supplément reponse">
                        </div>
                    </div>' ;
				} ?>

					<div class=quiz-valider>
						<input type="submit" id='valider' value='Mettre en ligne le quiz' >
					</div>
				</form>
			</div>
	
		</section>

		<?php require_once 'extensions/footer.html'; ?>

	</body>

</html>