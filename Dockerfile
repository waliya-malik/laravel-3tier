FROM php:8.4-apache

# System dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Composer copy
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Code copy
COPY . .

# ENV fix
ENV COMPOSER_ALLOW_SUPERUSER=1

# FINAL FIX: purana vendor delete karo aur fresh install karo
RUN rm -rf vendor \
    && cp -n .env.example .env || true \
    && composer install --no-interaction --prefer-dist --no-dev --no-scripts \
    && php artisan key:generate --no-interaction || true \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Apache document root to public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
CMD ["apache2-foreground"]
