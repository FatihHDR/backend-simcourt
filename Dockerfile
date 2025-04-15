FROM dunglas/frankenphp:1.1-php8.2
# Install required PHP extensions and dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql pcntl intl zip # Add 'zip' extension

# Set the working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Copy environment file
COPY .env ./.env

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN git config --global --add safe.directory /var/www/html

# Install application dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose the application port
EXPOSE 8080

# Start the application
CMD ["php", "artisan", "octane:start", "--host=0.0.0.0", "--port=8080"]