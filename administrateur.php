<html> 
<html lang="fr">
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS\mainSheet.css" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="ressources/logo/favicon.ico">
		<title>Admin - Ruthen Quiz</title>
	</head>

	<body>
		<?php require_once 'extensions/navbar.php'; ?>

	    <script type = "text/javascript">
             function supprimer(pseudo, prenom, nom) {

                  var xmlhttp;
                  var status;
                  var sessionPseudo = "<?php echo $_SESSION['username'] ; ?>";

                  if ( pseudo == sessionPseudo ) {
                      status = 0 ;
                  } else {
                      xmlhttp = new XMLHttpRequest();
                      xmlhttp.open("GET","extensions/suppression.php?login=" + pseudo + "&prenom=" + prenom + "&nom=" + nom, true);
                      var reponse = xmlhttp.send();
                      status = 1 ;
                  }

                  document.location.href="administrateur.php?suppression=" + status + "";
             }
        </script>

         <h2> Gestion des comptes </h2> </br> </br>

        <?php

         if(isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
         // Redirection page 404
         // Vous n'êtes pas autoriser à accéder à cette page

         } else {

          try {
                 $user = 'root';
                 $pass = '';

                 // Connexion BDD
                 $db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

          } catch (PDOException $e) {
                 print "Erreur : ".$e->getMessage()."<br/>";
                 die();
          }

          ?>

          <div class="tableau-utilisateur">
                <div class="titre-tableau ligne-tableau">
                      <div> Identifiant </div>
                      <div> Prenom </div>
                      <div> Nom </div>
                      <div> Administrateur </div>
                      <div> Date dernière connexion </div>
                </div>

          <?php
              foreach ($db->query('SELECT * FROM utilisateur') as $utilisateur) {

                   echo '<div class="ligne-tableau">' ;
                   echo         '<div> '.$utilisateur['login'].' </div>' ;
                   echo         '<div> '.$utilisateur["prenom"].' </div>' ;
                   echo         '<div> '.$utilisateur["nom"].' </div>' ;
                   if ( $utilisateur["admin"] != 1) {  echo '<div> NON </div>' ; } else {  echo '<div> OUI </div>' ;}
                   echo         '<div> '.$utilisateur["date"].' <img src="ressources/icon/trash.png" onclick="supprimer(\''.$utilisateur['login'].'\',\''.$utilisateur['prenom'].'\',\''.$utilisateur['nom'].'\')" id="trash-icon" />  </div>' ;
                   echo '</div>' ;

              }
         }
         ?>

         </div>

         <?php require_once 'extensions/footer.html'; ?>


         <!-- Popup Suppression Réussie/Ratée -->

			<?php
               if(isset($_GET['suppression'])){
                      $suppression = $_GET['suppression'];
                      if($suppression == 1) {
                           echo '<script type="text/javascript">  document.addEventListener("DOMContentLoaded", function() { popupSuccesSuppresion(); }, false); </script>';
                      } elseif($suppression == 0) {
                           echo '<script type="text/javascript">  document.addEventListener("DOMContentLoaded", function() { popupErreurSuppresion(); }, false); </script>';
                      }
               }
            ?>

			<div class="popup-succes" id="popup-suppression-succes" onclick="popupSuccesSuppresion()">
                 <img src="ressources/icon/valider.png" id="popup-icon" />
                 <span id="popup-texte"> Suppression réussie ! </span>
            </div>

            <div class="popup-erreur" id="popup-suppression-erreur" onclick="popupErreurSuppresion()">
                  <img src="ressources/icon/erreur.png" id="popup-icon-erreur" />
                  <span id="popup-texte-erreur"> Suppression impossible ! </span>
            </div>


        <!-- Popup Connexion/Deconnexion Réussie  -->

        <script type="text/javascript">
                var affichageSucces = 0 ;
                var affichageErreur = 0 ;

                             function popupSuccesSuppresion() {
                                 if (affichageSucces == 0 ) {
                                     document.getElementById("popup-suppression-succes").style.display = "block";
                                     affichageSucces = 1 ;
                                     setTimeout(popupSuccesSuppresion, 5000);
                                 } else {
                                     document.getElementById("popup-suppression-succes").style.display = "none";
                                     affichageSucces = 0 ;
                                     document.location.href="administrateur.php";
                                 }
                             }

                             function popupErreurSuppresion() {
                                 if (affichageErreur == 0 ) {
                                     document.getElementById("popup-suppression-erreur").style.display = "block";
                                     affichageErreur = 1 ;
                                     setTimeout(popupErreurSuppresion, 10000);
                                 } else {
                                     document.getElementById("popup-suppression-erreur").style.display = "none";
                                     affichageErreur = 0 ;
                                     document.location.href="administrateur.php";
                                 }
                             }
         </script>

	</body>

</html>