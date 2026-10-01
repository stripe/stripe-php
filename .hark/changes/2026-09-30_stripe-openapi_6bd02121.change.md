---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2134
semver_level: major
is_stripe_api_change: true
released_in_version: 22.1.0-beta.1
---

* Add support for new resources `Radar.BillingEvaluation`, `V2.MoneyManagement.FinancialAddressCreditSimulation`, and `V2.MoneyManagement.FinancialAddressGeneratedMicrodeposits`
* ⚠️ Remove support for resources `V2.FinancialAddressCreditSimulation` and `V2.FinancialAddressGeneratedMicrodeposits`
* Add support for `create` method on resource `Radar.BillingEvaluation`
* Add support for `all` method on resource `Reserve.Plan`
* Add support for `credit` method on resource `V2.MoneyManagement.FinancialAddressCreditSimulation`
* Add support for `generate_microdeposits` method on resource `V2.MoneyManagement.FinancialAddressGeneratedMicrodeposits`
* ⚠️ Remove support for `credit` method on resource `V2.FinancialAddressCreditSimulation`
* ⚠️ Remove support for `generate_microdeposits` method on resource `V2.FinancialAddressGeneratedMicrodeposits`
* Change `Tax.CalculationLineItem.performance_location` and `TaxCode.requirements.performance_location` to be required
* Change `Account.business_profile.specified_commercial_transactions_act_url` to be required
* Add support for `after_expiration` on `BillingPortal.Session` and `BillingPortal\Session.create().$params`
* Add support for new value `fundbox_ca_financing` on enums `Capital.FinancingOffer.disclaimer_variant` and `Capital.FinancingSummary.details.disclaimer_variant`
* Add support for `setup_credential_usage` on `Charge.payment_method_details.card`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.create().$params.payment_method_option.card`, `PaymentIntent.payment_method_options.card`, `PaymentIntent.update().$params.payment_method_option.card`, `SetupIntent.confirm().$params.payment_method_option.card`, `SetupIntent.create().$params.payment_method_option.card`, `SetupIntent.payment_method_options.card`, and `SetupIntent.update().$params.payment_method_option.card`
* Add support for `stored_credential_usage` on `Charge.payment_method_details.card`, `PaymentAttemptRecord.payment_method_details.card`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.create().$params.payment_method_option.card`, `PaymentIntent.payment_method_options.card`, `PaymentIntent.update().$params.payment_method_option.card`, and `PaymentRecord.payment_method_details.card`
* Add support for `expires_at` on `Checkout\Session.create().$params.payment_method_option.blik.mandate_option`, `Subscription.create().$params.payment_setting.payment_method_option.blik.mandate_option`, `Subscription.payment_settings.payment_method_options.blik.mandate_options`, and `Subscription.update().$params.payment_setting.payment_method_option.blik.mandate_option`
* ⚠️ Remove support for `expires_after` on `Checkout\Session.create().$params.payment_method_option.blik.mandate_option`, `Subscription.create().$params.payment_setting.payment_method_option.blik.mandate_option`, `Subscription.payment_settings.payment_method_options.blik.mandate_options`, and `Subscription.update().$params.payment_setting.payment_method_option.blik.mandate_option`
* Add support for `payment_intent_data` on `Checkout\Session.update().$params`
* Add support for `appeal` on `Dispute.evidence` and `Dispute.update().$params.evidence`
* Add support for `livemode` on `FxQuote`
* ⚠️ Remove support for `capture_method` on `PaymentIntent.confirm().$params.payment_method_option.paypay`, `PaymentIntent.create().$params.payment_method_option.paypay`, and `PaymentIntent.update().$params.payment_method_option.paypay`
* Add support for `active` on `ProductCatalog.TrialOffer`, `ProductCatalog\TrialOffer.all().$params`, and `ProductCatalog\TrialOffer.create().$params`
* Add support for `nickname` on `ProductCatalog.TrialOffer` and `ProductCatalog\TrialOffer.create().$params`
* ⚠️ Remove support for `name` on `ProductCatalog.TrialOffer` and `ProductCatalog\TrialOffer.create().$params`
* ⚠️ Change `ProductCatalog.TrialOffer.end_behavior.transition` to be optional
* Change `Product.tax_details` to be required
* Add support for `status_details` on `QuotePreviewInvoice`
* Add support for `company_details` and `reference` on `QuotePreviewInvoice.payment_settings.payment_method_options.billie`
* Add support for `pause_schedules` on `QuotePreviewSubscriptionSchedule`
* Add support for `destination` on `Reserve.Hold`, `Reserve.Plan`, and `Reserve.Release`
* Add support for `manual_release` on `Reserve.Plan`
* Add support for new value `other` on enum `Reserve.Plan.status`
* Add support for new values `manual_release` and `other` on enum `Reserve.Plan.type`
* ⚠️ Add support for new value `hold_expired` on enum `Reserve.Release.reason`
* ⚠️ Remove support for value `bulk_hold_expiry` from enum `Reserve.Release.reason`
* Change `SubscriptionItem.current_trial` to be required
* Add support for new values `final_payment_failure` and `first_payment_failure` on enum `Subscription.status_details.paused.subscription.type`
* Change `Subscription.trial_settings.end_behavior.billing_cycle_anchor` to be required
* Add support for new value `igic` on enum `Tax.Registration.country_options.es.type`
* Change `TaxCode.requirements` to be required
* ⚠️ Remove support for `configurations` on `V2.Core.AccountLink.use_case.account_onboarding`, `V2.Core.AccountLink.use_case.account_update`, `V2\Core\AccountLink.create().$params.use_case.account_onboarding`, and `V2\Core\AccountLink.create().$params.use_case.account_update`
* Add support for new value `rejected` on enums `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.aud.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.cad.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.eur.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.gbp.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.usd.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.aud.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.cad.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.eur.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.gbp.status`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.usd.status`, `V2.Core.Account.configuration.money_manager.capabilities.inbound_transfers.bank_accounts.status`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_payments.bank_accounts.status`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_payments.cards.status`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_payments.financial_accounts.status`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_transfers.bank_accounts.status`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_transfers.financial_accounts.status`, `V2.Core.Account.configuration.money_manager.capabilities.received_credits.bank_accounts.status`, `V2.Core.Account.configuration.money_manager.capabilities.received_debits.bank_accounts.status`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.local.status`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.wire.status`, and `V2.Core.Account.configuration.recipient.capabilities.cards.status`
* Add support for new values `rejected_fraud`, `rejected_incomplete_verification`, `rejected_listed`, `rejected_other`, `rejected_platform_fraud`, `rejected_platform_other`, `rejected_platform_terms_of_service`, and `rejected_terms_of_service` on enums `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.aud.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.cad.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.eur.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.gbp.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound.usd.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.aud.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.cad.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.eur.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.gbp.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound.usd.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.inbound_transfers.bank_accounts.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_payments.bank_accounts.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_payments.cards.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_payments.financial_accounts.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_transfers.bank_accounts.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_transfers.financial_accounts.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.received_credits.bank_accounts.status_details[].code`, `V2.Core.Account.configuration.money_manager.capabilities.received_debits.bank_accounts.status_details[].code`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.local.status_details[].code`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.wire.status_details[].code`, and `V2.Core.Account.configuration.recipient.capabilities.cards.status_details[].code`
* Add support for `related_object` and `request` on `V2.Iam.ActivityLog`
* Add support for new value `stripe_action` on enum `V2.Iam.ActivityLog.actor.type`
* Add support for `account_security`, `authentication`, `scim`, `sso`, and `user_profile` on `V2.Iam.ActivityLog.details`
* Add support for new values `account_security`, `authentication`, `issuing`, `payout`, `scim`, `sso`, and `user_profile` on enum `V2.Iam.ActivityLog.details.type`
* Add support for new values `anomaly_detection_settings_updated`, `issuing_activated`, `issuing_balance_transfer_created`, `issuing_card_created`, `issuing_card_sensitive_details_viewed`, `issuing_card_updated`, `issuing_cardholder_created`, `issuing_cardholder_updated`, `issuing_dispute_created`, `issuing_dispute_submitted`, `issuing_dispute_updated`, `manual_payouts_disabled`, `manual_payouts_enabled`, `payout_destination_added`, `payout_destination_removed`, `payout_destination_updated`, `payout_schedule_edits_disabled`, `payout_schedule_edits_enabled`, `scim_group_deleted`, `scim_group_member_added`, `scim_group_member_removed`, `scim_group_roles_updated`, `scim_group_updated`, `sso_domain_verified`, `sso_settings_created`, `sso_settings_deleted`, `sso_settings_updated`, `two_step_authentication_mandate_disabled`, `two_step_authentication_mandate_enabled`, `user_auth_challenge_failed`, `user_email_changed`, `user_email_verified`, `user_express_phone_number_changed`, `user_google_account_connected`, `user_google_account_disconnected`, `user_passkey_added`, `user_passkey_removed`, `user_passkey_updated`, `user_passkey_upgraded`, `user_password_changed`, `user_password_initialized`, `user_password_reset_failed`, `user_password_reset_requested`, `user_password_reset_succeeded`, `user_two_step_authentication_backup_code_used`, `user_two_step_authentication_method_added`, `user_two_step_authentication_method_removed`, `user_two_step_authentication_method_reset`, `user_two_step_authentication_method_updated`, and `user_two_step_authentication_reset_requested` on enum `V2.Iam.ActivityLog.type`
* Add support for `deposit_insurance_eligibility` on `V2.MoneyManagement.FinancialAccount.storage` and `V2\MoneyManagement\FinancialAccount.create().$params.storage`
* Add support for `bank_account` on `V2.MoneyManagement.FinancialAddress` and `V2\MoneyManagement\FinancialAddress.create().$params`
* Add support for `type` on `V2.MoneyManagement.FinancialAddress`
* ⚠️ Remove support for `credentials` and `currency` on `V2.MoneyManagement.FinancialAddress`
* ⚠️ Remove support for `level` on `V2.MoneyManagement.InboundTransfer.transfer_history[]`
* Add support for `network_fee_details` on `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[]`
* Add support for new value `network_fee` on enum `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].type`
* Add support for `archived` on `V2.MoneyManagement.PayoutMethod`
* ⚠️ Remove support for `archived` on `V2.MoneyManagement.PayoutMethod.bank_account` and `V2.MoneyManagement.PayoutMethod.card`
* Add support for new value `ineligible` on enum `V2.MoneyManagement.PayoutMethod.usage_status.payments`
* Add support for new value `ineligible` on enum `V2.MoneyManagement.PayoutMethod.usage_status.transfers`
* Add support for `amount_received` on `V2.MoneyManagement.ReceivedCredit`
* Add support for `originating_bank_account` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* ⚠️ Remove support for `origin_type` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* Add support for `identity` on `V2.Signals.AccountActivity.account_details.data`, `V2.Signals.AccountEvaluation.account_details.data`, `V2\Signals\AccountActivity.create().$params.account_detail.datum`, and `V2\Signals\AccountEvaluation.create().$params.account_detail.datum`
* Add support for `fraudulent_website` on `V2.Signals.AccountEvaluation.evaluated_signals` and `V2.Signals.AccountSignal`
* Add support for new value `fraudulent_website` on enum `V2.Signals.AccountEvaluation.pending_signals`
* Add support for new value `fraudulent_website` on enum `V2.Signals.AccountEvaluation.requested_signals`
* Add support for `fraudulent_merchant` on `V2.Signals.AccountSignal`
* Add support for new values `fraudulent_merchant` and `fraudulent_website` on enum `V2.Signals.AccountSignal.type`
* ⚠️ Remove support for `created_gt`, `created_gte`, `created_lt`, and `created_lte` on `V2\MoneyManagement\Adjustment.all().$params`, `V2\MoneyManagement\InboundTransfer.all().$params`, `V2\MoneyManagement\ReceivedCredit.all().$params`, `V2\MoneyManagement\Transaction.all().$params`, and `V2\MoneyManagement\TransactionEntry.all().$params`
* ⚠️ Change type of `V2\MoneyManagement\Adjustment.all().$params.created`, `V2\MoneyManagement\InboundTransfer.all().$params.created`, `V2\MoneyManagement\ReceivedCredit.all().$params.created`, `V2\MoneyManagement\Transaction.all().$params.created`, and `V2\MoneyManagement\TransactionEntry.all().$params.created` from `DateTime` to `an object`
* ⚠️ Remove support for `include` on `V2\MoneyManagement\FinancialAddress.all().$params` and `V2\MoneyManagement\FinancialAddress.retrieve().$params`
* Add support for `settlement_currency` on `V2\MoneyManagement\FinancialAddress.create().$params`
* Add support for `include` on `V2\MoneyManagement\FinancialAccount.all().$params` and `V2\MoneyManagement\FinancialAccount.retrieve().$params`
* Add support for `treasury_transaction` on `EventsV2MoneyManagementTransactionUpdatedEvent`
* Add support for event notifications `V2SignalsAccountSignalFraudulentMerchantReadyEvent` and `V2SignalsAccountSignalFraudulentWebsiteReadyEvent` with related object `V2.Signals.AccountSignal`
* Add support for error types `InvalidVaultedCredentialException`, `VerificationAttemptFailedException`, `VerificationExpiredException`, and `VerificationNotInitiatedException`
* ⚠️ Remove support for error type `ControlledByDashboardException`
* Add support for error codes `dispute_evidence_page_limit_exceeded`, `financial_connections_consent_locale_invalid`, `financial_connections_consent_locale_unsupported`, and `payment_evaluation_on_api_version_not_supported` on `QuotePreviewInvoice.last_finalization_error`
