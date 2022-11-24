FROM php:7.4-fpm-alpine
RUN apk update; apk upgrade;
RUN docker-php-ext-install pdo pdo_mysql
RUN apk add --no-cache libpng libpng-dev && docker-php-ext-install gd && apk del libpng-dev


# Install composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN alias composer='php /usr/bin/composer'