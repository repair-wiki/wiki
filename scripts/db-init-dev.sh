export $(grep -v '^#' .env | xargs)
# Remove temporary LocalSettings.php, in case it exists
docker compose --file=./docker-compose.dev.yml exec wiki rm /tmp/LocalSettings.php
# Trick to initiate database meanwhile using the existing LocalSettings.php
docker compose --file=./docker-compose.dev.yml exec wiki bash -c 'MW_CONFIG_FILE=/tmp/LocalSettings.php php maintenance/run.php install --dbserver="db" --dbname=$DB_NAME --dbuser=$DB_USER --dbpass=$DB_PASSWORD "Repair Wiki" $ADMIN_USER --pass=$ADMIN_PASS --confpath="/tmp/"'
