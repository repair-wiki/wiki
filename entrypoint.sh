#!/usr/bin/env sh
bash /wiki/cron/update_spamlist.sh
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf