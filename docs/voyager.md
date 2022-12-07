# How to implement Voyager


## Dependency

To start, install voyager dependency.

    composer install

## Migration

If using Sqlite file, you'll have to modify your vendor/tcg/migrations/2017_11_26_013050_add_user_role_relationship.php
You need to comment from line 29 to 31.
> **Note:** Sqlite language doesn't allow Laravels dropForeign method.

Next, you need to reset your database (changes made to different tables)

    php artisan migrate:reset


Then run the migrations

    php artisan migrate

> **Note:** First it will play your migrations, then the migration from Voyager in vendor/tcg/migrations


## Seeder

Play the sprint1 seeder

    php artisan db:seed --class=Sprint1

And also seed Voyager newly made tables

    php artisan db:seed --class=VoyagerDatabaseSeeder


> **Note:** Make sure APP_URL=http://127.0.0.1:8000 in your .env, or images won't work

