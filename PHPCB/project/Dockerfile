# Plain PHP, no framework. 8.2 matches what package-projects.yml lints with.
FROM php:8.2-apache

# connect.php opens the database through PDO; gd backs the image handling in
# the admin pages.
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j"$(nproc)" pdo_mysql gd \
 && rm -rf /var/lib/apt/lists/*

# index.php sits at the tree root, so the default document root is correct.
WORKDIR /var/www/html
# Explicit allowlist rather than "COPY . ." so nothing new in the build
# context is shipped by accident.
COPY css ./css
COPY pluto-1.0.0 ./pluto-1.0.0
COPY connect.php header.php index.php menuleft.php template.php style.css ./
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
