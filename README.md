## About TP Log2

Ceci est un projet laravel concu dans le cadre d'un text d'embauche pour un stage 
## Installation et Utilisation de TP Log2

#### 1-Telecharger le projet depuis gitHub
#### 2-Creer une base de donner
#### 3-Renommer le fichier .env.example en .env
#### 4-Modifier les informations suivant du fichier .env par les informations approprier
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=Nom_de_la_base_de_donnees
- DB_USERNAME=Username_de_la_base_de_donnees
- DB_PASSWORD=Mot_de_passe_de_la_base_de_donnes
#### 5-Ouvrer Le projet dans un terminale et execute les commandes suivantes
- composer install
- php artisan key:generate
- php artisan migrate --seed
- php artisan serve
#### 6-Acceder a la page d'authentification avec adresse [127.0.0.1:8000](http://127.0.0.1:8000).
#### 7-Authentifier vous avec les informations suivantes
- Login : admin@admin.com
- Mot de passe : admin
