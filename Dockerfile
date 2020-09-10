FROM php:7.3-apache 
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apt-get update \
  && apt-get install -y libzip-dev \
  && apt-get install -y zlib1g-dev \
  && rm -rf /var/lib/apt/lists/* \
  && docker-php-ext-install zip
RUN a2enmod rewrite
