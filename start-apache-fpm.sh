#!/bin/bash

# Start PHP-FPM
service php7.4-fpm start

# Start Apache in the foreground
apache2ctl -D FOREGROUND