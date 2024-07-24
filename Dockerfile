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

# Enable Apache mods
RUN a2enmod php7.4

# Set the default command to run when starting the container
CMD ["apache2-foreground"]
