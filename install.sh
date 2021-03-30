# composer self-update
# composer install

php artisan mysql:createdb devtoko

#clear cache
php artisan config:cache
php artisan cache:clear
# composer dump-autoload
php artisan clear-compiled

php artisan key:generate
php artisan migrate:fresh --seed

# php artisan serve