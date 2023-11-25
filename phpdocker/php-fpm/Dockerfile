FROM bitnami/php-fpm:8.0
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php7.4-mysql; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
