---
title: "fix: Fix type hints for error objects."
pr_url: https://github.com/stripe/stripe-php/pull/1361
released_in_version: 9.4.0
---

* Update `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error` and `SetupIntent.setup_error` type to be `StripeObject`.
  * Addresses https://github.com/stripe/stripe-php/issues/1353. The library today does not actually return a `ErrorObject` for these fields, so the type annotation was incorrect.
