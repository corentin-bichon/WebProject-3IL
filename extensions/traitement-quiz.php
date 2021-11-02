<?php
    session_start();

	if(isset($_GET['theme']) && $theme = $_GET['theme']) {
                 //Le quiz commence
            } else {
                header('Location: theme.php');
            }

			$array = array();

			$con = mysqli_connect('localhost', 'root', '', 'bdd_application_ruthenquiz');

			if (mysqli_connect_errno()) {
				echo json_encode("Erreur de connexion");
			} else {
				
				$rep = mysqli_query($con, "SELECT * from theme where id_theme = '".$theme."'");
				while ($row = mysqli_fetch_assoc($rep)) {
    				echo $row['id_theme'];
				}				

				$result = mysqli_query($con, "SELECT * FROM quiz WHERE id_theme = 1 ORDER BY RAND() LIMIT 5");
				
				while($row = mysqli_fetch_assoc($result)) {
					$array[] = array("id_quiz" => $row['id_quiz'], "question" => $row['question'], "reponse_A" => $row['reponse_A'], 
					"reponse_B" => $row['reponse_B'], "supplement_reponse" => $row['supplement_reponse'], "bonne_reponse" => $row['bonne_reponse']);				
				}
				mysqli_close($con);
				echo json_encode($array);
			}

?>