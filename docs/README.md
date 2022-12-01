<p align="center"><img src="../hostellerie-asteracee/storage/app/public/images/logoHeader.svg" width="180" alt="Logo Asteracée"></p>


# Hostellerie de L'Astéracée

## Installation du projet :

### 1 - Les images :
Créer le dossier de stockage des images pour laravel :
```sh
php artisan storage:link
```
### 2 - La base de données :
Notre projet fonctionne sur une base de données local pour le développement, il faut donc créer un fichier db.sqlite dans le dossier 
```sh
Projet_Hostellerie_Asteracee/hostellerie-asteracee/database/ 
```
### 3 - Le fichier d'environnement :
Le fichier .env doit être placé à la racine du projet 
```sh
Projet_Hostellerie_Asteracee/hostellerie-asteracee/
```
Un fichier .env.exemple est disponible pour plus de simplicité.

Il suffira de remplire 
```sh
# DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE= Url/Absolue/Du/Projet
# DB_USERNAME=
# DB_PASSWORD=
```

### 4 - Composer :

On lance composer pour installer les dépendances de l'application:
```sh
    composer install
```

### 5 - Les fichiers compilés :
Pour plus de facilité sur le versionning des fichiers, nous ne versionnons jamais le app.js et app.css.

Pour pouvoir faire fonctionner le projet, il faudra les créer avec cette commande :
```sh
npm run dev
```
### 6 - Migrations et Seeders :
Notre projet comporte déjà des données prêtes à l'utilisation.
On procedera en 2 étapes :
#### A : La migration complète :
```sh 
php artisan migrate
```
#### B : Le seeding des données :
```sh
php artisan db:seed --class="Sprint1"
```


### 7 - Le serveur de développement :
```sh
    php artisan serve
```
un 'localhost' (127.0.0.1:8000) doit se lancer.

- Erreur possible : "MISSING API KEY"

Il suffit : de générer une clé API, qui sert pour s'interfacer avec laravel, il faut simplement cliquer sur "Générer la clé" puis "refresh now".
  


