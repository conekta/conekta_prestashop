# Local modules development

To have the local modules setted up on the system as composer depdendencies but without loosing the control over the code we can specify a module as composer dependency and have the module been tracker in a separated folder.

## Steps

Open the main project _composer.json_ and add the following content inside the "repositories" section:
```
"composer-local-development": {
    "type": "path",
    "url": "./dev/composer-dev/*",
    "options": {
        "symlink": true
    }
}
```

setup into the gitignore to ignore all the changes inside that folder 

_dev/composer-dev/.gitignore_:
```
*

!.gitignore
```
Clone the repository inside the composer dev folder
```
cd dev/composer-dev
git clone git@git.serfe.com:project/module-myawesomemodule.git module-myawesomemodule
cd module-myawesomemodule
git checkout development
cd ../../..
composer require --dev <composername>:@dev --prefer-source
```
Remember to commit the composer.json and composer.lock files.