---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2179
semver_level: major
is_stripe_api_change: true
released_in_version: 22.2.0-alpha.1
---

* Add support for new resources `V2.Billing.ContractTermQuantityChange`, `V2.Billing.ContractTerm`, `V2.Core.AccountSession`, `V2.MoneyManagement.FundingIntent`, `V2.MoneyManagement.InboundFunding`, `V2.MoneyManagement.RewardProgramEnrollment`, `V2.MoneyManagement.RewardProgramRule`, `V2.MoneyManagement.RewardProgram`, and `V2.Risk.Form`
* ⚠️ Remove support for resource `V2.Risk.Inquiry`
* Add support for `retrieve` and `update` methods on resource `V2.Risk.Form`
* Add support for `activate`, `all`, `create`, `deactivate`, and `retrieve` methods on resource `V2.MoneyManagement.RewardProgramEnrollment`
* Add support for `activate`, `all`, `create`, `deactivate`, `retrieve`, and `update` methods on resources `V2.MoneyManagement.RewardProgramRule` and `V2.MoneyManagement.RewardProgram`
* Add support for `all` and `retrieve` methods on resource `V2.MoneyManagement.InboundFunding`
* Add support for `all`, `cancel`, `confirm`, `create`, `retrieve`, and `update` methods on resource `V2.MoneyManagement.FundingIntent`
* Add support for `create` method on resource `V2.Core.AccountSession`
* Add support for `list_contract_terms` and `retrieve_contract_term` methods on resource `V2.Billing.ContractTerm`
* ⚠️ Remove support for `all`, `retrieve`, and `update` methods on resource `V2.Risk.Inquiry`
* ⚠️ Remove support for `fx_quote` method on resource `V2.MoneyManagement.PayoutIntent`
* Add support for `reject` and `unreject` methods on resource `V2.Core.Account`
* Add support for `billing_group` on `Billing.Alert.spend_threshold.filters`, `Billing.AlertNotification`, `Billing.AlertTriggered.group_by`, `Billing\Alert.create().$params.spend_threshold.filter`, and `Billing\AlertNotification.all().$params`
* Add support for `toss_pay` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for `mandate` on `Charge.payment_method_details.paypay`, `PaymentAttemptRecord.payment_method_details.paypay`, `PaymentRecord.payment_method_details.paypay`, `Subscription.create().$params.payment_setting`, `Subscription.payment_settings`, and `Subscription.update().$params.payment_setting`
* Add support for `automatic_pass_through_fee` on `Checkout.Session` and `Checkout\Session.create().$params`
* Add support for `paypay` on `Checkout.Session.payment_method_options` and `Checkout\Session.create().$params.payment_method_option`
* Change `Checkout\Session.create().$params.marketing_attribution.ad_conversion` to be optional
* Add support for `adjustable_quantity` on `Checkout.Session.items[].subscription.items[]`
* ⚠️ Change `Checkout.Session.marketing_attributions[].ad_conversion` to be optional
* Add support for `marketing_attributions` on `Customer.create().$params` and `Customer`
* Add support for `merchant_of_record` on `PaymentIntent.confirm().$params.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_detail.money_service.account_funding`, `PaymentIntent.payment_details.money_services.account_funding`, and `PaymentIntent.update().$params.payment_detail.money_service.account_funding`
* ⚠️ Change type of `Radar.PaymentEvaluation.signals.early_fraud_warning` from `Payment Evaluation Signal` to `nullable(Payment Evaluation Signal)`
* Change `Radar.PaymentEvaluation.signals.early_fraud_warning` to be required
* Add support for `payment_method_data` and `payment_method_options` on `Refund.create().$params`
* Add support for `debit_behavior` on `Subscription.create().$params.payment_setting.payment_method_option.sepa_debit`, `Subscription.payment_settings.payment_method_options.sepa_debit`, and `Subscription.update().$params.payment_setting.payment_method_option.sepa_debit`
* Add support for `terms` on `V2.Billing.Contract`, `V2\Billing\Contract.cancel().$params`, and `V2\Billing\Contract.create().$params`
* ⚠️ Add support for new value `user_affinity` on enum `V2.Core.AccountEvaluation.evaluations_triggered`
* ⚠️ Remove support for value `user_merchant_fit` from enum `V2.Core.AccountEvaluation.evaluations_triggered`
* Add support for `rejection` on `V2.Core.Account`
* Add support for `alipay_payments`, `scalapay_payments`, and `upi_payments` on `V2.Core.Account.configuration.merchant.capabilities`, `V2\Core\Account.create().$params.configuration.merchant.capability`, and `V2\Core\Account.update().$params.configuration.merchant.capability`
* Add support for `inbound_fundings` on `V2.Core.Account.configuration.money_manager.capabilities`, `V2\Core\Account.create().$params.configuration.money_manager.capability`, and `V2\Core\Account.update().$params.configuration.money_manager.capability`
* ⚠️ Remove support for `instant` and `sepa_credit` on `V2.Core.Account.configuration.recipient.capabilities.bank_accounts`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account`, and `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account`
* Add support for `compression` on `V2.Data.QueryRun.result_options`, `V2.Data.ReportRun.result_options`, `V2\Data\QueryRun.create().$params.result_option`, and `V2\Data\ReportRun.create().$params.result_option`
* ⚠️ Remove support for `compress_file` on `V2.Data.QueryRun.result_options`, `V2.Data.ReportRun.result_options`, `V2\Data\QueryRun.create().$params.result_option`, and `V2\Data\ReportRun.create().$params.result_option`
* Add support for `query_errors` on `V2.Data.QueryRun.status_details` and `V2.Data.ReportRun.status_details`
* Add support for new values `execution_failed` and `resource_limit_exceeded` on enums `V2.Data.QueryRun.status_details.code` and `V2.Data.ReportRun.status_details.code`
* Add support for `format` on `V2.Data.ReportRun`
* Add support for `refreshed_at` on `V2.Data.Report`
* Add support for `schema_name` on `V2.Data.Schema.columns[].foreign_keys_from[]` and `V2.Data.Schema.columns[].foreign_keys_to[]`
* ⚠️ Remove support for `authentication` and `session_fingerprint` on `V2.Iam.ActivityLog.details.user_access`
* Add support for `user_agent` on `V2.Iam.ActivityLog.details.user_access.dashboard_client`
* ⚠️ Remove support for `browser_version`, `browser`, `device_type`, and `os` on `V2.Iam.ActivityLog.details.user_access.dashboard_client`
* ⚠️ Remove support for `level` on `V2.Iam.ActivityLog.details.user_access.risk`
* Add support for `reference` on `V2.MoneyManagement.FinancialAddress.bank_account.iban`
* Add support for new value `sepa` on enums `V2.MoneyManagement.OutboundPayment.to.payout_method_options.bank_account.preferred_networks`, `V2.MoneyManagement.OutboundPaymentQuote.to.payout_method_options.bank_account.preferred_networks`, `V2.MoneyManagement.OutboundTransfer.to.payout_method_options.bank_account.preferred_networks`, and `V2.MoneyManagement.PayoutIntent.to.payout_method_options.bank_account.preferred_networks`
* ⚠️ Change `V2.MoneyManagement.OutboundPayment.to.payout_method_options.bank_account.preferred_networks`, `V2.MoneyManagement.OutboundPaymentQuote.to.payout_method_options.bank_account.preferred_networks`, and `V2.MoneyManagement.PayoutIntent.to.payout_method_options.bank_account.preferred_networks` to be optional
* Add support for `bank_account`, `card`, `crypto_wallet`, `status`, and `type` on `V2.MoneyManagement.OutboundPayment.tracking_details`
* Add support for `recipient_verification` on `V2.MoneyManagement.PayoutIntent`
* Add support for `fields_to_review` on `V2.MoneyManagement.PayoutIntent.next_action.confirm`
* ⚠️ Add support for new values `payout_method_invalid` and `recipient_capability_not_active` on enum `V2.MoneyManagement.PayoutIntent.next_action.handle_failure.failure_reason`
* ⚠️ Remove support for value `currency_required` from enum `V2.MoneyManagement.PayoutIntent.next_action.handle_failure.failure_reason`
* ⚠️ Change `V2.MoneyManagement.PayoutIntent.latest_payout` to be optional
* ⚠️ Remove support for `ca_bank_account`, `eu_bank_account`, and `mx_bank_account` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* ⚠️ Remove support for `network` on `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.aba`, `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.bre_b`, `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.clabe`, `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.cpa`, `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.iban`, `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.nip`, `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.pix`, and `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.sort_code`
* Add support for `payout_method`, `recipient`, and `verification_type` on `V2.MoneyManagement.RecipientVerification`
* ⚠️ Change type of `V2.MoneyManagement.RecipientVerification.consumed_by` from `string` to `an object`
* Add support for `matched_business_type` and `provided_business_type` on `V2.MoneyManagement.RecipientVerification.match_result_details`
* ⚠️ Change `V2.MoneyManagement.RecipientVerification.expires_at` to be optional
* ⚠️ Remove support for value `requires_capture` from enum `V2.Payments.OffSessionPayment.status`
* Add support for `configuration` on `V2.Provisioning.Resource`
* Add support for `custom_marketing_action` and `triggering_signal` on `V2.Signals.AccountActivity` and `V2\Signals\AccountActivity.create().$params`
* Add support for `mfa_challenges` on `V2.Signals.AccountActivity.login_decision` and `V2\Signals\AccountActivity.create().$params.login_decision`
* Add support for new value `custom_marketing_action` on enum `V2.Signals.AccountActivity.type`
* Add support for `user_affinity` on `V2.Signals.AccountEvaluation.evaluated_signals` and `V2.Signals.AccountSignal`
* ⚠️ Remove support for `user_merchant_fit` on `V2.Signals.AccountEvaluation.evaluated_signals` and `V2.Signals.AccountSignal`
* ⚠️ Add support for new value `user_affinity` on enum `V2.Signals.AccountEvaluation.pending_signals`
* ⚠️ Remove support for value `user_merchant_fit` from enum `V2.Signals.AccountEvaluation.pending_signals`
* ⚠️ Add support for new value `user_affinity` on enum `V2.Signals.AccountEvaluation.requested_signals`
* ⚠️ Remove support for value `user_merchant_fit` from enum `V2.Signals.AccountEvaluation.requested_signals`
* Add support for `additional_details` on `V2.Signals.AccountSignal.customer_risk`
* ⚠️ Add support for new value `user_affinity` on enum `V2.Signals.AccountSignal.type`
* ⚠️ Remove support for value `user_merchant_fit` from enum `V2.Signals.AccountSignal.type`
* Add support for `subscriptions` on `V2.Tax.IntegrationConfiguration` and `V2\Tax\IntegrationConfiguration.update().$params`
* Add support for `include` on `V2\Provisioning\Resource.retrieve().$params`
* Change `V2\MoneyManagement\OutboundPayment.create().$params.to.payout_method_option.bank_account.preferred_networks`, `V2\MoneyManagement\OutboundPaymentQuote.create().$params.to.payout_method_option.bank_account.preferred_networks`, `V2\MoneyManagement\PayoutIntent.create().$params.to.payout_method_option.bank_account.preferred_networks`, and `V2\MoneyManagement\PayoutIntent.update().$params.to.payout_method_option.bank_account.preferred_networks` to be optional
* ⚠️ Remove support for `amount` and `from` on `V2\MoneyManagement\PayoutIntent.update().$params`
* Add support for `parameters` on `V2\Data\QueryRun.create().$params`
* Add support for `actions` on `V2\Billing\Contract.update().$params`
* Add support for new values `alipay_payments`, `scalapay_payments`, and `upi_payments` on enum `EventsV2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent.updated_capability`
* Add support for new value `inbound_fundings.paper_checks` on enum `EventsV2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEvent.updated_capability`
* Add support for `severity` on `EventsV2CoreHealthApiErrorFiringEvent`, `EventsV2CoreHealthApiErrorResolvedEvent`, `EventsV2CoreHealthApiLatencyFiringEvent`, `EventsV2CoreHealthApiLatencyResolvedEvent`, `EventsV2CoreHealthAuthorizationRateDropFiringEvent`, `EventsV2CoreHealthAuthorizationRateDropResolvedEvent`, `EventsV2CoreHealthElementsErrorFiringEvent`, `EventsV2CoreHealthElementsErrorResolvedEvent`, `EventsV2CoreHealthFraudRateIncreasedEvent`, `EventsV2CoreHealthInvoiceCountDroppedFiringEvent`, `EventsV2CoreHealthInvoiceCountDroppedResolvedEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent`, `EventsV2CoreHealthMeterEventSummariesDelayedFiringEvent`, `EventsV2CoreHealthMeterEventSummariesDelayedResolvedEvent`, `EventsV2CoreHealthMetronomeNotificationLatencyFiringEvent`, `EventsV2CoreHealthMetronomeNotificationLatencyResolvedEvent`, `EventsV2CoreHealthPaymentMethodErrorFiringEvent`, `EventsV2CoreHealthPaymentMethodErrorResolvedEvent`, `EventsV2CoreHealthSepaDebitDelayedFiringEvent`, `EventsV2CoreHealthSepaDebitDelayedResolvedEvent`, `EventsV2CoreHealthTrafficVolumeDropFiringEvent`, `EventsV2CoreHealthTrafficVolumeDropResolvedEvent`, `EventsV2CoreHealthWebhookLatencyFiringEvent`, and `EventsV2CoreHealthWebhookLatencyResolvedEvent`
* Add support for event notifications `V2BillingContractTermCreatedEvent`, `V2BillingContractTermDeletedEvent`, and `V2BillingContractTermUpdatedEvent` with related object `V2.Billing.ContractTerm`
* Add support for event notifications `V2MoneyManagementFundingIntentCanceledEvent`, `V2MoneyManagementFundingIntentCreatedEvent`, `V2MoneyManagementFundingIntentProcessingEvent`, `V2MoneyManagementFundingIntentRequiresActionEvent`, `V2MoneyManagementFundingIntentRequiresConfirmationEvent`, `V2MoneyManagementFundingIntentSucceededEvent`, `V2MoneyManagementFundingIntentUpdatedEvent`, and `V2MoneyManagementFundingIntentValidatingEvent` with related object `V2.MoneyManagement.FundingIntent`
* Add support for event notifications `V2MoneyManagementInboundFundingAvailableEvent`, `V2MoneyManagementInboundFundingCheckFailedEvent`, `V2MoneyManagementInboundFundingCheckProcessingEvent`, `V2MoneyManagementInboundFundingCheckQueuedEvent`, `V2MoneyManagementInboundFundingCheckReturnedEvent`, `V2MoneyManagementInboundFundingCheckSucceededEvent`, `V2MoneyManagementInboundFundingCreatedEvent`, and `V2MoneyManagementInboundFundingUpdatedEvent` with related object `V2.MoneyManagement.InboundFunding`
* Add support for event notifications `V2MoneyManagementRewardProgramRewardEarnedEvent` and `V2MoneyManagementRewardProgramRewardReversedEvent` with related object `V2.MoneyManagement.RewardProgram`
* ⚠️ Remove support for event notifications `V2PaymentsOffSessionPaymentAuthorizationAttemptFailedEvent` and `V2PaymentsOffSessionPaymentAuthorizationAttemptStartedEvent` with related object `V2.Payments.OffSessionPayment`
