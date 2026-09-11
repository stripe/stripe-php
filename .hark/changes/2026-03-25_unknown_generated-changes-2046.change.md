---
title: "Generated changes from [#2046](https://github.com/stripe/stripe-php/pull/2046), [#2044](https://github.com/stripe/stripe-php/pull/2044), [#2025](https://github.com/stripe/stripe-php/pull/2025)"
is_breaking: true
is_stripe_api_change: true
section: ⚠️ Breaking changes due to changes in the Stripe API
released_in_version: 20.0.0
---

* Add support for `upi_payments` on `Account.capabilities`, `Account.create().$params.capability`, and `Account.update().$params.capability`
* Add support for `upi` on `Charge.payment_method_details`, `Checkout.Session.payment_method_options`, `Checkout\Session.create().$params.payment_method_option`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `Mandate.payment_method_details`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupAttempt.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, `SetupIntent.update().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_option`
* Add support for new value `tempo` on enums `Charge.payment_method_details.crypto.network`, `PaymentAttemptRecord.payment_method_details.crypto.network`, and `PaymentRecord.payment_method_details.crypto.network`
* Add support for `integration_identifier` on `Checkout.Session` and `Checkout\Session.create().$params`
* Add support for `crypto` on `Checkout\Session.create().$params.payment_method_option`
* Add support for `pending_invoice_item_interval` on `Checkout\Session.create().$params.subscription_datum`
* Add support for new values `elements`, `embedded_page`, `form`, and `hosted_page` on enum `Checkout.Session.ui_mode`
* Add support for new value `marine_carbon_removal` on enum `Climate.Supplier.removal_pathway`
* Add support for new value `upi` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for `metadata` on `CreditNote.create().$params.line`, `CreditNote.preview().$params.line`, `CreditNote.preview_lines().$params.line`, and `CreditNoteLineItem`
* Add support for `quantity_decimal` on `Invoice.add_lines().$params.line`, `Invoice.create_preview().$params.invoice_item`, `Invoice.update_lines().$params.line`, `InvoiceItem.create().$params`, `InvoiceItem.update().$params`, `InvoiceItem`, `InvoiceLineItem.update().$params`, and `InvoiceLineItem`
* ⚠️ Add support for `level` on `Issuing\Authorization.create().$params.risk_assessment.card_testing_risk` and `Issuing\Authorization.create().$params.risk_assessment.merchant_dispute_risk`
* ⚠️ Remove support for `risk_level` on `Issuing\Authorization.create().$params.risk_assessment.card_testing_risk` and `Issuing\Authorization.create().$params.risk_assessment.merchant_dispute_risk`
* Add support for `lifecycle_controls` on `Issuing.Card` and `Issuing\Card.create().$params`
* ⚠️ Change type of `Issuing.Token.network_data.visa.card_reference_id` from `string` to `nullable(string)`
* ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.brand` and `PaymentRecord.payment_method_details.card.brand` from `enum` to `nullable(enum)`
* ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.exp_month` and `PaymentRecord.payment_method_details.card.exp_month` from `longInteger` to `nullable(longInteger)`
* ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.exp_year` and `PaymentRecord.payment_method_details.card.exp_year` from `longInteger` to `nullable(longInteger)`
* ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.funding` and `PaymentRecord.payment_method_details.card.funding` from `enum('credit'|'debit'|'prepaid'|'unknown')` to `nullable(enum('credit'|'debit'|'prepaid'|'unknown'))`
* ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.last4` and `PaymentRecord.payment_method_details.card.last4` from `string` to `nullable(string)`
* ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.moto` and `PaymentRecord.payment_method_details.card.moto` from `boolean` to `nullable(boolean)`
* Add support for `cryptogram`, `electronic_commerce_indicator`, `exemption_indicator_applied`, and `exemption_indicator` on `PaymentAttemptRecord.payment_method_details.card.three_d_secure` and `PaymentRecord.payment_method_details.card.three_d_secure`
* Add support for new value `upi` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for `upi_handle_redirect_or_display_qr_code` on `PaymentIntent.next_action` and `SetupIntent.next_action`
* Add support for new value `upi` on enum `PaymentLink.payment_method_types`
* Add support for `recommended_action` and `signals` on `Radar.PaymentEvaluation`
* ⚠️ Remove support for `insights` on `Radar.PaymentEvaluation`
* Add support for new value `crypto_fingerprint` on enum `Radar.ValueList.item_type`
* Add support for new value `canceled_by_retention_policy` on enum `Subscription.cancellation_details.reason`
* ⚠️ Change type of `V2.Core.EventDestination.events_from` from `enum('other_accounts'|'self')` to `string`
* Add support for error code `service_period_coupon_with_metered_tiered_item_unsupported` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
