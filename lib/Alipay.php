<?php

namespace Stripe;

class Alipay extends ApiResource
{
    /**
     * @return string The instance URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        if (!$id) {
            $class = get_class($this);
            $msg = "Could not determine which URL to request: $class instance "
             . "has invalid ID: $id";
            throw new Error\InvalidRequest($msg, null);
        }

        if (isset($this['customer'])) {
            $parent = $this['customer'];
            $base = Customer::classUrl();
        } elseif (isset($this['recipient'])) {
            $parent = $this['recipient'];
            $base = Recipient::classUrl();
        } else {
            return null;
        }

        $parent = ApiRequestor::utf8($parent);
        $id = ApiRequestor::utf8($id);

        $parentExtn = urlencode($parent);
        $extn = urlencode($id);
        return "$base/$parentExtn/alipay_accounts/$extn";
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Alipay_account The deleted alipay account.
     */
    public function delete($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Alipay_account The saved alipay account.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }
}
