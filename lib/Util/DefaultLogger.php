<?php

namespace Stripe\Util;

/**
 * A very basic implementation of LoggerInterface that has just enough
 * functionality that it can be the default for this library.
 */
class DefaultLogger implements LoggerInterface
{
    public $messageType = 0;

    public $destination = null;

    public function error($message, array $context = [])
    {
        if (\count($context) > 0) {
            throw new \Stripe\Exception\BadMethodCallException('DefaultLogger does not currently implement context. Please implement if you need it.');
        }
        \error_log($message, $this->messageType, $this->destination);
    }
}
