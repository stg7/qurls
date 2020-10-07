# qurls -- a quick and dirty hacked together urlshortener

this project is just of educational nature, and was my personal try to get some experience with laravel, a php web framework.

## requirements

* php7.4 or later
* composer
* Laravel 7.x  (all requirements for laravel)

### Ubuntu 20.04
```bash
sudo apt install php7.4 php7.4-xml php7.4-gd php7.4-opcache php7.4-mbstring php7.4-zip php7.4-sqlite3 npm

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
# add composer to your $PATH
```

## database config

Rename `.env.example` to `.env`,

Open ".env", the local configuration file of our app, and change the `DB_CONNECTION` to `sqlite`, because we will just have a small app for now.
Add `DB_FOREIGN_KEYS=true` and change `DB_DATABASE` to a path, e.g. `DB_DATABASE=/absolute/path/database.db`, and create the database file with `touch /absolute/path/database.db`.

Run
```bash
php artisan migrate
```

to create the tables.

## local run

start everything with
```bash
php artisan serve
```

## deployment
see laravel documentation

nginx config for sub dirs, tested with nginx/1.18.0:
```
....
# assuming a working php config

...  # at the end of server {}

    location /qurls {     
        alias /path/to/qurls/public;
        try_files $uri $uri/ @qurls;
        index  index.html index.htm index.php;
	    location ~ \.php$ {
	        include        fastcgi_params;
	        fastcgi_param SCRIPT_FILENAME $request_filename;
	        fastcgi_pass   unix:/run/php-fpm/php-fpm.sock;
   	    }
    }
    location @qurls {
        rewrite /qurls/(.*)$ /qurls/index.php?$1 last;
    }


```
This config is roughly based on https://serversforhackers.com/c/nginx-php-in-subdirectory
