# Utilisation de PHP 8.4-FPM comme base
FROM php:8.3-cli

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
RUN php artisan filament:optimize
RUN php artisan storage:link


# Exposition du port
EXPOSE 8000

# Lancement du service
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000", "--workers=2"]
