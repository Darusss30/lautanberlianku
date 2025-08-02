#!/bin/bash

echo "=== Hostinger PHP 8.1 Deployment Script ==="
echo "This script applies the PHP 8.1 compatibility fixes"
echo ""

# Check PHP version
echo "Current PHP version:"
php -v
echo ""

# Install/Update dependencies
echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

# Clear all Laravel caches
echo "Clearing Laravel caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Set proper permissions
echo "Setting proper permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Check if .env exists
if [ ! -f .env ]; then
    echo "WARNING: .env file not found!"
    echo "Please copy .env.example to .env and configure it"
else
    echo ".env file exists"
fi

# Generate application key if needed
echo "Checking application key..."
php artisan key:generate --show

echo ""
echo "=== Deployment Complete ==="
echo "Your Laravel application should now be compatible with PHP 8.1"
echo ""
echo "Next steps:"
echo "1. Verify your .env configuration"
echo "2. Test your website"
echo "3. Check error logs if issues persist"
