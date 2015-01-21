<?php

namespace Stripe;

class Customer extends ApiResource
{
    /**
     * @param string $id The ID of the customer to retrieve.
     * @param string|null $apiKey
     *
     * @return Customer
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of Customers.
     */
    public static function all($params = null, $apiKey = null)
    {
        return self::_all($params, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return Customer The created customer.
     */
    public static function create($params = null, $apiKey = null)
    {
        return self::_create($params, $apiKey);
    }

    /**
     * @return Customer The saved customer.
     */
    public function save()
    {
        return self::_save();
    }

    /**
     * @param array|null $params
     *
     * @return Customer The deleted customer.
     */
    public function delete($params = null)
    {
        return self::_delete($params);
    }

    /**
     * @param array|null $params
     *
     * @return InvoiceItem The resulting invoice item.
     */
    public function addInvoiceItem($params = null)
    {
        if (!$params) {
            $params = array();
        }
        $params['customer'] = $this->id;
        $ii = InvoiceItem::create($params, $this->_apiKey);
        return $ii;
    }

    /**
     * @param array|null $params
     *
     * @return array An array of the customer's Invoices.
     */
    public function invoices($params = null)
    {
        if (!$params) {
            $params = array();
        }
        $params['customer'] = $this->id;
        $invoices = Invoice::all($params, $this->_apiKey);
        return $invoices;
    }

    /**
     * @param array|null $params
     *
     * @return array An array of the customer's InvoiceItems.
     */
    public function invoiceItems($params = null)
    {
        if (!$params) {
            $params = array();
        }
        $params['customer'] = $this->id;
        $iis = InvoiceItem::all($params, $this->_apiKey);
        return $iis;
    }

    /**
     * @param array|null $params
     *
     * @return array An array of the customer's Charges.
     */
    public function charges($params = null)
    {
        if (!$params) {
            $params = array();
        }
        $params['customer'] = $this->id;
        $charges = Charge::all($params, $this->_apiKey);
        return $charges;
    }

    /**
     * @param array|null $params
     *
     * @return Subscription The updated subscription.
     */
    public function updateSubscription($params = null)
    {
        $requestor = new ApiRequestor($this->_apiKey);
        $url = $this->instanceUrl() . '/subscription';
        list($response, $apiKey) = $requestor->request('post', $url, $params);
        $this->refreshFrom(array('subscription' => $response), $apiKey, true);
        return $this->subscription;
    }

    /**
     * @param array|null $params
     *
     * @return Subscription The cancelled subscription.
     */
    public function cancelSubscription($params = null)
    {
        $requestor = new ApiRequestor($this->_apiKey);
        $url = $this->instanceUrl() . '/subscription';
        list($response, $apiKey) = $requestor->request('delete', $url, $params);
        $this->refreshFrom(array('subscription' => $response), $apiKey, true);
        return $this->subscription;
    }

    /**
     * @param array|null $params
     *
     * @return Customer The updated customer.
     */
    public function deleteDiscount()
    {
        $requestor = new ApiRequestor($this->_apiKey);
        $url = $this->instanceUrl() . '/discount';
        list($response, $apiKey) = $requestor->request('delete', $url);
        $this->refreshFrom(array('discount' => null), $apiKey, true);
    }
}
