<?php

// see: https://docs.stripe.com/sdks/versioning?lang=php

if (\PHP_VERSION_ID < 70200) {
    throw new RuntimeException(
        'The Stripe SDK requires PHP 7.2.0 or later. You are running PHP ' . \PHP_VERSION . '.'
    );
}
