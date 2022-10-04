FROM mediawiki:stable

WORKDIR .

# Copy our extensions to the image
COPY ./extensions/ /var/www/html/extensions/

# Copy custom LocalSettings.php
COPY ./LocalSettings.php /var/www/html/LocalSettings.php

# Composer
RUN apt update
RUN apt install zip unzip
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Semantic Mediawiki
RUN COMPOSER=composer.local.json /usr/local/bin/composer require --no-update mediawiki/semantic-media-wiki
RUN /usr/local/bin/composer update --no-dev