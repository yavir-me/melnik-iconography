# install via composer 

# for unix-based operating systems
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# for windows instalation you can just go by the next reference. All the needed information you could fine there:
# https://getcomposer.org/doc/00-intro.md#installation-windows

# after installation execute the next command:
php composer install

# retrieve configuration file from example
mv .env.example .env

# set up settings to your db in .env file

# generating a new application key
php artisan key:generate

# run migrations and make seeding
php artisan migrate
php artisan db:seed

# Virtual hosts
<VirtualHost *:80>
	ServerName adriitest.dev
	ServerAlias www.adriitest.dev
	DocumentRoot "/Users/z0uR/Sites/adriitest/public/"
</VirtualHost>

# Adding host to the hosts file
127.0.0.1 adriitest.dev

# Change .env file's string in order to set the right URI in the emails
APP_URL=http://your.domain

# mail and db configurations lies in .env file in directory root