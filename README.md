# GARAGEAUTO

Projet Garage V. PARROT
Il s'agit d'un projet pour un garage fictif proposant des services automobiles ainsi que la vente de véhicules d'occasion. L'administrateur (gérant) dispose d'une interface back-end lui permettant de gérer l'ensemble du site (création d'utilisateurs/employés, publication d'annonces pour les véhicules d'occasion, gestion des demandes clients, gestion des témoignages clients, etc.). Les employés ont également accès au back-end, mais avec des autorisations restreintes.

Voici le lien du site déployé : https://parrotgarage.site/

Pour vous connecter en tant que SUPER_ADMIN, cliquez sur le bouton "connexion pro" en haut à droite de la top-bar. L'identifiant du patron est "v.parrot@gmail.com et le mot de passe est "Toulouse31!". Une fois connecté, vous aurez accès au bouton "espace pro" en haut à droite qui vous amènera à l'interface administrateur qui permet au gérant d'actualiser son site et aux employés également mais avec un accès limité.

Cloner le projet :
Pour cloner le projet, exécutez la commande suivante :

(https://github.com/krismos64/GarageAuto.git)git clone

Prérequis :
PHP 8.2 ou version supérieure

MySQL ou un autre serveur de base de données compatible avec Symfony, je recommande PhpMyAdmin

Un serveur Web (par exemple Apache ou Nginx), je recommande Xampp

Composer (gestionnaire de dépendances PHP)

Etapes :
Accédez au répertoire du projet :

~ cd GarageAuto
Installez les dépendances requises en utilisant Composer :

~ composer install
~ composer require webapp
Modifier le fichier .env à la racine du projet:

Ouvrez le fichier '.env' et ajoutez les valeurs des variables d'environnement suivant votre configuration locale :

    DATABASE_URL="mysql://nom_utilisateur:mot_de_passe@127.0.0.1:port/nom_du_projet?serverVersion=8&charset=utf8mb4"

Créez la base de données en exécutant la commande suivante :

~ symfony console doctrine:database:create
Créez les tables en utilisant les entités de votre application, attention vous aurez besoin de MakerBundle de Symfony pour executer ces commandes :

~ symfony console make:migration
~ symfony console doctrine:migrations:migrate
Démarrez le serveur Web interne de Symfony en exécutant la commande suivante :

~ symfony serve
Votre application Symfony est maintenant déployée et accessible à l'adresse http://127.0.0.1:8000

Pour vous connecter en tant qu'admin sur le site, il vous faudra créer un utilisateur avec un 'ROLE_ADMIN' qui pourra gérer les fonctionnalités.

Rendez-vous en base de donnée via PhpMyAdmin

Lancez la requête SQL :

~ INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES (NULL, ‘v.parrot@gmail.com', '[\"ROLE_SUPER_ADMIN\"]', 'vparrot')
Vous voilà prêt à exploiter le back-end du site, n'oubliez pas de hacher le mot de passe pour que celui-ci soit sécurisé.
