#!/usr/bin/env bash
set -e

echo ">> Composer install (no dev)..."
composer install --no-dev --optimize-autoloader

echo ">> Running migrations..."
php artisan migrate --force || echo "Migrations failed (maybe first deploy or no DB changes)"

echo ">> Caching config & routes..."
php artisan config:cache
php artisan route:cache

echo ">> Laravel deploy script finished."
