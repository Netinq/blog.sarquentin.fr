FROM php:8.0-fpm
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev
RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql zip exif
RUN docker-php-ext-install gd
RUN docker-php-ext-enable pdo_mysql gd
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /usr/local/etc/php/conf.d/ && \
  echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-ram-limit.ini
RUN useradd -G www-data,root -d /home/laravel laravel
RUN mkdir -p /home/laravel/.composer && \
    chown -R laravel:laravel /home/laravel
USER laravel
RUN composer install
RUN php artisan migrate
RUN php artisan db:seed
