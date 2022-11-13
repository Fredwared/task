#!/bin/bash

authComposeFile=`pwd`"/auth/docker-compose.yml"
medicineComposeFile=`pwd`"/medicine/docker-compose.yml"

docker-compose -f $authComposeFile down
docker-compose -f $medicineComposeFile down

docker-compose -f $authComposeFile build
docker-compose -f $medicineComposeFile build

# Run auth service
docker-compose -f $authComposeFile up -d

# Execute basic configuration for Auth
docker exec -it auth_app sh -c "chmod -R 777 /var/www/storage"
docker exec -it auth_app sh -c "cp /var/www/.env.example /var/www/.env"
docker exec -it auth_app sh -c "php /var/www/artisan cache:clear"
docker exec -it auth_app php /usr/local/bin/composer install
docker exec -it auth_app php /var/www/artisan optimize
docker exec -it auth_app php /var/www/artisan config:clear
sleep 5
docker exec -it auth_app php /var/www/artisan migrate --force
docker exec -it auth_app php /var/www/artisan db:seed
docker exec -it auth_app sh -c "php /var/www/artisan route:clear"

# Run auth service
docker-compose -f $medicineComposeFile up -d

# Execute basic configuration for Medicine
docker exec -it medicine_app sh -c "chmod -R 777 /var/www/storage"
docker exec -it medicine_app sh -c "cp /var/www/.env.example /var/www/.env"
docker exec -it medicine_app sh -c "php /var/www/artisan cache:clear"
docker exec -it medicine_app php /usr/local/bin/composer install
docker exec -it medicine_app php /var/www/artisan optimize
docker exec -it medicine_app php /var/www/artisan config:clear
sleep 5
docker exec -it medicine_app php /var/www/artisan migrate --force
docker exec -it medicine_app php /var/www/artisan db:seed
docker exec -it medicine_app sh -c "php /var/www/artisan route:clear"
