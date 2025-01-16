set quiet

import? '../sdk-codegen/utils.just'

# make vendored executables callable directly
export PATH := "vendor/bin:" + env_var('PATH')

_default:
    just --list --unsorted

# install vendored dependencies
install *args:
    composer install {{ if is_dependency() == "true" {"--quiet"} else {""} }} {{ args }}

# ⭐ run full unit test suite; needs stripe-mock
[no-exit-message]
test *args: install
    phpunit {{ args }}

# run tests in CI; can use autoload mode (or not)
[confirm("This will modify local files and is intended for use in CI; do you want to proceed?")]
ci-test autoload:
    ./build.php {{ autoload }}

# ⭐ format all files
format *args: install
    PHP_CS_FIXER_IGNORE_ENV=1 php-cs-fixer fix -v --using-cache=no {{ args }}

# check formatting for, but don't modify, files
format-check: (format "--dry-run")

# ⭐ statically analyze code
lint *args:
    php -d memory_limit=512M vendor/bin/phpstan analyse lib tests {{args}}

# for backwards compatibility; ideally removed later
[private]
alias phpstan := lint

# called by tooling
[private]
update-version version:
    echo "{{ version }}" > VERSION
    perl -pi -e 's|VERSION = '\''[.\-\w\d]+'\''|VERSION = '\''{{ version }}'\''|' lib/Stripe.php


PHPDOCUMENTOR_VERSION := "v3.0.0"
# generates docs; currently broken? can unhide if working
[private]
phpdoc:
    #!/usr/bin/env bash
    set -euo pipefail

    if [ ! -f vendor/bin/phpdoc ]; then
        curl -sfL https://github.com/phpDocumentor/phpDocumentor/releases/download/{{ PHPDOCUMENTOR_VERSION }}/phpDocumentor.phar -o vendor/bin/phpdoc
        chmod +x vendor/bin/phpdoc
    fi

    phpdoc
