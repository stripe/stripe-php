---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2135
is_breaking: true
is_stripe_api_change: true
released_in_version: 21.4.0-alpha.2
---

* Add support for new resources `Radar.BillingEvaluation`, `V2.Signals.PaymentRetryEvaluation`, `V2.Signals.PaymentRetrySignal`, and `V2.Tax.IntegrationConfiguration`
* Add support for `create` method on resource `Radar.BillingEvaluation`
* Add support for `all`, `create`, `deactivate`, `retrieve`, and `update` methods on resource `Billing.FeedbackOption`
* Add support for `retrieve` and `update` methods on resource `V2.Tax.IntegrationConfiguration`
* Add support for `retrieve` method on resource `V2.Signals.PaymentRetrySignal`
* Add support for `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.Signals.PaymentRetryEvaluation`
* Add support for `disable` method on resource `V2.MoneyManagement.PayoutMethod`
* Add support for `update` method on resource `V2.Core.ApprovalRequest`
* ⚠️ Remove support for `execute` and `submit` methods on resource `V2.Core.ApprovalRequest`
* Add support for `disable_stripe_user_authentication` on `AccountSession.create().$params.component.payment_method_setting.feature`
* Add support for `capital_financing_manual_payment` on `AccountSession.components`
* Add support for `sequra_payments` on `Account.capabilities`
* Add support for `feedback_options` on `BillingPortal\Configuration.create().$params.feature.subscription_cancel.cancellation_reason` and `BillingPortal\Configuration.update().$params.feature.subscription_cancel.cancellation_reason`
* Add support for new value `fundbox_ca_financing` on enum `Capital.FinancingSummary.details.disclaimer_variant`
* Add support for `sequra` on `Charge.payment_method_details`, `Checkout.Session.payment_method_options`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.payment_method_options`, and `PaymentRecord.payment_method_details`
* ⚠️ Remove support for value `data_share_only` from enums `Charge.payment_method_details.card.three_d_secure.result`, `PaymentAttemptRecord.payment_method_details.card.three_d_secure.result`, `PaymentRecord.payment_method_details.card.three_d_secure.result`, and `SetupAttempt.payment_method_details.card.three_d_secure.result`
* Add support for `funding_types_blocked` on `Checkout\Session.create().$params.payment_method_option.card.restriction`
* Add support for `payment_intent_data` on `Checkout\Session.update().$params`
* ⚠️ Change type of `Checkout.Session.payment_method_options.bancontact.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
* Add support for `metadata` on `ConfirmationToken`, `V2.Signals.AccountActivity`, and `V2\Signals\AccountActivity.create().$params`
* Add support for new value `sequra` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for `active_entitlements` and `customer_portal` on `CustomerSession.create().$params.component`
* Add support for `address_match_confidence` and `name_match_confidence` on `Identity.VerificationReport.email` and `Identity.VerificationReport.phone`
* Add support for `domain_country`, `email_exists_confidence`, `observed_domain_tenure_days`, `observed_email_tenure_days`, and `phone_match_confidence` on `Identity.VerificationReport.email`
* Add support for new values `email_address_mismatch`, `email_name_mismatch`, `email_ownership_unverified`, `email_phone_mismatch`, and `email_short_tenure` on enum `Identity.VerificationReport.email.error.code`
* Add support for `carrier`, `line_type`, and `observed_phone_tenure_days` on `Identity.VerificationReport.phone`
* Add support for new values `phone_address_mismatch`, `phone_invalid_line_type`, `phone_invalid`, `phone_name_mismatch`, `phone_ownership_unverified`, `phone_short_tenure`, and `phone_unsupported_country` on enum `Identity.VerificationReport.phone.error.code`
* Add support for new values `email_address_mismatch`, `email_name_mismatch`, `email_ownership_unverified`, `email_phone_mismatch`, `email_short_tenure`, `phone_address_mismatch`, `phone_invalid_line_type`, `phone_invalid`, `phone_name_mismatch`, `phone_ownership_unverified`, `phone_short_tenure`, and `phone_unsupported_country` on enum `Identity.VerificationSession.last_error.code`
* Add support for new value `truemoney` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* ⚠️ Remove support for `payment_method_types` on `PaymentIntent.confirm().$params`, `PaymentIntent.create().$params`, `PaymentIntent.update().$params`, `SetupIntent.create().$params`, and `SetupIntent.update().$params`
* Add support for `verification_method` on `PaymentIntent.confirm().$params.payment_method_option.bacs_debit`, `PaymentIntent.create().$params.payment_method_option.bacs_debit`, `PaymentIntent.payment_method_options.bacs_debit`, `PaymentIntent.update().$params.payment_method_option.bacs_debit`, `SetupIntent.confirm().$params.payment_method_option.bacs_debit`, `SetupIntent.create().$params.payment_method_option.bacs_debit`, `SetupIntent.payment_method_options.bacs_debit`, and `SetupIntent.update().$params.payment_method_option.bacs_debit`
* Add support for new value `touch_n_go` on enums `PaymentIntent.allowed_payment_method_types` and `SetupIntent.allowed_payment_method_types`
* Add support for new value `sequra` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Change `PaymentIntent.allowed_payment_method_types` and `SetupIntent.allowed_payment_method_types` to be required
* Add support for `application_fee_amount`, `application_fee_percent`, `on_behalf_of`, and `transfer_data` on `PaymentLink.update().$params`
* Add support for `canceled` on `PaymentRecord.report_payment().$params` and `PaymentRecord.report_payment_attempt().$params`
* ⚠️ Change type of `ProductCatalog.TrialOffer.price` from `$Price` to `deletable($Price)`
* ⚠️ Change `ProductCatalog.TrialOffer.name` to be optional
* Add support for `recurring` on `SharedPayment.GrantedToken.usage_limits`, `SharedPayment.IssuedToken.usage_limits`, `SharedPayment\GrantedToken.create().$params.usage_limit`, and `SharedPayment\IssuedToken.create().$params.usage_limit`
* Add support for `feedback_option` on `Subscription.cancel().$params.cancellation_detail` and `Subscription.update().$params.cancellation_detail`
* Add support for `pricing_token` on `Subscription.update().$params`
* Add support for `igic` on `Tax\Registration.create().$params.country_option.at`, `Tax\Registration.create().$params.country_option.be`, `Tax\Registration.create().$params.country_option.bg`, `Tax\Registration.create().$params.country_option.cy`, `Tax\Registration.create().$params.country_option.cz`, `Tax\Registration.create().$params.country_option.de`, `Tax\Registration.create().$params.country_option.dk`, `Tax\Registration.create().$params.country_option.e`, `Tax\Registration.create().$params.country_option.ee`, `Tax\Registration.create().$params.country_option.fi`, `Tax\Registration.create().$params.country_option.fr`, `Tax\Registration.create().$params.country_option.gr`, `Tax\Registration.create().$params.country_option.hr`, `Tax\Registration.create().$params.country_option.hu`, `Tax\Registration.create().$params.country_option.ie`, `Tax\Registration.create().$params.country_option.it`, `Tax\Registration.create().$params.country_option.lt`, `Tax\Registration.create().$params.country_option.lu`, `Tax\Registration.create().$params.country_option.lv`, `Tax\Registration.create().$params.country_option.mt`, `Tax\Registration.create().$params.country_option.nl`, `Tax\Registration.create().$params.country_option.pl`, `Tax\Registration.create().$params.country_option.pt`, `Tax\Registration.create().$params.country_option.ro`, `Tax\Registration.create().$params.country_option.se`, `Tax\Registration.create().$params.country_option.si`, and `Tax\Registration.create().$params.country_option.sk`
* Add support for `one_time_fees` on `V2.Billing.Contract` and `V2\Billing\Contract.create().$params`
* ⚠️ Remove support for `payment_method_collection` on `V2.Core.Account.configuration.merchant.gross_settlement`, `V2\Core\Account.create().$params.configuration.merchant.gross_settlement`, and `V2\Core\Account.update().$params.configuration.merchant.gross_settlement`
* Add support for `payout_methods` on `V2.Core.Account.defaults` and `V2\Core\Account.update().$params.default`
* Add support for `reason` on `V2.Core.ApprovalRequest`
* ⚠️ Remove support for `description` on `V2.Core.ApprovalRequest`
* Add support for `api_key`, `type`, and `user` on `V2.Core.ApprovalRequest.requested_by` and `V2.Core.ApprovalRequest.review.reviewed_by`
* ⚠️ Remove support for `id` and `name` on `V2.Core.ApprovalRequest.requested_by` and `V2.Core.ApprovalRequest.review.reviewed_by`
* Add support for `approved_at` on `V2.Core.ApprovalRequest.status_transitions`
* ⚠️ Remove support for `requires_execution_at` on `V2.Core.ApprovalRequest.status_transitions`
* Add support for `crypto_transaction` on `V2.Core.FeeBatch.collection_records[]`
* Add support for new value `crypto_transaction` on enum `V2.Core.FeeBatch.collection_records[].type`
* Add support for `restricted` on `V2.Core.Vault.GbBankAccount` and `V2.Core.Vault.UsBankAccount`
* Add support for `savings` on `V2.MoneyManagement.FinancialAccount` and `V2\MoneyManagement\FinancialAccount.create().$params`
* Add support for new value `savings` on enum `V2.MoneyManagement.FinancialAccount.type`
* Add support for `enabled_delivery_schemes` on `V2.MoneyManagement.PayoutMethod.bank_account`
* ⚠️ Remove support for `enabled_delivery_options` on `V2.MoneyManagement.PayoutMethod.bank_account`
* Add support for new value `disabled` on enum `V2.MoneyManagement.PayoutMethod.usage_status.payments`
* Add support for new value `disabled` on enum `V2.MoneyManagement.PayoutMethod.usage_status.transfers`
* Add support for `to_account` on `V2.MoneyManagement.ReceivedDebit.balance_transfer`
* Add support for `account_restricted` and `account_suspended` on `V2.Signals.AccountActivity` and `V2\Signals\AccountActivity.create().$params`
* Add support for new values `account_restricted` and `account_suspended` on enum `V2.Signals.AccountActivity.type`
* ⚠️ Remove support for value `not_assessed` from enums `V2.Signals.AccountEvaluation.evaluated_signals.fraudulent_website.risk_level`, `V2.Signals.AccountEvaluation.evaluated_signals.user_account_sharing.risk_level`, `V2.Signals.AccountEvaluation.evaluated_signals.user_multi_accounting.risk_level`, `V2.Signals.AccountSignal.fraudulent_merchant.risk_level`, `V2.Signals.AccountSignal.fraudulent_website.risk_level`, `V2.Signals.AccountSignal.merchant_delinquency.risk_level`, `V2.Signals.AccountSignal.user_account_sharing.risk_level`, and `V2.Signals.AccountSignal.user_multi_accounting.risk_level`
* Add support for `additional_details` on `V2.Signals.AccountSignal.fraudulent_merchant` and `V2.Signals.AccountSignal.merchant_delinquency`
* ⚠️ Remove support for `indicators` on `V2.Signals.AccountSignal.fraudulent_merchant` and `V2.Signals.AccountSignal.merchant_delinquency`
* Add support for `action`, `created`, and `status` on `V2\Core\ApprovalRequest.all().$params`
* Add support for `one_time_fee_actions` on `V2\Billing\Contract.update().$params`
* Add support for event notifications `V2CoreHealthMetronomeNotificationLatencyFiringEvent`, `V2CoreHealthMetronomeNotificationLatencyResolvedEvent`, and `V2SignalsPaymentRetryEvaluationsRetryRecommendedEvent`
* Add support for event notifications `V2MoneyManagementPayoutIntentCanceledEvent`, `V2MoneyManagementPayoutIntentCreatedEvent`, `V2MoneyManagementPayoutIntentPostedEvent`, `V2MoneyManagementPayoutIntentProcessingEvent`, and `V2MoneyManagementPayoutIntentRequiresActionEvent` with related object `V2.MoneyManagement.PayoutIntent`
* Add support for error codes `authentication_failure`, `capability_not_active`, `expired_payment_method`, `incorrect_postal_code`, `invalid_canceled_subscription_fields`, and `payment_method_restricted` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `QuotePreviewInvoice.last_finalization_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, `StripeError`, and `Terminal.Reader.action.api_error`
