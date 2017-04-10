FROM php:7.0-apache

COPY / /var/www/html

RUN apt-get update && apt-get install -y git vim libmcrypt-dev zip unzip

## RUN docker-php-ext-install mcrypt

## EXPO 80

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

## install composer

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
