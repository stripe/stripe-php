<?php

namespace Stripe;

/**
 * Class BankAccount
 *
 * @property string $id
 * @property string $object
 * @property string $account
 * @property string $account_holder_name
 * @property string $account_holder_type
 * @property string $bank_name
 * @property string $country
 * @property string $currency
 * @property string $customer
 * @property bool $default_for_currency
 * @property string $fingerprint
 * @property string $last4
 * @property AttachedObject $metadata
 * @property string $routing_number
 * @property string $status
 *
 * @package Stripe
 */
class BankAccount extends ExternalAccount
{
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return BankAccount The verified bank account.
     */
    public function verify($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/verify';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
