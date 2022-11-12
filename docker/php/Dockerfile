FROM php:8.0-fpm

RUN docker-php-ext-install mysqli pdo pdo_mysql

## Set working directory
WORKDIR /var/www/larav.local

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev \
    libfreetype6 \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    memcached

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Подключаем xdebug
RUN pecl install xdebug-3.1.2 && docker-php-ext-enable xdebug
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Change current user to www-data
USER www-data
#USER root

# Expose port 9000 and start php-fpm server

EXPOSE 9000

CMD ["php-fpm"]
