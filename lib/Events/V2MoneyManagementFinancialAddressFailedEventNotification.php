<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 */
class V2MoneyManagementFinancialAddressFailedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.money_management.financial_address.failed';
    public $related_object;

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2MoneyManagementFinancialAddressFailedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAddress
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchRelatedObject()
    {
        return parent::fetchRelatedObject();
    }
}
