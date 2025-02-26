#
# Директория web/Dockerfile
#

FROM php:8.4-apache

RUN apt update && apt install -y mc cron zip unzip libxml2-dev libjpeg62-turbo-dev libpng-dev libfreetype6-dev libonig-dev

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions bz2 enchant exif ftp gd gettext imagick intl ldap memcached mysqli odbc opcache pcntl pdo pdo_mysql pdo_pgsql soap sockets timezonedb xsl xml zip

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir /var/www/system_dir

COPY mail.php /var/www/system_dir

COPY php.ini /usr/local/etc/php/conf.d/

COPY sites.conf /etc/apache2/sites-available/000-default.conf

RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load

COPY opcache.ini /usr/local/etc/php/conf.d/