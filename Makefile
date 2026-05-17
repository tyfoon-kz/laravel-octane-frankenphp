.PHONY: help install test check qa migrate migrate-status build diff-check

help: ## Show available project commands
	@grep -E '^[a-zA-Z0-9_-]+:.*?## ' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "%-18s %s\n", $$1, $$2}'

install: ## Install PHP and frontend dependencies
	composer install
	npm install

test: ## Run Laravel test suite
	php artisan test

check: ## Run smoke checks for the Laravel/Filament project
	php -v
	composer --version
	composer validate --strict
	php artisan --version
	npm --version
	$(MAKE) test

qa: check diff-check ## Run final quality gate

migrate: ## Apply database migrations
	php artisan migrate

migrate-status: ## Show Laravel migration status
	php artisan migrate:status

build: ## Build frontend assets
	npm run build

diff-check: ## Check whitespace errors in git diff
	git diff --check
