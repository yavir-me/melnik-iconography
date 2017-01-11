# install via composer 
curl -sS https://getcomposer.org/installer | php
php composer install

# retrieve configuration file from example
mv .env.example .env

# set up settings to your db in .env file

# generating a new application key
php artisan key:generate

# run migrations and make seeding
php artisan migrate:refresh
php artisan db:seed

# Virtual hosts
<VirtualHost *:80>
	ServerName adriitest.dev
	ServerAlias www.adriitest.dev
	DocumentRoot "/Users/z0uR/Sites/adriitest/public/"
</VirtualHost>

# Adding host to the hosts file
127.0.0.1 adriitest.dev

# mail and db configurations lie in .env file in directory root
