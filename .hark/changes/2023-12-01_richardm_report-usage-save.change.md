---
title: Report usage of .save and StripeClient
pr_url: https://github.com/stripe/stripe-php/pull/1612
released_in_version: 13.6.0
---

* Reports uses of the deprecated `.save` and of `StripeClient` in `X-Stripe-Client-Telemetry`. (You can disable telemetry via `\Stripe\Stripe::setEnableTelemetry(false);`, see the [README](https://github.com/stripe/stripe-php/blob/master/README.md#telemetry).)
