# Hotel Artichaut

## Installation :

### 1. Vérifier la verison de PHP et faire un upgrate si nécessaire.
### 2. Vérifier la version de Node et faire un upgrate si nécessaire.
### 3. Verifier si composer est installé.
### 4. Faire un composer install pour installer toutes les dépendances.
### 4. Update de Node : 
#### -> curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.2/install.sh | bash
### 5. Installation de laravel : 
#### -> composer create-project laravel/laravel example-app
#### -> nvm install 16
#### -> nvm use 16
#### -> node -v
### 7. Lancer la commande suivante pour installer les extensions nécessaires au fonctionnement de laravel : 
#### -> sudo apt install openssl php-common php-curl php-json php-mbstring php-mysql php-xml php-zip

# Hotel Artichaud

## Installation 

### Requirements

# Installation d'un projet Laravel
​
1) Vérifier que php et composer soient installés :
```sh
   php --version
   composer --version
```
​
sinon pour php :
```sh
    sudo apt install php-cli php-mbstring php-xml
```
sinon pour composer :
```sh
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    sudo php composer-setup.php --filename=composer --install-dir=/usr/local/bin
```
​
refaire la vérification avec :
```sh
    php --version
    composer --version
```
2. On lance la création du projet:
```sh
   composer create-project --prefer-dist laravel/laravel NomDuProjet
```
3. On se déplace dedans :
```sh
   cd NomDuProjet
```
4. On lance php artisan pour générer un serveur de développement:
```sh
    php artisan serve
```
5. L'IDE peut renvoyer une erreure, comme quoi curl n'est pas disponible et que le require Autoload.php n'est pas accéssible.
On va donc faire une installation si nécessaire de php-curl:
```sh
    sudo apt-get install php-curl
```
puis vérifier que l'installation est OK:
```sh
    curl --version
```
et enfin, relancer composer pour installer le dossier Vendor:
```sh
    composer install
```
6. On peut relancer :
```sh
    php artisan serve
```
un 'localhost' (127.0.0.1:8000) doit se lancer.
​
7. Une fois arrivé sur la page une erreure peut se présenter en nous demandant de générer une clé API, qui sert pour s'interfacer avec laravel, il faut simplement cliquer sur "Générer la clé" puis "refresh now".
    ```

stocker des images dans laravel :
1/ faire un dossier Images dans public/storage/
2/ faire php artisan storage:link
et tester le chemin en dure à partir de storage/images/xxx.jpg
php artisan storage:link

faire un chargement de la base de données avec les datas initiales:
1/php artisan migrate:fresh
2/ php artisan db:seed --class=Sprint1

faire un controller:
php artisan storage:link

faire un model:
php artisan storage:link

faire tourner un seeder :
php artisan db:seed --class=Reviews