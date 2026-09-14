---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2016
is_stripe_api_change: true
released_in_version: 19.4.0
---

* Add support for new resources `Reserve.Hold`, `Reserve.Plan`, and `Reserve.Release`
* Add support for `location` and `reader` on `Charge.payment_method_details.card_present`, `Charge.payment_method_details.interac_present`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.interac_present`, `PaymentMethod.card.generated_from.payment_method_details.card_present`, `PaymentRecord.payment_method_details.card_present`, and `PaymentRecord.payment_method_details.interac_present`
* Add support for new value `lk_vat` on enums `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, `Tax.Transaction.customer_details.tax_ids[].type`, and `TaxId.type`
* Add support for new values `reserve.hold.created`, `reserve.hold.updated`, `reserve.plan.created`, `reserve.plan.disabled`, `reserve.plan.expired`, `reserve.plan.updated`, and `reserve.release.created` on enum `Event.type`
* Add support for new values `terminal_wifi_certificate` and `terminal_wifi_private_key` on enum `File.purpose`
* Add support for new value `pay_by_bank` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
* Add support for `display_name` and `service_user_number` on `Mandate.payment_method_details.bacs_debit`
* Change type of `PaymentAttemptRecord.payment_method_details.boleto.tax_id` and `PaymentRecord.payment_method_details.boleto.tax_id` from `string` to `nullable(string)`
* Change type of `PaymentAttemptRecord.payment_method_details.us_bank_account.expected_debit_date` and `PaymentRecord.payment_method_details.us_bank_account.expected_debit_date` from `nullable(string)` to `string`
* Add support for `transaction_purpose` on `PaymentIntent.confirm().$params.payment_method_option.us_bank_account`, `PaymentIntent.create().$params.payment_method_option.us_bank_account`, `PaymentIntent.payment_method_options.us_bank_account`, and `PaymentIntent.update().$params.payment_method_option.us_bank_account`
* Add support for `optional_items` on `PaymentLink.update().$params`
* Remove support for unused `card_issuer_decline` on `Radar.PaymentEvaluation.insights`
* Add support for `payment_behavior` on `SubscriptionItem.delete().$params`
* Add support for `lk` on `Tax.Registration.country_options` and `Tax\Registration.create().$params.country_option`
* Add support for `cellular` and `stripe_s710` on `Terminal.Configuration`, `Terminal\Configuration.create().$params`, and `Terminal\Configuration.update().$params`
* Add support for new values `simulated_stripe_s710` and `stripe_s710` on enum `Terminal.Reader.device_type`
* Add support for snapshot events `RESERVE_HOLD_CREATED` and `RESERVE_HOLD_UPDATED` with resource `Reserve.Hold`
* Add support for snapshot events `RESERVE_PLAN_CREATED`, `RESERVE_PLAN_DISABLED`, `RESERVE_PLAN_EXPIRED`, and `RESERVE_PLAN_UPDATED` with resource `Reserve.Plan`
* Add support for snapshot event `RESERVE_RELEASE_CREATED` with resource `Reserve.Release`
* Add support for error codes `storer_capability_missing` and `storer_capability_not_active` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
