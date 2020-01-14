<?php

namespace Stripe\Util;

use Stripe\StripeObject;

abstract class Util
{
    private static $isMbstringAvailable = null;
    private static $isHashEqualsAvailable = null;

    /**
     * Whether the provided array (or other) is a list rather than a dictionary.
     * A list is defined as an array for which all the keys are consecutive
     * integers starting at 0. Empty arrays are considered to be lists.
     *
     * @param array|mixed $array
     * @return boolean true if the given object is a list.
     */
    public static function isList($array)
    {
        if (!is_array($array)) {
            return false;
        }
        if ($array === []) {
            return true;
        }
        if (array_keys($array) !== range(0, count($array) - 1)) {
            return false;
        }
        return true;
    }

    /**
     * Converts a response from the Stripe API to the corresponding PHP object.
     *
     * @param array $resp The response from the Stripe API.
     * @param array $opts
     * @return StripeObject|array
     */
    public static function convertToStripeObject($resp, $opts)
    {
        $types = [
            // data structures
            \Stripe\Collection::OBJECT_NAME => \Stripe\Collection::class,

            // business objects
            \Stripe\Account::OBJECT_NAME => \Stripe\Account::class,
            \Stripe\AccountLink::OBJECT_NAME => \Stripe\AccountLink::class,
            \Stripe\AlipayAccount::OBJECT_NAME => \Stripe\AlipayAccount::class,
            \Stripe\ApplePayDomain::OBJECT_NAME => \Stripe\ApplePayDomain::class,
            \Stripe\ApplicationFee::OBJECT_NAME => \Stripe\ApplicationFee::class,
            \Stripe\ApplicationFeeRefund::OBJECT_NAME => \Stripe\ApplicationFeeRefund::class,
            \Stripe\Balance::OBJECT_NAME => \Stripe\Balance::class,
            \Stripe\BalanceTransaction::OBJECT_NAME => \Stripe\BalanceTransaction::class,
            \Stripe\BankAccount::OBJECT_NAME => \Stripe\BankAccount::class,
            \Stripe\BitcoinReceiver::OBJECT_NAME => \Stripe\BitcoinReceiver::class,
            \Stripe\BitcoinTransaction::OBJECT_NAME => \Stripe\BitcoinTransaction::class,
            \Stripe\Capability::OBJECT_NAME => \Stripe\Capability::class,
            \Stripe\Card::OBJECT_NAME => \Stripe\Card::class,
            \Stripe\Charge::OBJECT_NAME => \Stripe\Charge::class,
            \Stripe\Checkout\Session::OBJECT_NAME => \Stripe\Checkout\Session::class,
            \Stripe\CountrySpec::OBJECT_NAME => \Stripe\CountrySpec::class,
            \Stripe\Coupon::OBJECT_NAME => \Stripe\Coupon::class,
            \Stripe\CreditNote::OBJECT_NAME => \Stripe\CreditNote::class,
            \Stripe\CreditNoteLineItem::OBJECT_NAME => \Stripe\CreditNoteLineItem::class,
            \Stripe\Customer::OBJECT_NAME => \Stripe\Customer::class,
            \Stripe\CustomerBalanceTransaction::OBJECT_NAME => \Stripe\CustomerBalanceTransaction::class,
            \Stripe\Discount::OBJECT_NAME => \Stripe\Discount::class,
            \Stripe\Dispute::OBJECT_NAME => \Stripe\Dispute::class,
            \Stripe\EphemeralKey::OBJECT_NAME => \Stripe\EphemeralKey::class,
            \Stripe\Event::OBJECT_NAME => \Stripe\Event::class,
            \Stripe\ExchangeRate::OBJECT_NAME => \Stripe\ExchangeRate::class,
            \Stripe\File::OBJECT_NAME => \Stripe\File::class,
            \Stripe\File::OBJECT_NAME_ALT => \Stripe\File::class,
            \Stripe\FileLink::OBJECT_NAME => \Stripe\FileLink::class,
            \Stripe\Invoice::OBJECT_NAME => \Stripe\Invoice::class,
            \Stripe\InvoiceItem::OBJECT_NAME => \Stripe\InvoiceItem::class,
            \Stripe\InvoiceLineItem::OBJECT_NAME => \Stripe\InvoiceLineItem::class,
            \Stripe\Issuing\Authorization::OBJECT_NAME => \Stripe\Issuing\Authorization::class,
            \Stripe\Issuing\Card::OBJECT_NAME => \Stripe\Issuing\Card::class,
            \Stripe\Issuing\CardDetails::OBJECT_NAME => \Stripe\Issuing\CardDetails::class,
            \Stripe\Issuing\Cardholder::OBJECT_NAME => \Stripe\Issuing\Cardholder::class,
            \Stripe\Issuing\Dispute::OBJECT_NAME => \Stripe\Issuing\Dispute::class,
            \Stripe\Issuing\Transaction::OBJECT_NAME => \Stripe\Issuing\Transaction::class,
            \Stripe\LoginLink::OBJECT_NAME => \Stripe\LoginLink::class,
            \Stripe\Mandate::OBJECT_NAME => \Stripe\Mandate::class,
            \Stripe\Order::OBJECT_NAME => \Stripe\Order::class,
            \Stripe\OrderItem::OBJECT_NAME => \Stripe\OrderItem::class,
            \Stripe\OrderReturn::OBJECT_NAME => \Stripe\OrderReturn::class,
            \Stripe\PaymentIntent::OBJECT_NAME => \Stripe\PaymentIntent::class,
            \Stripe\PaymentMethod::OBJECT_NAME => \Stripe\PaymentMethod::class,
            \Stripe\Payout::OBJECT_NAME => \Stripe\Payout::class,
            \Stripe\Person::OBJECT_NAME => \Stripe\Person::class,
            \Stripe\Plan::OBJECT_NAME => \Stripe\Plan::class,
            \Stripe\Product::OBJECT_NAME => \Stripe\Product::class,
            \Stripe\Radar\EarlyFraudWarning::OBJECT_NAME => \Stripe\Radar\EarlyFraudWarning::class,
            \Stripe\Radar\ValueList::OBJECT_NAME => \Stripe\Radar\ValueList::class,
            \Stripe\Radar\ValueListItem::OBJECT_NAME => \Stripe\Radar\ValueListItem::class,
            \Stripe\Recipient::OBJECT_NAME => \Stripe\Recipient::class,
            \Stripe\RecipientTransfer::OBJECT_NAME => \Stripe\RecipientTransfer::class,
            \Stripe\Refund::OBJECT_NAME => \Stripe\Refund::class,
            \Stripe\Reporting\ReportRun::OBJECT_NAME => \Stripe\Reporting\ReportRun::class,
            \Stripe\Reporting\ReportType::OBJECT_NAME => \Stripe\Reporting\ReportType::class,
            \Stripe\Review::OBJECT_NAME => \Stripe\Review::class,
            \Stripe\SetupIntent::OBJECT_NAME => \Stripe\SetupIntent::class,
            \Stripe\Sigma\ScheduledQueryRun::OBJECT_NAME => \Stripe\Sigma\ScheduledQueryRun::class,
            \Stripe\SKU::OBJECT_NAME => \Stripe\SKU::class,
            \Stripe\Source::OBJECT_NAME => \Stripe\Source::class,
            \Stripe\SourceTransaction::OBJECT_NAME => \Stripe\SourceTransaction::class,
            \Stripe\Subscription::OBJECT_NAME => \Stripe\Subscription::class,
            \Stripe\SubscriptionItem::OBJECT_NAME => \Stripe\SubscriptionItem::class,
            \Stripe\SubscriptionSchedule::OBJECT_NAME => \Stripe\SubscriptionSchedule::class,
            \Stripe\TaxId::OBJECT_NAME => \Stripe\TaxId::class,
            \Stripe\TaxRate::OBJECT_NAME => \Stripe\TaxRate::class,
            \Stripe\ThreeDSecure::OBJECT_NAME => \Stripe\ThreeDSecure::class,
            \Stripe\Terminal\ConnectionToken::OBJECT_NAME => \Stripe\Terminal\ConnectionToken::class,
            \Stripe\Terminal\Location::OBJECT_NAME => \Stripe\Terminal\Location::class,
            \Stripe\Terminal\Reader::OBJECT_NAME => \Stripe\Terminal\Reader::class,
            \Stripe\Token::OBJECT_NAME => \Stripe\Token::class,
            \Stripe\Topup::OBJECT_NAME => \Stripe\Topup::class,
            \Stripe\Transfer::OBJECT_NAME => \Stripe\Transfer::class,
            \Stripe\TransferReversal::OBJECT_NAME => \Stripe\TransferReversal::class,
            \Stripe\UsageRecord::OBJECT_NAME => \Stripe\UsageRecord::class,
            \Stripe\UsageRecordSummary::OBJECT_NAME => \Stripe\UsageRecordSummary::class,
            \Stripe\WebhookEndpoint::OBJECT_NAME => \Stripe\WebhookEndpoint::class,
        ];
        if (self::isList($resp)) {
            $mapped = [];
            foreach ($resp as $i) {
                array_push($mapped, self::convertToStripeObject($i, $opts));
            }
            return $mapped;
        } elseif (is_array($resp)) {
            if (isset($resp['object']) && is_string($resp['object']) && isset($types[$resp['object']])) {
                $class = $types[$resp['object']];
            } else {
                $class = \Stripe\StripeObject::class;
            }
            return $class::constructFrom($resp, $opts);
        } else {
            return $resp;
        }
    }

