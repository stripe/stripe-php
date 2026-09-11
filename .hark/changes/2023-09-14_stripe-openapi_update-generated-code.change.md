---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1573
is_stripe_api_change: true
released_in_version: 12.3.0
---

* Add support for `capture`, `create`, `expire`, `increment`, and `reverse` test helper methods on resource `Issuing.Authorization`
* Add support for `create_force_capture`, `create_unlinked_refund`, and `refund` test helper methods on resource `Issuing.Transaction`
* Add support for new value `stripe_tax_inactive` on enum `StripeError.code`
