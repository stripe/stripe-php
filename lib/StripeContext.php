<?php

namespace Stripe;

/**
 * The StripeContext class provides an immutable container and convenience methods for interacting with the `Stripe-Context` header. All methods return a new instance of StripeContext.
 * You can use it whenever you're initializing a `StripeClient` or sending `stripe_context` with a request. It's also found in the `EventNotification.context` property.
 */
class StripeContext
{
    /**
     * @var string[]
     */
    private $segments;

    /**
     * Creates a new StripeContext with the given segments.
     *
     * @param string[] $segments
     */
    public function __construct($segments = [])
    {
        $this->segments = $segments ?: [];
    }

    /**
     * Returns a new StripeContext with the given segment added to the end.
     *
     * @param string $segment the segment to add
     *
     * @return StripeContext a new StripeContext instance with the segment appended
     */
    public function push($segment)
    {
        if (null === $segment) {
            throw new \InvalidArgumentException('segment cannot be null');
        }

        $newSegments = \array_merge($this->segments, [$segment]);

        return new StripeContext($newSegments);
    }

    /**
     * Returns a new StripeContext with the last segment removed.
     *
     * @return StripeContext a new StripeContext instance with the last segment removed
     */
    public function pop()
    {
        if (empty($this->segments)) {
            throw new Exception\BadMethodCallException('Cannot pop from an empty context');
        }

        $newSegments = \array_slice($this->segments, 0, -1);

        return new StripeContext($newSegments);
    }

    /**
     * Converts the context to a string by joining segments with '/'.
     *
     * @return string string representation of the context segments joined by '/'
     */
    public function __toString()
    {
        return \implode('/', $this->segments);
    }

    /**
     * Parse a context string into a StripeContext instance.
     *
     * @param string $contextStr string to parse (segments separated by '/')
     *
     * @return StripeContext StripeContext instance with segments from the string
     */
    public static function parse($contextStr)
    {
        if (null === $contextStr || '' === $contextStr) {
            return new StripeContext([]);
        }

        $segments = \explode('/', $contextStr);

        return new StripeContext($segments);
    }

    /**
     * Returns the segments of the context.
     *
     * @return string[] the array of segments
     */
    public function getSegments()
    {
        return $this->segments;
    }
}
