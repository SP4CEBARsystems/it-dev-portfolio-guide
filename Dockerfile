FROM php:8.2-apache

# Set working directory and copy project files
WORKDIR /var/www/html
COPY . /var/www/html

# Enable Apache mod_rewrite and replace default site config with a Laravel-friendly one
RUN a2enmod rewrite
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl libzip-dev libonig-dev libxml2-dev npm

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip xml

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set environment and generate key
RUN cp .env.example .env && php artisan key:generate

# Install and build frontend assets
RUN npm install && npm run build

# Set permissions for storage and cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 80
EXPOSE 80

# Migrate database and start Apache
CMD ["sh", "-c", "php artisan migrate --force && apache2-foreground"]
