#!/usr/bin/env bash

# Rebuild Database Schema
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
sleep 1

# Insert Fixtures data
php bin/console app:fixtures
