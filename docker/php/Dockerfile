FROM php:7.4.0alpha2-cli-alpine3.9

RUN apk add bash
RUN apk add composer
RUN apk add --no-cache $PHPIZE_DEPS \
    && apk add zlib-dev \
    && pecl install grpc \
    && docker-php-ext-enable grpc

WORKDIR /var/www/beer-menu
