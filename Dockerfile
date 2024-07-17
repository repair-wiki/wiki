ARG mediawiki_version=1.42.1-fpm
ARG composer_version=2.7.1

# Trick to allow for COPY from for composer image
FROM composer:${composer_version} AS composer

FROM mediawiki:${mediawiki_version}

# Create script directory
RUN mkdir /wiki/

# Apply custom patches
#COPY ./patches/ /var/www/html/patches/
#RUN for i in /var/www/html/patches/*.patch; do patch -p1 < $i; done

# Copy extensions to the image
COPY ./extensions/ /var/www/html/extensions/

# Copy skins to the image
COPY ./skins/ /var/www/html/skins/

# Copy custom LocalSettings.php
COPY ./conf/LocalSettings.php /var/www/html/LocalSettings.php

# Composer
RUN apt update
RUN apt install zip unzip
COPY --from=composer /usr/bin/composer /usr/local/bin/composer

# Semantic Mediawiki
COPY ./conf/composer.local.json /var/www/html/composer.local.json
RUN chown -R root ./composer.json
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN /usr/local/bin/composer config --no-plugins allow-plugins.wikimedia/composer-merge-plugin
RUN /usr/local/bin/composer update --no-dev

# NGINX
RUN apt-get update -y \
    && apt-get install -y nginx

# Custom NGINX configuration
COPY ./conf/nginx.conf /etc/nginx/sites-enabled/default

# Supervisor daemon
RUN apt-get update && \
    apt-get install -y supervisor --no-install-recommends

COPY ./conf/supervisord.conf /etc/supervisor/conf.d/

# Cron
RUN apt-get install -y cron --no-install-recommends

RUN mkdir /wiki/cron

# Add cron files
ADD cron/update_spamlist.sh /wiki/cron/update_spamlist.sh
ADD cron/run_jobs.sh /wiki/cron/run_jobs.sh

# Update permissions
RUN chmod 0644 /wiki/cron/update_spamlist.sh

# Update crontab
RUN crontab -l | { cat; echo "0 0 * * * bash /wiki/cron/update_spamlist.sh"; } | crontab -
RUN crontab -l | { cat; echo "0 * * * * bash /wiki/cron/run_jobs.sh"; } | crontab -

# Imagemagick
RUN apt-get install -y imagemagick --no-install-recommends

# Image directory
RUN chmod 766 /var/www/html/images

# Custom entrypoint
COPY entrypoint.sh /etc/entrypoint.sh
RUN chmod +x /etc/entrypoint.sh
ENTRYPOINT ["/etc/entrypoint.sh"]
