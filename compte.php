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
					<span> Connexion </span>
				</div>

				<form> 

					<div class="connexion-identifiant">
						<img src="ressources/icon/utilisateur.png" id="connexion-icon" />
						<input type="text" name="username	" placeholder="Identifiant" required>
					</div>
	
					<div class="connexion-identifiant">
					    <img src="ressources/icon/cadena.png" id="connexion-icon" />
						<input type="password" name="pass	" placeholder="Mot de passe" required>
					</div>

					<div class="connexion-retenir">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>


					<div class=connexion-valider>
						<input type="submit" id='valider' value='Valider' >
					</div>

					<div class="connexion-oublier">
						<a href="#">
							Mot de passe oublié ?
						</a>
					</div>
	
				</form>




			</div>


	
		</section>
	

		<?php require_once 'extensions/footer.html'; ?>

	</body>

</html>