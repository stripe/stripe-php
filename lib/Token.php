<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Tokenization is the process Stripe uses to collect sensitive card or bank
 * account details, or personally identifiable information (PII), directly from
 * your customers in a secure manner. A token representing this information is
 * returned to your server to use. Use our
 * <a href="https://stripe.com/docs/payments">recommended payments integrations</a> to perform this process
 * on the client-side. This guarantees that no sensitive card data touches your server,
 * and allows your integration to operate in a PCI-compliant way.
 *
 * If you can't use client-side tokenization, you can also create tokens using
 * the API with either your publishable or secret API key. If
 * your integration uses this method, you're responsible for any PCI compliance
 * that it might require, and you must keep your secret API key safe. Unlike with
 * client-side tokenization, your customer's information isn't sent directly to
 * Stripe, so we can't determine how it's handled or stored.
 *
 * You can't store or use tokens more than once. To store card or bank account
 * information for later use, create <a href="https://stripe.com/docs/api#customers">Customer</a>
 * objects or <a href="/api#external_accounts">External accounts</a>.
 * <a href="https://stripe.com/docs/radar">Radar</a>, our integrated solution for automatic fraud protection,
 * performs best with integrations that use client-side tokenization.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\BankAccount $bank_account <p>These bank accounts are payment methods on <code>Customer</code> objects.</p><p>On the other hand <a href="/api#external_accounts">External Accounts</a> are transfer destinations on <code>Account</code> objects for connected accounts. They can be bank accounts or debit cards as well, and are documented in the links above.</p><p>Related guide: <a href="/payments/bank-debits-transfers">Bank debits and transfers</a></p>
 * @property null|\Stripe\Card $card <p>You can store multiple cards on a customer in order to charge the customer later. You can also store multiple debit cards on a recipient in order to transfer to those cards later.</p><p>Related guide: <a href="https://stripe.com/docs/sources/cards">Card payments with Sources</a></p>
 * @property null|string $client_ip IP address of the client that generates the token.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $type Type of the token: <code>account</code>, <code>bank_account</code>, <code>card</code>, or <code>pii</code>.
 * @property bool $used Determines if you have already used this token (you can only use tokens once).
 */
class Token extends ApiResource
{
    const OBJECT_NAME = 'token';

    const TYPE_ACCOUNT = 'account';
    const TYPE_BANK_ACCOUNT = 'bank_account';
    const TYPE_CARD = 'card';
    const TYPE_PII = 'pii';

    /**
     * Creates a single-use token that represents a bank account’s details. You can use
     * this token with any API method in place of a bank account dictionary. You can
     * only use this token once. To do so, attach it to a <a href="#accounts">connected
     * account</a> where <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
     * is <code>application</code>, which includes Custom accounts.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Token the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Retrieves the token with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Token
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
