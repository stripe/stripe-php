export PHPSTAN_VERSION := 0.12.8

vendor: composer.json
	composer install
	curl -sfL https://github.com/phpstan/phpstan/releases/download/$(PHPSTAN_VERSION)/phpstan.phar -o vendor/bin/phpstan
	chmod +x vendor/bin/phpstan

test: vendor
	vendor/bin/phpunit
.PHONY: test

fmt: vendor
	vendor/bin/php-cs-fixer fix -v --using-cache=no .
.PHONY: fmt

phpstan: vendor
	vendor/bin/phpstan analyse lib tests
.PHONY: phpstan

phpstan-baseline: vendor
	vendor/bin/phpstan analyse --error-format baselineNeon lib tests > phpstan-baseline.neon
.PHONY: phpstan-baseline
