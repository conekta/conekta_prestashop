#!/bin/bash
[ -z "$1" ] && echo "Please specify a domain (ex. mydomain.test)" && exit

# Generate certificate authority if not already setup
if ! docker-compose exec -T --user root app cat /root/.local/share/mkcert/rootCA.pem | grep -q 'BEGIN CERTIFICATE'; then
  commands/setup-ssl-ca.sh
fi

# Generate the certificate for the specified domain
docker-compose exec -T --user root app mkcert -key-file nginx.key -cert-file nginx.crt "$@"
echo "Moving key and cert to /etc/nginx/certs/..."
docker-compose exec -T --user root app chown app:app nginx.key nginx.crt
docker-compose exec -T --user root app mv nginx.key nginx.crt /etc/nginx/certs/

# Restart nginx to apply the updates
echo "Restarting containers to apply updates..."
docker-compose stop
docker-compose start
