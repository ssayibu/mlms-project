FROM php:7.4-cli

# Set non-interactive mode for apt-get
ENV DEBIAN_FRONTEND=noninteractive

# Update package list and install necessary packages
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y --no-install-recommends \
    apache2 \
    && apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Configure Apache to use PHP-FPM
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libapache2-mod-fcgid \
    && apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Enable Apache mods
RUN a2enmod actions fcgid alias proxy_fcgi

# Add PHP-FPM configuration to Apache
RUN echo "AddHandler php7-script .php" >> /etc/apache2/apache2.conf && \
    echo "Action php7-script /php7-fcgi" >> /etc/apache2/apache2.conf && \
    echo "Alias /php7-fcgi /usr/lib/cgi-bin/php7-fcgi" >> /etc/apache2/apache2.conf && \
    echo "FastCgiExternalServer /usr/lib/cgi-bin/php7-fcgi -socket /var/run/php/php7.4-fpm.sock -pass-header Authorization" >> /etc/apache2/apache2.conf && \
    echo "<Directory /usr/lib/cgi-bin>" >> /etc/apache2/apache2.conf && \
    echo "    Require all granted" >> /etc/apache2/apache2.conf && \
    echo "</Directory>" >> /etc/apache2/apache2.conf

# Start PHP-FPM service
RUN service php7.4-fpm start

# Set the default command to run when starting the container
CMD ["apache2-foreground"]
