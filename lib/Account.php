<?php

namespace Stripe;

class Account extends ApiResource
{
    public function instanceUrl()
    {
        if ($this['id'] === null) {
            return '/v1/account';
        } else {
            return parent::instanceUrl();
        }
    }

    /**
     * @param string|null $id
     * @param array|string|null $opts
     *
     * @return Account
     */
    public static function retrieve($id = null, $opts = null)
    {
        if (!$opts && is_string($id) && substr($id, 0, 3) === 'sk_') {
            $opts = $id;
            $id = null;
        }
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Account
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param string $id The ID of the account to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Account The updated account.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Account
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Account The deleted account.
     */
    public function delete($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Account The rejected account.
     */
    public function reject($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reject';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of Accounts
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }
}
