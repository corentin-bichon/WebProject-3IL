<?php
    session_start();

	if(isset($_GET['theme']) && $theme = $_GET['theme']) {
        //Le quiz commence
    } else {
        //header('Location: ../theme.php');
    }

    $id_theme = 0;
    $array = array();
	$con = mysqli_connect('localhost', 'root', '', 'bdd_application_ruthenquiz');
	

	if (mysqli_connect_errno()) {
		echo json_encode("Erreur de connexion");
	} else {
				
		/*$rep = mysqli_query($con, "SELECT * from theme where nom = '".$theme."'");
		while ($row = mysqli_fetch_assoc($rep)) {
    		 $id_theme = $row['id_theme'];
		}*/			

		$result = mysqli_query($con, "SELECT * FROM quiz WHERE id_theme = 1 ORDER BY RAND() LIMIT 5");

		while ($theme = mysqli_fetch_assoc($result)) { 
			$array[] = array("id_quiz" => $theme['id_quiz'], "question" => $theme['question'], "reponse_A" => $theme['reponse_A'], 
			"reponse_B" => $theme['reponse_B'], "supplement_reponse" => $theme['supplement_reponse'], "bonne_reponse" => $theme['bonne_reponse']);
		}

		mysqli_close($con);
		echo json_encode($array);
	}

	/*function finQuiz() {

	}*/

?>