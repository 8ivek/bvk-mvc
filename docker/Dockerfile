FROM php:8.0-apache
LABEL maintainer="Bivek Joshi <bivek_j@yahoo.com>"

COPY ./docker/conf/server.crt /etc/apache2/ssl/server.crt
COPY ./docker/conf/server.key /etc/apache2/ssl/server.key
COPY ./docker/conf/dev.conf /etc/apache2/sites-enabled/dev.conf

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql zip mbstring exif pcntl
RUN docker-php-ext-enable mysqli

# install xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# enable rewrite, ssl and restart apache2
RUN a2enmod rewrite
RUN a2enmod ssl
RUN service apache2 restart

# Change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data \
    && groupmod -g 1000 www-data