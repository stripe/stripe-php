---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2056
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.1.0
---

* Add support for `balance_report` and `payout_reconciliation_report` on `AccountSession.components` and `AccountSession.create().$params.component`
* Add support for `app_distribution` and `sunbit_payments` on `Account.capabilities`, `Account.create().$params.capability`, and `Account.update().$params.capability`
* Add support for new values `fee_credit_funding`, `inbound_transfer_reversal`, and `inbound_transfer` on enum `BalanceTransaction.type`
* Add support for `sunbit` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for new values `phantom_cash` and `usdt` on enums `Charge.payment_method_details.crypto.token_currency`, `PaymentAttemptRecord.payment_method_details.crypto.token_currency`, and `PaymentRecord.payment_method_details.crypto.token_currency`
* Add support for `location` and `reader` on `Charge.payment_method_details.klarna`, `PaymentAttemptRecord.payment_method_details.klarna`, and `PaymentRecord.payment_method_details.klarna`
* Add support for `mandate` on `Charge.payment_method_details.pix`, `PaymentAttemptRecord.payment_method_details.pix`, and `PaymentRecord.payment_method_details.pix`
* Add support for `managed_payments` on `Checkout.Session`, `Checkout\Session.create().$params`, `PaymentIntent`, `PaymentLink.create().$params`, `PaymentLink`, `SetupIntent`, and `Subscription`
* Add support for `mandate_options` on `Checkout.Session.payment_method_options.pix`, `Checkout\Session.create().$params.payment_method_option.pix`, `PaymentIntent.confirm().$params.payment_method_option.pix`, `PaymentIntent.create().$params.payment_method_option.pix`, `PaymentIntent.payment_method_options.pix`, and `PaymentIntent.update().$params.payment_method_option.pix`
* Change type of `Checkout\Session.create().$params.payment_method_option.pix.setup_future_usage`, `PaymentIntent.confirm().$params.payment_method_option.pix.setup_future_usage`, `PaymentIntent.create().$params.payment_method_option.pix.setup_future_usage`, and `PaymentIntent.update().$params.payment_method_option.pix.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
* Add support for new values `fo_vat`, `gi_tin`, `it_cf`, and `py_ruc` on enums `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, `Tax.Transaction.customer_details.tax_ids[].type`, and `TaxId.type`
* ⚠️ Change type of `Checkout.Session.payment_method_options.pix.setup_future_usage` and `PaymentIntent.payment_method_options.pix.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
* Add support for new value `sunbit` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for `pix` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `Mandate.payment_method_details`, `SetupAttempt.payment_method_details`, `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, `SetupIntent.update().$params.payment_method_option`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
* Add support for `upi` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
* Add support for new values `pix` and `upi` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
* Add support for `card_presence` on `Issuing.Authorization`
* Add support for `allowed_card_presences` and `blocked_card_presences` on `Issuing.Card.spending_controls`, `Issuing.Cardholder.spending_controls`, `Issuing\Card.create().$params.spending_control`, `Issuing\Card.update().$params.spending_control`, `Issuing\Cardholder.create().$params.spending_control`, and `Issuing\Cardholder.update().$params.spending_control`
* Add support for new value `fulfillment_error` on enum `Issuing.Card.cancellation_reason`
* Add support for new value `fulfillment_error` on enum `Issuing.Card.replacement_reason`
* Add support for `amount` and `currency` on `Mandate.multi_use`
* Add support for `amount_to_confirm` on `PaymentIntent.confirm().$params`
* Add support for new value `sunbit` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for `klarna_display_qr_code` on `PaymentIntent.next_action`
* Add support for new value `sunbit` on enum `PaymentLink.payment_method_types`
* Add support for new values `low`, `not_assessed`, and `unknown` on enum `Radar.PaymentEvaluation.signals.fraudulent_payment.risk_level`
* Add support for new value `account` on enum `Radar.ValueList.item_type`
* Add support for `moto` on `SetupAttempt.payment_method_details.card`
* Add support for `pix_display_qr_code` on `SetupIntent.next_action`
* Add support for error codes `action_blocked` and `approval_required` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
