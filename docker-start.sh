#!/bin/bash

# Run Laravel setup tasks
php artisan migrate --force
php artisan db:seed --class=DatabaseSeeder --force
php artisan storage:link

# Start Apache
apache2-foreground
