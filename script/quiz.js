//document.addEventListener('DOMContentLoaded', set_quiz());

var tabQuiz;
var curQuestion = 1;
var score = 0;
const nbQuestions = 5;

function maFonc() {

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
		tabQuiz = JSON.parse(xmlhttp.responseText);
		document.getElementById('premiere-proposition').innerHTML = tabQuiz[curQuestion - 1].reponse_A;
	    document.getElementById('deuxieme-proposition').innerHTML = tabQuiz[curQuestion - 1].reponse_B;
	    document.getElementsByClassName("quiz-question")[0].innerHTML = tabQuiz[curQuestion - 1].question;
	}
}

	xmlhttp.open("GET", "extensions/traitement-quiz.php", true);
	xmlhttp.send();
}

function set_quiz() {
	cacherSupplement();
}

function afficherSupplement() {
	document.getElementById("supplement_reponse").style.display = "block";
}

function cacherSupplement() {
	document.getElementById("supplement_reponse").style.display = "none";
	document.getElementsByClassName("quiz-fin")[0].style.display = "none";
}

// Fonction qui fait progresser les éléments indicateurs d'avancement du quiz
// => barre de progression et index courant de question
function quizProgress() {
  	const curProgressStyle = document.getElementById('barreProgression').style;
	const curIndexQuestion = document.getElementById('indexQuestion');
	const curProgress = document.getElementById('barreProgression');
	const pourcentageCourant = Number(curProgressStyle.width.slice(0, -1));

	if (pourcentageCourant < 100 && curQuestion <= nbQuestions) {
		const nouveauPercentage = Math.min(pourcentageCourant + 20, 100);
  		curProgressStyle.width = `${nouveauPercentage}%`;
		curIndexQuestion.innerHTML = curQuestion + 1;
	}
	curQuestion++;		
}

function chargerQuestion() {
	if (curQuestion != nbQuestions) {
		quizProgress();
		affichagePreQuestion();		
	} else {
		document.getElementById('barreProgression').style.width = 0 + "%";
		document.getElementById('text-right').style.display = "none";
		affichageFinQuiz();

	}
		
	//document.write('<?php hello() ?>'); Passer eu prochain quiz
}

function reponseQuestion($reponse) {
	affichagePostQuestion();	
	$texteReponse = $reponse == "reponse_A" ? tabQuiz[curQuestion - 1].reponse_A : tabQuiz[curQuestion - 1].reponse_B;

	if ($texteReponse == tabQuiz[curQuestion - 1].bonne_reponse) {
		document.getElementsByClassName("quiz-bonne-reponse")[0].style.display = "block";
		score++;
	} else {
		document.getElementsByClassName("quiz-mauvaise-reponse")[0].style.display = "block";
	}	
}

function commencerQuiz(nomtheme) {
    document.location.href="quiz.php?theme=" + nomtheme + "";
}

function affichageFinQuiz() {
	document.getElementsByClassName("quiz")[0].style.display = "none";
	document.getElementsByClassName("quiz-supplement-reponse")[0].style.display = "none";
	document.getElementsByClassName("quiz-fin")[0].style.display = "block";
	document.getElementsByClassName("quiz-score")[0].innerHTML = score + "/" + nbQuestions;
}

function affichagePostQuestion() {
	document.getElementsByClassName("proposition-gauche")[0].style.display = "none";
	document.getElementsByClassName("proposition-droite")[0].style.display = "none";
	document.getElementsByClassName("btn-suivant")[0].style.display = "block";
	document.getElementsByClassName("texte-supplement-reponse")[0].innerHTML = tabQuiz[curQuestion - 1].supplement_reponse;
	document.getElementsByClassName("quiz-reponse")[0].innerHTML += tabQuiz[curQuestion - 1].bonne_reponse;
	afficherSupplement();
}

function affichagePreQuestion() {
	//Afficher le bouton suivant et masquer les boutons de proposition
	document.getElementsByClassName("proposition-gauche")[0].style.display = "block";
	document.getElementsByClassName("proposition-droite")[0].style.display = "block";
	// Afficher le bouton suivant et masquer les boutons de proposition
	document.getElementsByClassName("btn-suivant")[0].style.display = "none";
	document.getElementsByClassName("texte-supplement-reponse")[0].innerHTML = "";
	document.getElementsByClassName("quiz-reponse")[0].innerHTML = "La bonne réponse est : ";
	document.getElementById('premiere-proposition').innerHTML = tabQuiz[curQuestion - 1].reponse_A;
	document.getElementById('deuxieme-proposition').innerHTML = tabQuiz[curQuestion - 1].reponse_B;
	document.getElementsByClassName("quiz-question")[0].innerHTML = tabQuiz[curQuestion - 1].question;
	document.getElementsByClassName("quiz-bonne-reponse")[0].style.display = "none";
	document.getElementsByClassName("quiz-mauvaise-reponse")[0].style.display = "none";
	cacherSupplement(); // Faire avancer le compteur de question répondue et la barre de progression
}