FROM php:7.4-apache

# Instalamos dependencias del sistema
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Habilitamos mod_rewrite
RUN a2enmod rewrite

# Copiamos el archivo de configuración virtual host
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Instalamos Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia primero los archivos de Composer para aprovechar el cache
COPY . /var/www/html/

# Establecemos el directorio de trabajo
WORKDIR /var/www/html

# Instala las dependencias del proyecto Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Permisos (puedes usar esto con cuidado según tu sistema)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache