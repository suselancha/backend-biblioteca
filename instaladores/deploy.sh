#!/bin/bash

# Replace these variables with your actual values
REMOTE_USER="root"
REMOTE_HOST="127.0.0.1"
REMOTE_PATH="/path/to/your/remote/project"
BRANCH="main"

# Local paths
LOCAL_PATH="$(pwd)"

# Colors for terminal output
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

echo -e "${GREEN}Deploying Laravel application...${NC}"

# Composer install and update dependencies
echo -e "${GREEN}Updating Composer dependencies...${NC}"
composer install --no-interaction --no-dev --prefer-dist

# Generate Laravel application key
php artisan key:generate

# Run database migrations and seed (if needed)
php artisan migrate --force

# Clear caches
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# SSH into the server
echo -e "${GREEN}SSH into the server...${NC}"
ssh $REMOTE_USER@$REMOTE_HOST <<EOF
    cd $REMOTE_PATH

    # Switch to the desired branch
    git checkout $BRANCH

    # Pull the latest changes
    git pull origin $BRANCH

    # Composer install and update dependencies on the server
    composer install --no-interaction --no-dev --prefer-dist

    # Run database migrations and seed (if needed)
    php artisan migrate --force

    # Clear caches on the server
    php artisan optimize:clear
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache

    # Restart the web server (e.g., Nginx or Apache)
    # Uncomment the following line if needed
    # sudo service nginx restart
    # or
    sudo service apache2 restart
EOF

echo -e "${GREEN}Deployment completed successfully.${NC}"
