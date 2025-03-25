FROM dunglas/frankenphp:latest

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql pcntl intl \
    && apt-get clean

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

COPY . .

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD php artisan octane:start --server=frankenphp --host=0.0.0.0 --port=8080