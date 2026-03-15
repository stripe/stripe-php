<?php

namespace Stripe\Util;

/**
 * Handles int64_string coercion for V2 API fields.
 *
 * V2 API fields typed as int64_string are represented as JSON strings on the
 * wire but exposed as PHP int values in the SDK. This class provides the
 * bidirectional coercion logic.
 */
abstract class Int64
{
    /**
     * Coerce outbound request params: int → string where schema says int64_string.
     *
     * @param mixed $value the param value to coerce
     * @param null|array $schema the schema describing the value's structure
     *
     * @return mixed the coerced value
     */
    public static function coerceRequestParams($value, $schema)
    {
        if (null === $schema || null === $value) {
            return $value;
        }

        $kind = isset($schema['kind']) ? $schema['kind'] : null;

        if ('int64_string' === $kind) {
            return \is_int($value) ? (string) $value : $value;
        }

        if ('object' === $kind && isset($schema['fields']) && \is_array($value)) {
            foreach ($schema['fields'] as $fieldName => $fieldSchema) {
                if (\array_key_exists($fieldName, $value)) {
                    $value[$fieldName] = self::coerceRequestParams($value[$fieldName], $fieldSchema);
                }
            }

            return $value;
        }

        if ('array' === $kind && isset($schema['element']) && \is_array($value)) {
            foreach ($value as $i => $elem) {
                $value[$i] = self::coerceRequestParams($elem, $schema['element']);
            }

            return $value;
        }

        return $value;
    }

    /**
     * Coerce inbound response values: string → int where encodings say int64_string.
     *
     * Applied to raw response arrays before hydration into StripeObjects.
     *
     * @param array $values raw response values
     * @param array $encodings field encoding metadata from fieldEncodings()
     *
     * @return array coerced values
     */
    public static function coerceResponseValues($values, $encodings)
    {
        foreach ($encodings as $fieldName => $fieldSchema) {
            if (!\array_key_exists($fieldName, $values)) {
                continue;
            }

            $values[$fieldName] = self::coerceResponseValue($values[$fieldName], $fieldSchema);
        }

        return $values;
    }

    /**
     * @param mixed $value
     * @param array $schema
     *
     * @return mixed
     */
    private static function coerceResponseValue($value, $schema)
    {
        if (null === $value) {
            return $value;
        }

        $kind = isset($schema['kind']) ? $schema['kind'] : null;

        if ('int64_string' === $kind) {
            return \is_string($value) && \is_numeric($value) ? (int) $value : $value;
        }

        if ('object' === $kind && isset($schema['fields']) && \is_array($value)) {
            return self::coerceResponseValues($value, $schema['fields']);
        }

        if ('array' === $kind && isset($schema['element']) && \is_array($value)) {
            foreach ($value as $i => $elem) {
                $value[$i] = self::coerceResponseValue($elem, $schema['element']);
            }

            return $value;
        }

        return $value;
    }
}
