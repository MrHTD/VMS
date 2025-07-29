FROM php:8.4-cli AS builder

WORKDIR /app

COPY . .

FROM php:8.4-apache

# Install dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite if needed
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy built files from builder
COPY --from=builder /app /var/www/html

# Set permissions (if needed)
RUN chown -R www-data:www-data /var/www/html

# Optional: Custom Apache config
# COPY ./vhost.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
CMD ["apache2-foreground"]