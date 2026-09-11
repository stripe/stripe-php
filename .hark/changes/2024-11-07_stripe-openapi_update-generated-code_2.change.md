---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1783
is_stripe_api_change: true
released_in_version: 16.3.0-beta.2
---

* Add support for new resources `Issuing.FraudLiabilityDebit`, `PaymentAttemptRecord`, and `PaymentRecord`
* Add support for `all` and `retrieve` methods on resources `FraudLiabilityDebit` and `PaymentAttemptRecord`
* Add support for `report_payment_attempt_canceled`, `report_payment_attempt_failed`, `report_payment_attempt_guaranteed`, `report_payment_attempt`, `report_payment`, and `retrieve` methods on resource `PaymentRecord`
* Add support for `adaptive_pricing` on `Checkout.Session`
* Add support for new values `invoice.payment_attempt_required` and `issuing_fraud_liability_debit.created` on enum `Event.type`
* Add support for `amount_overpaid` on `Invoice`
* Add support for new value `li_vat` on enum `TaxId.type`
* Add support for new value `service_tax` on enum `TaxRate.tax_type`
* Change type of `Treasury.InboundTransfer.origin_payment_method` from `string` to `nullable(string)`
