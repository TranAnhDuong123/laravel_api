#!/bin/bash

chmod 777 -R /var/www/html/storage

echo "Starting app..."

if [[ -d "./vendor" ]]
then
    php artisan migrate
    php artisan cache:clear
else
    cp .env.example .env
    php composer update
    php artisan key:generate
    php artisan migrate
fi

/usr/sbin/apache2ctl -D FOREGROUND
