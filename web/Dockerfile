FROM php:7.4.2-apache
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev libonig-dev openssl zip unzip git nodejs npm vim nano && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install mbstring gd iconv pdo pdo_pgsql pgsql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN a2enmod rewrite && service apache2 restart
