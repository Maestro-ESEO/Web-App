# Maestro Web App

## Prérequis

PHP 7.4.33 ou une version supérieur est requise pour le bon fonctionnement du projet.
De plus, Composer 2.6.6 est également requis pour gérer les dépendances du projet.

## Installation des dépendances avec Composer

Pour installer toutes les dépendances, lancer la commande suivante à la racine du projet. Composer va alors installer toutes les dépendances décrites dans le fichier `composer.json`.
```
composer install
```

## Configuration de la base de données

Renseigner les identifiants de connexion à la base de données dans le fichier `.env`, qui contient les variables d'environnement du projet.
```
DB_CONNECTION=mysql
DB_HOST=...
DB_PORT=...
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...
```

## Migrations de la base de données

Ensuite, lancer la commande suivante pour à la fois créer les tables dans la base de données, et également les remplir avec des données permettant de tester l'application.
```
php artisan migrate:fresh --seed
```

## Lancement du serveur de développement

Finalement, pour lancer le serveur de développement, il suffit de lancer la commande suivante.
```
php artisan serve
```