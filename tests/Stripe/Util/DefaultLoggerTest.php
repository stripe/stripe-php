<?php

namespace Stripe\Util;

/**
 * @internal
 * @covers \Stripe\Util\DefaultLogger
 */
final class DefaultLoggerTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function testDefaultLogger()
    {
        // DefaultLogger uses PHP's `error_log` function. In order to capture
        // the output, we need to temporarily redirect it to a temporary file.

        $capture = \tmpfile();
        $origErrorLog = \ini_set('error_log', \stream_get_meta_data($capture)['uri']);

        try {
            $logger = new DefaultLogger();
            $logger->error('This is a test message');

            static::compatAssertMatchesRegularExpression('/This is a test message/', \stream_get_contents($capture));
        } finally {
            \ini_set('error_log', $origErrorLog);
            \fclose($capture);
        }
    }
}
