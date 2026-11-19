---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2202
semver_level: major
is_stripe_api_change: true
released_in_version: 23.2.0-alpha.1
---

* Add support for new resources `V2.Billing.GroupInvoice`, `V2.Billing.GroupSpendModifier`, and `V2.Billing.Group`
* ⚠️ Remove support for resources `V2.Billing.CadenceSpendModifier` and `V2.Billing.ContractPricingLineQuantityChange`
* Add support for `create` and `update` methods on resource `InvoiceRenderingTemplate`
* Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.Billing.Group`
* Add support for `retrieve` method on resource `V2.Billing.GroupSpendModifier`
* Add support for `create` method on resource `V2.Billing.GroupInvoice`
* ⚠️ Remove support for `retrieve` method on resource `V2.Billing.CadenceSpendModifier`
* ⚠️ Remove support for `billing_cadence` on `Billing.Alert.spend_threshold.filters`, `Billing.AlertTriggered.group_by`, `Billing\Alert.create().$params.spend_threshold.filter`, `Invoice.all().$params`, `Invoice.create_preview().$params`, `Subscription.all().$params`, `Subscription.create().$params`, `Subscription.update().$params`, `Subscription`, `V2.Billing.PricingPlanSubscription`, `V2.Billing.RateCardSubscription`, `V2\Billing\PricingPlanSubscription.all().$params`, `V2\Billing\RateCardSubscription.all().$params`, and `V2\Billing\RateCardSubscription.create().$params`
* ⚠️ Add support for new value `billing_group` on enum `Billing.AlertTriggered.group_by.type`
* ⚠️ Remove support for value `billing_cadence` from enum `Billing.AlertTriggered.group_by.type`
* Add support for `scheduled_fee` on `V2.Billing.ContractTerm`, `V2\Billing\Contract.create().$params.term`, `V2\Billing\Contract.update().$params.action.add_term`, and `V2\Billing\Contract.update().$params.action.update_term`
* ⚠️ Remove support for `ad_hoc_product` on `V2.Billing.ContractTerm`, `V2\Billing\Contract.create().$params.term`, `V2\Billing\Contract.update().$params.action.add_term`, and `V2\Billing\Contract.update().$params.action.update_term`
* ⚠️ Add support for new value `scheduled_fee` on enum `V2.Billing.ContractTerm.type`
* ⚠️ Remove support for value `ad_hoc_product` from enum `V2.Billing.ContractTerm.type`
* ⚠️ Remove support for `cadence` on `Billing.AlertNotification`, `Billing\AlertNotification.all().$params`, `V2.Billing.Intent`, and `V2\Billing\Intent.create().$params`
* ⚠️ Add support for new value `billing_group` on enum `Billing.Alert.spend_threshold.group_by`
* ⚠️ Remove support for value `billing_cadence` from enum `Billing.Alert.spend_threshold.group_by`
* ⚠️ Remove support for `pricing_token` on `Checkout\Session.create().$params`
* Add support for `pass_through_fee_cost` on `Checkout.Session`
* Add support for new value `dealerfx` on enums `Checkout.Session.automatic_surcharge.provider` and `PaymentLink.automatic_surcharge.provider`
* Add support for `amount_pass_through_fee` on `Checkout.Session.total_details`
* ⚠️ Change `GiftCardOperation.activation.balance` and `GiftCardOperation.reload.balance` to be optional
* Add support for `link_shared_data` on `Identity\VerificationSession.create().$params`
* Add support for `line_item_policy`, `rendering_settings`, and `summary_item_policies` on `InvoiceRenderingTemplate`
* Add support for `billing_group` on `Invoice.all().$params`, `Invoice.create_preview().$params`, `V2.Billing.Intent`, `V2.Billing.PricingPlanSubscription`, `V2.Billing.RateCardSubscription`, `V2\Billing\Intent.create().$params`, `V2\Billing\PricingPlanSubscription.all().$params`, and `V2\Billing\RateCardSubscription.all().$params`
* Add support for `applied_credit_memos` on `Invoice` and `QuotePreviewInvoice`
* Add support for `billing_group_details` on `Invoice.parent` and `QuotePreviewInvoice.parent`
* ⚠️ Remove support for `billing_cadence_details` on `Invoice.parent` and `QuotePreviewInvoice.parent`
* ⚠️ Add support for new value `billing_group_details` on enums `Invoice.parent.type` and `QuotePreviewInvoice.parent.type`
* ⚠️ Remove support for value `billing_cadence_details` from enums `Invoice.parent.type` and `QuotePreviewInvoice.parent.type`
* Add support for `token_service_provider_id` on `Issuing.Authorization.token_details.network_data.visa` and `Issuing.Token.network_data.visa`
* Add support for `amount_type`, `amount`, `currency`, `description`, `end_date`, `interval_count`, `interval`, `reference`, and `start_date` on `Mandate.payment_method_details.card.india`
* Add support for `three_d_secure` on `PaymentAttemptRecord.report_failed().$params.payment_method_detail.card` and `PaymentRecord.report_payment_attempt_failed().$params.payment_method_detail.card`
* Add support for `provider_signature_data` and `provider_signature` on `PaymentIntent.confirm().$params.payment_method_option.card_present.aade_datum`, `PaymentIntent.create().$params.payment_method_option.card_present.aade_datum`, `PaymentIntent.payment_method_options.card_present.aade_data`, and `PaymentIntent.update().$params.payment_method_option.card_present.aade_datum`
* ⚠️ Remove support for `mark_data` and `signed_mark` on `PaymentIntent.confirm().$params.payment_method_option.card_present.aade_datum`, `PaymentIntent.create().$params.payment_method_option.card_present.aade_datum`, `PaymentIntent.payment_method_options.card_present.aade_data`, and `PaymentIntent.update().$params.payment_method_option.card_present.aade_datum`
* Add support for `request_multicapture` on `PaymentIntent.confirm().$params.payment_method_option.vipp`, `PaymentIntent.create().$params.payment_method_option.vipp`, `PaymentIntent.payment_method_options.vipps`, and `PaymentIntent.update().$params.payment_method_option.vipp`
* Add support for `is_free_trial_transaction` on `PaymentIntent.confirm().$params.radar_option` and `PaymentIntent.create().$params.radar_option`
* Add support for `radar_options` on `PaymentIntent`
* Add support for `aeon_pay`, `au_pay`, `dbarai`, and `merpay` on `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, and `PaymentMethodConfiguration`
* Add support for `requested_signals` on `Radar.PaymentEvaluation` and `Radar\PaymentEvaluation.create().$params`
* Add support for `gift_card` on `Refund.destination_details`
* Add support for `days_after_fulfillment` on `Reserve.Plan.rolling_release`
* Add support for `rendering` on `SubscriptionSchedule.create().$params.default_setting.invoice_setting` and `SubscriptionSchedule.update().$params.default_setting.invoice_setting`
* Add support for `debit_behavior` on `Subscription.create().$params.payment_setting.payment_method_option.card`, `Subscription.create().$params.payment_setting.payment_method_option.pix`, `Subscription.create().$params.payment_setting.payment_method_option.upi`, `Subscription.payment_settings.payment_method_options.card`, `Subscription.payment_settings.payment_method_options.pix`, `Subscription.payment_settings.payment_method_options.upi`, `Subscription.update().$params.payment_setting.payment_method_option.card`, `Subscription.update().$params.payment_setting.payment_method_option.pix`, and `Subscription.update().$params.payment_setting.payment_method_option.upi`
* Add support for `presentment_details` on `Subscription.pending_update`
* ⚠️ Remove support for `device_health_details` and `device_health` on `Terminal.Reader`
* Add support for `billing_group_data` on `V2.Billing.Intent` and `V2\Billing\Intent.create().$params`
* ⚠️ Remove support for `cadence_data` on `V2.Billing.Intent` and `V2\Billing\Intent.create().$params`
* Add support for new value `group` on enum `V2.Billing.IntentAction.apply.invoice_discount_rule.applies_to`
* Add support for new value `account_dashboard` on enum `V2.Core.AccountLink.use_case.type`
* Add support for `touch_n_go_payments`, `truemoney_payments`, `wechat_pay_mobile_web_payments`, `wechat_pay_payments`, and `wero_payments` on `V2.Core.Account.configuration.merchant.capabilities`, `V2\Core\Account.create().$params.configuration.merchant.capability`, and `V2\Core\Account.update().$params.configuration.merchant.capability`
* Add support for `business_demand_deposit_account_fifth_third_storage` on `V2.Core.Account.configuration.money_manager.capabilities`, `V2\Core\Account.create().$params.configuration.money_manager.capability`, and `V2\Core\Account.update().$params.configuration.money_manager.capability`
* Add support for `tips` on `V2.Core.Account.configuration.recipient.capabilities.bank_accounts`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account`, and `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account`
* Add support for `business_demand_deposit_account_fifth_third` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service`
* Add support for `channel` on `V2.Core.ClaimableSandbox` and `V2\Core\ClaimableSandbox.create().$params`
* ⚠️ Remove support for `app_channel` on `V2.Core.ClaimableSandbox` and `V2\Core\ClaimableSandbox.create().$params`
* Add support for `return_url` on `V2.Core.ClaimableSandbox.onboarding_link_details`, `V2\Core\ClaimableSandbox.create().$params.onboarding_link_detail`, and `V2\Core\ClaimableSandbox.renew_onboarding_link().$params.onboarding_link_detail`
* ⚠️ Change type of `V2.Core.ClaimableSandbox.sandbox_details.api_keys.mcp` from `string` to `an object`
* ⚠️ Change type of `V2.Core.ClaimableSandbox.sandbox_details.api_keys.publishable` from `string` to `an object`
* ⚠️ Change type of `V2.Core.ClaimableSandbox.sandbox_details.api_keys.secret` from `string` to `an object`
* ⚠️ Change `V2.Core.ClaimableSandbox.onboarding_link_details` to be optional
* ⚠️ Change `V2.Core.ClaimableSandbox.owner_details.app_install_status` to be optional
* Add support for `custom_payment_method_adapter_degraded` on `V2.Core.Health.AlertHistoryEntry` and `V2.Core.Health.Alert`
* Add support for new value `custom_payment_method_adapter_degraded` on enums `V2.Core.Health.Alert.type` and `V2.Core.Health.AlertHistoryEntry.type`
* Add support for `funds_holding_structure` on `V2.MoneyManagement.FinancialAccount.storage` and `V2\MoneyManagement\FinancialAccount.create().$params.storage`
* Add support for `au_becs_debit` on `V2.MoneyManagement.InboundTransfer.from.payment_method`
* Add support for new value `tips` on enums `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].network_fee_details.network` and `V2.MoneyManagement.PayoutIntent.estimated_fees[].network_fee_details.network`
* Add support for new value `tips` on enums `V2.MoneyManagement.OutboundPayment.to.payout_method_options.bank_account.preferred_networks`, `V2.MoneyManagement.OutboundPaymentQuote.to.payout_method_options.bank_account.preferred_networks`, `V2.MoneyManagement.OutboundTransfer.to.payout_method_options.bank_account.preferred_networks`, and `V2.MoneyManagement.PayoutIntent.to.payout_method_options.bank_account.preferred_networks`
* Add support for `network` on `V2.MoneyManagement.ReceivedDebit.bank_transfer`
* Add support for new values `inbound_funding_reversal` and `inbound_funding` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
* Add support for new value `inbound_funding` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
* Add support for `settlement_timing` on `V2\MoneyManagement\FundingIntent.update().$params`
* Add support for `include` on `V2\Core\ClaimableSandbox.retrieve().$params`
* Change `V2\Core\ClaimableSandbox.renew_onboarding_link().$params.onboarding_link_detail.refresh_url` to be optional
* ⚠️ Add support for `billing_group` on `V2\Billing\RateCardSubscription.create().$params`
* ⚠️ Remove support for `one_time_fees`, `pricing_lines`, and `pricing_overrides` on `V2\Billing\Contract.create().$params`
* Add support for `contract_number` on `V2\Billing\Contract.update().$params`
* ⚠️ Remove support for `one_time_fee_actions`, `pricing_line_actions`, and `pricing_override_actions` on `V2\Billing\Contract.update().$params`
* ⚠️ Remove support for `cancel_pricing_lines` on `V2\Billing\Contract.cancel().$params`
* Add support for new values `business_demand_deposit_account_fifth_third_storage.inbound.usd` and `business_demand_deposit_account_fifth_third_storage.outbound.usd` on enum `EventsV2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEvent.updated_capability`
* Add support for new value `bank_accounts.tips` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
* Add support for `charge` on `EventsV2PaymentsOffSessionPaymentAttemptFailedEvent`, `EventsV2PaymentsOffSessionPaymentFailedEvent`, and `EventsV2PaymentsOffSessionPaymentSucceededEvent`
* Add support for `last_attempt_error` on `EventsV2PaymentsOffSessionPaymentAttemptFailedEvent` and `EventsV2PaymentsOffSessionPaymentFailedEvent`
* Add support for `payment_attempt_record` on `EventsV2PaymentsOffSessionPaymentSucceededEvent`
* Add support for event notifications `V2BillingContractTermPricingOverrideEndedEvent`, `V2BillingContractTermPricingOverrideStartedEvent`, `V2BillingContractTermRecurringPriceEndedEvent`, `V2BillingContractTermRecurringPriceStartedEvent`, `V2BillingContractTermScheduledFeeServicePeriodEndedEvent`, and `V2BillingContractTermScheduledFeeServicePeriodStartedEvent` with related object `V2.Billing.ContractTerm`
* Add support for event notifications `V2CoreHealthCustomPaymentMethodAdapterDegradedFiringEvent` and `V2CoreHealthCustomPaymentMethodAdapterDegradedResolvedEvent`
* Add support for event notifications `V2SignalsPaymentRetryEvaluationCanceledEvent`, `V2SignalsPaymentRetryEvaluationCompletedEvent`, `V2SignalsPaymentRetryEvaluationCreatedEvent`, `V2SignalsPaymentRetryEvaluationExpiredEvent`, and `V2SignalsPaymentRetryEvaluationUpdatedEvent` with related object `V2.Signals.PaymentRetryEvaluation`
* ⚠️ Remove support for event notifications `V2BillingCadenceBilledEvent`, `V2BillingCadenceCanceledEvent`, and `V2BillingCadenceCreatedEvent` with related object `V2.Billing.Cadence`
* ⚠️ Add error type `RateLimitException` on `V2.Core.ClaimableSandbox#create`
