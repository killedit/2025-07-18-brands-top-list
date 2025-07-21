#!/bin/sh

until php artisan migrate --force; do
  echo "Waiting for database..."
  sleep 2
done

php artisan db:seed --force

if [ ! -L "public/storage" ]; then
    php artisan storage:link
fi

exec php-fpm
