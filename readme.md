composer create-project laravel/laravel authLaravelSimple --prefer-dist

php artisan migrate:make create_users_table

php artisan migrate

php artisan db:seed



/*for password forget*/

php artisan auth:reminders-table
php artisan migrate
