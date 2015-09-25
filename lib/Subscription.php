<?php

namespace Stripe;

class Subscription extends ApiResource
{
    /**
     * {@inheritdoc}
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $customer = $this['customer'];
        if (!$id) {
            throw new Error\InvalidRequest(
                'Could not determine which URL to request: '.
                "class instance has invalid ID: $id",
                null
            );
        }
        $id = Util\Util::utf8($id);
        $customer = Util\Util::utf8($customer);

        $base = Customer::classUrl();
        $customerExtn = urlencode($customer);
        $extn = urlencode($id);

        return "$base/$customerExtn/subscriptions/$extn";
    }

    /**
     * @param array|null $params
     * @param mixed      $opts
     *
     * @return Subscription The deleted subscription.
     */
    public function cancel($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Subscription The saved subscription.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @return Subscription The updated subscription.
     */
    public function deleteDiscount()
    {
        $url = $this->instanceUrl().'/discount';
        list(, $opts) = $this->_request('delete', $url);
        $this->refreshFrom(array('discount' => null), $opts, true);
    }
}
