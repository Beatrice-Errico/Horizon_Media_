FROM richarvey/nginx-php-fpm:latest

# Cartella in cui lavorerà il container
WORKDIR /var/www/html

# Copia tutto il progetto dentro al container
COPY . .

# Config dell'immagine (documentate nell'immagine richarvey/nginx-php-fpm)
ENV WEBROOT=/var/www/html/public
ENV RUN_SCRIPTS=1
ENV PHP_ERRORS_STDERR=1
ENV REAL_IP_HEADER=1
ENV COMPOSER_ALLOW_SUPERUSER=1

# Valori di default (in produzione saranno sovrascritti dalle Env di Render)
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

# Rende eseguibile lo script di deploy di Laravel
RUN chmod +x ./scripts/00-laravel-deploy.sh

# Script di avvio fornito dall'immagine base (fa partire nginx + php-fpm)
CMD ["/start.sh"]
