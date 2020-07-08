FROM php:5.6-apache

COPY php.ini-production /usr/local/etc/php/
COPY php.ini-development /usr/local/etc/php/

#COPY apache-conf /etc/apache2/sites-enabled

RUN apt-get update

RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        freetds-common \
        freetds-bin \
        freetds-dev \
        unixodbc \
        git \
	vim


RUN ln -s /usr/lib/x86_64-linux-gnu/libsybdb.a /usr/lib/libsybdb.a \
    && ln -s /usr/lib/x86_64-linux-gnu/libsybdb.so /usr/lib/libsybdb.so

RUN docker-php-ext-install -j$(nproc) iconv mcrypt calendar \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-configure sybase_ct --with-sybase-ct=/usr \
    && docker-php-ext-install -j "$(nproc)" sybase_ct pdo_dblib

RUN docker-php-ext-install zip

RUN docker-php-ext-install pdo_mysql

RUN docker-php-ext-install mysqli








# dependencias do wkhtmltopdf
RUN apt-get install -y libxrender1 \
        fontconfig \
        libxext6 \
        libssl1.0-dev



# dependencias do memcached
#RUN apt-get install -y libz-dev \
 #       libmemcached-dev
#RUN pecl install memcached-2.2.0
#RUN yes|CFLAGS="-fgnu89-inline" pecl install memcache-3.0.8
#RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini
#RUN echo extension=memcache.so >> /usr/local/etc/php/conf.d/memcache.ini

#RUN apt-get install -y memcached
#RUN service memcached start
