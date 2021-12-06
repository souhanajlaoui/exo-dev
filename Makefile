#!/usr/bin/env bash
.PHONY: help

help:  ## Display this help
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-22s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

DOCKER_COMPOSE=docker compose

up: ## Start dockers
	$(DOCKER_COMPOSE) up -d
	echo "http://test.exo-dev-local.com"
	echo "Blog : http://127.0.0.1"
	echo "Admin : http://127.0.0.1/admin"

down: ## Stop dockers
	$(DOCKER_COMPOSE) stop

restart: ## Restart dockers
	make down || true
	make up

install: ## Install project
	$(DOCKER_COMPOSE) up -d
	docker exec -it exo_web cp .env.dist .env
	docker exec -it exo_web composer install
	docker exec -it exo_web php bin/console ckeditor:install
	docker exec -it exo_web php bin/console assets:install --symlink
	docker exec -it exo_web yarn install
	docker exec -it exo_web yarn run dev
	docker exec -it exo_web php bin/console doctrine:migrations:migrate --no-interaction
	docker exec -it exo_web php bin/console doctrine:fixtures:load -n

