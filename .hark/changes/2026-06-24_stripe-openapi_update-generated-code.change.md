---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2086
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.4.0-alpha.1
---

* Add support for new resources `V2.Billing.ContractPricingLineQuantityChange`, `V2.Core.Health.AlertHistoryEntry`, `V2.Core.Health.Alert`, `V2.MoneyManagement.FinancialAddressDebitSimulation`, and `V2.MoneyManagement.PayoutIntent`
* ⚠️ Remove support for resource `V2.Billing.ContractLicensePricingQuantityChange`
* Add support for `report_offer_acceptance` method on resource `Issuing.CreditUnderwritingRecord`
* Add support for `provisional_credit` test helper method on resource `Issuing.Dispute`
* Add support for `report_early_fraud_warning` method on resource `PaymentAttemptRecord`
* Add support for `search` method on resource `PaymentRecord`
* Add support for `debit` method on resource `V2.MoneyManagement.FinancialAddressDebitSimulation`
* Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.MoneyManagement.PayoutIntent`
* Add support for `all` and `retrieve` methods on resource `V2.Core.Health.Alert`
* Add support for `delete` method on resource `V2.Billing.Contract`
* ⚠️ Remove support for `performance_location_details` on `Tax.TransactionLineItem`
* Add support for `financial_accounts_transactions`, `financial_accounts`, and `recipients_list` on `AccountSession.components` and `AccountSession.create().$params.component`
* Add support for `location` and `reader` on `Charge.payment_method_details.gift_card`, `GiftCardOperation`, `PaymentAttemptRecord.payment_method_details.gift_card`, and `PaymentRecord.payment_method_details.gift_card`
* Add support for `subscription` on `Checkout\Session.create().$params.item`
* Add support for `items` on `Checkout.Session`
* Add support for `brand` on `Checkout.Session.current_attempt.payment_method_details.card`
* Add support for `network_data` on `Issuing\Authorization.capture().$params` and `Issuing\Transaction.create_force_capture().$params`
* Add support for `enriched_merchant_data` on `Issuing.Authorization`
* Add support for `available_balance` and `current_balance` on `Issuing.Authorization.balance_response`
* ⚠️ Remove support for `amount` on `Issuing.Authorization.balance_response`
* Add support for `decision_deadline_updated_at` on `Issuing.CreditUnderwritingRecord`
* Add support for `acquirer_reference_number` on `Issuing.Transaction.network_data`
* Change `PaymentAttemptRecord.report_refund().$params.outcome` and `PaymentRecord.report_refund().$params.outcome` to be optional
* Add support for `tip` on `PaymentIntent.capture().$params.amount_detail`, `PaymentIntent.confirm().$params.amount_detail`, `PaymentIntent.create().$params.amount_detail`, `PaymentIntent.decrement_authorization().$params.amount_detail`, `PaymentIntent.increment_authorization().$params.amount_detail`, and `PaymentIntent.update().$params.amount_detail`
* Add support for `billing_cycle_anchor` on `V2.Billing.Contract` and `V2\Billing\Contract.create().$params`
* ⚠️ Remove support for `contract_line_details`, `contract_value_details`, and `license_quantities` on `V2.Billing.Contract`
* Add support for `bill_settings_details` on `V2.Billing.Contract.billing_settings` and `V2\Billing\Contract.create().$params.billing_setting`
* Add support for `billing_profile_details` and `collection_settings_details` on `V2.Billing.Contract.billing_settings`
* ⚠️ Remove support for `contract_billing_details` on `V2.Billing.Contract.billing_settings` and `V2\Billing\Contract.create().$params.billing_setting`
* ⚠️ Change type of `V2.Billing.Contract.one_time_fees` from `array(an object)` to `an object`
* ⚠️ Change type of `V2.Billing.Contract.pricing_lines` from `array(an object)` to `an object`
* ⚠️ Change type of `V2.Billing.Contract.pricing_overrides` from `array(an object)` to `an object`
* ⚠️ Change `V2.Billing.Contract.pricing_lines` to be optional
* ⚠️ Change `V2.Billing.Contract.pricing_overrides` to be optional
* Add support for `mode` on `V2.Commerce.ProductCatalogImport`
* Add support for new value `money_manager` on enums `EventsV2CoreAccountLinkReturnedEvent.configurations`, `V2.Core.AccountLink.use_case.account_onboarding.configurations`, and `V2.Core.AccountLink.use_case.account_update.configurations`
* ⚠️ Add support for new value `money_manager` on enum `V2.Core.Account.applied_configurations`
* ⚠️ Remove support for value `storer` from enum `V2.Core.Account.applied_configurations`
* Add support for `money_manager` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
* ⚠️ Remove support for `storer` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
* Add support for `sunbit_payments` on `V2.Core.Account.configuration.merchant.capabilities`, `V2\Core\Account.create().$params.configuration.merchant.capability`, and `V2\Core\Account.update().$params.configuration.merchant.capability`
* Add support for `ach`, `becs`, `eft`, `fedwire`, `fps`, `npp`, `rtp`, `sepa_credit`, `sepa_instant`, and `swift` on `V2.Core.Account.configuration.recipient.capabilities.bank_accounts`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account`, and `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account`
* Add support for new values `bank_accounts.ach`, `bank_accounts.becs`, `bank_accounts.eft`, `bank_accounts.fedwire`, `bank_accounts.fps`, `bank_accounts.npp`, `bank_accounts.rtp`, `bank_accounts.sepa_credit`, `bank_accounts.sepa_instant`, `bank_accounts.swift`, `business_storage.inbound.eur`, `business_storage.inbound.gbp`, `business_storage.inbound.usd`, `business_storage.outbound.eur`, `business_storage.outbound.gbp`, `business_storage.outbound.usd`, `consumer_storage.inbound.usd`, `consumer_storage.outbound.usd`, `received_credits.bank_accounts`, and `received_debits.bank_accounts` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new value `money_manager` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].configuration` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].configuration`
* Add support for `consumer_money_manager` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service`
* Add support for `crypto_money_manager` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
* ⚠️ Remove support for `consumer_storer` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service`
* ⚠️ Remove support for `crypto_storer` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
* ⚠️ Remove support for `maximum_rps` on `V2.Core.BatchJob` and `V2\Core\BatchJob.create().$params`
* Add support for `bic` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
* ⚠️ Remove support for `swift_code` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
* Add support for `attachment` on `V2.MoneyManagement.OutboundPayment.delivery_options.paper_check` and `V2\MoneyManagement\OutboundPayment.create().$params.delivery_option.paper_check`
* Add support for `processing` on `V2.MoneyManagement.OutboundPayment.status_details` and `V2.MoneyManagement.OutboundTransfer.status_details`
* Add support for new values `fx_rate_drift_exceeded_after_review` and `review_rejected` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
* Add support for `payout_method_options` on `V2.MoneyManagement.OutboundPayment.to`, `V2.MoneyManagement.OutboundTransfer.to`, `V2\MoneyManagement\OutboundPayment.create().$params.to`, and `V2\MoneyManagement\OutboundTransfer.create().$params.to`
* Add support for new values `fx_rate_drift_exceeded_after_review` and `review_rejected` on enum `V2.MoneyManagement.OutboundTransfer.status_details.failed.reason`
* Add support for `account_holder_name` on `V2.MoneyManagement.ReceivedCredit.bank_transfer.us_bank_account`
* Add support for `returned` on `V2.MoneyManagement.ReceivedDebit.status_details`
* Add support for new value `capability_inactive` on enum `V2.MoneyManagement.ReceivedDebit.status_details.failed.reason`
* Add support for `returned_at` on `V2.MoneyManagement.ReceivedDebit.status_transitions`
* Add support for `payout_intent` on `V2\MoneyManagement\OutboundPayment.create().$params`
* Add support for `statuses` on `V2\MoneyManagement\FinancialAccount.all().$params`
* ⚠️ Remove support for `status` on `V2\MoneyManagement\FinancialAccount.all().$params`
* Change `V2\Core\BatchJob.create().$params.metadata` to be optional
* Add support for `include` on `V2\Billing\Contract.all().$params`
* ⚠️ Remove support for `contract_lines` on `V2\Billing\Contract.create().$params`
* ⚠️ Remove support for `license_quantity_actions` on `V2\Billing\Contract.create().$params` and `V2\Billing\Contract.update().$params`
* ⚠️ Add support for `billing_profile_details` and `collection_settings_details` on `V2\Billing\Contract.create().$params.billing_setting`
* ⚠️ Add support for `amount`, `bill_at`, and `product` on `V2\Billing\Contract.create().$params.one_time_fee`
* Add support for `lookup_key` on `V2\Billing\Contract.create().$params.one_time_fee`
* ⚠️ Remove support for `bill_schedule`, `billable_item_type`, and `product_details` on `V2\Billing\Contract.create().$params.one_time_fee`
* Add support for `pricing_overrides` and `quantity_changes` on `V2\Billing\Contract.create().$params.pricing_line.pricing.price_detail` and `V2\Billing\Contract.update().$params.pricing_line_action.add.pricing.price_detail`
* ⚠️ Remove support for `quantity` on `V2\Billing\Contract.create().$params.pricing_line.pricing.price_detail` and `V2\Billing\Contract.update().$params.pricing_line_action.add.pricing.price_detail`
* ⚠️ Remove support for `overwrite_price` on `V2\Billing\Contract.create().$params.pricing_override`
* Add support for `pricing_line_ids` and `pricing_line_lookup_keys` on `V2\Billing\Contract.create().$params.pricing_override.multiplier.criterion` and `V2\Billing\Contract.update().$params.pricing_override_action.add.multiplier.criterion`
* ⚠️ Remove support for `billable_item_ids`, `billable_item_lookup_keys`, `billable_item_types`, `metadata_conditions`, and `rate_card_ids` on `V2\Billing\Contract.create().$params.pricing_override.multiplier.criterion` and `V2\Billing\Contract.update().$params.pricing_override_action.add.multiplier.criterion`
* ⚠️ Change type of `V2\Billing\Contract.create().$params.pricing_override.type` and `V2\Billing\Contract.update().$params.pricing_override_action.add.type` from `enum('multiplier'|'overwrite_price')` to `literal('multiplier')`
* Change `V2\Billing\Contract.create().$params.pricing_overrides` to be optional
* Change `V2\Billing\Contract.create().$params.pricing_override.multiplier.criteria` to be optional
* Add support for `pricing` on `V2\Billing\Contract.update().$params.pricing_line_action.update`
* ⚠️ Remove support for `price` on `V2\Billing\Contract.update().$params.pricing_override_action.add.overwrite_price`
* Add support for `cancel_pricing_lines` and `proration_behavior` on `V2\Billing\Contract.cancel().$params`
* Add support for new value `sunbit_payments` on enum `EventsV2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent.updated_capability`
* Add support for new values `bank_accounts.ach`, `bank_accounts.becs`, `bank_accounts.eft`, `bank_accounts.fedwire`, `bank_accounts.fps`, `bank_accounts.npp`, `bank_accounts.rtp`, `bank_accounts.sepa_credit`, `bank_accounts.sepa_instant`, and `bank_accounts.swift` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
* Add support for event notifications `V2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationMoneyManagerUpdatedEvent` with related object `V2.Core.Account`
* Add support for event notifications `V2MoneyManagementDebitDisputeFailedEvent`, `V2MoneyManagementDebitDisputeSubmittedEvent`, and `V2MoneyManagementDebitDisputeSucceededEvent` with related object `V2.MoneyManagement.DebitDispute`
* Add support for event notification `V2MoneyManagementOutboundPaymentUnderReviewEvent` with related object `V2.MoneyManagement.OutboundPayment`
* Add support for event notification `V2MoneyManagementOutboundTransferUnderReviewEvent` with related object `V2.MoneyManagement.OutboundTransfer`
* ⚠️ Remove support for event notifications `V2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationStorerUpdatedEvent` with related object `V2.Core.Account`
