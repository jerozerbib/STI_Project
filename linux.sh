#!/bin/bash

if test -f site/databases/test.db; then
    rm -f site/databases/test.db
else
    echo "File does not exist so let's move on shall we"
fi

php site/databases/test.php
mv test.db site/databases/test.db

chmod 777 site/databases
chmod 777 site/databases/test.db
chmod 777 site/databases/test.php

