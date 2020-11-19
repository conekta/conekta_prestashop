FROM mageinferno/magento2-php:7.1-fpm-0
LABEL maintainer "Esteban Zeller <esteban@serfe.com>"

RUN echo "deb [check-valid-until=no] http://archive.debian.org/debian jessie-backports main" > /etc/apt/sources.list.d/jessie-backports.list
RUN sed -i '/deb http:\/\/deb.debian.org\/debian jessie-updates main/d' /etc/apt/sources.list
RUN echo 'Acquire::Check-Valid-Until no;' > /etc/apt/apt.conf.d/99no-check-valid-until

RUN apt-get update
RUN apt-get install -y mc nano vim wget curl

# MailHog Configuration needed
RUN wget --quiet -O /usr/local/bin/mhsendmail https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64
RUN chmod a+x /usr/local/bin/mhsendmail > /dev/null

# Runtime for node tools
RUN curl -sL https://deb.nodesource.com/setup_9.x | bash
RUN apt-get install -y nodejs
RUN apt-get install -y build-essential