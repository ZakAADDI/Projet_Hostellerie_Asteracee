<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
<p align="center"><a href="*" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/2367px-Vue.js_Logo_2.svg.png" width="180"></a></p>
<p align="center"><a href="*" target="_blank"><img src="" width="180" alt="Logo Asteracée"></a></p>

Pour lancer notre projet :

1) Vérifier que php et composer soient installés :
```sh
   php --version
   composer --version
```
​Attention, on utilise la version php 8.x et node 16.x
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

Ensuite dans le dossier du projet : (cd /hostellerie_astreracee)
```sh
composer install
npm install
```

il faut penser à créer un fichier ".env"