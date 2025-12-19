# Gestion de Tâches – Application Laravel

## Présentation du projet

Ce projet est une **application simple de gestion de tâches**, développée avec Laravel dans le cadre d’un **test technique**.

## Fonctionnalités

L’application permet de :

* **Lister les tâches** : affichage de toutes les tâches avec leurs infos principales (titre, description, statut, dates)
* **Créer une tâche** : via un formulaire simple avec titre, description et statut
* **Marquer une tâche comme terminée** : action rapide depuis la liste
* **Supprimer une tâche** : suppression avec confirmation

Chaque tâche contient :

* Un titre (**obligatoire**)
* Une description (optionnelle)
* Un statut : à faire, en cours, terminée
* Une date de création
* Une date de dernière modification


## Installation du projet

### Prérequis

* PHP >= 8.1
* Composer
* SQLite (ou MySQL / PostgreSQL)

### Étapes

1. **Récupérer le projet**

   Cloner ou télécharger le dépôt.

2. **Installer les dépendances**


composer install


3. **Configuration de l’application**

Copier le fichier .env.example en .env


Générer la clé de l’application => php artisan key:generate


4. **Base de données**

Le projet utilise **SQLite** pour simplifier l’installation.

Dans le fichier .env :

Créer le fichier de base de données => touch database/database.sqlite


5. **Lancer les migrations**

php artisan migrate

6. **Démarrer le serveur**

php artisan serve

## Choix techniques

### Stack utilisée

* **Laravel 10** : framework PHP moderne et structuré
* **PHP 8.1+**
* **SQLite** : rapide a mettre en place, sans serveur

### Front-end

* **Blade** : moteur de template natif Laravel
* **Bootstrap 5** : mise en page simple et responsive
* **Bootstrap Icons** : pour améliorer un peu l’UX

## Améliorations possibles

* Authentification (login / register)
* Filtrage des taches par statuts
* Mode sombre
* API REST pour une app mobile

## Auteur

**Augsutin AGBOTON(Apprenti Développeur)**.
