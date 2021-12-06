FROM php:7.4-apache

# Install lib
RUN apt-get update \
    && apt-get install -y default-mysql-client libmcrypt-dev libxml2-dev \
    && apt-get install -y zlib1g-dev libzip-dev zip unzip wget \
    && docker-php-ext-install pdo pdo_mysql mysqli soap intl zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN a2enmod rewrite

# Install node & yarn
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - && apt-get install -y nodejs npm \
&& curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
&& echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
&& apt-get update -qq && apt-get install -y yarn

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin/ --filename=composer

EXPOSE 80