    /**
     * @param string|mixed $value A string to UTF8-encode.
     *
     * @return string|mixed The UTF8-encoded string, or the object passed in if
     *    it wasn't a string.
     */
    public static function utf8($value)
    {
        if (self::$isMbstringAvailable === null) {
            self::$isMbstringAvailable = function_exists('mb_detect_encoding');

            if (!self::$isMbstringAvailable) {
                trigger_error("It looks like the mbstring extension is not enabled. " .
                    "UTF-8 strings will not properly be encoded. Ask your system " .
                    "administrator to enable the mbstring extension, or write to " .
                    "support@stripe.com if you have any questions.", E_USER_WARNING);
            }
        }

        if (is_string($value) && self::$isMbstringAvailable && mb_detect_encoding($value, "UTF-8", true) != "UTF-8") {
            return utf8_encode($value);
        } else {
            return $value;
        }
    }

    /**
     * Compares two strings for equality. The time taken is independent of the
     * number of characters that match.
     *
     * @param string $a one of the strings to compare.
     * @param string $b the other string to compare.
     * @return bool true if the strings are equal, false otherwise.
     */
    public static function secureCompare($a, $b)
    {
        if (self::$isHashEqualsAvailable === null) {
            self::$isHashEqualsAvailable = function_exists('hash_equals');
        }

        if (self::$isHashEqualsAvailable) {
            return hash_equals($a, $b);
        } else {
            if (strlen($a) != strlen($b)) {
                return false;
            }

            $result = 0;
            for ($i = 0; $i < strlen($a); $i++) {
                $result |= ord($a[$i]) ^ ord($b[$i]);
            }
            return ($result == 0);
        }
    }

