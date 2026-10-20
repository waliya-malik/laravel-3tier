FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git sqlite3 libsqlite3-dev \
    && docker-php-ext-install zip pdo pdo_sqlite \
    && a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN cp -n .env.example .env || true \
    && touch database/database.sqlite \
    && chmod -R 777 storage bootstrap/cache database \
    && composer install --no-dev --optimize-autoloader || true \
    && php artisan key:generate --force || true \
    && php artisan migrate --force || true \
    && chown -R www-data:www-data /var/www/html

RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
CMD ["apache2-foreground"]
