# Prestashop Docker


1. CD into this directory `$ cd /path-to-linio-project/docker/prestashop`
2. Edit settings on */env* folder (copy from /env/stage)
  * Run `$ cp -a ./env/stage/. ./env/local`
  * (optional) Edit all .env files if you have an external database
3. Run docker `$ docker-compose up`
  * Check logs for errors

  3. b Wait a few minutes until until you see an output like "....core:notice] AH00094: Command line: 'apache2 -D FOREGROUND'". That means the installation has finished

4. Open a new terminal window and make sure you cd into the wp docker directory `$ cd /path-to-linio-project/docker/prestashop`
5. For editing files and avoid file permision issues you need to run `$ docker-compose exec prestashop bash` and inside the container run the following:
```
$ chown -R www-data:www-data .
$ umask 0002
$ find . -type f -exec chmod 664 {} \;
$ find . -type d -exec chmod 775 {} \;
$ exit
```
6. Restart your pc to get the permissions
6. Run `$ mv prestashop/admin prestashop/backoffice`
7. Run `$ rm -r prestashop/install`
8. You are done!

### Troubleshooting

Check you can edit files from www-data group
```
$ groups
```

If your user isn't in www-data group, run
```
$ sudo usermod -a -G www-data $USER
```

Keep in mind when installing the module to have it set to true
```
file: project/config/defines.inc.php

define('_PS_MODE_DEMO_', false);
```

## Admin
  * URL: [http://localhost:8000/backoffice](http://localhost:8000/backoffice)
  * Password: 123456
  * Admin email: linio@serfe.com

## PhpMyAdmin
Check local databases [http://localhost:8080](http://localhost:8080)

## Mailcatcher
Check mails [http://localhost:1080](http://localhost:1080)
