# BurkoLogic 
## Előkövetelmények
### A weboldal használatához egy adatbázis létrehozása szükséges
~~~~sql
CREATE DATABASE burkologic
~~~~
### A weboldal használatához (az adatbázis random elemekkel való feltöltésével) a következő kódok lefuttatása szükséges
```sh
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
php artisan db:seed --class=ProductsSeeder
php artisan db:seed --class=CitiesSeeder
php artisan db:seed --class=AdminSeeder
```
