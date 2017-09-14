#!/usr/bin/env bash

# Rebuild schema, insert the Fixtures
php bin/console doctrine:schema:drop --force
php bin/console doctrine:schema:update --force
php bin/console app:fixtures
sleep 2

# Start the built-in server to be able to work
php -S localhost:8000 --docroot=web
