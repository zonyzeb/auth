#!/bin/bash

cd /var/www

rm -rf storage/ 
mkdir -p storage/framework && cd storage/framework && mkdir -p sessions views cache && cd ../../ 
chmod -R 755 storage 
cp .env.example .env 
composer install
php artisan migrate
php artisan key:generate
php artisan passport:install

php-fpm
