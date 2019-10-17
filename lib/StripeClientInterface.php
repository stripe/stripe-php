<?php

namespace Stripe;

interface StripeClientInterface
{
    public function getApiKey();

    public function getClientId();

    public function getApiBase();

    public function getConnectBase();

    public function getFilesBase();

    public function request($method, $path, $params, $opts);
}
