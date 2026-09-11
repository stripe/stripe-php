---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1613
is_stripe_api_change: true
released_in_version: 13.6.0
---

* Add support for new values `customer_tax_location_invalid` and `financial_connections_no_successful_transaction_refresh` on enum `StripeError.code`
* Add support for new values `payment_network_reserve_hold` and `payment_network_reserve_release` on enum `BalanceTransaction.type`
* Remove support for value `various` from enum `Climate.Supplier.removal_pathway`
* Add support for `inactive_message` and `restrictions` on `PaymentLink`
