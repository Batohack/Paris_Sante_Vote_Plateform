# ===== DOCKERFILE PHP + APACHE (officiel, ultra-léger, parfait pour CC) =====
FROM php:8.2-apache

# Auteur (le prof adore voir ça)
LABEL maintainer="Batohack <tonemail@edu.ch>"

# Installer les extensions PHP nécessaires (mysqli + pdo_mysql pour ton projet)
RUN docker-php-ext-install mysqli pdo_mysql && \
    docker-php-ext-enable mysqli

# Activer mod_rewrite (obligatoire pour les .htaccess ou routing propre)
RUN a2enmod rewrite

# Copier tout le code source dans /var/www/html
COPY . /var/www/html/

# Donner les bons droits (Apache tourne en www-data)
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Exposer le port 80
EXPOSE 80

# Commande par défaut (déjà définie dans l’image php:apache, mais on la remet pour la forme)
CMD ["apache2-foreground"]
