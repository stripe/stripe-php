---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2194
semver_level: major
is_stripe_api_change: true
released_in_version: 22.2.0-alpha.3
---

* Add support for new resource `V2.MoneyManagement.SpendingMandate`
* Add support for `all`, `cancel`, and `retrieve` methods on resource `V2.MoneyManagement.SpendingMandate`
* Add support for `cardholder_message` on `Charge.payment_method_details.card_present.receipt`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present.receipt`, `PaymentAttemptRecord.payment_method_details.card_present.receipt`, `PaymentMethod.card.generated_from.payment_method_details.card_present.receipt`, and `PaymentRecord.payment_method_details.card_present.receipt`
* Add support for `pricing_token` on `Checkout\Session.create().$params`
* Add support for `marketing_attributions` on `Customer.update().$params`
* Add support for `fraudulent_selfie` on `Identity.VerificationReport.signals`
* Add support for `toss_pay` on `Mandate.payment_method_details`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, and `SetupAttempt.payment_method_details`
* Add support for `payment_evaluations` on `PaymentAttemptRecord.report_authenticated().$params`
* Add support for `three_d_secure` on `PaymentAttemptRecord.report_authorized().$params.payment_method_detail.card`, `PaymentAttemptRecord.report_guaranteed().$params.payment_method_detail.card`, `PaymentRecord.report_payment().$params.payment_method_detail.card`, `PaymentRecord.report_payment_attempt().$params.payment_method_detail.card`, and `PaymentRecord.report_payment_attempt_guaranteed().$params.payment_method_detail.card`
* Add support for `wechat_pay_redirect_to_mini_program` on `PaymentIntent.next_action`
* Add support for `customer_presence` and `payment_type` on `Radar.PaymentEvaluation.payment_details.money_movement_details.sepa_debit` and `Radar\PaymentEvaluation.create().$params.payment_detail.money_movement_detail.sepa_debit`
* Add support for `financial_connections` on `SetupIntent.confirm().$params.payment_method_option.bacs_debit`, `SetupIntent.create().$params.payment_method_option.bacs_debit`, `SetupIntent.payment_method_options.bacs_debit`, and `SetupIntent.update().$params.payment_method_option.bacs_debit`
* Add support for `referral_fee_details` on `SharedPayment.GrantedToken`, `SharedPayment.IssuedToken`, and `SharedPayment\IssuedToken.create().$params`
* Add support for `device_health_details` and `device_health` on `Terminal.Reader`
* Add support for new values `check_attachment_too_large`, `check_expired`, and `check_undeliverable` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
* Add support for `check_send` on `V2.MoneyManagement.OutboundPayment.to.payout_method_options`, `V2.MoneyManagement.OutboundPayment.tracking_details`, `V2.MoneyManagement.PayoutIntent.to.payout_method_options`, `V2.MoneyManagement.PayoutMethod`, `V2\MoneyManagement\OutboundPayment.create().$params.to.payout_method_option`, `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum`, `V2\MoneyManagement\PayoutIntent.create().$params.to.payout_method_option`, and `V2\MoneyManagement\PayoutIntent.update().$params.to.payout_method_option`
* Add support for new values `check_attachment_too_large`, `check_expired`, and `check_undeliverable` on enum `V2.MoneyManagement.PayoutIntent.next_action.handle_failure.failure_reason`
* Add support for new value `check_send` on enum `V2.MoneyManagement.PayoutMethod.type`
* Add support for `spending_mandate` on `V2.MoneyManagement.ReceivedDebit.bank_transfer` and `V2\MoneyManagement\ReceivedDebit.all().$params`
* Add support for event notifications `V2MoneyManagementSpendingMandateCanceledEvent`, `V2MoneyManagementSpendingMandateCreatedEvent`, `V2MoneyManagementSpendingMandateExpiredEvent`, `V2MoneyManagementSpendingMandatePendingCancellationEvent`, and `V2MoneyManagementSpendingMandateUpdatedEvent` with related object `V2.MoneyManagement.SpendingMandate`
* ⚠️ Add error type `MerchantNotGatedException` on `V2.Core.Vault.NetworkToken#create_from_credential`
