# Linio Magento 2.3.5-p2 development environment

The aim of this document is to express the steps to install the local environment.

### Requirements
  * Docker
  * Docker-compose

### Steps

 - Open a terminal
 - Go to the Magento docker directory

`cd docker/magento`

 - Run the following

```
chmod +x ./run
chmod +x ./.serfe/*
chmod +x ./commands/*
```

 - Copy the .env.sample file and rename it as .env

`cp .env.sample .env`

 - Update .env content with:

```
#### Change this appropriately
COMPOSE_PROJECT_NAME=linio

### Magento specific configuration

ADMIN_EMAIL=info@serfe.com
ADMIN_PASSWORD=s3rf3ntr4nd0
ADMIN_URL_POSTFIX=admin_linio

# Required for composer
MAGENTO_COMPOSER_USER=
MAGENTO_COMPOSER_PASSWORD=

# Backend url
ADMIN_URL_POSTFIX=admin_linio

# Url to access the site - Cannot be locahost
PUBLIC_URL=linio.magento.ws.serfe.com
```

 - 
 - Clone webroot/auth.json 

`cp webroot/auth.json.sample webroot/auth.json`

 - Update the webroot/auth.json file with the magento authentication keys are in => https://tracker.serfe.com/wiki/doku.php?id=tracker:conekta:credentials&#credenciales_para_repo_de_magento_updatear_en_webroot_authjson

 - Update etc/hosts file add:

```
127.0.0.1 linio.magento.ws.serfe.com
```

 - Stop apache service

`sudo service apache2 stop`

 - Initialize Linio Magento module as git submodule:

`git submodule update --init`

 - Start environment

`docker-compose up`

 - Once the environment installation is completed, stop the environment and start it again. This is because the database container fails the first time is initialized and we need to restart the environment

```
CTRL+C
docker-compose up
```

 - Open other terminal and continue with the process

 - Update files permissions following the [Update docker user UID](#update-docker-user-uid) instructions
 
 './run composer remove linio/module-merchant-integration'  And wait a few minutes

 - Install and configure Magento:

`./commands/post-install.sh`

 - Update configuration:

`./run magento config:set web/secure/use_in_adminhtml 1`

 - Update SSL keys:

`./commands/setup-ssl.sh linio.magento.ws.serfe.com`

#### Troubleshooting

If you get the error that cannot read the /sock/docker.sock on phpfpm_1 whe starting the docker-compose command, do:
```
docker-compose run --rm --user root phpfpm bash
chmod 777 /sock
touch /sock/docker.sock
chown app:app /sock/docker.sock
chmod 777 /sock/docker.sock
```

### Environment URLs

  * PhpMyAdmin: [http://localhost:8010/](http://localhost:8010/)
  * MailHog: [http://localhost:8025/](http://localhost:8025/)
  * Frontend: [https://linio.magento.ws.serfe.com/](https://linio.magento.ws.serfe.com/)
  * Backend: [https://linio.magento.ws.serfe.com/admin_linio](https://linio.magento.ws.serfe.com/admin_linio)
    * Credentials:
      * **Username:** admin
      * **Password:** s3rf3ntr4nd0
    * Password can be changed on _Application/env/magento.env_ inside the ADMIN_PASSWORD environment variable **before install**.
  * Varnish Cached Site: Is not enabled

### Commands

  * To enter to php container use: ```./in-container```
  * To run a magento command: ```./magento```
    * **Example:** to clear the cache run: ```./magento cache:clean```
  * Clear redis cache:  ```docker-compose exec redis redis-cli flushall ```
  * Serfe commands use: ```./run <command>```

#### Run command
To run any command use:

`./run <your awesome command>`

#### Available commands

##### coding-standard

##### coding-standard-fix

##### composer
Allow to run any composer command:
`./run composer install`

##### configure.local

##### db-import

##### export-config

##### grunt
Allows to run any grunt command directly:
`./run grunt less` to compile styles.

##### magento
Allows to run any magento command directly:
`./run magento setup:upgrade`

##### magerun

##### watch-cache
Allows to set a listener for the different cache types:
###### Install locally
`./run composer require --dev mage2tv/magento-cache-clean`
###### Exec
`./run watch-cache`
###### Usage
https://github.com/mage2tv/magento-cache-clean#usage
##### watch-styles

#### Sample Data Install
To install the sample data run

```
./in-container
./bin/sample-data-install.sh
```

### Known issues

#### Commands not working
Ensure that commands have execution permissions. Update script permissions with: ```chmod +x <filename>```

#### Coding standards command not working

Update permissions running:

```
chmod +x webroot/dev/magento-coding-standard/vendor/squizlabs/php_codesniffer/bin/*
chmod +x webroot/dev/magento-coding-standard/vendor/ phpunit/phpunit/phpunit
```

#### File permissions error
In case you have file permission problems, execute this:

```
cd webroot
sudo find . var generated vendor pub/static pub/media app/etc -type d -exec chmod 775 {} +
sudo find . var generated vendor pub/static pub/media app/etc -type f -exec chmod 664 {} +
sudo chmod u+x bin/magento
 ```

#### Update docker user UID

 - In host environment get your user UID: ```$ id $USER```
 - Inside docker environment update the **app** user UID:

```
cd docker/magento
docker-compose exec --user root phpfpm bash
usermod -u <your-id> app
groupmod -g <your-id> app
find . -group <your-id> -exec chgrp -h app {} \;
find . -user <your-id> -exec chown -h app {} \;
exit
```

#### Styles issues in Luma homepage with sample data

If you have an error of missing media/styles.css
This happen when the sample data deploy didn't generated the _media/styles.css_, this file is only generated during the sample data deployment.

In order to prevent this a copy of the CSS file is included in _sample/styles.css_, just copy them with

`cp sample/styles.css webroot/pub/media/styles.css`