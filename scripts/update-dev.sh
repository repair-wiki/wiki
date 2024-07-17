docker compose --file=./docker-compose.dev.yml exec wiki bash -c "MW_CONFIG_FILE=/var/www/html/LocalSettings.php php /var/www/html/maintenance/run.php update"
