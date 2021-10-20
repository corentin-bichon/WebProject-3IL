<html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Compte - Ruthen Quiz</title>
	</head>

	<body>

		<?php require_once 'extensions/navbar.html'; ?>

		<section>
	
			<div class="cadre">

				<div class="logo-arrondi">

   				</div>

				<div class="connexion-titre">
					<span> "S'inscrire" </span>
				</div>

				<form>
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
						<input type="password" name="pass" placeholder="Mot de passe" required>
					</div>

					<div class="connexion-identifiant">
                    	<img src="ressources/icon/cadena.png" id="connexion-icon" />
                    	<input type="password2" name="pass" placeholder="Confirmer le mot de passe" required>
                    </div>

                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                     <div class="g-recaptcha" data-sitekey="6LeK6eIcAAAAAB8Em-1S__R0Zlf52MQtpfMwRUdc"></div>


					<div class=connexion-valider>
						<input type="submit" id='valider' value='Valider' >
					</div>

					<div class="connexion-oublier">
						<a href="compte.php">
							Dejà un compte ?
						</a>
					</div>
	
				</form>
			</div>


	
		</section>
	

		<?php require_once 'extensions/footer.html'; ?>

	</body>

</html>