FROM mediawiki:1.39.3-fpm

# Apply custom patches
COPY ./patches/ /var/www/html/patches/
RUN for i in /var/www/html/patches/*.patch; do patch -p1 < $i; done

# Copy extensions to the image
COPY ./extensions/ /var/www/html/extensions/

# Copy custom LocalSettings.php
COPY ./conf/LocalSettings.php /var/www/html/LocalSettings.php

# Composer
RUN apt update
RUN apt install zip unzip
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Semantic Mediawiki
COPY ./conf/composer.local.json /var/www/html/composer.local.json
RUN chown -R root ./composer.json
RUN /usr/local/bin/composer config --no-plugins allow-plugins.wikimedia/composer-merge-plugin
RUN /usr/local/bin/composer require --no-update mediawiki/semantic-media-wiki
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

# Custom entrypoint
COPY entrypoint.sh /etc/entrypoint.sh
RUN chmod +x /etc/entrypoint.sh
ENTRYPOINT ["/etc/entrypoint.sh"]
