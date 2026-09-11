---
title: API Updates
pr_link: https://github.com/stripe/stripe-php/pull/1316
is_stripe_api_change: true
released_in_version: 8.9.0
---

* Add support for `deliver_card`, `fail_card`, `return_card`, and `ship_card` test helper methods on resource `Issuing.Card`
* Add support for `subtotal_excluding_tax` on `CreditNote` and `Invoice`
* Add support for `amount_excluding_tax` and `unit_amount_excluding_tax` on `CreditNoteLineItem` and `InvoiceLineItem`
* Add support for `total_excluding_tax` on `Invoice`
* Change type of `PaymentLink.payment_method_types[]` from `literal('card')` to `enum`
* Add support for `promptpay` on `PaymentMethod`
* Add support for new value `promptpay` on enum `PaymentMethod.type`
* Add support for `hosted_regulatory_receipt_url` and `reversal_details` on `Treasury.ReceivedCredit` and `Treasury.ReceivedDebit`
