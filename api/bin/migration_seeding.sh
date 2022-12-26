#!/bin/sh
php artisan migrate:fresh --path=database/migrations/**
php artisan batch:create_game_modes_2022_12_25
php artisan db:seed
