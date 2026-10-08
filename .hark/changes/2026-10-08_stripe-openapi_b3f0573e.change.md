---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2168
semver_level: major
is_stripe_api_change: true
---

* Add support for new resources `Radar.Rule`, `V2.MoneyManagement.FundingSession`, and `V2.MoneyManagement.InboundTransferMandate`
* Add support for `all`, `cancel`, `create`, and `retrieve` methods on resource `V2.MoneyManagement.InboundTransferMandate`
* Add support for `create` method on resource `V2.MoneyManagement.FundingSession`
* Add support for `excluded_payout_destinations` on `Account.update().$params.setting.capital`
* Add support for `wero_payments` on `Account.capabilities`
* ⚠️ Change type of `Charge.outcome.rule` from `RadarRule` to `$Radar.Rule`
* Add support for new value `ousd` on enums `Charge.payment_method_details.crypto.token_currency`, `PaymentAttemptRecord.payment_method_details.crypto.token_currency`, and `PaymentRecord.payment_method_details.crypto.token_currency`
* Add support for `location` and `reader` on `Charge.payment_method_details.swish`, `PaymentAttemptRecord.payment_method_details.swish`, and `PaymentRecord.payment_method_details.swish`
* Add support for `payment_settings` on `Checkout.Session` and `Checkout\Session.create().$params`
* Add support for `on_behalf_of` on `Checkout.Session`
* Add support for new values `fednow` and `rtp` on enum `CustomerCashBalanceTransaction.funded.bank_transfer.us_bank_transfer.network`
* Add support for `flexible_credential` on `Issuing.Authorization`
* Add support for `fuels` on `Issuing.Transaction.purchase_details`
* Add support for `us_bank_account` on `PaymentAttemptRecord.report_failed().$params.payment_method_detail`, `PaymentRecord.report_payment().$params.payment_method_detail`, `PaymentRecord.report_payment_attempt().$params.payment_method_detail`, `PaymentRecord.report_payment_attempt_failed().$params.payment_method_detail`, `Radar.PaymentEvaluation.payment_details.money_movement_details`, and `Radar\PaymentEvaluation.create().$params.payment_detail.money_movement_detail`
* Change type of `PaymentAttemptRecord.report_failed().$params.payment_method_detail.type` and `PaymentRecord.report_payment_attempt_failed().$params.payment_method_detail.type` from `literal('card')` to `enum('card'|'us_bank_account')`
* Add support for `fleet` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.payment_method_options.card_present`, and `PaymentIntent.update().$params.payment_method_option.card_present`
* Add support for `subscription_reference` on `PaymentIntent.confirm().$params.payment_method_option.paypay`, `PaymentIntent.create().$params.payment_method_option.paypay`, `PaymentIntent.payment_method_options.paypay`, and `PaymentIntent.update().$params.payment_method_option.paypay`
* Add support for `enablement_details` on `QuotePreviewSubscriptionSchedule.default_settings.automatic_tax`, `QuotePreviewSubscriptionSchedule.phases[].automatic_tax`, `Subscription.automatic_tax`, `SubscriptionSchedule.default_settings.automatic_tax`, and `SubscriptionSchedule.phases[].automatic_tax`
* Change type of `Radar\PaymentEvaluation.create().$params.payment_detail.money_movement_detail.money_movement_type` from `literal('card')` to `enum('card'|'us_bank_account')`
* Add support for `rules` on `Radar.PaymentEvaluation`
* ⚠️ Change type of `Radar.PaymentEvaluation.payment_details.money_movement_details.money_movement_type` from `literal('card')` to `enum('card'|'us_bank_account')`
* Add support for new values `request_three_d_secure` and `reroute` on enum `Radar.PaymentEvaluation.recommended_action`
* Add support for `bank_initiated_return` on `Radar.PaymentEvaluation.signals`
* Add support for new value `hour` on enums `SharedPayment.GrantedToken.usage_limits.recurring.interval` and `SharedPayment.IssuedToken.usage_limits.recurring.interval`
* Add support for `utility_users_tax` on `Tax.Registration.country_options.us`
* Add support for new values `digital_excise_tax` and `utility_users_tax` on enum `Tax.Registration.country_options.us.type`
* Add support for `enable_customer_cancellation` on `Terminal\Reader.activate_gift_card().$params`, `Terminal\Reader.cashout_gift_card().$params`, `Terminal\Reader.check_gift_card_balance().$params`, and `Terminal\Reader.reload_gift_card().$params`
* Add support for `vipps_payments` on `V2.Core.Account.configuration.merchant.capabilities`, `V2\Core\Account.create().$params.configuration.merchant.capability`, and `V2\Core\Account.update().$params.configuration.merchant.capability`
* Add support for `business_custodial_storage` on `V2.Core.Account.configuration.money_manager.capabilities`, `V2\Core\Account.create().$params.configuration.money_manager.capability`, and `V2\Core\Account.update().$params.configuration.money_manager.capability`
* Add support for `offramp` and `onramp` on `V2.Core.Account.configuration.money_manager.capabilities.outbound_payments`, `V2.Core.Account.configuration.money_manager.capabilities.outbound_transfers`, `V2.Core.Account.configuration.money_manager.capabilities.received_credits`, `V2\Core\Account.create().$params.configuration.money_manager.capability.outbound_payment`, `V2\Core\Account.create().$params.configuration.money_manager.capability.outbound_transfer`, `V2\Core\Account.create().$params.configuration.money_manager.capability.received_credit`, `V2\Core\Account.update().$params.configuration.money_manager.capability.outbound_payment`, `V2\Core\Account.update().$params.configuration.money_manager.capability.outbound_transfer`, and `V2\Core\Account.update().$params.configuration.money_manager.capability.received_credit`
* Add support for `pix` on `V2.Core.Account.configuration.recipient.capabilities`, `V2.MoneyManagement.PayoutMethod`, `V2\Core\Account.create().$params.configuration.recipient.capability`, `V2\Core\Account.update().$params.configuration.recipient.capability`, and `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum`
* Add support for new value `pix` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
* Add support for new values `pix` and `vipps_payments` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for `account` on `V2.MoneyManagement.FinancialAddress`, `V2\MoneyManagement\FinancialAddress.all().$params`, and `V2\MoneyManagement\FinancialAddress.create().$params`
* Add support for new values `bre_b`, `nip`, and `pix` on enum `V2.MoneyManagement.FinancialAddress.bank_account.type`
* Add support for `supported_network_details` on `V2.MoneyManagement.FinancialAddress.crypto_wallet`
* Add support for new value `bitcoin` on enums `V2.MoneyManagement.FinancialAddress.crypto_wallet.network` and `V2.MoneyManagement.ReceivedCredit.crypto_wallet_transfer.crypto_wallet.network`
* Add support for `network_details` on `V2.MoneyManagement.InboundTransfer` and `V2\MoneyManagement\InboundTransfer.create().$params`
* Add support for `bacs_debit` on `V2.MoneyManagement.InboundTransfer.from.payment_method`
* Add support for new value `pix` on enum `V2.MoneyManagement.PayoutMethod.type`
* Add support for `bic` on `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.aba` and `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.sort_code`
* Add support for `originating_crypto_wallet`, `token_currency`, and `transaction_hash` on `V2.MoneyManagement.ReceivedCredit.crypto_wallet_transfer`
* Add support for `invoices` on `V2.Tax.IntegrationConfiguration` and `V2\Tax\IntegrationConfiguration.update().$params`
* ⚠️ Remove support for `account` on `V2\Risk\Inquiry.all().$params`
* Add support for `customer` and `subscription` on `EventsV1InvoiceUpcomingEvent`
* Add support for new value `vipps_payments` on enum `EventsV2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent.updated_capability`
* Add support for new values `business_custodial_storage.inbound.ousd`, `business_custodial_storage.inbound.usdc`, `business_custodial_storage.outbound.ousd`, `business_custodial_storage.outbound.usdc`, `outbound_payments.offramp.bank_accounts.brl`, `outbound_payments.offramp.bank_accounts.cop`, `outbound_payments.offramp.bank_accounts.eur`, `outbound_payments.offramp.bank_accounts.gbp`, `outbound_payments.offramp.bank_accounts.mxn`, `outbound_payments.offramp.bank_accounts.usd`, `outbound_payments.onramp.crypto_wallets.brl`, `outbound_payments.onramp.crypto_wallets.cop`, `outbound_payments.onramp.crypto_wallets.eur`, `outbound_payments.onramp.crypto_wallets.gbp`, `outbound_payments.onramp.crypto_wallets.mxn`, `outbound_payments.onramp.crypto_wallets.usd`, `outbound_transfers.offramp.bank_accounts.brl`, `outbound_transfers.offramp.bank_accounts.cop`, `outbound_transfers.offramp.bank_accounts.eur`, `outbound_transfers.offramp.bank_accounts.gbp`, `outbound_transfers.offramp.bank_accounts.mxn`, `outbound_transfers.offramp.bank_accounts.usd`, `outbound_transfers.onramp.crypto_wallets.brl`, `outbound_transfers.onramp.crypto_wallets.cop`, `outbound_transfers.onramp.crypto_wallets.eur`, `outbound_transfers.onramp.crypto_wallets.gbp`, `outbound_transfers.onramp.crypto_wallets.mxn`, `outbound_transfers.onramp.crypto_wallets.usd`, `received_credits.offramp.bank_accounts.brl`, `received_credits.offramp.bank_accounts.cop`, `received_credits.offramp.bank_accounts.eur`, `received_credits.offramp.bank_accounts.gbp`, `received_credits.offramp.bank_accounts.mxn`, `received_credits.offramp.bank_accounts.usd`, `received_credits.onramp.crypto_wallets.brl`, `received_credits.onramp.crypto_wallets.cop`, `received_credits.onramp.crypto_wallets.eur`, `received_credits.onramp.crypto_wallets.gbp`, `received_credits.onramp.crypto_wallets.mxn`, and `received_credits.onramp.crypto_wallets.usd` on enum `EventsV2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEvent.updated_capability`
* Add support for new value `pix` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
* Add support for event notifications `V2MoneyManagementInboundTransferMandateActivatedEvent`, `V2MoneyManagementInboundTransferMandateCreatedEvent`, `V2MoneyManagementInboundTransferMandateExpiredEvent`, `V2MoneyManagementInboundTransferMandateRefusedEvent`, and `V2MoneyManagementInboundTransferMandateRevokedEvent` with related object `V2.MoneyManagement.InboundTransferMandate`
