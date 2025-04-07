# Utilise l'image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip curl sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Activer mod_rewrite
RUN a2enmod rewrite

# Copier le fichier de configuration Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Copier tous les fichiers du projet
COPY . /var/www/html

# Définir les bons droits
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/database

# Exposer le port 80
EXPOSE 80

# Commande de démarrage
CMD ["apache2-foreground"]
