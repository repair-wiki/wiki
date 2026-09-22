docker compose exec -T rw-local bash -c 'MW_CONFIG_FILE=/var/www/html/LocalSettings.php php /var/www/html/maintenance/run.php CirrusSearch:UpdateSearchIndexConfig'
