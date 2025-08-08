# Build stage: install PHP dependencies with Composer
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction

# Production image
FROM php:8.2-fpm-alpine

# Install required system packages and PHP extensions
RUN apk add --no-cache \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    curl \
    git \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring zip intl

WORKDIR /var/www/html

# Copy application source and vendor libraries
COPY --from=vendor /app/vendor /var/www/html/vendor
COPY . /var/www/html

# Expose port for PHP-FPM
EXPOSE 8000

CMD ["php-fpm"]
