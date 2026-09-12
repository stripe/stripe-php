---
title: Major version release of v8.0.0. The [migration guide](https://github.com/stripe/stripe-php/wiki/Migration-Guide-for-v8) contains more information.
pr_url: https://github.com/stripe/stripe-php/pull/1283
is_breaking: true
released_in_version: 8.0.0
---

(⚠️ = breaking changes):
* ⚠️ Replace the legacy `Order` API with the new `Order` API.
  * Resource modified: `Order`.
  * New methods: `cancel`, `list_line_items`, `reopen`, and `submit`
  * Removed methods: `pay` and `return_order`
  * Removed resources: `OrderItem` and `OrderReturn`
  * Removed references from other resources: `Charge.order`
* ⚠️ Rename `\FinancialConnections\Account.refresh` method to `\FinancialConnections\Account.refresh_account`
* Add support for `amount_discount`, `amount_tax`, and `product` on `LineItem`
