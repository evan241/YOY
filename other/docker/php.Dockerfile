FROM php:7.4.2-apache-buster

RUN docker-php-ext-install mysqli

RUN docker-php-ext-enable mysqli

COPY apache2.conf /etc/apache2/

RUN a2enmod rewrite

RUN service apache2 restart
