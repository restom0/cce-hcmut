# Plain PHP, no framework. 8.2 matches what package-projects.yml lints with.
FROM php:8.2-apache

# The models talk to MySQL through mysqli; gd backs the image handling in the
# upload exercises.
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j"$(nproc)" mysqli gd \
 && rm -rf /var/lib/apt/lists/*

# index.php sits at the tree root, so the default document root is correct.
WORKDIR /var/www/html
# Explicit allowlist rather than "COPY . ." so nothing new in the build
# context is shipped by accident. ban_hoa is the second application and is
# served from /ban_hoa/, so it belongs in the image.
COPY Controllers ./Controllers
COPY Models ./Models
COPY System ./System
COPY Views ./Views
COPY Css ./Css
COPY hinh_anh ./hinh_anh
COPY ban_hoa ./ban_hoa
COPY index.php layout.php dangnhap.php gioithieu.php thanhtoan.php ./
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
