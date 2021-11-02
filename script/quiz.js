//document.addEventListener('DOMContentLoaded', set_quiz());

function set_quiz() {
	cacherSupplement();
}

function afficherSupplement() {
	document.getElementById("supplement_reponse").style.display = "block";
}

function cacherSupplement() {
	document.getElementById("supplement_reponse").style.display = "none";
}

function afficherResultatQuiz() {
	document.getElementById("fin-quiz").style.display = "block";
}

// Fonction qui fait progresser les éléments indicateurs d'avancement du quiz
// => barre de progression et index courant de question
function quizProgress() {
  	const curProgressStyle = document.getElementById('barreProgression').style;
	const curIndexQuestion = document.getElementById('indexQuestion');
	const curProgress = document.getElementById('barreProgression');
	const pourcentageCourant = Number(curProgressStyle.width.slice(0, -1));

	if (pourcentageCourant >= 100 || parseInt(curIndexQuestion.innerHTML, 10) >= 5) {
		curProgress.style.width = 0 + "%";
		document.getElementById('text-right').style.display = "none";
	} else {				
  		const nouveauPercentage = Math.min(pourcentageCourant + 20, 100);
  		curProgressStyle.width = `${nouveauPercentage}%`;
		curIndexQuestion.innerHTML = parseInt(curIndexQuestion.innerHTML, 10) + 1;
	}
			
}

function chargerQuestion() {
	//Afficher le bouton suivant et masquer les boutons de proposition
	document.getElementsByClassName("proposition-gauche")[0].style.display = "block";
	document.getElementsByClassName("proposition-droite")[0].style.display = "block";
	// Afficher le bouton suivant et masquer les boutons de proposition
	document.getElementsByClassName("btn-suivant")[0].style.display = "none";
	cacherSupplement(); // Faire avancer le compteur de question répondue et la barre de progression
	//document.write('<?php hello() ?>'); Passer eu prochain quiz
}

function reponseQuestion($reponse) {
	document.getElementsByClassName("proposition-gauche")[0].style.display = "none";
	document.getElementsByClassName("proposition-droite")[0].style.display = "none";
	document.getElementsByClassName("btn-suivant")[0].style.display = "block";
	afficherSupplement();
	quizProgress();
}

function commencerQuiz(nomtheme) {
    document.location.href="quiz.php?theme=" + nomtheme + "";
}