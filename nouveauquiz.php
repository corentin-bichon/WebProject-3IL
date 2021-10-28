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
	
			<div class="cadre">

				<div class="logo-arrondi"> </div>

				<div class="connexion-titre">
					<span> Créer un nouveau Quiz </span>
				</div>

				<form action="extensions/creationquiz.php" method="POST">

                    <div class="connexion-identifiant">
                    	<img src="ressources/icon/utilisateur.png" id="connexion-icon" />
                    	<input type="text" name="prenom" placeholder="Prenom" required>
                    </div>

					<div class="connexion-identifiant">
						<img src="ressources/icon/utilisateur.png" id="connexion-icon" />
						<input type="text" name="nom" placeholder="Nom" required>
					</div>

					<div class="connexion-identifiant">
						<img src="ressources/icon/utilisateur.png" id="connexion-icon" />
						<input type="text" name="username" placeholder="pseudo" required>
					</div>
	
					<div class="connexion-identifiant">
					    <img src="ressources/icon/cadena.png" id="connexion-icon" />
						<input type="password" name="password" placeholder="Mot de passe" required>
					</div>

					<div class="connexion-identifiant">
                    	<img src="ressources/icon/cadena.png" id="connexion-icon" />
                    	<input type="password" name="password2" placeholder="Confirmer le mot de passe" required>
                    </div>

					<div class=quiz-valider>
						<input type="submit" id='valider' value='Mettre en ligne le quiz' >
					</div>

				</form>
			</div>
	
		</section>

		<?php require_once 'extensions/footer.html'; ?>

	</body>

</html>