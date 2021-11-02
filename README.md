# WebProject-3IL
(WebProject for 3IL engineer school) 

Site Web à but non lucratif
Projet réalisé à l'école 3IL à Rodez

Auteurs : - BICHON-NOUGAILLAC Corentin 
          - VAISSAC Erwann

Description du Site

Site de Quiz public, il permet de tester ses connaissances sur de nombreux thèmes, et de ce comparer aux autres joueurs avec un système de classement.

Description Techniques 

Technologies utilisées : HTML5, CSS, PHP, Ajax, JavaScript, Json, MySQL, XML
Serveur : Apacha
          
Règles de conception : 

- Aucun code CSS n'est inclu dans nos page HTML directement
- Chaque partie de code dans le CSS contient un commentaire indiquant la page et le rôle
- Les ressources sont structurés en 3 fichiers : icon / images / logo
- Toutes les features appellées dans les pages web sont dans 'extensions' pour ne pas mélanger les pages et les features
- Afin de faciliter la maintenance, nous avons qu'un fichier css pour toutes les pages, excepté pour les média-queries et les couleurs/polices
- Empêché les attaques par injections SQL grâce à la conversion des champs d'input, il est également vérifier avant chaque accès aux pages admin que la personne à les droits
 (Car elle pourrait accéder à la page en changeant l'url)
-  Respecter l'indentation afin de rendre le code plus lisible, et le commenter

Règles IHM : 

- Toutes nos fonctionnalités sont disponibles en 3 clics 
- Un espace sobre et facile d'utilisation
- Site responsive, donc peut être utilisé sur téléphone, tablette et ordinateur


Respect du cahier des charges :

- Partie administration qui permet d'avoir plus de droit qu'un utilisateur lambda (Gérer les utilisateurs, créer un quiz)
- Viewer de photo en JavaScript, permettant de visualiser les thèmes disponibles à l'accueil
- L'ensemble des quiz,thèmes,scores et utilisateurs sont stockés dans la BDD
- Les interactions avec la base de données sont effectuées en php et en ajax.
- 2 Espaces, espace utilisateur : Créer un compte, se connecter, visualiser les news, choisir un thème et faire le quiz, voir le classement des joueurs 
             espace Administrateur : En plus de l'espace utilisateur, peuvent gérer les comptes(visionner et supprimer), et gérer les Quiz(créer un quiz)
- Utilisations de la technologie responsive flex CSS et les médias queries

