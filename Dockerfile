# Utilisation de PHP 8.4-FPM comme base
FROM php:8.4-fpm

# Installation des dépendances système et des extensions PHP
RUN apt-get update && apt-get install -y --no-install-recommends \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip exif gd \
    && docker-php-ext-enable pdo_mysql gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuration PHP optimisée pour la production
RUN echo "memory_limit = -1" > /usr/local/etc/php/conf.d/docker-php-ram-limit.ini \
    && echo "error_reporting = E_ALL & ~E_DEPRECATED & ~E_NOTICE" > /usr/local/etc/php/conf.d/error_reporting.ini \
    && echo "display_errors = Off" > /usr/local/etc/php/conf.d/display_errors.ini \
    && echo "short_open_tag = Off" > /usr/local/etc/php/conf.d/disable_short_tags.ini \
    && echo "date.timezone = Europe/Paris" > /usr/local/etc/php/conf.d/date_timezone.ini

# Création d'un utilisateur non root pour exécuter PHP-FPM
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copie de tout le projet AVANT l'installation de Composer
COPY --chown=www:www . /var/www/html

# Définition du répertoire de travail
WORKDIR /var/www/html

# Passage à l'utilisateur non root
USER www

# Installation des dépendances Composer en mode production
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader


# Exposition du port PHP-FPM
EXPOSE 9000

# Healthcheck pour surveiller l'état de PHP-FPM
HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
  CMD php-fpm --test || exit 1

# Lancement du service PHP-FPM
ENTRYPOINT ["php-fpm"]
