FROM php:5.6-apache

RUN apt-get update && apt-get install -y libpng12-dev libjpeg-dev libpq-dev curl php5-cli git vim php-soap\
	&& rm -rf /var/lib/apt/lists/* \
	&& docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
	&& docker-php-ext-install gd mbstring pdo pdo_mysql pdo_pgsql zip mysqli

RUN  cd /  && \
    git clone --depth=1 git://github.com/phalcon/cphalcon.git && \
    cd cphalcon/build && \
    ./install

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN echo "extension=phalcon.so" > /usr/local/etc/php/conf.d/phalcon.ini
RUN a2enmod rewrite

# install the PHP extensions we need


COPY php.ini /usr/local/etc/php/php.ini
RUN php-config --configure-options --enable-soap

RUN service apache2 restart
