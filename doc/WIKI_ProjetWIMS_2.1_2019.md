# Bienvenue sur WIKI du Projet WIMS 2.1 2019:

## Informations sur le projet :

### URL de l'application : [Notre Google Form Like](https://dwarves.iut-fbleau.fr/~sanchezj/Projet/GFormLike/CodeIgniter-3.1.10/)

### Réalisé par le binôme :
    Jean-Baptiste SANCHEZ et Maya GAWINOWSKI

### Date du rendu :
    Le projet à été réalisé en 2019 pour le 17/06/2019

### Objectif :
    L'objectif est de réalisé un Google form like en utilisant le modèle MVC et la framework CodeIgniter

### Temps de travail pour la réalisation du projet :
    Nous avons travaillé plus de 60h sur ce projet à l'IUT et chez soi.

### Répartition des tâches dans le groupe :
| Jean-Baptiste SANCHEZ              | Maya GAWINOWSKI             |
| ---------------------------------- | --------------------------- |
| Connexion / Inscription            | Mise en forme CSS           |
| Espace Utilisateur                 | Espace Public               |
| Création / Gestion de Formulaire   | Accès Formulaire Public     |
| Schéma BDD et Diagramme            | Schéma BDD et Diagramme     |
| Design et Wireframes               | Design et Wireframes        |

## Particularités de l'application :
L'application web débute par une page d’accueil accessible par tous.
Si nous sommes non-inscrits à l'application nous avons la possibilité de répondre à un formulaire à condition de connaître  la clé du formulaire.
Si l'internaute souhaite répondre au formulaire il doit donc inscrire la clé du formulaire partagée par le créateur via un champs de texte. L'internaute a aussi la possibilité de s'inscrire  à l'application afin de devenir un créateur. Il passera alors du statut public à utilisateur en souscrivant un compte utilisateur via le formulaire d'inscription accessible via un lien cliquable. Une fois inscrit l'internaute peut donc se connecter en inscrivant ses informations de compte dans le formulaire de connexion.
Il accède donc au menu principal de l’espace utilisateur, un menu déroulant en haut à gauche lui permet de se déconnecter, de retourner au menu principal de l'utilisateur, d'accéder à ses formulaires ainsi qu'à la page gérant les résultats formulaires.
Sur le menu principal de l'utilisateur, trois boutons s’offrent à lui au centre de la page. Le premier lui permet de créer un nouveau formulaire, le second est un lien pour gérer ses formulaires, c’est à dire voir la liste des formulaires dont il est l'auteur mais aussi de pouvoir périmer ou activer à guise un formulaire à travers un champs texte où il doit renseigner la clé du formulaire qu’il veut périmer. Le dernier bouton lui permet d'aller voir les résultats en inscrivant la clé formulaire dans le champs texte qui s'affiche suite au bouton.
Le menu déroulant est accessible sur toutes les pages de l'espace utilisateur excepté lors de l'édition des questions.
Si l'utilisateur décide de créer un formulaire il doit souscrire l'intitulé de celui ci et sa description. Une clé formulaire unique sera générée aléatoirement dans un champs texte juste au dessus. Une fois validée l'utilisateur a accès à l'édition des questions, il pourra le personnaliser à sa guise en renseignant par un intitulé mais aussi une aide (facultative) sa question. Ensuite il peut donner le nombre de réponses souhaitées et choisir un type de question parmi :
* un champ texte;
* une zone de texte;
* une liste déroulante;
* des cases à cocher;
* bouton radio;
* une date.
Une fois les champs principaux renseignés un bouton de mise à jour de la vue lui permet de mettre à jour l'intitulé qu’on veut, l'aide à la question, le nombre de réponses et le type de questions que l’on veut. Une fois satisfait de sa question il doit valider la question grâce au bouton "VALIDER / QUESTION SUIVANTE". Une fois la question créée l'utilisateur à la possibilité d'arrêter la création de son formulaire via "TERMINER FORMULAIRE (NE CREE  PAS CETTE QUESTION)". Comme notifié dans le bouton si on appuie dessus la question en cours de création ne sera pas soumise.


## Relation avec le cours :
| Matière | Application                                              |
| ------- | -------------------------------------------------------- |
| WIM     | HTML, CSS, JS, PHP, Modèle MVC, Framework CodeIgniter3.6 |
| APL     | Gestion de Projet GIT et Algorithmie                     |
| ASR     | Cours de Réseau avec serveur Apache                      |
| SGBD    | Schéma BDD et Gestion BDD                                |
| ACDA    | Mise en place de différents diagrammes                   |
| EC      | Ergonomie / Design                                       |


## Diagramme et schémas
Au cours de notre projet nous avons établis de multiples dessins, diagrammes et schémas voici les principaux :

### Schéma BDD
Par rapport au début du projet nous avons décidé de changer la clé primaire de la table 'Question' pour faire un couple de clés primaires des attributs numquest et cleform. Ici cleform est une foreign key. Nous avons fait ce changement c’était plus optimal et le site fonctionnait mieux en plus d’être moins coûteux en données.
Dans la table ResultatPublic on a enlevé l’id du public et le pseudo pour simplifier le stockage des données par un id_res, enfin on a ajouté l'attribut numreponse qui  intéressant pour l’analyse des résultats.
On a harmonisé certains noms de la BDD par rapport au schéma BDD de base.

![Schéma BDD](./Analyse/SchemaBDD%28JBS-MG-Groupe1%29.png)

### Diagramme Site (Possède une suite correspondant à Formulaire sur le diagramme)
![Diagramme Site](./Analyse/DiagrammeCUSite%28JBS-MG-Groupe1%29.PNG)

### Diagramme Formulaire (Précision du diagramme Site)
![Diagramme Formulaire](./Analyse/DiagrammeCUFormulaire%28JBS-MG-Groupe1%29.PNG)

### Diagramme de Séquence Public
![Diagramme de Séquence Public](./Analyse/SequenceCreation%28JBS-MG-Groupe1%29.PNG)

### Diagramme de Séquence Création
![Diagramme de Séquence Création](./Analyse/SequencePublic%28JBS-MG-Groupe1%29.PNG)
