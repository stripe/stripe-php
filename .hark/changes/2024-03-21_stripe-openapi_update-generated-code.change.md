---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1664
is_stripe_api_change: true
released_in_version: 13.15.0
---

* Add support for new resources `ConfirmationToken` and `Forwarding.Request`
* Add support for `retrieve` method on resource `ConfirmationToken`
* Add support for `all`, `create`, and `retrieve` methods on resource `Request`
* Add support for new values `forwarding_api_inactive`, `forwarding_api_invalid_parameter`, `forwarding_api_upstream_connection_error`, and `forwarding_api_upstream_connection_timeout` on enum `StripeError.code`
* Add support for `mobilepay` on `PaymentMethod`
* Add support for new value `mobilepay` on enum `PaymentMethod.type`
* Add support for `name` on `Terminal.Configuration`
