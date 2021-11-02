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

function maFonc() {

	var tabQuiz = new Array(5);
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("indexQuestion").innerHTML = xmlhttp.responseText;
			tabQuiz = JSON.parse(xmlhttp.responseText);
			for (i = 0; i < tabQuiz.length; i++) {
			    document.getElementsByClassName("texte-supplement-reponse")[0].innerHTML += "salut !!"/*"id : " + tabQuiz[i].id_quiz
			    + "question : " + tabQuiz[i].question
			    + "reponse_A : " + tabQuiz[i].reponse_A
			    + "reponse_B : " + tabQuiz[i].reponse_B
			    + "supplement_reponse : " + tabQuiz[i].supplement_reponse
			    + "bonne_reponse : " + tabQuiz[i].bonne_reponse
			    + "<BR/>"*/;
			}
			/*for (i = 0; i < tabQuiz.length; i++) {
				tabQuiz[i] = new Array(6);
				for (j = 0; j < tabQuiz[i].length; j++)
				alert(tabQuiz [i][j]);

			}*/
		}
	}

	xmlhttp.open("GET", "quiz.php", true);
	xmlhttp.send();
}