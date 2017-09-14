#!/usr/bin/env bash

# Rebuild Database Schema
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force

# Insert Fixtures data
php bin/console app:fixtures
sleep 2

# Start the built-in server to be able to work
#php -S localhost:8000 --docroot=web
