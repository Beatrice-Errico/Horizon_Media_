# Partiamo da un'immagine con PHP 8 e Nginx
FROM richarvey/nginx-php-fpm:3.1.6

# Copia tutto il progetto
COPY . /var/www/html

# Copia configurazione nginx
COPY nginx/default.conf /etc/nginx/sites-available/default

# Imposta variabili essenziali
ENV WEBROOT /var/www/html/public
ENV SKIP_COMPOSER 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV PHP_ERRORS_STDERR 1
ENV COMPOSER_ALLOW_SUPERUSER 1

# Espongo porta 80 (nginx) — Render la mapperà su $PORT
EXPOSE 80
