	# Prva faza: Build aplikacije
FROM composer:2.1 as build
WORKDIR /var/www
COPY . .
RUN composer install --ignore-platform-reqs

# Druga faza: Kreirajte sliku sa potrebnim fajlovima
FROM php:8.2.0-apache
WORKDIR /var/www
COPY --from=build /var/www .
RUN chown -R www-data:www-data /var/www

# Instalacija Apache servera i postavka ServerName i DocumentRoot
RUN apt-get update \
    && apt-get install -y apache2 \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && sed -i 's|/var/www/html|/var/www/public|' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's|/var/www/html|/var/www/public|' /etc/apache2/sites-available/default-ssl.conf \
    && echo "ServerName localhost" >> /etc/apache2/conf-available/servername.conf \
    && a2enconf servername \
    && a2enmod rewrite \
    && a2enmod vhost_alias \
    && echo "DocumentRoot /var/www/public" > /etc/apache2/sites-available/000-default.conf \
    && echo "DocumentRoot /var/www/public" > /etc/apache2/sites-available/default-ssl.conf \
    && service apache2 restart

# Expose port i start Apache
EXPOSE 80
CMD ["apache2-foreground"]

