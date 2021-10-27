<html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Compte - Ruthen Quiz</title>
	</head>

	<body>

		<?php require_once 'extensions/navbar.php'; ?>

		<section>

			<div class="cadre">

				<div class="logo-arrondi">

   				</div>

				<div class="connexion-titre">
					<span> Connexion </span>
				</div>

				<form action="extensions/connexion.php" method="POST">

					<div class="connexion-identifiant">
						<img src="ressources/icon/utilisateur.png" id="connexion-icon" />
						<input type="text" name="username" placeholder="Identifiant" required>
					</div>

					<div class="connexion-identifiant">
					    <img src="ressources/icon/cadena.png" id="connexion-icon" />
						<input type="password" name="password" placeholder="Mot de passe" required>
					</div>

					<div class="connexion-retenir">
						<input type="checkbox" name="remember-me">
						<label>
							Remember me
						</label>
					</div>


					<div class=connexion-valider>
						<input type="submit" id='valider' value='Valider' >

						<?php
                           if(isset($_GET['erreur'])){
                               $err = $_GET['erreur'];
                               if($err==1 || $err==2) {
                                   echo '<script type="text/javascript">  document.addEventListener("DOMContentLoaded", function() { popupErreur(); }, false); </script>';
                                   echo '<div class=connexion-impossible> Identifiant ou Mot de passe incorrect </div>';
                               }
                           }
                        ?>
					</div>

					<div class="connexion-creer">
					    <span> Toujours pas de compte ? </span>
						<a href="nouveaucompte.php">
							Créer un compte
						</a>
					</div>

				</form>
			</div>

            <div class="popup-erreur" id="popup-connexion-erreur" onclick="popupErreur()">
                <img src="ressources/icon/erreur.png" id="popup-icon-erreur" />
                <span id="popup-texte-erreur"> Echec de la connexion </span>
            </div>

		</section>

        <!-- Popup Connexion ratée  -->

        <script type="text/javascript">
            var affichage = 0 ;
            function popupErreur() {
                if (affichage == 0 ) {
                    document.getElementById("popup-connexion-erreur").style.display = "block";
                    affichage = 1 ;
                    setTimeout(popupErreur, 10000);
                } else {
                    document.getElementById("popup-connexion-erreur").style.display = "none";
                    affichage = 0 ;
                    document.location.href="compte.php";
                }
            }
        </script>


		<?php require_once 'extensions/footer.html'; ?>

	</body>

</html>