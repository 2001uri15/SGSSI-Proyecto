FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli
# Crear un directorio para logs de PHP
RUN mkdir -p /var/log/php && \
    chmod 777 /var/log/php

# Incluir un archivo de configuración personalizado
COPY config/custom.ini /usr/local/etc/php/conf.d/custom.ini
