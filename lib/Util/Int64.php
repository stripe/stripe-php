<?php

namespace Stripe\Util;

/**
 * Handles coercion between PHP int and JSON string for int64_string fields.
 *
 * V2 API fields marked as int64_string are transmitted as JSON strings on
 * the wire but exposed as PHP ints in the SDK.
 */
class Int64
{
    /**
     * Coerce outbound request params: convert PHP ints to strings where
     * the request schema indicates an int64_string field.
     *
     * @param mixed $params
     * @param array $schema e.g. ['kind' => 'object', 'fields' => ['amount' => ['kind' => 'int64_string']]]
     *
     * @return mixed
     */
    public static function coerceRequestParams($params, $schema)
    {
        if (null === $params) {
            return null;
        }

        if (!isset($schema['kind'])) {
            return $params;
        }

        if ('int64_string' === $schema['kind']) {
            if (\is_int($params)) {
                return (string) $params;
            }

            return $params;
        }

        if ('array' === $schema['kind'] && isset($schema['items'])) {
            if (\is_array($params)) {
                $result = [];
                foreach ($params as $key => $value) {
                    $result[$key] = self::coerceRequestParams($value, $schema['items']);
                }

                return $result;
            }

            return $params;
        }

        if ('object' === $schema['kind'] && isset($schema['fields'])) {
            if (\is_array($params)) {
                $result = $params;
                foreach ($schema['fields'] as $field => $fieldSchema) {
                    if (\array_key_exists($field, $result)) {
                        $result[$field] = self::coerceRequestParams($result[$field], $fieldSchema);
                    }
                }

                return $result;
            }

            return $params;
        }

        return $params;
    }

    /**
     * Coerce inbound response values: convert JSON strings to PHP ints where
     * the field encodings indicate an int64_string field.
     *
     * @param mixed $values
     * @param array $encodings e.g. ['amount' => ['kind' => 'int64_string'], 'nested' => ['kind' => 'object', 'fields' => [...]]]
     *
     * @return mixed
     */
    public static function coerceResponseValues($values, $encodings)
    {
        if (!\is_array($values)) {
            return $values;
        }

        foreach ($encodings as $field => $encoding) {
            if (!\array_key_exists($field, $values)) {
                continue;
            }

            $value = $values[$field];

            if (!isset($encoding['kind'])) {
                continue;
            }

            if ('int64_string' === $encoding['kind']) {
                if (\is_string($value) && \is_numeric($value)) {
                    $values[$field] = (int) $value;
                }
            } elseif ('array' === $encoding['kind'] && isset($encoding['items'])) {
                if (\is_array($value)) {
                    foreach ($value as $i => $item) {
                        if (!isset($encoding['items']['kind'])) {
                            continue;
                        }

                        if ('int64_string' === $encoding['items']['kind']) {
                            if (\is_string($item) && \is_numeric($item)) {
                                $values[$field][$i] = (int) $item;
                            }
                        } elseif ('object' === $encoding['items']['kind'] && isset($encoding['items']['fields'])) {
                            if (\is_array($item)) {
                                $values[$field][$i] = self::coerceResponseValues($item, $encoding['items']['fields']);
                            }
                        }
                    }
                }
            } elseif ('object' === $encoding['kind'] && isset($encoding['fields'])) {
                if (\is_array($value)) {
                    $values[$field] = self::coerceResponseValues($value, $encoding['fields']);
                }
            }
        }

        return $values;
    }
}
