FROM php:8.1-fpm-alpine

RUN apk update add wget curl zip unzip nano mc

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql

RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* var/cache/apk* && set -x

COPY docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
