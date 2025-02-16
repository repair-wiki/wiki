#!/bin/bash
INIT_PATH=$(pwd)
cd $INIT_PATH

dnf upgrade
dnf install -y git
dnf install -y docker

curl -L https://github.com/docker/compose/releases/latest/download/docker-compose-linux-$(uname -m) -o /usr/bin/docker-compose
chmod 755 /usr/bin/docker-compose

{ ssh -T git@github.com; } 2> /dev/null
IS_AUTHENTICATED=$?
if [ $IS_AUTHENTICATED != 1 ]; then
    echo "You are not authenticated to GitHub. Please setup SSH keys"
    exit 1
fi

git clone git@github.com:repair-wiki/wiki.git repair.wiki
cd repair.wiki
git submodule update --init

cp .env.example .env

docker-compose --file docker-compose.dev.yml up --build

./scripts/db-init-dev.sh
./scripts/update-dev.sh

cd $INIT_PATH

git clone git@github.com:repair-wiki/automation.git
cd automation
mkdir interims
git clone git@github.com:repair-wiki/content.git interims/content
docker-compose up -d --build app
