<?php

namespace Stripe;

use Stripe\Util\CaseInsensitiveArray;

/**
 * Class ApiResponse
 *
 * @package Stripe
 */
class ApiResponse
{
    /**
     * @var array|CaseInsensitiveArray|null
     */
    public $headers;
    
    /**
     * @var string
     */
    public $body;

    /**
     * @var array|null
     */
    public $json;

    /**
     * @var int
     */
    public $code;

    /**
     * @param string $body
     * @param int $code
     * @param array|CaseInsensitiveArray|null $headers
     * @param array|null $json
     */
    public function __construct($body, $code, $headers, $json)
    {
        $this->body = $body;
        $this->code = $code;
        $this->headers = $headers;
        $this->json = $json;
    }
}
