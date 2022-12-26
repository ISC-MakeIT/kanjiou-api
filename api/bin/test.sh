#!/bin/sh
./bin/migration_seeding.sh
php artisan test
