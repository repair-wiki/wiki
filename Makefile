.DEFAULT_GOAL := run

init:
	sh scripts/db-init-dev.sh
	sh scripts/update-dev.sh

update:
	sh scripts/update-dev.sh

run:
	docker compose --file=./docker-compose.dev.yml up

run-bg:
	docker compose --file=./docker-compose.dev.yml up -d

build:
	docker compose --file=./docker-compose.dev.yml build
