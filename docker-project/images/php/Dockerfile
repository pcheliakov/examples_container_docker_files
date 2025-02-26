FROM php:8.4-fpm

RUN apt-get update && apt-get install -y curl git zip && rm -rf /var/lib/apt/lists/*

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions bz2 enchant exif ftp gd gettext imagick intl ldap memcached mysqli odbc pcntl pdo pdo_mysql pdo_pgsql soap sockets timezonedb xdebug xsl zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

USER "1000:1000"

WORKDIR /var/www/public_html

ENTRYPOINT [ "php-fpm" ]