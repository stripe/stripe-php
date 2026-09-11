---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1738
is_stripe_api_change: true
released_in_version: 15.9.0-beta.1
---

* Add support for new resources `Billing.MeterErrorReport` and `Terminal.ReaderCollectedData`
* Add support for `retrieve` method on resource `ReaderCollectedData`
* Add support for new value `terminal_reader_collected_data_invalid` on enum `StripeError.code`
* Add support for new value `billing.meter_error_report.triggered` on enum `Event.type`
* Add support for `regulatory_reporting_file` on `Issuing.CreditUnderwritingRecord`
* Add support for new value `mb_way` on enum `PaymentLink.payment_method_types[]`
* Add support for `mb_way` on `PaymentMethod`
* Add support for new value `mb_way` on enum `PaymentMethod.type`
