composer create-project laravel/laravel authLaravelSimple --prefer-dist

php artisan migrate:make create_users_table

php artisan migrate

php artisan db:seed
