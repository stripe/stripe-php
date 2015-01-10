#!/usr/bin/env php
<?php
chdir(dirname(__FILE__));

$returnStatus = null;
passthru('composer install --dev', $returnStatus);
if ($returnStatus !== 0) {
    exit(1);
}

passthru(
    './vendor/bin/phpcs --standard=Zend lib tests *.php',
    $returnStatus
);
if ($returnStatus !== 0) {
    exit(1);
}

passthru('./vendor/bin/phpunit', $returnStatus);
if ($returnStatus !== 0) {
    exit(1);
}
