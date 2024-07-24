# Use the official PHP CLI image as the base image
FROM php:7.4-cli

# Set non-interactive mode for apt-get
ENV DEBIAN_FRONTEND=noninteractive

# Update package list and install necessary packages
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y --no-install-recommends \
    apache2 \
    libapache2-mod-php \
    && apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install mysqli

# Copy the application files to the web server's root directory
COPY . /var/www/html/

# Configure Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
COPY .docker/apache-config.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache mods
RUN a2enmod php7.4

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
