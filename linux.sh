#!/bin/bash

rm site/databases/test.db
php site/databases/test.php

sudo chmod 777 site/databases
sudo chmod -R 777 site/databases

