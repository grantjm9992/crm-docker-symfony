FROM php:7.4-fpm

# Instalar dependencias do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões php fundamentais
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instalar a ultima versão do composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala o instalador do Framework Laravel
RUN composer global require laravel/installer

# Instala o instalador do Framework symfony 
RUN curl -sS https://get.symfony.com/cli/installer  | bash
RUN cp /root/.symfony/bin/symfony /usr/local/bin

WORKDIR /var/www

# Atualiza as permissões para funcionar bem com o Nginx
RUN chown -R 33:33 /var/www

EXPOSE 9000
