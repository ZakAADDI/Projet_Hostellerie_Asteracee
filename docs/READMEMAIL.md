# Mailgun - Hostellerie de L'Astéracée

## Création d'un compte sur Mailgun :

### 1 - Mailgun :

https://www.mailgun.com/fr/

Valider l'adresse mail sur la boite mail personnelle.

### 2 - Installation de la bibliothèque HTTP Guzzle :

Mailgun a besoin de la bibliothèque HTTP Guzzle
Lancer la ligne de commande suivante.

```sh
composer require guzzlehttp/guzzle
```

### 3 - Configurer le fichier .env :

Configurer plusieurs élements de la partir MAIL.

```sh
MAIL_MAILER=mailgun
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

### 4 - Vérification du fichier config/services.php :

On vérifie simplement mailgun est bien configuré dans le fichier config/services.php.

```sh
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],
```

### 5 - Vérification du fichier config/mail.php :

On vérifie les différents drivers supportés par mailgun.

```sh
    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'auth_mode' => null,
        ],

        
        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -t -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],
    ],  
```
### 6 - Création d'une classe mail :

```sh 
php artisan make:mail TestMail
```

Un fichier era créé à ce niveau : hostellerie-asteracee/app/Mail/TestMail.php

### 7 - Création de la vue du mail:

    1. Se rendre dans le dossier : hostellerie-asteracee/resources/views

    2. Ensuite créer un dossier emails
    
    3. Se rendre dans le dossier email : hostellerie-asteracee/resources/views/email

    4. Créer un fichier testemail.blade.php pour la vue de l'email

### 8 - Adresse mail expéditrice et la vue :

Préciser l'adresse d'expédition et la vue qui lui est attachée.

Modifier la fonction ```build()``` en bas du fichier : hostellerie-asteracee/app/Mail/TestMail.php

de la manière suivante.

```sh
    public function build()
    {
        return $this->from("admin@hostellerie-asteracee")->view('emails.testemail');
    }
```

### 9 - Configuration de la route :



```sh 

```
