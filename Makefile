export PHPDOCUMENTOR_VERSION := v3.0.0-rc
export PHPSTAN_VERSION := 0.12.8

vendor: composer.json
	composer install

vendor/bin/phpstan: vendor
	curl -sfL https://github.com/phpstan/phpstan/releases/download/$(PHPSTAN_VERSION)/phpstan.phar -o vendor/bin/phpstan
	chmod +x vendor/bin/phpstan

vendor/bin/phpdoc: vendor
	curl -sfL https://github.com/phpDocumentor/phpDocumentor/releases/download/$(PHPDOCUMENTOR_VERSION)/phpDocumentor.phar -o vendor/bin/phpdoc
	chmod +x vendor/bin/phpdoc

test: vendor
	vendor/bin/phpunit
.PHONY: test

fmt: vendor
	vendor/bin/php-cs-fixer fix -v --using-cache=no .
.PHONY: fmt

fmtcheck: vendor
	vendor/bin/php-cs-fixer fix -v --dry-run --using-cache=no .
.PHONY: fmtcheck

phpdoc: vendor/bin/phpdoc
	vendor/bin/phpdoc

phpstan: vendor/bin/phpstan
	vendor/bin/phpstan analyse lib tests
.PHONY: phpstan

phpstan-baseline: vendor/bin/phpstan
	vendor/bin/phpstan analyse --error-format baselineNeon lib tests > phpstan-baseline.neon
.PHONY: phpstan-baseline
