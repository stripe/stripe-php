---
title: API Updates
pr_url: https://github.com/stripe/stripe-php/pull/1256
is_stripe_api_change: true
released_in_version: 7.119.0
---

* Add support for PayNow and US Bank Accounts Debits payments
    * Add support for `paynow` and `us_bank_account` on `PaymentMethod`
    * Add support for new values `paynow` and `us_bank_account` on enum `PaymentMethod.type`
* Add support for `failure_balance_transaction` on `Charge`
