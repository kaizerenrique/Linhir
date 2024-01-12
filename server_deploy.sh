#!/bin/sh
set -e

echo "Deploying application ..."

# Enter maintenance mode
(php artisan down --message 'La aplicación se está actualizando (¡rápidamente!). Inténtelo de nuevo en un minuto.') || true
    # Update codebase
    git fetch origin main
    git reset --hard origin/main

    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader

    # Migrate database
    #php artisan migrate --force
    #php artisan migrate --seed

    # Note: If you're using queue workers, this is the place to restart them.
    # ...

    # Clear cache
    php artisan optimize

    # Reload PHP to update opcache
    # echo "" | sudo -S service php7.4-fpm reload
# Exit maintenance mode
php artisan up

echo "Application deployed!"