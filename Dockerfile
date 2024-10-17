FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    libicu-dev \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd intl

# Install and enable the zip extension
RUN docker-php-ext-install zip && docker-php-ext-enable zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www
