# qurls -- a quick and dirty hacked together urlshortener

this project is just of educational nature, and was my personal try to get some experience with laravel, a php web framework.

## requirements

* php7.4 or later
* composer
* Laravel 7.x  (all requirements for laravel)

## database config

Rename `.env.example` to `.env`,

Ppen ".env", the local configuration file of our app, and change the `DB_CONNECTION` to `sqlite`, because we will just have a small app for now.
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
