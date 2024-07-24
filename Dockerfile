FROM php:7.4-fpm

# Set non-interactive mode for apt-get
ENV DEBIAN_FRONTEND=noninteractive

# Update package list and install necessary packages
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y --no-install-recommends \
    nginx \
    && apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copy Nginx configuration file
COPY default.conf /etc/nginx/conf.d/default.conf

# Create a directory for Nginx logs
RUN mkdir -p /var/log/nginx

# Copy application code
COPY . /var/www/html

# Expose port 80
EXPOSE 80

# Start both PHP-FPM and Nginx
CMD ["sh", "-c", "php-fpm7.4 -D && nginx -g 'daemon off;'"]
