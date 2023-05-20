.DEFAULT_GOAL := run

init:
	sh scripts/db-init-dev.sh

update:
	sh scripts/update-dev.sh

run:
	docker compose --file=./docker-compose.dev.yml up --build

run-bg:
	docker compose --file=./docker-compose.dev.yml up --build -d
