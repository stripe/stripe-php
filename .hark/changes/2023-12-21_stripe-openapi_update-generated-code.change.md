---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1621
is_stripe_api_change: true
released_in_version: 13.7.0
---

* Add support for new resource `FinancialConnections.Transaction`
* Add support for `all` and `retrieve` methods on resource `Transaction`
* Add support for `subscribe` and `unsubscribe` methods on resource `FinancialConnections.Account`
* Add support for new value `financial_connections.account.refreshed_transactions` on enum `Event.type`
* Add support for `subscriptions` and `transaction_refresh` on `FinancialConnections.Account`
* Add support for new value `transactions` on enum `FinancialConnections.Session.prefetch[]`
* Add support for `revolut_pay` on `PaymentMethodConfiguration`
* Remove support for `id_bank_transfer`, `multibanco`, `netbanking`, `pay_by_bank`, and `upi` on `PaymentMethodConfiguration`
* Change type of `Quote.invoice_settings` from `nullable(InvoiceSettingQuoteSetting)` to `InvoiceSettingQuoteSetting`
* Add support for `destination_details` on `Refund`
