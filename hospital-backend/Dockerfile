# Usa una imagen oficial de PHP con FPM, versión 8.2 o superior
FROM php:8.2-fpm

# Instala las dependencias del sistema y las extensiones de PHP que Laravel necesita
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Instala las extensiones de PHP que Laravel usa para la base de datos, imágenes, etc.
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo del proyecto dentro del contenedor
WORKDIR /var/www

# Expone el puerto 9000 para que el servidor web (Nginx) se pueda conectar a la aplicación PHP
EXPOSE 9000
