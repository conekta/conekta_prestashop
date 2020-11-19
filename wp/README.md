# Wordpress Docker


1. CD into this directory `$ cd /path-to-linio-project/docker/wordpress`
2. Edit settings on */env* folder (copy from /env/stage)
  * Run `$ cp -a ./env/stage/. ./env/local`
  * (optional) Edit all .env files if you have an external database
3. Run docker `$ docker-compose up`
  * Check logs for errors
4. Open a new terminal window and make sure you cd into the wp docker directory `$ cd /path-to-linio-project/docker/wordpress`
5. For editing files and avoid file permision issues you need to run `$ docker-compose exec wordpress bash` and inside the container run the following:
```
$ chown -R www-data:www-data .
$ umask 0002
$ find . -type f -exec chmod 664 {} \;
$ find . -type d -exec chmod 775 {} \; 
$ exit
```

6. Run `$ docker-compose run wpcli wp core install --url=localhost:8000 --title="Integraciones Linio"  --admin_user=admin --admin_password=123456 --admin_email=linio@serfe.com`
7. Run `$ docker-compose run wpcli wp plugin install https://downloads.wordpress.org/plugin/woocommerce.4.1.0.zip --activate`
8. Import sample data by following the woocommerce docs https://docs.woocommerce.com/document/importing-woocommerce-sample-data/
9. You are done!

### Troubleshooting

Check you can edit files from www-data group
```
$ groups
```

If your user isn't in www-data group, run
```
$ sudo usermod -a -G www-data $USER
```

## Admin
  * URL: [http://localhost:8000/wp-admin](http://localhost:8000/wp-admin)
  * User: admin
  * Password: 123456
  * Admin email: linio@serfe.com

## WP-CLI
You can use [WP-CLI](https://developer.wordpress.org/cli/commands/) commands 

Example
  * RUN core update `$ docker-compose wpcli wp core update --force`
  * RUN plugin install `$ docker-compose wpcli wp plugin install bbpress --activate`
  
## PhpMyAdmin
Check local databases [http://localhost:8080](http://localhost:8080)

## Mailcatcher
Check mails [http://localhost:1080](http://localhost:1080)
