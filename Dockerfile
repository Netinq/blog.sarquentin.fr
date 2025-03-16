ARG PHP_VERSION=8.3

FROM php:${PHP_VERSION}-cli as base

ARG USER=www
ARG UID=1000
ARG GID=1000

# Installation des dépendances système et des extensions PHP
RUN apt-get update && apt-get install -y libpng-dev libjpeg62-turbo-dev \
    libfreetype6-dev locales zip git curl libonig-dev libzip-dev unzip libicu-dev  \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip exif gd intl bcmath pcntl \
    && pecl install swoole \
    && docker-php-ext-enable swoole \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuration PHP optimisée pour la production
RUN echo "memory_limit = -1" > /usr/local/etc/php/conf.d/docker-php-ram-limit.ini \
    && echo "error_reporting = E_ALL & ~E_DEPRECATED & ~E_NOTICE" > /usr/local/etc/php/conf.d/error_reporting.ini \
    && echo "display_errors = Off" > /usr/local/etc/php/conf.d/display_errors.ini \
    && echo "short_open_tag = Off" > /usr/local/etc/php/conf.d/disable_short_tags.ini \
    && echo "date.timezone = Europe/Paris" > /usr/local/etc/php/conf.d/date_timezone.ini

RUN groupadd -g ${GID} ${USER}
RUN useradd -u ${UID} -ms /bin/bash -g ${USER} ${USER}

WORKDIR /var/www/html

FROM base AS production
USER root

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie et installation des dépendances Composer (en mode prod)
COPY --chown=${USER}:${USER} . /var/www
WORKDIR /var/www

RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader

# Préparation de Laravel
USER ${USER}
RUN php artisan optimize && \
    php artisan storage:link

# Exposition du port
EXPOSE 8000

# Lancement du service
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000", "--workers=2"]
