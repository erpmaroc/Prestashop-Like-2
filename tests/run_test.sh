#!/usr/bin/env bash



APP_ENV=mysql_test;

rm -vf ../config/$APP_ENV/depexor.php
mkdir -p ../config/$APP_ENV/
touch ../config/$APP_ENV/depexor.php

cd ..
php phpunit.phar --filter DbTest


