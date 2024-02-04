FROM php:8.3-apache

WORKDIR /var/www/html

COPY . /var/www/html

RUN apt-get update
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install zip+icu dev libs, wget, git
RUN apt-get install \
    exif zip unzip wget git \
    libzip-dev libicu-dev libpng-dev libjpeg-dev libfreetype6-dev zlib1g-dev  -y

#Install intl (intl requires to be configured)
RUN docker-php-ext-configure intl && docker-php-ext-install intl

#Install GD with jpeg support
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

#PostgreSQL
RUN apt-get install libpq-dev -y
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo_pgsql pgsql

CMD ["apache2-foreground"]

# Enable Apache mod_rewrite
RUN a2enmod rewrite

RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

ENTRYPOINT [ "dockerfiles/entrypoint.sh" ]
