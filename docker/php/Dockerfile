FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    wget \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y libicu-dev \
	&& docker-php-ext-configure intl \
	&& docker-php-ext-install intl

RUN apt-get update && apt-get install -y \
	libzip-dev

RUN docker-php-ext-install zip

RUN docker-php-ext-install mysqli

RUN a2enmod rewrite && a2enmod ssl && a2enmod headers

RUN docker-php-ext-install pdo pdo_mysql


RUN wget https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64
RUN chmod +x mhsendmail_linux_amd64
RUN mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail

RUN echo 'sendmail_path = "/usr/local/bin/mhsendmail --smtp-addr=mailcatcher:1025"' > /usr/local/etc/php/conf.d/docker-php-ext-mailhog.ini
