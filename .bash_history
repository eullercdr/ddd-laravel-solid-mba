composer remove phpunit/phpunit
composer require pestphp/pest --dev --with-all-dependencies
./vendor/bin/pest --init
./vendor/bin/pest
composer require pestphp/pest-plugin-laravel --dev
php artisan pest:test GenerateInvoiceUseCaseTest
php artisan pest:test GenerateInvoiceUseCaseTest --unit
composer dump autoload
php artisan optimize:clear
composer update
php artisan test
php artisan test
php artisan make:model Contract -m
php artisan make:model Payment -m
exit
php artisan migrate
php artisan test
exit
php artisan test
php artisan test
php artisan migrate:refresh 
php artisan migrate:refresh 
php artisan test
php artisan test
php artisan test
php artisan test
php artisan test
php artisan test
php artisan test
php artisan test
php artisan test
exit
