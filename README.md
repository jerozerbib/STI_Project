# STI Project

## Use case

### Linux OS
If you are running a Linux OS, you might want to try first to run the linux.sh script

```bash 
./linux.sh
```

What it does is basically essential in order to run the website. 
It gives the folder, and all the files wihtin, the `777` permissions. 
We did not find any other way to do it...

Then, use dock.sh 

```bash 
./dock.sh
```

### Mac OSx

First, run the dock.sh

```bash 
sh dock.sh
```

Now there are 4 accounts. admin, lio, jere and jee, jee has low rights. The password for each account is the pseudo.

The users have the pair `username/passord` as follows : 

admin : admin/admin
lio : lio/lio
jere : jere/jere
jee : jee/jee

To have all permissions, you need to have the field "roles" equal to "admin".

You can try the app    http://localhost:8080

You can generate a new database with a php script in /site/database/ 

```php sti_db.php```