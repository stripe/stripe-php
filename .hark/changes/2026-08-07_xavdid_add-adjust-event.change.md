---
title: add/adjust event parsing helpers
pr_link: https://github.com/stripe/stripe-php/pull/2105
released_in_version: 21.2.0
---

- Added methods that return their respective `Event`/`EventNotification` class instances without verifying authenticity. Use them when you've previously verified an event (e.g. you verified, put the event in a queue, and are now processing). Supports events from [AWS EventBridge](https://docs.stripe.com/event-destinations/eventbridge) and [Azure Event Grid](https://docs.stripe.com/event-destinations/eventgrid) natively.
  - `Webhook::constructEventWithoutVerification($payload)`
  - `BaseStripeClient::constructEventWithoutVerification($payload)`
  - `BaseStripeClient::parseEventNotificationWithoutVerification($payload)`
- Added `WebhookSignature::generateSignatureHeader($payload, $secret, $timestamp = null)`, which computes a full `Stripe-Signature` header for the given payload. Useful for unit tests!
