# Application de Gestion de Jeux Vidéos

Cette application web vous permet de gérer une collection de jeux vidéos. Elle offre des fonctionnalités pour créer, afficher, mettre à jour et supprimer des jeux vidéos, tout en offrant une interface utilisateur conviviale.

## Introduction

L'application a été développée pour aider les passionnés de jeux vidéos à organiser leur collection et à garder une trace des jeux qu'ils possèdent, ainsi que de leurs évaluations personnelles.

## Structure de l'Application

L'application suit une architecture client-serveur basique, avec une séparation claire entre le BackOfficeServer, qui gère la logique métier de l'application, et le DatabaseServer, qui stocke les données des jeux vidéos.

### Composants

- **BackOfficeServer** : C'est le cœur de l'application où la logique métier est implémentée. Il traite les requêtes des utilisateurs, effectue des opérations sur la base de données et retourne des réponses appropriées.
  
- **DatabaseServer** : Il s'agit de la base de données qui stocke les informations sur les jeux vidéos, y compris leur titre, image, maison d'édition, évaluation et date d'évaluation.

## Fonctionnalités

L'application offre les fonctionnalités suivantes :

- **CRUD (Create, Read, Update, Delete)** :
  - Créer un Jeu Vidéo : Les utilisateurs peuvent ajouter de nouveaux jeux vidéos à leur collection en spécifiant les détails tels que le titre, l'image, la maison d'édition, l'évaluation et la date d'évaluation.
  - Afficher la Liste des Jeux Vidéos : Une liste complète de tous les jeux vidéos de la collection est affichée sur la page d'accueil, permettant aux utilisateurs de parcourir facilement leur collection.
  - Afficher les Détails d'un Jeu Vidéo : Les utilisateurs peuvent consulter les détails spécifiques d'un jeu vidéo en cliquant sur son titre dans la liste. Cela inclut toutes les informations stockées sur ce jeu, y compris son évaluation et sa date d'évaluation.
  - Modifier un Jeu Vidéo : Les utilisateurs ont la possibilité de mettre à jour les détails d'un jeu vidéo existant, tels que son titre, son image, sa maison d'édition, son évaluation et sa date d'évaluation.
  - Supprimer un Jeu Vidéo : Si un utilisateur souhaite retirer un jeu vidéo de sa collection, il peut le faire en un clic.

- **Gestion de la Date d'Évaluation** :
  - La date d'évaluation est automatiquement enregistrée lors de la création ou de la mise à jour d'un jeu vidéo, facilitant ainsi le suivi de l'évolution des évaluations au fil du temps.

## Structure du Code

L'application est développée en PHP et utilise une base de données MySQL pour stocker les informations sur les jeux vidéos. Voici la structure générale du code :

- **db.php** : Ce fichier contient les informations de connexion à la base de données et établit la connexion dans tous les fichiers PHP.
  
- **.env** : Il s'agit d'un fichier de configuration contenant des variables sensibles telles que les identifiants de connexion à la base de données. Ce fichier n'est pas inclus dans le dépôt Git pour des raisons de sécurité.

- **index.php, show.php, edit.php, create.php** : Ces fichiers PHP correspondent aux différentes fonctionnalités de l'application, telles que la liste des jeux vidéos, l'affichage des détails d'un jeu vidéo, la modification d'un jeu vidéo existant et la création d'un nouveau jeu vidéo.

- **styles.css** : Ce fichier contient les styles CSS utilisés pour la mise en forme de l'interface utilisateur.

## Installation et Configuration

Pour installer et exécuter l'application sur votre propre serveur, suivez ces étapes :

1. Clonez ce dépôt sur votre machine locale.
  
2. Configurez votre serveur web local (par exemple, Apache, Nginx) pour exécuter des scripts PHP.

3. Créez une base de données MySQL et importez le fichier de schéma de base de données fourni.

4. Créez un fichier .env à la racine du projet et ajoutez les informations de connexion à votre base de données.

5. Lancez votre serveur web local et accédez à l'application via votre navigateur web en ouvrant index.php.

## Contributeurs

- [Votre Nom] : Développeur principal
