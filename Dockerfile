FROM php:7.1-fpm

MAINTAINER Elena Roman <roman.elena19@gmail.com>

RUN apt-get update
RUN apt-get install -y autoconf pkg-config libssl-dev git unzip
RUN docker-php-ext-install bcmath

# ZIP
RUN apt-get install -y \
    zlib1g-dev \
    libzip-dev
RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-install zip

# copy local files into container, set working directory and user
RUN mkdir -p /home/php/app
WORKDIR /home/php/app
COPY . /home/php/app

# Composer
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN php composer.phar install

CMD php index.php
