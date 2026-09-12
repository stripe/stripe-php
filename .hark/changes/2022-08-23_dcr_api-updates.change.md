---
title: API Updates
pr_url: https://github.com/stripe/stripe-php/pull/1355
is_stripe_api_change: true
released_in_version: 9.3.0
---

* Change type of `Treasury.OutboundTransfer.destination_payment_method` from `string` to `string | null`
* Change the return type of `CustomerService.fundCashBalance` test helper from `CustomerBalanceTransaction` to `CustomerCashBalanceTransaction`.
  * This would generally be considered a breaking change, but we've worked with all existing users to migrate and are comfortable releasing this as a minor as it is solely a test helper method. This was essentially broken prior to this change.
