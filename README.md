# Google Form Like
- **Auteurs :** *Jean-Baptiste Sanchez*, *Maya Gawinowski*
- **Licence :** *MIT Licence*

Ce projet est le résultat d'un travail réalisé en 2019 par Jean-Baptiste Sanchez et Maya Gawinowski.
Le sujet a été donné en tant que Projet Web de semestre 2 dans la matière WIM (Web Internet Mobilité) dans le cadre de la formation du DUT Informatique.

## Table des matières
- Lancement de l'application
- Détails du projet
  - Fonctionnalités demandées
- Base de Données
  - Installation

## Lancement de l'application
> **Important:** Pour que le site fonctionne parfaitement il faut installer la Base de Données. Si ce n'a pas été fait il faut alors suivre les instructions du manuel dans la partie *Base de Données*

Téléchargez le dépôt, disposez le sur un serveur local ou en ligne. Depuis le serveur, dans le dépôt Git allez dans `./src/CodeIgniter-3.1.10/` pour y accéder.*

Dans `./src/CodeIgniter-3.1.10/application/config/database.php` configurez :

>Si c'est un serveur local (type WampServer, EasyPHP, Serveur WAMP/LAMP, etc):
```
'hostname' => 'localhost'
'username' => 'root',
'password' => 'root',
'database' => 'nomDeLaBDD',
```

>Sinon si c'est un serveur distant :
```
'hostname' => 'localhost ou adresse du host si ce n'est pas sur le serveur du site'
'username' => 'usernameApplicationWebBDD(PhpMyAdmin),
'password' => 'mdpDelaBDD',
'database' => 'nomDeLaBDD',
```

## Détails du projet
Le but est de permettre à des internautes de consulter et répondre à des questionnaire en ligne. Leurs créateurs peuvent visualiser les résultats des questions de leurs formulaire. Les internautes peuvent donc naturellement s’inscrire et s’authentifier pour ainsi éditer leurs propre questionnaire avec une clé public à partager

### Fonctionnalités demandées

Chaque personne, qui a un compte sur le site, peut créer un formulaire, l'activer, le périmer, voir et/ou récupérer les résultats.

Un formulaire est constitué ;
- d'un titre,
- d'une description,
- de plusieurs éléments comprenant : un label, une aide, une possibilité de réponse sous formes :
- un champ texte,
- une zone de texte,
- une liste déroulante,
- des cases à cochers,
- bouton radio,
- une date

Une fois un formulaire créé et activé, n'importe qui pourra y répondre pourvu qu'il connaisse sa clef :
http://mon/site/amoi.php?cle=f951b101989b2c3b7471710b4e78fc4dbdfa0ca6

Les réponses à un formulaire sont sauvegardées dans une base de données.

Pour les questions dont les réponses sont en nombre fini (liste déroulantes, cases à cocher, etc ...), le propriétaire du formulaire devra avoir accès à des statistiques de répartitions.

Les attendus :
- Une application fonctionnelle
- L'application devra être codée en utilisant le framework php MVC CodeIgniter.
- La base de données devra utiliser au moins un trigger.
- Un rapport (WIKI associé à votre dépot git sur dwarves) précisant l'url de l'application.
  - Le temps de travail pour la réalisation du projet.
  - La répartition des tâches dans le groupe.
  - Une section précisant les particularités de votre application.
  - Une section mettant en relation ce que vous avez développé et les notions vues dans certains cours, sous la forme d'un tableau à 2 entrées.



## Base de données
Voici le schéma de BDD réalisé avant le projet, il est disponible également depuis `./doc/Analyse/SchemaBDD(JBS-MG-Groupe1).png`:

![Schéma BDD](./doc/Analyse/SchemaBDD(JBS-MG-Groupe1).png)

>**NB:** ***Finalement la table type question n'a pas été utilisée lors du projet***

### Installation
Importez dans votre système de gestion de base de données la BDD grâce au fichier `BDD_GoogleFormLike.sql` se trouvant dans l'archive `./lib/BDD_GoogleFormLike.tar.xz`.
Une fois importé la structure de BDD sera bien installée.
