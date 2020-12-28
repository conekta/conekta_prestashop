help:
	@egrep "^#" Makefile

# target: docker-build|db               - Setup/Build PHP & (node)JS dependencies
db: docker-build
docker-build: build-back

build-back:
	docker-compose run --rm php sh -c "composer install"

build-back-prod:
	docker-compose run --rm php sh -c "composer install --no-dev -o"

build-zip:
	cp -Ra $(PWD) /tmp/ps_faviconnotificationbo
	rm -rf /tmp/ps_faviconnotificationbo/.env.test
	rm -rf /tmp/ps_faviconnotificationbo/.php_cs.*
	rm -rf /tmp/ps_faviconnotificationbo/composer.*
	rm -rf /tmp/ps_faviconnotificationbo/.gitignore
	rm -rf /tmp/ps_faviconnotificationbo/deploy.sh
	rm -rf /tmp/ps_faviconnotificationbo/.editorconfig
	rm -rf /tmp/ps_faviconnotificationbo/.git
	rm -rf /tmp/ps_faviconnotificationbo/.github
	rm -rf /tmp/ps_faviconnotificationbo/_dev
	rm -rf /tmp/ps_faviconnotificationbo/tests
	rm -rf /tmp/ps_faviconnotificationbo/docker-compose.yml
	rm -rf /tmp/ps_faviconnotificationbo/Makefile
	mv -v /tmp/ps_faviconnotificationbo $(PWD)/ps_faviconnotificationbo
	zip -r ps_faviconnotificationbo.zip ps_faviconnotificationbo
	rm -rf $(PWD)/ps_faviconnotificationbo

# target: build-zip-prod                   - Launch prod zip generation of the module (will not work on windows)
build-zip-prod: build-back-prod build-zip
