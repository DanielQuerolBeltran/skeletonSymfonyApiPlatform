help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
.PHONY: help


build:
	@make down
	@docker-compose build --pull --no-cache
	@make down
# nmp
.PHONY: build

logs:
	@docker-compose logs -f
.PHONY: logs

watch:
	@watch docker-compose ps
.PHONY: watch

up:
	@docker-compose down --remove-orphans
	@docker-compose up
.PHONY: up

down:
	@docker-compose down --remove-orphans
.PHONY: down

install:
	@docker-compose run php composer install
.PHONY: install

test:
	@docker-compose exec --env APP_ENV=test php bin/console doctrine:schema:update --force
	@docker-compose exec --env APP_ENV=test php ./bin/phpunit
.PHONY: test
