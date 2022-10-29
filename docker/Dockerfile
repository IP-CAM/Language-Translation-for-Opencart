FROM php:8.1.1-apache
MAINTAINER hungnv
RUN apt-get update 
RUN apt-get install -y --no-install-recommends git zip libzip-dev
RUN set -xe
RUN apt install -y libpng-dev libjpeg-dev libwebp-dev unzip 
RUN  rm -rf /var/lib/apt/lists/* 
RUN  docker-php-ext-configure gd --with-jpeg=/usr --with-webp=/usr 
RUN  docker-php-ext-install gd mysqli pdo_mysql zip
RUN a2enmod rewrite headers
WORKDIR /var/www/html
RUN set -xe 
RUN  curl -sSL https://github.com/opencart/opencart/releases/download/4.0.1.1/opencart-4.0.1.1.zip -o opencart-4.0.1.1.zip
RUN  unzip opencart-4.0.1.1.zip 'upload/*' -d /var/www/html/ 
RUN  mv /var/www/html/upload/* /var/www/html/ 
RUN  rm -r /var/www/html/upload/ 
RUN  mv config-dist.php config.php 
RUN  mv admin/config-dist.php admin/config.php 
RUN  rm opencart-4.0.1.1.zip
RUN  chown -R www-data:www-data /var/www
