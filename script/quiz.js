var tabQuiz;
var curQuestion = 1;
var score = 0;
const nbQuestions = 5;
var idtheme = 0;	

// Fonction qui permet de charger les données du quiz pour le theme sélectionné
// Utilisation de JSON.parse pour récupérer les données structurées dans un tableau
function chargementDonneesQuiz() {

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
		    tabQuiz = JSON.parse(xmlhttp.responseText);
		    document.getElementById('premiere-proposition').innerHTML = tabQuiz[curQuestion - 1].reponse_A;
	        document.getElementById('deuxieme-proposition').innerHTML = tabQuiz[curQuestion - 1].reponse_B;
	        document.getElementsByClassName("quiz-question")[0].innerHTML = tabQuiz[curQuestion - 1].question;
	    }
    }

	idtheme = document.getElementById('id-theme').value;
	xmlhttp.open("GET", "extensions/traitement-quiz.php?idtheme=" + idtheme + "", true);
	xmlhttp.send();
}

// Fonction qui initialise l'affichage pour le début du quiz
function set_quiz() {
	cacherSupplement();
	document.getElementsByClassName("quiz-fin")[0].style.display = "none";
}

// Fonction qui affiche le supplement de réponse
function afficherSupplement() {
	document.getElementById("supplement_reponse").style.display = "block";
}

// Fonction qui cache le supplement de reponse
function cacherSupplement() {
	document.getElementById("supplement_reponse").style.display = "none";	
}

// Fonction qui fait progresser les éléments indicateurs d'avancement du quiz
// => barre de progression
// => index courant de question
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

// Fonction qui intervient quand on passe à la question suivante
// Si le nombre total de question n'est pas atteind on fait progresser le quiz et on affiche la prochaine question
// Sinon on arrete le compteur et on affiche la fin du quiz
function chargerQuestion() {
	if (curQuestion != nbQuestions) {
		quizProgress();
		affichagePreQuestion();		
	} else {
		document.getElementById('barreProgression').style.width = 0 + "%";
		document.getElementById('text-right').style.display = "none";
		affichageFinQuiz();
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "extensions/ajoutscore.php?score=" + score + "&idtheme=" + idtheme, true);
        xmlhttp.send();
	}
}

// Fonction qui intervient quand le joueur choisi une réponse
// On affiche le supplement de reponse
// Si c'est la bonne réponse on affiche que c'est la bonne réponse
// Sinon on affiche que c'est la mauvaise réponse
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

// Affich dans le lien sur quel theme nous sommes
function commencerQuiz($nomtheme, $idtheme, $img) {
	document.location.href="quiz.php?theme=" + $nomtheme + "&idtheme=" + $idtheme + "&img=" + $img +"";
}

// Affiche les éléments composants le fin du quiz et cache ceux qui n'y appartiennent pas
function affichageFinQuiz() {
	document.getElementsByClassName("quiz")[0].style.display = "none";
	document.getElementsByClassName("quiz-supplement-reponse")[0].style.display = "none";
	document.getElementsByClassName("quiz-fin")[0].style.display = "block";
	document.getElementsByClassName("quiz-score")[0].innerHTML = score + "/" + nbQuestions;
}

// Affiche les éléments nécessaires après une réponse donnée
function affichagePostQuestion() {
	document.getElementsByClassName("proposition-gauche")[0].style.display = "none";
	document.getElementsByClassName("proposition-droite")[0].style.display = "none";
	document.getElementsByClassName("btn-suivant")[0].style.display = "block";
	document.getElementsByClassName("texte-supplement-reponse")[0].innerHTML = tabQuiz[curQuestion - 1].supplement_reponse;
	document.getElementsByClassName("quiz-reponse")[0].innerHTML += tabQuiz[curQuestion - 1].bonne_reponse;
	afficherSupplement();
}

// Affiche les éléments nécessaires quand on passe à une prochaine question
function affichagePreQuestion() {
	document.getElementsByClassName("proposition-gauche")[0].style.display = "block";
	document.getElementsByClassName("proposition-droite")[0].style.display = "block";
	document.getElementsByClassName("btn-suivant")[0].style.display = "none";
	document.getElementsByClassName("texte-supplement-reponse")[0].innerHTML = "";
	document.getElementsByClassName("quiz-reponse")[0].innerHTML = "La bonne réponse est : ";
	document.getElementById('premiere-proposition').innerHTML = tabQuiz[curQuestion - 1].reponse_A;
	document.getElementById('deuxieme-proposition').innerHTML = tabQuiz[curQuestion - 1].reponse_B;
	document.getElementsByClassName("quiz-question")[0].innerHTML = tabQuiz[curQuestion - 1].question;
	document.getElementsByClassName("quiz-bonne-reponse")[0].style.display = "none";
	document.getElementsByClassName("quiz-mauvaise-reponse")[0].style.display = "none";
	cacherSupplement();
}