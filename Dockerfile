FROM php:7.3-cli

RUN apt-get update \
    && apt-get -y upgrade \
    && pecl install xdebug-2.7.2 \
    && docker-php-ext-enable xdebug