    /**
     * Recursively goes through an array of parameters. If a parameter is an instance of
     * ApiResource, then it is replaced by the resource's ID.
     * Also clears out null values.
     *
     * @param mixed $h
     * @return mixed
     */
    public static function objectsToIds($h)
    {
        if ($h instanceof \Stripe\ApiResource) {
            return $h->id;
        } elseif (static::isList($h)) {
            $results = [];
            foreach ($h as $v) {
                array_push($results, static::objectsToIds($v));
            }
            return $results;
        } elseif (is_array($h)) {
            $results = [];
            foreach ($h as $k => $v) {
                if (is_null($v)) {
                    continue;
                }
                $results[$k] = static::objectsToIds($v);
            }
            return $results;
        } else {
            return $h;
        }
    }

    /**
     * @param array $params
     *
     * @return string
     */
    public static function encodeParameters($params)
    {
        $flattenedParams = self::flattenParams($params);
        $pieces = [];
        foreach ($flattenedParams as $param) {
            list($k, $v) = $param;
            array_push($pieces, self::urlEncode($k) . '=' . self::urlEncode($v));
        }
        return implode('&', $pieces);
    }

    /**
     * @param array $params
     * @param string|null $parentKey
     *
     * @return array
     */
    public static function flattenParams($params, $parentKey = null)
    {
        $result = [];

        foreach ($params as $key => $value) {
            $calculatedKey = $parentKey ? "{$parentKey}[{$key}]" : $key;

            if (self::isList($value)) {
                $result = array_merge($result, self::flattenParamsList($value, $calculatedKey));
            } elseif (is_array($value)) {
                $result = array_merge($result, self::flattenParams($value, $calculatedKey));
            } else {
                array_push($result, [$calculatedKey, $value]);
            }
        }

        return $result;
    }

    /**
     * @param array $value
     * @param string $calculatedKey
     *
     * @return array
     */
    public static function flattenParamsList($value, $calculatedKey)
    {
        $result = [];

        foreach ($value as $i => $elem) {
            if (self::isList($elem)) {
                $result = array_merge($result, self::flattenParamsList($elem, $calculatedKey));
            } elseif (is_array($elem)) {
                $result = array_merge($result, self::flattenParams($elem, "{$calculatedKey}[{$i}]"));
            } else {
                array_push($result, ["{$calculatedKey}[{$i}]", $elem]);
            }
        }

        return $result;
    }

    /**
     * @param string $key A string to URL-encode.
     *
     * @return string The URL-encoded string.
     */
    public static function urlEncode($key)
    {
        $s = urlencode($key);

        // Don't use strict form encoding by changing the square bracket control
        // characters back to their literals. This is fine by the server, and
        // makes these parameter strings easier to read.
        $s = str_replace('%5B', '[', $s);
        $s = str_replace('%5D', ']', $s);

        return $s;
    }

    public static function normalizeId($id)
    {
        if (is_array($id)) {
            $params = $id;
            $id = $params['id'];
            unset($params['id']);
        } else {
            $params = [];
        }
        return [$id, $params];
    }

    /**
     * Returns UNIX timestamp in milliseconds
     *
     * @return integer current time in millis
     */
    public static function currentTimeMillis()
    {
        return (int) round(microtime(true) * 1000);
    }
}
