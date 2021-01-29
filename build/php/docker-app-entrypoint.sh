#!/bin/bash

cd /var/www
php artisan migrate
php artisan key:generate
php artisan passport:install

php-fpm
