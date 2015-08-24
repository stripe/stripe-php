<?php

namespace Stripe;

abstract class ExternalAccount extends ApiResource
{
    /**
     * @return null|string The instance URL for this resource. It needs to be special
     *                     cased because it doesn't fit into the standard resource pattern.
     *
     * @throws Error\InvalidRequest
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        if (!$id) {
            $class = get_class($this);
            $msg = "Could not determine which URL to request: $class instance "
             ."has invalid ID: $id";
            throw new Error\InvalidRequest($msg, null);
        }

        if ($this['customer']) {
            $parent = $this['customer'];
            $base = Customer::classUrl();
            $path = 'sources';
        } elseif ($this['account']) {
            $parent = $this['account'];
            $base = Account::classUrl();
            $path = 'external_accounts';
        } elseif ($this['recipient']) {
            $parent = $this['recipient'];
            $base = Recipient::classUrl();
            $path = 'cards';
        } else {
            return;
        }

        $parent = Util\Util::utf8($parent);
        $id = Util\Util::utf8($id);

        $parentExtn = urlencode($parent);
        $extn = urlencode($id);

        return "$base/$parentExtn/$path/$extn";
    }

    /**
     * @param array|null        $params
     * @param array|string|null $opts
     *
     * @return ExternalAccount The deleted external account.
     */
    public function delete($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|string|null $opts
     *
     * @return ExternalAccount The saved external account.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }
}
