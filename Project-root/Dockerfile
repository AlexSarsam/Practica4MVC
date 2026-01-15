FROM php:8.2-apache

# Instalamos la extensión necesaria para conectar con MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Habilitamos el mod_rewrite de Apache para URLs limpias
RUN a2enmod rewrite

# Configuramos el DocumentRoot de Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiamos los archivos de la aplicación
COPY . /var/www/html/

# Establecemos permisos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

WORKDIR /var/www/html