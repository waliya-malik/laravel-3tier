FROM php:8.4-fpm
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y git unzip libzip-dev libpng-dev libonig-dev libxml2-dev && docker-php-ext-install pdo_mysql mbstring bcmath exif pcntl zip && rm -rf /var/lib/apt/lists/*
COPY . .
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction
RUN chown -R www-data:www-data storage bootstrap/cache
EXPOSE 9000
CMD ["php-fpm"]
