<?php

namespace Stripe\Util;

/**
 * Handles coercion for V2 API fields with special wire encoding.
 *
 * V2 API fields may require coercion between PHP native types and their
 * wire representations (e.g. int64_string, decimal_string), and may be
 * wrapped in nullable or discriminatedUnion schemas.
 */
class Int64
{
    /**
     * Coerce outbound request params according to the field's wire schema.
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

        if ('decimal_string' === $schema['kind']) {
            if (\is_float($params) || \is_int($params)) {
                return (string) $params;
            }

            return $params;
        }

        if ('nullable' === $schema['kind'] && isset($schema['inner'])) {
            return self::coerceRequestParams($params, $schema['inner']);
        }

        if ('discriminatedUnion' === $schema['kind'] && isset($schema['discriminator'], $schema['variants'])) {
            if (!\is_array($params)) {
                return $params;
            }

            $discriminatorValue = $params[$schema['discriminator']] ?? null;

            // A discriminator that is absent, or present but not a string, is
            // equally unusable: either way there is no way to pick a variant
            // schema. Skipping coercion silently sends int64_string fields as
            // raw JSON numbers, which the API rejects or truncates, so fail
            // here rather than send a wrong amount.
            if (!\is_string($discriminatorValue)) {
                throw new \Stripe\Exception\InvalidArgumentException(
                    "Missing or invalid discriminator `{$schema['discriminator']}` for a polymorphic "
                    . 'parameter. Stripe uses this field to determine the shape of the value, so we '
                    . "cannot encode the request without it. Provide `{$schema['discriminator']}` with "
                    . 'one of: ' . \implode(', ', \array_keys($schema['variants'])) . '.'
                );
            }

            // An unrecognized discriminator passes through untouched: we
            // support sending undocumented params when the caller uses the
            // right shape.
            if (\array_key_exists($discriminatorValue, $schema['variants'])) {
                return self::coerceRequestParams($params, $schema['variants'][$discriminatorValue]);
            }

            return $params;
        }

        if ('array' === $schema['kind'] && isset($schema['element'])) {
            if (\is_array($params)) {
                $result = [];
                foreach ($params as $key => $value) {
                    $result[$key] = self::coerceRequestParams($value, $schema['element']);
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
            } elseif ('nullable' === $encoding['kind'] && isset($encoding['inner'])) {
                if (null !== $value) {
                    $values = self::coerceResponseValues($values, [$field => $encoding['inner']]);
                }
            } elseif ('discriminatedUnion' === $encoding['kind'] && isset($encoding['discriminator'], $encoding['variants'])) {
                if (\is_array($value) && \array_key_exists($encoding['discriminator'], $value)) {
                    $discriminatorValue = $value[$encoding['discriminator']];
                    if (\is_string($discriminatorValue) && \array_key_exists($discriminatorValue, $encoding['variants'])) {
                        $values = self::coerceResponseValues($values, [$field => $encoding['variants'][$discriminatorValue]]);
                    }
                }
            } elseif ('array' === $encoding['kind'] && isset($encoding['element'])) {
                if (\is_array($value)) {
                    foreach ($value as $i => $item) {
                        if (!isset($encoding['element']['kind'])) {
                            continue;
                        }

                        if ('int64_string' === $encoding['element']['kind']) {
                            if (\is_string($item) && \is_numeric($item)) {
                                $values[$field][$i] = (int) $item;
                            }
                        } elseif ('object' === $encoding['element']['kind'] && isset($encoding['element']['fields'])) {
                            if (\is_array($item)) {
                                $values[$field][$i] = self::coerceResponseValues($item, $encoding['element']['fields']);
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
