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
					<img src="ressources/logo/logo_small.png" alt="Logo_RuthenQuiz" 	title="Logo_RuthenQuiz" id="logo"/>
				</div>

				<div class="connexion-titre">
					<span> Connexion </span>
				</div>

				<form> 

					<div class="connexion-identifiant">
						<input class="input100" type="text" name="username	" placeholder="Identifiant">
					</div>
	
					<div class="connexion-identifiant">
						<input class="input100" type="password" name="pass	" placeholder="Mot de passe">
					</div>

					<div class="connexion-retenir">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>


					<div class=connexion-valider>
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="connexion-oublier">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
	
				</form>




			</div>


	
		</section>
	

		<?php require_once 'extensions/footer.html'; ?>

	</body>

</html>