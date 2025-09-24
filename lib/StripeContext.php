<?php

namespace Stripe;

/**
 * Class StripeContext
 *
 * Represents a path-like context for Stripe API operations, allowing for
 * hierarchical organization of API calls. The context is externally immutable,
 * meaning all operations return new instances rather than modifying existing ones.
 */
class StripeContext
{
    /** @var array<string> */
    private $segments;

    /**
     * @param null|array<string> $segments
     */
    public function __construct($segments = null)
    {
        $this->segments = $segments ? \array_values($segments) : [];
    }

    /**
     * Parses a context string into a StripeContext instance.
     *
     * @param null|string $contextString
     * @return StripeContext
     */
    public static function parse($contextString)
    {
        if (!$contextString) {
            return new self([]);
        }

        return new self(\explode('/', $contextString));
    }

    /**
     * Returns the parent context by removing the last segment.
     * Throws an exception if the context is empty.
     *
     * @return StripeContext
     * @throws Exception\InvalidArgumentException
     */
    public function parent()
    {
        if (empty($this->segments)) {
            throw new Exception\InvalidArgumentException('Cannot get parent of empty context');
        }

        return new self(\array_slice($this->segments, 0, -1));
    }

    /**
     * Returns a new context with the given segment appended.
     *
     * @param string $segment
     * @return StripeContext
     */
    public function child($segment)
    {
        $newSegments = $this->segments;
        $newSegments[] = $segment;

        return new self($newSegments);
    }

    /**
     * Returns the string representation of the context.
     *
     * @return string
     */
    public function __toString()
    {
        return \implode('/', $this->segments);
    }
}