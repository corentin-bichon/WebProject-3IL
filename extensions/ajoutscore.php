<?php

	session_start();

    $score = (isset($_GET['score'])) ? $_GET['score'] : NULL;
    $idtheme = (isset($_GET['idtheme'])) ? $_GET['idtheme'] : NULL;

    try {
        $user = 'root';
        $pass = '';

        // Connexion BDD
        $db = new PDO('mysql:host=localhost;dbname=bdd_application_ruthenquiz', $user, $pass);

    } catch (PDOException $e) {
        print "Erreur : ".$e->getMessage()."<br/>";
        die();
    }

    if (isset($_SESSION['id_utilisateurquiz']) && $idutilisateur = $_SESSION['id_utilisateurquiz'] && $score != NULL && $idtheme != NULL) {
    	$req = 'INSERT INTO score (id_utilisateur, id_theme, score) VALUES ('.$idutilisateur.', '.$idtheme.', '.$score.')';
  	    $db->query($req);
    }	
?>