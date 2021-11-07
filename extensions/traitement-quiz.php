<?php
    session_start();

	if(isset($_GET['theme']) && $theme = $_GET['theme']) {
        //Le quiz commence
    } else {
        //header('Location: ../theme.php');
    }

    if(isset($_GET['idtheme']) && $idtheme = $_GET['idtheme'] ) {  
    	//Le quiz commence
    } else {
        //header('Location: ../theme.php');
    }

    $array = array();
	$con = mysqli_connect('localhost', 'root', '', 'bdd_application_ruthenquiz');

	if (mysqli_connect_errno()) {
		echo json_encode("Erreur de connexion");	
	} else {
			
		$req = "SELECT * FROM quiz WHERE id_theme = ".$idtheme." ORDER BY RAND() LIMIT 5";				
		$result = mysqli_query($con, $req);

		while ($theme = mysqli_fetch_assoc($result)) { 
			$array[] = array("id_quiz" => $theme['id_quiz'], "question" => $theme['question'], "reponse_A" => $theme['reponse_A'], 
			"reponse_B" => $theme['reponse_B'], "supplement_reponse" => $theme['supplement_reponse'], "bonne_reponse" => $theme['bonne_reponse']);
		}

		mysqli_close($con);
		echo json_encode($array);
	}
?>