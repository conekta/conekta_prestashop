FROM markoshust/magento-php:7.3-fpm-6
LABEL maintainer "Exequiel Lares <exequiel@serfe.com>"

USER root

RUN echo "deb [check-valid-until=no] http://archive.debian.org/debian jessie-backports main" > /etc/apt/sources.list.d/jessie-backports.list
RUN sed -i '/deb http:\/\/deb.debian.org\/debian jessie-updates main/d' /etc/apt/sources.list
RUN echo 'Acquire::Check-Valid-Until no;' > /etc/apt/apt.conf.d/99no-check-valid-until

RUN apt-get update
RUN apt-get install -y mc nano vim wget curl

# MailHog Configuration needed
RUN wget --quiet -O /usr/local/bin/mhsendmail https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64
RUN chmod a+x /usr/local/bin/mhsendmail > /dev/null

# Runtime for node tools
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash
RUN apt-get install -y nodejs
RUN apt-get install -y build-essential

RUN chmod 777 /sock
RUN touch /sock/docker.sock
RUN chown app:app /sock/docker.sock
RUN chmod 777 /sock/docker.sock

USER app:app
