<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Radar;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class EarlyFraudWarningService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of early fraud warnings.
     *
     * @param null|array{charge?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, payment_intent?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Radar\EarlyFraudWarning>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/radar/early_fraud_warnings', $params, $opts);
    }

    /**
     * Retrieves the details of an early fraud warning that has previously been
     * created.
     *
     * Please refer to the <a href="#early_fraud_warning_object">early fraud
     * warning</a> object reference for more details.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Radar\EarlyFraudWarning
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/radar/early_fraud_warnings/%s', $id), $params, $opts);
    }
}
