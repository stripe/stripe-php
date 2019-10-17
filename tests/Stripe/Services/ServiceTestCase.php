<?php

namespace Stripe\Services;

abstract class ServiceTestCase extends \Stripe\TestCase
{
    protected $stripeClient = null;

    protected $service = null;

    /**
     * @before
     */
    protected function setUpStripeClientAndService()
    {
        $this->stripeClient = new \Stripe\StripeClient(
            "sk_test_123",
            "ca_123",
            MOCK_URL,
            null,
            null
        );
        $serviceClass = $this->getServiceClass();
        $this->service = new $serviceClass($this->stripeClient);
    }

    abstract protected function getServiceClass();
}
