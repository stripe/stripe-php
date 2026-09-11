---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1721
is_breaking: true
is_stripe_api_change: true
released_in_version: 15.2.0
---

* ⚠️ Remove support for values `billing_policy_remote_function_response_invalid`, `billing_policy_remote_function_timeout`, `billing_policy_remote_function_unexpected_status_code`, and `billing_policy_remote_function_unreachable` from enum `StripeError.code`.
* ⚠️ Remove support for value `payment_intent_fx_quote_invalid` from enum `StripeError.code`. The was mistakenly released last week.
* Add support for `payment_method_options` on `ConfirmationToken`
