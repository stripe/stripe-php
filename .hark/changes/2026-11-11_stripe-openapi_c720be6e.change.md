---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2194
semver_level: major
is_stripe_api_change: true
---

* Add support for new resources `Tax.Certificate`, `Tax.FormCorrection`, `V2.Core.AccountSession`, `V2.Extend.ObjectDefinitionVersion`, `V2.Extend.ObjectDefinition`, and `V2.MoneyManagement.SpendingMandate`
* ⚠️ Remove support for resource `V2.Core.AccountSessionResource`
* Add support for `all`, `create`, `delete`, and `retrieve` methods on resource `Tax.Certificate`
* Add support for `create` method on resource `Tax.Form`
* Add support for `all`, `cancel`, and `retrieve` methods on resource `V2.MoneyManagement.SpendingMandate`
* Add support for `all` and `retrieve` methods on resources `V2.Extend.ObjectDefinitionVersion` and `V2.Extend.ObjectDefinition`
* Add support for `bills`, `financial_account_rewards`, `financial_accounts_transactions`, `financial_accounts`, `network_cost_passthrough_report`, and `recipients_list` on `AccountSession.create().$params.component`
* Add support for `business_profile_management` on `AccountSession.create().$params.component` and `V2\Core\AccountSessionResource.create().$params.component`
* Add support for `export_tax_transactions`, `product_tax_code_selector`, and `tax_threshold_monitoring` on `AccountSession.components`
* Add support for `aeon_pay`, `au_pay`, `dbarai`, and `merpay` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentMethod.create().$params`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for `funding_sources` on `Charge.payment_method_details.card.wallet.link` and `Charge.payment_method_details.link`
* Add support for `fleet` on `Charge.payment_method_details.card_present`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.card_present`, `PaymentMethod.card.generated_from.payment_method_details.card_present`, and `PaymentRecord.payment_method_details.card_present`
* Add support for `cardholder_message` on `Charge.payment_method_details.card_present.receipt`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present.receipt`, `PaymentAttemptRecord.payment_method_details.card_present.receipt`, `PaymentMethod.card.generated_from.payment_method_details.card_present.receipt`, and `PaymentRecord.payment_method_details.card_present.receipt`
* Add support for `fingerprint` on `Charge.payment_method_details.paypay`, `PaymentAttemptRecord.payment_method_details.paypay`, `PaymentRecord.payment_method_details.paypay`, and `SetupAttempt.payment_method_details.paypay`
* Add support for `custom_payment_method_options` and `pricing_token` on `Checkout\Session.create().$params`
* Add support for `stripe_balance` on `Checkout.Session.payment_method_options` and `Checkout\Session.create().$params.payment_method_option`
* Add support for `setup_future_usage` on `Checkout.Session.payment_method_options.paypay` and `Checkout\Session.create().$params.payment_method_option.paypay`
* Add support for new value `buyer_choice` on enum `Checkout.Session.payment_method_options.acss_debit.mandate_options.transaction_type`
* Add support for new value `instant` on enums `Checkout.Session.payment_method_options.bacs_debit.verification_method`, `Invoice.payment_settings.payment_method_options.bacs_debit.verification_method`, `PaymentIntent.payment_method_options.bacs_debit.verification_method`, `QuotePreviewInvoice.payment_settings.payment_method_options.bacs_debit.verification_method`, `SetupIntent.payment_method_options.bacs_debit.verification_method`, and `Subscription.payment_settings.payment_method_options.bacs_debit.verification_method`
* Add support for new values `aeon_pay`, `au_pay`, `dbarai`, and `merpay` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for `marketing_attributions` on `Customer.update().$params`
* Add support for `reason_details` and `reason` on `CustomerTaxExemption.create().$params` and `CustomerTaxExemption`
* Add support for `tax_code_group` on `CustomerTaxExemption.create().$params.me` and `CustomerTaxExemption.us`
* Change `Dispute.evidence.appeal` to be required
* Add support for `fraudulent_selfie` on `Identity.VerificationReport.signals`
* Add support for `target_date` on `Invoice.create().$params.payment_setting.payment_method_option.sepa_debit`, `Invoice.payment_settings.payment_method_options.sepa_debit`, and `Invoice.update().$params.payment_setting.payment_method_option.sepa_debit`
* Change `Issuing.Card.shipping.delivered_at` to be required
* Change `Issuing.Card.shipping.shipped_at` to be required
* Add support for `toss_pay` on `Mandate.payment_method_details`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, and `SetupAttempt.payment_method_details`
* Add support for `payment_evaluations` and `payment_method_details` on `PaymentAttemptRecord.report_authenticated().$params`
* Add support for `three_d_secure` on `PaymentAttemptRecord.report_authorized().$params.payment_method_detail.card`, `PaymentAttemptRecord.report_guaranteed().$params.payment_method_detail.card`, `PaymentRecord.report_payment().$params.payment_method_detail.card`, `PaymentRecord.report_payment_attempt().$params.payment_method_detail.card`, and `PaymentRecord.report_payment_attempt_guaranteed().$params.payment_method_detail.card`
* Change type of `PaymentAttemptRecord.report_guaranteed().$params.payment_method_detail.type` and `PaymentRecord.report_payment_attempt_guaranteed().$params.payment_method_detail.type` from `literal('card')` to `enum('card'|'us_bank_account')`
* Add support for `dispute_details` on `PaymentAttemptRecord` and `PaymentRecord`
* Add support for `ev_charging` and `fleet_data` on `PaymentIntent.capture().$params.amount_detail.line_item.payment_method_option.card_present`, `PaymentIntent.confirm().$params.amount_detail.line_item.payment_method_option.card_present`, `PaymentIntent.create().$params.amount_detail.line_item.payment_method_option.card_present`, `PaymentIntent.decrement_authorization().$params.amount_detail.line_item.payment_method_option.card_present`, `PaymentIntent.increment_authorization().$params.amount_detail.line_item.payment_method_option.card_present`, `PaymentIntent.update().$params.amount_detail.line_item.payment_method_option.card_present`, and `PaymentIntentAmountDetailsLineItem.payment_method_options.card_present`
* Add support for `financial_connections` on `PaymentIntent.confirm().$params.payment_method_option.bacs_debit`, `PaymentIntent.create().$params.payment_method_option.bacs_debit`, `PaymentIntent.payment_method_options.bacs_debit`, `PaymentIntent.update().$params.payment_method_option.bacs_debit`, `SetupIntent.confirm().$params.payment_method_option.bacs_debit`, `SetupIntent.create().$params.payment_method_option.bacs_debit`, `SetupIntent.payment_method_options.bacs_debit`, and `SetupIntent.update().$params.payment_method_option.bacs_debit`
* Add support for new values `aeon_pay`, `au_pay`, `dbarai`, and `merpay` on enums `PaymentIntent.allowed_payment_method_types` and `SetupIntent.allowed_payment_method_types`
* Add support for new values `aeon_pay`, `au_pay`, `dbarai`, and `merpay` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for `wechat_pay_redirect_to_mini_program` on `PaymentIntent.next_action`
* Add support for `payment_details` on `PaymentIntent.payment_method_options.card_present` and `PaymentIntent.payment_method_options.card`
* ⚠️ Remove support for value `on_session` from enum `PaymentIntent.payment_method_options.paypay.setup_future_usage`
* Add support for new value `tamara` on enum `PaymentLink.payment_method_types`
* Add support for `rakuten_pay` on `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, and `PaymentMethodConfiguration`
* Add support for `sepa_debit` on `Radar.PaymentEvaluation.payment_details.money_movement_details` and `Radar\PaymentEvaluation.create().$params.payment_detail.money_movement_detail`
* Add support for new value `sepa_debit` on enum `Radar.PaymentEvaluation.payment_details.money_movement_details.money_movement_type`
* Add support for new value `continue_with_manual_review` on enum `Radar.PaymentEvaluation.recommended_action`
* Add support for `card_testing` on `Radar.PaymentEvaluation.signals`
* Add support for `payment_method` on `Refund.create().$params`
* Add support for `payment_record` on `Refund`
* Add support for `bizum` and `upi` on `Refund.destination_details`
* Add support for `tax_invoice_month` on `Reporting.ReportRun.parameters`
* Add support for `radar_options` on `SetupIntent.confirm().$params`, `SetupIntent.create().$params`, and `SetupIntent`
* Add support for `referral_fee_details` on `SharedPayment.GrantedToken`, `SharedPayment.IssuedToken`, and `SharedPayment\IssuedToken.create().$params`
* Add support for `billing_group` on `Subscription.all().$params`, `Subscription.create().$params`, `Subscription.update().$params`, and `Subscription`
* Add support for `device_health_details` and `device_health` on `Terminal.Reader`
* Add support for `network_details` on `Treasury.InboundTransfer.failure_details`, `Treasury.OutboundPayment.returned_details`, and `Treasury.OutboundTransfer.returned_details`
* Add support for `reference` on `V2.MoneyManagement.FinancialAddress.bank_account.iban`
* Add support for new values `check_attachment_too_large`, `check_expired`, and `check_undeliverable` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
* Add support for `check_send` on `V2.MoneyManagement.OutboundPayment.to.payout_method_options`, `V2.MoneyManagement.OutboundPayment.tracking_details`, `V2.MoneyManagement.PayoutIntent.to.payout_method_options`, `V2.MoneyManagement.PayoutMethod`, `V2\MoneyManagement\OutboundPayment.create().$params.to.payout_method_option`, `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum`, `V2\MoneyManagement\PayoutIntent.create().$params.to.payout_method_option`, and `V2\MoneyManagement\PayoutIntent.update().$params.to.payout_method_option`
* Add support for new values `check_attachment_too_large`, `check_expired`, and `check_undeliverable` on enum `V2.MoneyManagement.PayoutIntent.next_action.handle_failure.failure_reason`
* Add support for new value `check_send` on enum `V2.MoneyManagement.PayoutMethod.type`
* Add support for `spending_mandate` on `V2.MoneyManagement.ReceivedDebit.bank_transfer` and `V2\MoneyManagement\ReceivedDebit.all().$params`
* Add support for `additional_details` on `V2.Signals.AccountSignal.customer_risk`
* Add support for event notification `V2ExtendObjectDefinitionCreatedEvent` with related object `V2.Extend.ObjectDefinition`
* Add support for event notification `V2ExtendObjectDefinitionVersionCreatedEvent` with related object `V2.Extend.ObjectDefinitionVersion`
* Add support for event notifications `V2MoneyManagementSpendingMandateCanceledEvent`, `V2MoneyManagementSpendingMandateCreatedEvent`, `V2MoneyManagementSpendingMandateExpiredEvent`, `V2MoneyManagementSpendingMandatePendingCancellationEvent`, and `V2MoneyManagementSpendingMandateUpdatedEvent` with related object `V2.MoneyManagement.SpendingMandate`
* ⚠️ Add error type `MerchantNotGatedException` on `V2.Core.Vault.NetworkToken#create_from_credential`
