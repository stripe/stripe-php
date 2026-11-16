<?php

namespace Stripe\V2\Core;

/**
 * Base class for V2 events.
 *
 * This is concrete for use in our generated tests. Events returned from the \Stripe\V2\Core\EventService
 * will be a subtype of \Stripe\V2\Core\Event.
 *
 * @property string $id Unique identifier for the event.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $created Time at which the object was created.
 * @property \Stripe\StripeObject $reason Reason for the event.
 * @property string $type The type of the event.
 * @property null|string $context The Stripe account of the event
 */
class Event extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.event';

    /**
     * Scopes this event's request options to its own `context`, discarding any
     * `Stripe-Account` header carried over from the client used to retrieve it.
     * This mirrors EventNotification's constructor, which does the same thing via
     * `BaseStripeClient::withStripeContext()`. Without it, `fetchRelatedObject()`
     * (defined on generated subclasses) would merge its per-request `stripe_context`
     * override onto this event's base options, but a stale `Stripe-Account` header
     * from the retrieving client would survive that merge and be sent alongside it.
     *
     * @param array $values
     * @param null|array|string|\Stripe\Util\RequestOptions $opts
     * @param bool $partial
     * @param 'v1'|'v2' $apiMode
     */
    public function refreshFrom($values, $opts, $partial = false, $apiMode = 'v1')
    {
        parent::refreshFrom($values, $opts, $partial, $apiMode);

        // Explicitly clear the account so the process-global fallback cannot refill it.
        $this->_opts->headers['Stripe-Account'] = \Stripe\Util\RequestOptions::STRIPE_ACCOUNT_UNSET;
        if (isset($this->context)) {
            $this->_opts->headers['Stripe-Context'] = (string) $this->context;
        } else {
            unset($this->_opts->headers['Stripe-Context']);
        }
    }
}
