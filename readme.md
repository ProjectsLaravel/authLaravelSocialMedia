composer create-project laravel/laravel authLaravelSimple --prefer-dist

php artisan migrate:make create_users_table

php artisan migrate

php artisan db:seed



/*for password forget*/

php artisan auth:reminders-table
php artisan migrate


/*for add images (avatar to user)*/
https://github.com/CodeSleeve/laravel-stapler#installation

"codesleeve/laravel-stapler": "1.0.*"
'Codesleeve\LaravelStapler\LaravelStaplerServiceProvider'

php artisan stapler:fasten users avatar



/*Config login social media */

composer require facebook/php-sdk
php artisan migrate:make create_profiles_table
php artisan migrate:refresh
