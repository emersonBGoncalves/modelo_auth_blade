FROM php:8.3-cli

# Instala dependências básicas e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    curl git unzip libpq-dev libzip-dev zip libonig-dev libpng-dev \
    && docker-php-ext-install pdo pdo_pgsql zip mbstring exif pcntl bcmath gd

# Instala composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

WORKDIR /var/www/html

COPY . .

# NÃO roda composer install no build

CMD ["php-fpm"]
