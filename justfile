import? '../sdk-codegen/justfile'

set quiet

export PATH := "./vendor/bin:" + env_var('PATH')
PHPDOCUMENTOR_VERSION := "v3.0.0"

_default:
    just --list --unsorted

# install vendored dependencies; only used locally
[group('useful')]
install:
    composer install

[no-exit-message]
[group('useful')]
test *options:
    phpunit {{ options }}

[group('CI')]
[confirm("This will modify local and is mostly just for CI; do you want to proceed?")]
ci-test autoload:
    echo "got {{ autoload }}"
    ./build.php {{ autoload }}

[group('useful')]
format *options:
    PHP_CS_FIXER_IGNORE_ENV=1 php-cs-fixer fix -v --using-cache=no {{ options }}

# for backwards compatibility; ideally removed later
[private]
alias codegen-format := format

[group('CI')]
format-check: (format "--dry-run")

[group('CI')]
lint *options:
    php -d memory_limit=512M vendor/bin/phpstan analyse lib tests {{options}}

# for backwards compatibility; ideally removed later
[private]
alias phpstan := lint

[group('misc')]
phpstan-baseline: (lint "--generate-baseline")

# called by tooling
[private]
update-version version:
    echo "{{ version }}" > VERSION
    perl -pi -e 's|VERSION = '\''[.\-\w\d]+'\''|VERSION = '\''{{ version }}'\''|' lib/Stripe.php

[group('misc')]
phpdoc:
    #!/usr/bin/env bash
    set -euo pipefail

    if [ ! -f vendor/bin/phpdoc ]; then
        curl -sfL https://github.com/phpDocumentor/phpDocumentor/releases/download/{{ PHPDOCUMENTOR_VERSION }}/phpDocumentor.phar -o vendor/bin/phpdoc
        chmod +x vendor/bin/phpdoc
    fi

    phpdoc
