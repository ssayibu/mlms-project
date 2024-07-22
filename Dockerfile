# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Install MySQLi extension for PHP
RUN docker-php-ext-install mysqli

# Copy the application files into the container
COPY . /var/www/html/

# Grant write permissions to the web server
RUN chown -R www-data:www-data /var/www/html
