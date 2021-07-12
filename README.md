# BurkoLogic 
## Előkövetelmények
### A weboldal használatához egy adatbázis létrehozása szükséges
~~~~sql
CREATE DATABASE burkologic
~~~~
### A weboldal használatához a következő kódok lefuttatása szükséges
```sh
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
