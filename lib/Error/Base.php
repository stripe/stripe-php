<?php

namespace Stripe\Error;

use Exception;

abstract class Base extends Exception
{
    /**
     * @param string      $message
     * @param null|int    $httpStatus
     * @param null|string $httpBody
     * @param null|string $jsonBody
     * @param null|array  $httpHeaders
     */
    public function __construct(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null
    ) {
        parent::__construct($message);
        $this->httpStatus = $httpStatus;
        $this->httpBody = $httpBody;
        $this->jsonBody = $jsonBody;
        $this->httpHeaders = $httpHeaders;
        $this->requestId = null;

        if ($httpHeaders && isset($httpHeaders['Request-Id'])) {
            $this->requestId = $httpHeaders['Request-Id'];
        }
    }

    /**
     * @return int|null
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    /**
     * @return null|string
     */
    public function getHttpBody()
    {
        return $this->httpBody;
    }

    /**
     * @return null|string
     */
    public function getJsonBody()
    {
        return $this->jsonBody;
    }

    /**
     * @return array|null
     */
    public function getHttpHeaders()
    {
        return $this->httpHeaders;
    }

    /**
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $id = $this->requestId ? " from API request '{$this->requestId}'" : '';
        $message = explode("\n", parent::__toString());
        $message[0] .= $id;

        return implode("\n", $message);
    }
}
