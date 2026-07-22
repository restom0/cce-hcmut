# Laravel 10 requires PHP ^8.1; 8.2 matches what package-projects.yml lints with.
FROM php:8.2-apache

# pdo_mysql is the database driver, gd backs the image uploads in the admin
# panel, and zip/bcmath are what composer and Laravel expect to find.
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      libzip-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev unzip \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j"$(nproc)" pdo_mysql zip gd bcmath \
 && a2enmod rewrite \
 && rm -rf /var/lib/apt/lists/*

# Laravel serves from public/, not the image's default document root.
RUN sed -ri 's!DocumentRoot /var/www/html!DocumentRoot /var/www/html/public!' \
      /etc/apache2/sites-available/000-default.conf \
 && printf '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' > /etc/apache2/conf-available/laravel.conf \
 && a2enconf laravel

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html

# Dependencies in their own layer so editing app code does not rebuild vendor/.
# --no-scripts because Laravel's post-install hooks boot the app, which needs a
# database this stage does not have.
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

# Copy only what the application needs. A blanket "COPY . ." would pull in
# whatever happens to be in the build context, including files added after
# .dockerignore was last reviewed.
COPY app ./app
COPY bootstrap ./bootstrap
COPY config ./config
COPY database ./database
COPY public ./public
COPY resources ./resources
COPY routes ./routes
COPY storage ./storage
COPY artisan ./artisan
RUN composer dump-autoload --optimize --no-dev \
 && chown -R www-data:www-data storage bootstrap/cache

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
