FROM php:fpm

ENV COMPOSER_VERSION 1.2.4

RUN apt-get update && apt-get install -y git zip unzip
RUN docker-php-ext-install pdo pdo_mysql
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
		&& php composer-setup.php --filename=composer --install-dir=/usr/local/bin --version=$COMPOSER_VERSION \
		&& php -r "unlink('composer-setup.php');"
