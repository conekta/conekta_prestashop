FROM php:7.4-cli-alpine



COPY --from=composer:2.5.1 /usr/bin/composer /usr/bin/composer

RUN composer global require phpunit/phpunit  ~9
