FROM php:8.4-cli AS builder

WORKDIR /app

COPY . .

FROM php:8.4-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite if needed
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy built files from builder
COPY --from=builder /app /var/www/html

# Set permissions (if needed)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]