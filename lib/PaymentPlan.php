<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Payment Plan splits a single invoice obligation into multiple installments,
 * each with its own due date and amount. Payment Plans are associated with a
 * finalized or draft invoice and track how much has been collected against
 * each installment.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{invoice_details: (object{invoice: string}&StripeObject), type: string}&StripeObject)[] $collects_on The list of objects this payment plan collects against.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property (object{amount_due: int, amount_forgiven: int, amount_paid: int, currency: string, description: string, due_date?: int, id?: string, paid_at?: int, status: string}&StripeObject)[] $installments The list of installments derived from the schedule. Each installment tracks an individual payment obligation.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property (object{amounts_due: (object{amounts: (object{description: string, due_date?: (object{absolute?: int, relative?: (object{count: int, interval: string}&StripeObject), type: string}&StripeObject), fixed_amount?: (object{amount: int, currency: string}&StripeObject), id?: string, percentage?: float, type: string}&StripeObject)[]}&StripeObject), type: string}&StripeObject) $schedule
 */
class PaymentPlan extends ApiResource
{
    const OBJECT_NAME = 'payment_plan';

    use ApiOperations\Update;

    /**
     * Creates a payment plan that splits a single invoice obligation into installments
     * with their own due dates and amounts.
     *
     * @param null|array{collects_on: array{invoice_details: array{invoice: string}, type: string}[], expand?: string[], metadata?: array<string, string>, schedule: array{amounts_due: array{amounts: array{description?: string, due_date?: array{absolute?: int, relative?: array{count: int, interval: string}, type: string}, fixed_amount?: array{amount: int, currency: string}, id?: string, percentage?: float, type: string}[]}, type: string}} $params
     * @param null|array|string $options
     *
     * @return PaymentPlan the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of payment plans.
     *
     * @param null|array{ending_before?: string, expand?: string[], invoice?: string, limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<PaymentPlan> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the payment plan with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PaymentPlan
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the schedule or metadata of an existing payment plan. Only unpaid
     * installments can be updated.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], metadata?: array<string, string>, schedule?: array{amounts_due: array{amounts: array{description?: string, due_date?: array{absolute?: int, relative?: array{count: int, interval: string}, type: string}, fixed_amount?: array{amount: int, currency: string}, id?: string, percentage?: float, type: string}[]}, type: string}} $params
     * @param null|array|string $opts
     *
     * @return PaymentPlan the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
