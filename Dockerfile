FROM php:8.0-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

WORKDIR /var/www/html

COPY ../Frontend/ .
COPY ../Backend/ .



EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]

