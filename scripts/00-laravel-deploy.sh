#!/usr/bin/env bash

# Vai nella cartella dell'app Laravel
cd /var/www/html

# Installa le dipendenze PHP senza dev
composer install --no-dev --optimize-autoloader

# Migrazioni DB forzate
php artisan migrate --force

# Cache della configurazione
php artisan config:cache

php artisan db:seed --force