FROM php:7.4-apache
LABEL maintainer='Jeidison Farias <jeidison.farias@gmail.com>'

ENV APACHE_DOCUMENT_ROOT=/var/www/html/src

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN addgroup --gid 1000 jeidisongroup
RUN adduser --shell /bin/bash  --disabled-password --gecos "" --force-badname --ingroup jeidisongroup jeidison
