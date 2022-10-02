ARG PHP_EXTENSIONS="apcu bcmath opcache pcntl pdo_mysql redis zip sockets imagick gd exif"
FROM thecodingmachine/php:8.1-v4-apache as php_base
ENV TEMPLATE_PHP_INI=production
COPY --chown=docker:docker . /var/www/html
RUN composer install --quiet --optimize-autoloader --no-dev
FROM node:10 as node_dependencies
WORKDIR /var/www/html
ENV PUPPETEER_SKIP_CHROMIUM_DOWNLOAD=false
COPY --from=php_base /var/www/html /var/www/html
FROM php_base
