---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1729
is_stripe_api_change: true
released_in_version: 15.6.0
---

* Add support for `activate`, `all`, `archive`, `create`, `deactivate`, and `retrieve` methods on resource `Billing.Alert`
* Add support for `retrieve` method on resource `Tax.Calculation`
* Add support for new value `invalid_mandate_reference_prefix_format` on enum `StripeError.code`
* Add support for `related_customer` on `Identity.VerificationSession`
* Add support for new value `financial_addresses.aba.forwarding` on enums `Treasury.FinancialAccount.active_features[]`, `Treasury.FinancialAccount.pending_features[]`, and `Treasury.FinancialAccount.restricted_features[]`
