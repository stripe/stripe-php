---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2152
semver_level: major
is_stripe_api_change: true
---

* Add support for new resources `V2.MoneyManagement.FinancialAccountWalletExportCredentials`, `V2.MoneyManagement.FinancialAccountWalletExport`, `V2.Provisioning.Eligibility`, `V2.Provisioning.PaymentMethodRequest`, `V2.Provisioning.PaymentProfile`, `V2.Provisioning.Project`, `V2.Provisioning.ProviderConnectionRequest`, `V2.Provisioning.ProviderConnection`, `V2.Provisioning.ProviderServiceDetail`, `V2.Provisioning.Provider`, and `V2.Provisioning.Resource`
* ⚠️ Remove support for resource `Radar.BillingEvaluation`
* ⚠️ Remove support for `create` method on resource `Radar.BillingEvaluation`
* Add support for `create`, `link`, `remove`, `retrieve`, `rotate_credentials`, `submit_information`, `unlink`, and `update` methods on resource `V2.Provisioning.Resource`
* Add support for `create`, `retrieve`, and `submit_information` methods on resource `V2.Provisioning.ProviderConnectionRequest`
* Add support for `all` and `unlink` methods on resource `V2.Provisioning.ProviderConnection`
* Add support for `create` method on resources `V2.Provisioning.PaymentMethodRequest` and `V2.Provisioning.Project`
* Add support for `retrieve` and `update` methods on resource `V2.Provisioning.PaymentProfile`
* Add support for `retrieve` method on resource `V2.Provisioning.Eligibility`
* Add support for `export_credentials` and `retrieve` methods on resource `V2.MoneyManagement.FinancialAccountWalletExport`
* Add support for new values `invalid_address_cmra_address` and `invalid_address_registered_agent_address` on enums `Account.future_requirements.errors[].code`, `Account.requirements.errors[].code`, `BankAccount.future_requirements.errors[].code`, `BankAccount.requirements.errors[].code`, `Capability.future_requirements.errors[].code`, `Capability.requirements.errors[].code`, `Person.future_requirements.errors[].code`, and `Person.requirements.errors[].code`
* Change type of `Apps.Install.content_security_policy_granted.connect_src` and `Apps.Install.content_security_policy_pending.connect_src` from `nullable(array(string))` to `array(string)`
* Change type of `Apps.Install.content_security_policy_granted.image_src` and `Apps.Install.content_security_policy_pending.image_src` from `nullable(array(string))` to `array(string)`
* Add support for `blik_recurring_payments` on `Account.capabilities` and `Account.update().$params.capability`
* Add support for `sequra_payments` on `Account.update().$params.capability`
* Add support for `capital` on `Account.settings`
* Change `Account.business_profile.specified_commercial_transactions_act_url` to be required
* Add support for `payout_method` on `Balance.instant_available[].net_available[]`
* Add support for `destination_currency` on `BalanceSettings.payments.payouts.automatic_transfer_rules_by_currency.value[]` and `BalanceSettings.update().$params.payment.payout.automatic_transfer_rules_by_currency`
* Add support for `total_due_amount` on `Capital.FinancingOffer.accepted_terms` and `Capital.FinancingSummary.details`
* Add support for `incremental_interval_target_amount` and `starts_at` on `Capital.FinancingSummary.details.current_repayment_interval`
* Add support for `setup_credential_usage` on `Charge.payment_method_details.card`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.payment_method_options.card`, `PaymentIntent.update().$params.payment_method_option.card`, `SetupIntent.confirm().$params.payment_method_option.card`, `SetupIntent.payment_method_options.card`, and `SetupIntent.update().$params.payment_method_option.card`
* Add support for `stored_credential_usage` on `Charge.payment_method_details.card`, `PaymentAttemptRecord.payment_method_details.card`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.payment_method_options.card`, `PaymentIntent.update().$params.payment_method_option.card`, and `PaymentRecord.payment_method_details.card`
* Change `Charge.payment_method_details.card.electronic_commerce_indicator` to be required
* Add support for `payment_method_options` on `Checkout\Session.approve().$params`
* Add support for `payment_reservation` on `Checkout.Session`
* Add support for `custom` on `Checkout.Session.current_attempt.payment_method_details`
* Change type of `Checkout.Session.items[].subscription` from `nullable(PaymentPagesCheckoutSessionSubscription)` to `PaymentPagesCheckoutSessionSubscription`
* Add support for `payment_method_preselect` on `CustomerSession.components.payment_element.features` and `CustomerSession.create().$params.component.payment_element.feature`
* Add support for `bic`, `iban_last4`, and `network` on `CustomerCashBalanceTransaction.funded.bank_transfer.gb_bank_transfer`
* Add support for `appeal` on `Dispute.update().$params.evidence`
* Add support for new values `apps.install.created`, `apps.install.deleted`, and `apps.install.updated` on enum `Event.type`
* Add support for new value `expired` on enum `FinancialConnections.Account.account_numbers[].status`
* Add support for `pre_collected_consent` on `FinancialConnections.Session`
* Add support for `financial_activity` on `FinancialConnections.Transaction.classifications[]`
* ⚠️ Remove support for `credit` on `FinancialConnections.Transaction.classifications[]`
* Add support for `invoicing_rules` on `InvoiceItem.update().$params`
* Add support for new value `touch_n_go` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* ⚠️ Change type of `Mandate.payment_method_details.blik.type` from `enum('off_session'|'on_session')` to `literal('off_session')`
* Add support for `sequra` on `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethodConfiguration.update().$params`, `SetupIntent.confirm().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for `mandate_options` on `PaymentIntent.confirm().$params.payment_method_option.blik`, `PaymentIntent.payment_method_options.blik`, and `PaymentIntent.update().$params.payment_method_option.blik`
* Change type of `PaymentIntent.confirm().$params.payment_method_option.blik.setup_future_usage` and `PaymentIntent.update().$params.payment_method_option.blik.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
* ⚠️ Remove support for `capture_method` on `PaymentIntent.confirm().$params.payment_method_option.paypay` and `PaymentIntent.update().$params.payment_method_option.paypay`
* ⚠️ Change type of `PaymentIntent.payment_method_options.blik.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
* ⚠️ Remove support for `payto` on `PaymentMethod.update().$params`
* Add support for `payout_method_options` on `Payout`
* Add support for new value `rerouted` on enum `Radar.PaymentEvaluation.outcome.type`
* Add support for `blik` on `SetupAttempt.payment_method_details`, `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.payment_method_options`, and `SetupIntent.update().$params.payment_method_option`
* Add support for `expires_at` on `Subscription.update().$params.payment_setting.payment_method_option.blik.mandate_option`
* ⚠️ Remove support for `expires_after` on `Subscription.update().$params.payment_setting.payment_method_option.blik.mandate_option`
* Change `Subscription.update().$params.trial_setting.end_behavior.missing_payment_method` to be optional
* Add support for `cancel_at_period_end` on `Subscription.pending_update`
* Add support for `tamper_state` on `Terminal\Reader.all().$params`
* Add support for `collection_status_transitions` and `collection_status` on `V2.Billing.Contract`
* ⚠️ Change `V2.Billing.Contract.pricing_lines.data[].ends_at`, `V2.Billing.Contract.pricing_lines.data[].pricing.price_details.pricing_overrides.data[].ends_at`, and `V2.Billing.Contract.pricing_overrides.data[].ends_at` to be optional
* Add support for new value `developer` on enums `EventsV2CoreAccountLinkReturnedEvent.configurations`, `V2.Core.AccountLink.use_case.account_onboarding.configurations`, and `V2.Core.AccountLink.use_case.account_update.configurations`
* Add support for new value `developer` on enum `V2.Core.Account.applied_configurations`
* Add support for `developer` on `V2.Core.Account.configuration`, `V2\Core\Account.create().$params.configuration`, and `V2\Core\Account.update().$params.configuration`
* Add support for new value `apple_pay` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
* Add support for new value `projects` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new value `developer` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].configuration` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].configuration`
* Add support for `skip_exportable_balances` on `V2.MoneyManagement.FinancialAccount.status_details.closed.forwarding_settings` and `V2\MoneyManagement\FinancialAccount.close().$params.forwarding_setting`
* Add support for `crypto` on `V2.MoneyManagement.FinancialAccount.storage`, `V2\MoneyManagement\FinancialAccount.create().$params.storage`, and `V2\MoneyManagement\FinancialAccount.update().$params.storage`
* Add support for `apple_pay` on `V2.MoneyManagement.PayoutMethod` and `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum`
* Add support for new value `apple_pay` on enum `V2.MoneyManagement.PayoutMethod.type`
* Add support for new value `crypto_wallet_export` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
* Change type of `V2\MoneyManagement\FinancialAccount.all().$params.include` and `V2\MoneyManagement\FinancialAccount.retrieve().$params.include` from `literal('payments.balance_by_funds_type')` to `enum('payments.balance_by_funds_type'|'storage.crypto')`
* Add support for `forwarding_settings` on `V2\MoneyManagement\FinancialAccount.update().$params`
* Change `V2\Billing\Contract.create().$params.pricing_line.ends_at`, `V2\Billing\Contract.create().$params.pricing_override.ends_at`, `V2\Billing\Contract.update().$params.pricing_line_action.add.ends_at`, `V2\Billing\Contract.update().$params.pricing_line_action.update.pricing.price_detail.pricing_override_action.add.ends_at`, and `V2\Billing\Contract.update().$params.pricing_override_action.add.ends_at` to be optional
* Add support for snapshot events `APPS_INSTALL_CREATED`, `APPS_INSTALL_DELETED`, and `APPS_INSTALL_UPDATED` with resource `Apps.Install`
* Add support for event notifications `V2BillingContractCollectionBlockedEvent`, `V2BillingContractCollectionCurrentEvent`, `V2BillingContractCollectionPastDueEvent`, and `V2BillingContractCollectionUnpaidEvent` with related object `V2.Billing.Contract`
* Add support for event notifications `V2CoreVaultNetworkTokenActivatedEvent`, `V2CoreVaultNetworkTokenAuthorizationRequirementsChangedEvent`, `V2CoreVaultNetworkTokenDeactivatedEvent`, `V2CoreVaultNetworkTokenDetailsUpdatedEvent`, and `V2CoreVaultNetworkTokenSuspendedEvent` with related object `V2.Core.Vault.NetworkToken`
* Add support for event notifications `V2MoneyManagementFinancialAccountWalletExportCompletedEvent`, `V2MoneyManagementFinancialAccountWalletExportPendingEvent`, and `V2MoneyManagementFinancialAccountWalletExportReadyEvent` with related object `V2.MoneyManagement.FinancialAccount`
* Add support for error type `ServiceUnavailableException`
