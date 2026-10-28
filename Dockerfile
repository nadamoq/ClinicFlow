FROM php:8.4-cli

RUN apt-get update && apt-get install -y git unzip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=ghcr.io/mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions pdo_mysql pdo_pgsql zip gd bcmath intl exif opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

COPY . .
RUN composer dump-autoload --optimize --no-dev \
    && mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

CMD ["sh", "-c", "php artisan migrate --force && (php artisan storage:link || true) && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
