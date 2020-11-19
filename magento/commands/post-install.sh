#!/bin/bash

if [ -f ./env ]; then
  echo "There is no .env file into the root foler. Please review .env.sample file and setup the appropiate values"
else
  docker-compose exec phpfpm chown app:app -R . \
  && docker-compose exec phpfpm chmod g+s -R . \
  && echo "Starting magento setup inside the container" \
  && docker-compose exec --user app phpfpm ./bin/setup.sh \
  && git checkout -- webroot/bin/magento
fi
