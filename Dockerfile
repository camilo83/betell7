# Usa la imagen oficial de PHP con Apache
FROM php:7.4-apache

# Configura la variable de entorno que permite la reescritura de URLs
RUN a2enmod rewrite

# Copia el contenido del proyecto a la carpeta del servidor web
COPY . /var/www/html/

# Instala las extensiones de PHP necesarias para WordPress
RUN docker-php-ext-install mysqli

# Asigna los permisos correctos para los archivos y carpetas
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80
EXPOSE 80

# Inicia el servidor Apache
CMD ["apache2-foreground"]
