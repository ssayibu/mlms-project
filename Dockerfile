# Use the official PHP CLI image as the base image
FROM php:7.4-cli

# Install necessary extensions and Apache
RUN apt-get update && apt-get install -y apache2 libapache2-mod-php7.4 && docker-php-ext-install mysqli

# Copy the application files to the web server's root directory
COPY . /var/www/html/

# Configure Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
COPY .docker/apache-config.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apachectl", "-D", "FOREGROUND"]
