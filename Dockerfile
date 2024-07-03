# Usa la imagen oficial de PHP con PHP-FPM
FROM php:7.4-fpm

# Instala Nginx
RUN apt-get update && apt-get install -y nginx

# Copia la configuración de Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Copia el contenido del proyecto a la carpeta del servidor web
COPY . /var/www/html

# Copia el archivo de configuración fastcgi-php.conf para revisión
RUN cp /etc/nginx/snippets/fastcgi-php.conf /var/www/html/fastcgi-php.conf

# Asigna los permisos correctos para los archivos y carpetas
RUN chown -R www-data:www-data /var/www/html

# Exponer los puertos necesarios
EXPOSE 80

# Comando para iniciar Nginx y PHP-FPM
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
