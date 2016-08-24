FROM php:5.6-apache

RUN a2enmod rewrite

# install the PHP extensions we need

RUN apt-get update && apt-get install -y libpng12-dev libjpeg-dev libpq-dev curl php5-cli git \
	&& rm -rf /var/lib/apt/lists/* \
	&& docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
	&& docker-php-ext-install gd mbstring pdo pdo_mysql pdo_pgsql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV DRUSH_VERSION 7.2.0

# Install Drush using Composer.
RUN composer global require drush/drush:"$DRUSH_VERSION" --prefer-dist