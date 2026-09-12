---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/1978
is_stripe_api_change: true
released_in_version: 19.2.0-alpha.1
---

* Add support for new resources `SharedPayment.GrantedToken`, `V2.Iam.ApiKey`, `V2.Payments.SettlementAllocationIntentSplit`, `V2.Payments.SettlementAllocationIntent`, and `V2.Tax.ManualRule`
* Add support for `retrieve` method on resource `SharedPayment.GrantedToken`
* Add support for `create` and `update` test helper methods on resource `SharedPayment.GrantedToken`
* Add support for `all`, `create`, `deactivate`, `retrieve`, and `update` methods on resource `V2.Tax.ManualRule`
* Add support for `cancel`, `create`, `retrieve`, `submit`, and `update` methods on resource `V2.Payments.SettlementAllocationIntent`
* Add support for `cancel`, `create`, and `retrieve` methods on resource `V2.Payments.SettlementAllocationIntentSplit`
* Add support for `all`, `create`, `expire`, `retrieve`, `rotate`, and `update` methods on resource `V2.Iam.ApiKey`
* Add support for `check_scanning` on `AccountSession.create().$params.component`
* Add support for `tax_details` on `Checkout\Session.create().$params.line_item.price_datum.product_datum`, `Checkout\Session.update().$params.line_item.price_datum.product_datum`, `Invoice.add_lines().$params.line.price_datum.product_datum`, `Invoice.update_lines().$params.line.price_datum.product_datum`, `InvoiceLineItem.update().$params.price_datum.product_datum`, `PaymentLink.create().$params.line_item.price_datum.product_datum`, `Product.create().$params`, and `Product.update().$params`
* Add support for `payment_method_data` on `DelegatedCheckout\RequestedSession.confirm().$params`
* Add support for `product_details` on `DelegatedCheckout.RequestedSession.line_item_details[]`
* Add support for `wallets` on `Issuing\Card.all().$params`
* Add support for `primary_account_identifier` on `Issuing.Card.wallets.apple_pay` and `Issuing.Card.wallets.google_pay`
* Add support for `shared_payment_granted_token` on `PaymentIntent.confirm().$params`, `PaymentIntent.create().$params`, and `PaymentIntent`
* Change `ProductCatalog.TrialOffer.duration.relative` to be optional
* Add support for new values `al_bank_account`, `am_bank_account`, `bn_bank_account`, `bw_bank_account`, `dz_bank_account`, `gy_bank_account`, `jm_bank_account`, `jo_bank_account`, `kw_bank_account`, `lk_bank_account`, `ma_bank_account`, `om_bank_account`, and `tz_bank_account` on enum `V2.Account.configuration.recipient_data.default_outbound_destination.type`
* Add support for `instant` on `V2.Account.configuration.recipient_data.features.bank_accounts`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts`, `V2\Account.create().$params.configuration.recipient_datum.feature.bank_account`, `V2\Account.update().$params.configuration.recipient_datum.feature.bank_account`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account`, and `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account`
* Add support for new value `bank_accounts.instant` on enum `V2.Account.requirements[].impact.required_for_features`
* Add support for `collect_at` on `V2.Billing.IntentAction.deactivate`, `V2.Billing.IntentAction.modify`, `V2.Billing.IntentAction.subscribe`, `V2\Billing\Intent.create().$params.action.deactivate`, `V2\Billing\Intent.create().$params.action.modify`, and `V2\Billing\Intent.create().$params.action.subscribe`
* Remove support for `billing_details` on `V2.Billing.IntentAction.deactivate`, `V2.Billing.IntentAction.modify`, `V2.Billing.IntentAction.subscribe`, `V2\Billing\Intent.create().$params.action.deactivate`, `V2\Billing\Intent.create().$params.action.modify`, and `V2\Billing\Intent.create().$params.action.subscribe`
* Add support for `overrides` on `V2.Billing.IntentAction.deactivate.pricing_plan_subscription_details`, `V2.Billing.IntentAction.modify.pricing_plan_subscription_details`, `V2.Billing.IntentAction.subscribe.pricing_plan_subscription_details`, `V2\Billing\Intent.create().$params.action.deactivate.pricing_plan_subscription_detail`, `V2\Billing\Intent.create().$params.action.modify.pricing_plan_subscription_detail`, and `V2\Billing\Intent.create().$params.action.subscribe.pricing_plan_subscription_detail`
* Remove support for `requested` on `V2.Core.Account.configuration.card_creator.capabilities.commercial.celtic.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.celtic.spend_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.cross_river_bank.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.cross_river_bank.spend_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.lead.prepaid_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.stripe.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.stripe.prepaid_card`, `V2.Core.Account.configuration.recipient.capabilities.crypto_wallets`, `V2.Core.Account.configuration.storer.capabilities.financial_addresses.crypto_wallets`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.usdc`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.crypto_wallets`, and `V2.Core.Account.configuration.storer.capabilities.outbound_transfers.crypto_wallets`
* Add support for new value `bank_accounts.instant` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for `alternative_reference` on `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`, and `V2.MoneyManagement.PayoutMethod`
* Add support for `managed_by` and `payments` on `V2.MoneyManagement.FinancialAccount`
* Add support for new value `payments` on enum `V2.MoneyManagement.FinancialAccount.type`
* Add support for `speed` on `V2.MoneyManagement.OutboundPayment.delivery_options`, `V2.MoneyManagement.OutboundPaymentQuote.delivery_options`, `V2\MoneyManagement\OutboundPayment.create().$params.delivery_option`, and `V2\MoneyManagement\OutboundPaymentQuote.create().$params.delivery_option`
* Add support for new value `real_time_payout_fee` on enum `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].type`
* Add support for `types` on `V2\MoneyManagement\FinancialAccount.all().$params`
* Add support for new value `bank_accounts.instant` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
* Add support for `top_impacted_accounts` on `EventsV2CoreHealthApiErrorFiringEvent.impact`, `EventsV2CoreHealthApiErrorResolvedEvent.impact`, `EventsV2CoreHealthApiLatencyFiringEvent.impact`, `EventsV2CoreHealthApiLatencyResolvedEvent.impact`, `EventsV2CoreHealthPaymentMethodErrorFiringEvent.impact`, and `EventsV2CoreHealthPaymentMethodErrorResolvedEvent.impact`
* Add support for event notifications `V2CoreHealthSepaDebitDelayedFiringEvent`, `V2CoreHealthSepaDebitDelayedResolvedEvent`, and `V2PaymentsSettlementAllocationIntentNotFoundEvent`
* Add support for event notifications `V2PaymentsSettlementAllocationIntentCanceledEvent`, `V2PaymentsSettlementAllocationIntentCreatedEvent`, `V2PaymentsSettlementAllocationIntentErroredEvent`, `V2PaymentsSettlementAllocationIntentFundsNotReceivedEvent`, `V2PaymentsSettlementAllocationIntentMatchedEvent`, `V2PaymentsSettlementAllocationIntentSettledEvent`, and `V2PaymentsSettlementAllocationIntentSubmittedEvent` with related object `V2.Payments.SettlementAllocationIntent`
* Add support for event notifications `V2PaymentsSettlementAllocationIntentSplitCanceledEvent`, `V2PaymentsSettlementAllocationIntentSplitCreatedEvent`, and `V2PaymentsSettlementAllocationIntentSplitSettledEvent` with related object `V2.Payments.SettlementAllocationIntentSplit`
