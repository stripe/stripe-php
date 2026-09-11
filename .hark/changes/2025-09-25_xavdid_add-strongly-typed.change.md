---
title: Add strongly typed EventNotifications
pr_link: https://github.com/stripe/stripe-php/pull/1903
is_breaking: true
released_in_version: 18.0.0
---

We've overhauled how V2 Events are handled in the SDK! This approach should provide a lot more information at authoring and compile time, leading to more robust integrations. As part of this process, there are a number of changes to be aware of.
- Added matching `EventNotification` classes for every v2 `Event`. For example, there's now a `V1BillingMeterErrorReportTriggeredEventNotification` to match the existing `V1BillingMeterErrorReportTriggeredEvent`. Each of these interfaces defines a `fetchEvent()` method to retrieve its corresponding event. For events with related objects, there's a `fetchRelatedObject()` method that performs the API call and casts the response to the correct type.
- ⚠️ Rename function `StripeClient->parseThinEvent` to `StripeClient->parseEventNotification` and remove the `ThinEvent` class.
    - This function now returns a `Stripe\V2\Core\EventNotification` (which is the shared base class that all of the more specific `Stripe\*EventNotifications` classes  share) instead of `ThinEvent`. When applicable, these event notifications will have the `relatedObject` property and a `fetchRelatedObject()` function. They also have a `fetchEvent()` method to retrieve their corresponding `Stripe\Event\*Event` instance.
    - If you parse an event the SDK doesn't have types for (e.g. it's newer than the SDK you're using), you'll get an instance of `Stripe\Events\UnknownEventNotification` instead of a more specific type. It has both the `relatedObject` property and the `FetchRelatedObject()` function (but they may be/return `null`)
- ⚠️ removed the `Util::json_decode_thin_event_object`. Its functionality was folded into the new `\Stripe\V2\EventNotification::fromJson` method.
