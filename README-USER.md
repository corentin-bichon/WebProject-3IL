Admin :

- Un utilisateur admin peut créer un quiz.
- Il y a un test sur chaque page administrateur pour voir si l'administrateur est bien admin pour éviter les injections par l'URL.

Utilisateur :

- Il y a une page où on peut voir le classement des utilisateurs.
- L'utilisateur a la possibilité de choisir le thème sur lequel il veut jouer soit via l'accueil, soit via la page de thème.
- Quand un utilisateur est connecté et qu'il fait un quiz, à la fin le score est stocké dans la BDD (pour vérifier cette fonctionnalité, veuillez tester en navigateur privé. Un bug avec les cookies persiste).
- Si aucun utilisateur n'est connecté, le score n'est pas stocké.