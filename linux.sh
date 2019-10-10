#!/bin/bash

rm site/databases/test.db
php site/databases/test.php

chmod 777 site/databases
chmod 777 site/databases/test.db
chmod 777 site/databases/test.php

