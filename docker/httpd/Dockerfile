FROM php:8.0-apache

RUN apt-get -y update && apt-get -y install curl zip unzip libonig-dev

# php libraries
RUN  docker-php-ext-install mbstring pdo pdo_mysql mysqli

RUN a2enmod rewrite ssl

EXPOSE 80
WORKDIR /var/www/html
COPY ./build.sh /build.sh
COPY ./000-default.conf /etc/apache2/sites-enabled/000-default.conf

ENTRYPOINT ["/build.sh"]
