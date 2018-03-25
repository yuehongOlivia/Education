# Configuration projet :


# Créer base de données sql : 

education


# Installer dépendances :

$ composer install


# Modifier si besoin dans app/config/parameters.yml :

database_name: education
database_user: <votre user ou root par défaut>
database_password: <votre mot de passe mysql ou phpmyadmin...>


# Mettre à jour base de données :

$ php bin/console doctrine:schema:update --dump-sql
$ php bin/console doctrine:schema:update --force


# Commande à effectuer pour lancer le projet :

$ php bin/console cache:clear
$ php bin/console server:run