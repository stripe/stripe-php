<?php

namespace Stripe;

class Card extends ApiResource
{
    public static function constructFrom($values, $apiKey = null)
    {
        $class = get_class();
        return self::scopedConstructFrom($class, $values, $apiKey);
    }

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
            throw new InvalidRequestError($msg, null);
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
        return "$base/$parentExtn/cards/$extn";
    }

    /**
     * @param array|null $params
     *
     * @return Card The deleted card.
     */
    public function delete($params = null)
    {
        $class = get_class();
        return self::_scopedDelete($class, $params);
    }

    /**
     * @return Card The saved card.
     */
    public function save()
    {
        $class = get_class();
        return self::_scopedSave($class);
    }
}
