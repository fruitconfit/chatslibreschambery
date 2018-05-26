# Les chats libres de Chambéry - MIAOU

## Installation local Windows: 
- Installer WAMP (PHP: 7.1.9)
    - En cas de probléme ne pas oublier d'installer les VC (http://forum.wampserver.com/read.php?1,137154)
- Installer Composer
- Installer git bash
- Ouvrir git bash et se déplacer dans le répertoire /wamp/www/
    - `cd /wamp/www/`
    - ou `cd /wamp64/www/`
- Clonner le projet
    - `git clone https://github.com/AlexandrePiot/chatslibreschambery.git`
- Télécharger les librairies pour le projet
    - `composer install`
- Créer le fichier de conf
    - `touch .env`
- Copier le fichier de config existant (.env.example) dans le fichier de config nouvellement créé.
- Changer les configurations pour l'accés à la base de données.
- Lancer WAMP 
    - WAMP est correctement lancer quand l'icone carré avec un 'W' en bas à droite est verte
- Vérifier que PHP est en version 7.1.9
    - Clique gauche sur l'icone verte de WAMP en bas à droite
    - Déplacer le curseur sur PHP -> Version
    - Si la version actuel n'est pas 7.1.9 cliquer sur 7.1.9
- Créer une base de données avec le nom choisis dans la configuration dans PHPMyAdmin.
- Mettre à jour la base de données: 
    - Dans GitBash à l'endroit du projet faire la commande `php artisan migrate --seed`
- Le projet est installé et démarré vous pouvez y accéder sur `localhost/chatslibreschambery/public/` dans votre navigateur favori


 ## Mettre à jour le projet:

 - Récupérer les derniers changement
    - `git pull` dans le projet
- Mettre à jour les dépendances ( librairies )
    - `composer install`
- Mettre à jour la base de donnée
    - `php artisan migrate:fresh --seed` 
    - /!\ Cette commande supprime actuellement toute les données dans la base /!\

## Faire un commit

- Modifier du code
- Voir l'ensemble des fichiers modifiés
    - `git status`
    - Les fichiers en rouge sont les fichiers non 'commiter'
    - Les fichier en vert sont les fichiers 'commiter'
- Ajouter un fichier a 'commiter'
    - `git add nom_de_mon_fichier`
- Vérifier que le fichier est bien a 'commiter'
    - `git status`
    - Le fichier est en vert
- Ajouter ainsi de suite tout les fichiers qui doivent être commité 
    - Ne pas commité .env.example si vous l'avez supprimé
- Une fois tout les fichiers souhaités en vert, donner un nom CLAIR et consis à ce commit
    - `git commit -m'nom clair de mon commit'`
- Envoyer le commit à Github
    - `git push`

 ## Ajouter une fonctionnalité:

### Créer une nouvelle branche :
 - Sur la branch Master : `git pull`
 - Créer une nouvelle branche :
    - `git checkout -b ma_nouvelle_branche`
    - -b comme bouvelle branche
- Faire son code ...
### Ramener la fonctionalité sur le master :
- Se déplacer sur master 
    - `git checkout master`
- Récupérer les derniers changements 
    - `git pull`
- Se déplacer sur ma_nouvelle_branche
    - `git checkout ma_nouvelle_branche`
- Ramener le nouveau code de master dans ma branche
    - `git merge master`
    - /!\ Attention aux conflits !!! /!\
- Verifier que tout marche
- Se déplacer sur master 
    - `git checkout master`
- Récupérer les derniers changements 
    - `git pull`
    - Si aucun changement ramener ma branche sur master
    - `git merge ma_nouvelle_branche`
    - Il ne doit pas y avoir de conflit
- Vérifier que tout marche
- Envoyer le code sur Github
    - `git push`
