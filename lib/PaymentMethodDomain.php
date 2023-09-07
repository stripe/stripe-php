<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A payment method domain represents a web domain that you have registered with Stripe.
 * Stripe Elements use registered payment method domains to control where certain payment methods are shown.
 *
 * Related guides: <a href="https://stripe.com/docs/payments/payment-methods/pmd-registration">Payment method domains</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $apple_pay Indicates the status of a specific payment method on a payment method domain.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $domain_name The domain name that this payment method domain object represents.
 * @property bool $enabled Whether this payment method domain is enabled. If the domain is not enabled, payment methods that require a payment method domain will not appear in Elements.
 * @property \Stripe\StripeObject $google_pay Indicates the status of a specific payment method on a payment method domain.
 * @property \Stripe\StripeObject $link Indicates the status of a specific payment method on a payment method domain.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $paypal Indicates the status of a specific payment method on a payment method domain.
 */
class PaymentMethodDomain extends ApiResource
{
    const OBJECT_NAME = 'payment_method_domain';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethodDomain the validated payment method domain
     */
    public function validate($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/validate';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
