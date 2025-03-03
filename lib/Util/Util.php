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
     *
     * @return bool true if the given object is a list
     */
    public static function isList($array)
    {
        if (!\is_array($array)) {
            return false;
        }
        if ([] === $array) {
            return true;
        }
        if (\array_keys($array) !== \range(0, \count($array) - 1)) {
            return false;
        }

        return true;
    }

    /**
     * Converts a response from the Stripe API to the corresponding PHP object.
     *
     * @param array                $resp    the response from the Stripe API
     * @param array|RequestOptions $opts
     * @param 'v1'|'v2'            $apiMode whether the response is from a v1 or v2 API
     *
     * @return array|StripeObject
     */
    public static function convertToStripeObject($resp, $opts, $apiMode = 'v1')
    {
        $types = 'v1' === $apiMode ? \Stripe\Util\ObjectTypes::mapping
            : \Stripe\Util\ObjectTypes::v2Mapping;
        if (self::isList($resp)) {
            $mapped = [];
            foreach ($resp as $i) {
                $mapped[] = self::convertToStripeObject($i, $opts, $apiMode);
            }

            return $mapped;
        }
        if (\is_array($resp)) {
            if (isset($resp['object']) && \is_string($resp['object'])
                && isset($types[$resp['object']])
            ) {
                $class = $types[$resp['object']];
                if ('v2' === $apiMode && ('v2.core.event' === $resp['object'])) {
                    $eventTypes = \Stripe\Util\EventTypes::thinEventMapping;
                    if (\array_key_exists('type', $resp) && \array_key_exists($resp['type'], $eventTypes)) {
                        $class = $eventTypes[$resp['type']];
                    } else {
                        $class = \Stripe\V2\Event::class;
                    }
                }
            } elseif (\array_key_exists('data', $resp) && \array_key_exists('next_page_url', $resp)) {
                // TODO: this is a horrible hack. The API needs
                // to return something for `object` here.
                $class = \Stripe\V2\Collection::class;
            } else {
                $class = \Stripe\StripeObject::class;
            }

            return $class::constructFrom($resp, $opts, $apiMode);
        }

        return $resp;
    }

    /**
     * @param mixed $json
     * @param mixed $class
     *
     * @throws \ReflectionException
     */
    public static function json_decode_thin_event_object($json, $class)
    {
        $reflection = new \ReflectionClass($class);
        $instance = $reflection->newInstanceWithoutConstructor();
        $json = json_decode($json, true);
        $properties = $reflection->getProperties();
        foreach ($properties as $key => $property) {
            if (\array_key_exists($property->getName(), $json)) {
                if ('related_object' === $property->getName()) {
                    $related_object = new \Stripe\RelatedObject();
                    $related_object->id = $json['related_object']['id'];
                    $related_object->url = $json['related_object']['url'];
                    $related_object->type = $json['related_object']['type'];
                    $property->setValue($instance, $related_object);
                } elseif ('reason' === $property->getName()) {
                    $reason = new \Stripe\Reason();
                    $reason->id = $json['reason']['id'];
                    $reason->idempotency_key = $json['reason']['idempotency_key'];
                    $property->setValue($instance, $reason);
                } else {
                    $property->setAccessible(true);
                    $property->setValue($instance, $json[$property->getName()]);
                }
            }
        }

        return $instance;
    }

    /**
     * @param mixed|string $value a string to UTF8-encode
     *
     * @return mixed|string the UTF8-encoded string, or the object passed in if
     *    it wasn't a string
     */
    public static function utf8($value)
    {
        if (null === self::$isMbstringAvailable) {
            self::$isMbstringAvailable = \function_exists('mb_detect_encoding')
                && \function_exists('mb_convert_encoding');

            if (!self::$isMbstringAvailable) {
                \trigger_error(
                    'It looks like the mbstring extension is not enabled. ' .
                    'UTF-8 strings will not properly be encoded. Ask your system '
                    .
                    'administrator to enable the mbstring extension, or write to '
                    .
                    'support@stripe.com if you have any questions.',
                    \E_USER_WARNING
                );
            }
        }

        if (\is_string($value) && self::$isMbstringAvailable
            && 'UTF-8' !== \mb_detect_encoding($value, 'UTF-8', true)
        ) {
            return mb_convert_encoding($value, 'UTF-8', 'ISO-8859-1');
        }

        return $value;
    }

    /**
     * Compares two strings for equality. The time taken is independent of the
     * number of characters that match.
     *
     * @param string $a one of the strings to compare
     * @param string $b the other string to compare
     *
     * @return bool true if the strings are equal, false otherwise
     */
    public static function secureCompare($a, $b)
    {
        if (null === self::$isHashEqualsAvailable) {
            self::$isHashEqualsAvailable = \function_exists('hash_equals');
        }

        if (self::$isHashEqualsAvailable) {
            return \hash_equals($a, $b);
        }
        if (\strlen($a) !== \strlen($b)) {
            return false;
        }

        $result = 0;
        for ($i = 0; $i < \strlen($a); ++$i) {
            $result |= \ord($a[$i]) ^ \ord($b[$i]);
        }

        return 0 === $result;
    }

    /**
     * Recursively goes through an array of parameters. If a parameter is an instance of
     * ApiResource, then it is replaced by the resource's ID.
     * Also clears out null values.
     *
     * @param mixed $h
     *
     * @return mixed
     */
    public static function objectsToIds($h)
    {
        if ($h instanceof \Stripe\ApiResource) {
            return $h->id;
        }
        if (static::isList($h)) {
            $results = [];
            foreach ($h as $v) {
                $results[] = static::objectsToIds($v);
            }

            return $results;
        }
        if (\is_array($h)) {
            $results = [];
            foreach ($h as $k => $v) {
                if (null === $v) {
                    continue;
                }
                $results[$k] = static::objectsToIds($v);
            }

            return $results;
        }

        return $h;
    }

    /**
     * @param array $params
     * @param mixed $apiMode
     *
     * @return string
     */
    public static function encodeParameters($params, $apiMode = 'v1')
    {
        $flattenedParams = self::flattenParams($params, null, $apiMode);
        $pieces = [];
        foreach ($flattenedParams as $param) {
            list($k, $v) = $param;
            $pieces[] = self::urlEncode($k) . '=' . self::urlEncode($v);
        }

        return \implode('&', $pieces);
    }

    /**
     * @param array       $params
     * @param null|string $parentKey
     * @param mixed       $apiMode
     *
     * @return array
     */
    public static function flattenParams(
        $params,
        $parentKey = null,
        $apiMode = 'v1'
    ) {
        $result = [];

        foreach ($params as $key => $value) {
            $calculatedKey = $parentKey ? "{$parentKey}[{$key}]" : $key;
            if (self::isList($value)) {
                $result = \array_merge(
                    $result,
                    self::flattenParamsList($value, $calculatedKey, $apiMode)
                );
            } elseif (\is_array($value)) {
                $result = \array_merge(
                    $result,
                    self::flattenParams($value, $calculatedKey, $apiMode)
                );
            } else {
                \array_push($result, [$calculatedKey, $value]);
            }
        }

        return $result;
    }

    /**
     * @param array  $value
     * @param string $calculatedKey
     * @param mixed  $apiMode
     *
     * @return array
     */
    public static function flattenParamsList(
        $value,
        $calculatedKey,
        $apiMode = 'v1'
    ) {
        $result = [];

        foreach ($value as $i => $elem) {
            if (self::isList($elem)) {
                $result = \array_merge(
                    $result,
                    self::flattenParamsList($elem, $calculatedKey)
                );
            } elseif (\is_array($elem)) {
                $result = \array_merge(
                    $result,
                    self::flattenParams($elem, "{$calculatedKey}[{$i}]")
                );
            } else {
                if ('v2' === $apiMode) {
                    \array_push($result, ["{$calculatedKey}", $elem]);
                } else {
                    \array_push($result, ["{$calculatedKey}[{$i}]", $elem]);
                }
            }
        }

        return $result;
    }

    /**
     * @param string $key a string to URL-encode
     *
     * @return string the URL-encoded string
     */
    public static function urlEncode($key)
    {
        $s = \urlencode((string) $key);

        // Don't use strict form encoding by changing the square bracket control
        // characters back to their literals. This is fine by the server, and
        // makes these parameter strings easier to read.
        $s = \str_replace('%5B', '[', $s);

        return \str_replace('%5D', ']', $s);
    }

    public static function normalizeId($id)
    {
        if (\is_array($id)) {
            // see https://github.com/stripe/stripe-php/pull/1602
            if (!isset($id['id'])) {
                return [null, $id];
            }
            $params = $id;
            $id = $params['id'];
            unset($params['id']);
        } else {
            $params = [];
        }

        return [$id, $params];
    }

    /**
     * Returns UNIX timestamp in milliseconds.
     *
     * @return int current time in millis
     */
    public static function currentTimeMillis()
    {
        return (int) \round(\microtime(true) * 1000);
    }

    public static function getApiMode($path)
    {
        $apiMode = 'v1';
        if ('/v2' === substr($path, 0, 3)) {
            $apiMode = 'v2';
        }

        return $apiMode;
    }
}
