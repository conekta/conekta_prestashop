#!/usr/bin/env bash

# Check that Magento is installed properly
composer install \
&& bin/magento setup:uninstall --no-interaction \
&& bin/magento setup:install \
    --admin-firstname Admin \
    --admin-lastname User \
    --admin-email $ADMIN_EMAIL \
    --admin-user admin \
    --admin-password $ADMIN_PASSWORD \
    --backend-frontname $ADMIN_URL_POSTFIX \
    --db-host $DB_HOST \
    --db-name $MYSQL_DATABASE \
    --db-user $MYSQL_USER \
    --db-password $MYSQL_PASSWORD \
    --cache-backend=redis \
    --cache-backend-redis-server=$REDIS_HOST \
    --session-save=redis \
    --session-save-redis-host=$REDIS_HOST \
    --base-url "http://$PUBLIC_URL" \
    --base-url-secure "https://$PUBLIC_URL" \
&& echo "Setting up as developer mode" \
&& bin/magento deploy:mode:set developer \
&& echo "Setting up modules" \
&& bin/magento setup:upgrade \
&& echo "Ensuring we aren't sharing cookies" \
&& bin/magento config:set web/cookie/cookie_domain $PUBLIC_URL \
&& echo "Prepare static content so that we don't have to do it on the page request" \
&& bin/magento setup:static-content:deploy -f \
&& echo "Clearing the cache" \
&& bin/magento cache:flush \
&& bin/magento cache:enable \
&& cd dev/magento-coding-standard \
&& composer install \
&& cd ../.. \
&& echo "Creating output testing folder" \
&& mkdir ./var/log/mqt \
&& cd ..
