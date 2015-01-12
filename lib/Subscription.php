<?php

namespace Stripe;

class Subscription extends ApiResource
{
    /**
   * @return string The API URL for this Stripe subscription.
   */
    public function instanceUrl()
    {
        $id = $this['id'];
        $customer = $this['customer'];
        if (!$id) {
            throw new InvalidRequestError(
                "Could not determine which URL to request: " .
                "class instance has invalid ID: $id",
                null
            );
        }
        $id = ApiRequestor::utf8($id);
        $customer = ApiRequestor::utf8($customer);

        $base = self::classUrl('Stripe\\Customer');
        $customerExtn = urlencode($customer);
        $extn = urlencode($id);
        return "$base/$customerExtn/subscriptions/$extn";
    }

    /**
   * @param array|null $params
   * @return Subscription The deleted subscription.
   */
    public function cancel($params = null)
    {
        $class = get_class();
        return self::_scopedDelete($class, $params);
    }

    /**
   * @return Subscription The saved subscription.
   */
    public function save()
    {
        $class = get_class();
        return self::_scopedSave($class);
    }

    /**
   * @return Subscription The updated subscription.
   */
    public function deleteDiscount()
    {
        $requestor = new ApiRequestor($this->_apiKey);
        $url = $this->instanceUrl() . '/discount';
        list($response, $apiKey) = $requestor->request('delete', $url);
        $this->refreshFrom(array('discount' => null), $apiKey, true);
    }
}
