up-with-mysql:
	docker-compose -f docker-compose.yml -f docker-compose.mysql.yml up -d
up-with-mysql-dev:
	docker-compose -f docker-compose.yml -f docker-compose.dev.yml up -d
build:
	docker compose build --no-cache --force-rm
fresh-common:
	docker compose exec app php artisan migrate:fresh --database common --path database/migrations/common
	docker compose exec app php artisan db:seed --class=CommonSchemaSeeder
