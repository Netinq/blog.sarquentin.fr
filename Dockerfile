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

# Création d'un utilisateur non root pour exécuter PHP-FPM
RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

# Définition du répertoire de travail
WORKDIR /var/www/html

# Copie de tout le projet AVANT l'installation de Composer
COPY --chown=www:www . /var/www/html

# Attribution des permissions pour éviter les problèmes avec PHP-FPM
RUN chmod -R 755 /var/www/html

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
