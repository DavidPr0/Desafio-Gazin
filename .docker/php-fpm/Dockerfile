FROM php:7.4-fpm

# Installing packages
RUN apt-get update && apt-get upgrade -y

# Install nodejs
RUN curl -sL https://deb.nodesource.com/setup_14.x -o nodesource_setup.sh && bash nodesource_setup.sh && apt-get -y --force-yes install nodejs

# Upgrading Node
RUN npm cache clean -f
RUN npm install -g n
RUN n stable

RUN apt-get update && apt-get install -y --allow-unauthenticated \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    zlib1g-dev \
    libxml2-dev \
    graphviz \
    gnupg \
    libcurl4-openssl-dev \
    libzip-dev \
    git \
    sendmail \
    libpq-dev \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-install pgsql pdo_pgsql \
    && docker-php-ext-install tokenizer \
    && docker-php-ext-install zip \
    && docker-php-ext-install curl \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd;

RUN cd ~ \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer;

WORKDIR /usr/share/nginx/html



