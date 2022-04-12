.PHONY: codegen-format update-version
update-version:
	@echo "$(VERSION)" > VERSION
	@perl -pi -e 's|VERSION = '\''[.\d]+'\''|VERSION = '\''$(VERSION)'\''|' lib/Stripe.php

codegen-format:
	composer install && ./vendor/bin/php-cs-fixer fix -v --using-cache=no .
