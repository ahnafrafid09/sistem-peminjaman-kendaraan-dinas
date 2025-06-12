# Gunakan image PHP + Apache
FROM php:8.2-apache

# Install extensions yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project Laravel ke /var/www/html
COPY . /var/www/html

WORKDIR /var/www/html

# Install dependencies Laravel
RUN composer install --optimize-autoloader --no-dev

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Environment
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Ubah Apache config agar Laravel bisa diakses dari public/
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

# Port Laravel biasanya 80
EXPOSE 80

CMD ["apache2-foreground"]
