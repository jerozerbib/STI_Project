#!/bin/bash

if test -f site/databases/sti.db; then
    rm -f site/databases/sti.db
else
    echo "File does not exist so let's move on shall we"
fi

php site/databases/sti_db.php
mv sti.db site/databases/sti.db

chmod 777 site/databases
chmod 777 site/databases/sti.db
chmod 777 site/databases/sti_db.php

