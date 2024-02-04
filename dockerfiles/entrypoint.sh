#!/bin/bash

# Change to your application directory
cd /var/www/html

# Install Composer dependencies
composer install

# Run Composer 'dev' script
composer run dev

# Install npm dependencies
npm install

# Build assets using npm
npm run build

# Start Apache
apache2-foreground
