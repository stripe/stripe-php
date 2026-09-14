---
title: Add streaming methods to Service infra
pr_url: https://github.com/stripe/stripe-php/pull/1155
released_in_version: 7.88.0
---

* Add support for `setStreamingHttpClient` and `streamingHttpClient` to `ApiRequestor`
* Add support for `getStreamingClient` and `requestStream` to `AbstractService`
* Add support for `requestStream` to `BaseStripeClient`
* `\Stripe\RequestOptions::parse` now clones its input if it is already a `RequestOptions` object, to prevent accidental mutation.
