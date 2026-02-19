# Stage 1: Build environment and Composer dependencies
FROM php:8.4-fpm AS builder

RUN apt-get update && apt-get install -y --no-install-recommends \
    unzip \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install \
        pdo \
        mbstring \
        intl \
        zip \
        opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

COPY . .

RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# Stage 2: Production environment
FROM php:8.4-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    libicu72 \
    libzip4 \
    libfcgi-bin \
    procps \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=builder /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=builder /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/
COPY --from=builder /var/www /var/www

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www

USER www-data

EXPOSE 9000
CMD ["php-fpm"]
