set -eu

sh scripts/content-build.sh

jq -r '(.styles + .raw)[] | "\(.path)\t\(.page)"' content/config.json | while IFS="$(printf '\t')" read -r path page; do
	built="content/.build/$(echo "$path" | tr '/' '_')"
	case "$path" in *.scss) built="$built.css" ;; esac

	live=$(docker compose exec -T rw-local bash -c \
		"MW_CONFIG_FILE=/var/www/html/LocalSettings.php php /var/www/html/maintenance/run.php getText '$page' 2>/dev/null" </dev/null || true)

	if [ "$(printf '%s' "$live" | sed -e 's/[[:space:]]*$//')" = "$(sed -e 's/[[:space:]]*$//' "$built")" ]; then
		continue
	fi

	echo "  publishing $page"
	docker compose exec -T rw-local bash -c \
		"MW_CONFIG_FILE=/var/www/html/LocalSettings.php php /var/www/html/maintenance/run.php edit --bot --no-rc --user='${CONTENT_BOT_USER:-Admin}' --summary='Published from content/$path' '$page'" \
		< "$built" >/dev/null
done

# Process link updates
docker compose exec -T rw-local bash -c \
	"MW_CONFIG_FILE=/var/www/html/LocalSettings.php php /var/www/html/maintenance/run.php runJobs --maxjobs=500" \
	</dev/null >/dev/null

echo "Publish complete."
