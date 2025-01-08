import? '../sdk-codegen/justfile'

set quiet

# make vendored executables callable directly
export PATH := "vendor/bin:" + env_var('PATH')

_default:
    just --list --unsorted

# install vendored dependencies; only used locally
install:
    composer install

[no-exit-message]
test *args:
    phpunit {{ args }}

[confirm("This will modify local files and is intended for use in CI; do you want to proceed?")]
ci-test autoload:
    ./build.php {{ autoload }}

format *args:
    PHP_CS_FIXER_IGNORE_ENV=1 php-cs-fixer fix -v --using-cache=no {{ args }}

# for backwards compatibility; ideally removed later
[private]
alias codegen-format := format

format-check: (format "--dry-run")

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
