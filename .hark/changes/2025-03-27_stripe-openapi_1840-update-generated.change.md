---
title: ", [#1840](https://github.com/stripe/stripe-php/pull/1840) Update generated code for beta"
pr_url: https://github.com/stripe/stripe-php/pull/1814
is_stripe_api_change: true
released_in_version: 17.2.0-beta.1
---

This release changes the pinned API version to `2025-03-31.preview`

### Breaking Changes
* Remove support for values `repeating` and `variable` from enum `Coupon.duration`
* Remove support for `amount_overpaid` on `InvoicePayment`
* Remove support for values `out_of_band_payment` and `payment_record` from enum `InvoicePayment.payment.type`
* Remove support for `interchange_fees`, `net_total`, `network_fees`, and `transaction_volume` on `Issuing.Settlement`
* Remove support for `application_fee_amount`, `discount`, `paid_out_of_band`, `paid`, `payment_intent`, `quote`, `subscription_details`, `subscription_proration_date`, `tax`, `total_tax_amounts`, and `transfer_data` on `QuotePreviewInvoice`
* Change type of `PaymentAttemptRecord.payment_method_details.type` and `PaymentRecord.payment_method_details.type` from `literal('custom')` to `string`
* Change type of `PaymentAttemptRecord.payment_record` from `string` to `nullable(string)`
* Change type of `PaymentRecord.latest_payment_attempt_record` from `string` to `nullable(string)`

### Additions
* Add support for new value `repeating` on enum `Coupon.duration`
* Add support for new resources `BalanceSettings`
* Add support for `retrieve` and `update` methods on resource `BalanceSettings`
* Add support for `all`, `create`, `delete`, `retrieve`, and `update` methods on a new `ExternalAccountService` class to access cards and bank accounts made available in the new path `v1/external_accounts`. Access this via `StripeClient.externalAccounts`
* Add support for new values `stripe_balance_payment_debit_reversal` and `stripe_balance_payment_debit` on enum `BalanceTransaction.type`
* Add support for `customer_account` on `Billing.CreditBalanceSummary`, `Billing.CreditGrant`, `BillingPortal.Session`, `CashBalance`, `Checkout.Session`, `CreditNote`, `CustomerBalanceTransaction`, `CustomerCashBalanceTransaction`, `CustomerSession`, `Customer`, `Discount`, `InvoiceItem`, `Invoice`, `PaymentIntent`, `PaymentMethod`, `PromotionCode`, `QuotePreviewInvoice`, `QuotePreviewSubscriptionSchedule`, `Quote`, `SetupAttempt`, `SetupIntent`, `SubscriptionSchedule`, `Subscription`, and `TaxId`
* Add support for `tax_calculation_reference` on `CreditNoteLineItem`, `InvoiceLineItem`, and `LineItem`
* Add support for `context` on `Event`
* Add support for `related_customer_account` on `Identity.VerificationSession`
* Add support for `network_data` on `Issuing.DisputeSettlementDetail`
* Add support for `interchange_fees_amount`, `net_total_amount`, `network_fees_amount`, `other_fees_amount`, `other_fees_count`, and `transaction_amount` on `Issuing.Settlement`
* Add support for `reported_by` on `PaymentAttemptRecord`
* Add support for `stripe_balance` on `PaymentMethod`
* Add support for `payout_method` on `Payout`
* Add support for `confirmation_secret`, `parent`, and `total_taxes` on `QuotePreviewInvoice`
* Add support for new values `forwarding_api_retryable_upstream_error`, `setup_intent_mobile_wallet_unsupported`, `v2_account_disconnection_unsupported`, and `v2_account_missing_configuration` on enum `QuotePreviewInvoice.last_finalization_error.code`
* Add support for new values `klarna`, `nz_bank_account`, and `stripe_balance` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`

#### New APIs for Money CardManagement
* Add support for new resources `V2.FinancialAddressCreditSimulation`, `V2.FinancialAddressGeneratedMicrodeposits`, `V2.MoneyManagement.Adjustment`, `V2.MoneyManagement.FinancialAccount`, `V2.MoneyManagement.FinancialAddress`, `V2.MoneyManagement.InboundTransfer`, `V2.MoneyManagement.OutboundPaymentQuote`, `V2.MoneyManagement.OutboundPayment`, `V2.MoneyManagement.OutboundSetupIntent`, `V2.MoneyManagement.OutboundTransfer`, `V2.MoneyManagement.PayoutMethod`, `V2.MoneyManagement.PayoutMethodsBankAccountSpec`, `V2.MoneyManagement.ReceivedCredit`, `V2.MoneyManagement.ReceivedDebit`, `V2.MoneyManagement.TransactionEntry`, and `V2.MoneyManagement.Transaction`
* Add support for `create` method on resource `V2.MoneyManagement.OutboundPaymentQuote`
* Add support for `all` and `retrieve` methods on resources `V2.MoneyManagement.Adjustment`, `V2.MoneyManagement.FinancialAccount`, `V2.MoneyManagement.ReceivedCredit`, `V2.MoneyManagement.ReceivedDebit`, `V2.MoneyManagement.TransactionEntry`, and `V2.MoneyManagement.Transaction`
* Add support for `all`, `create`, and `retrieve` methods on resources `V2.MoneyManagement.FinancialAddress` and `V2.MoneyManagement.InboundTransfer`
* Add support for `all`, `cancel`, `create`, and `retrieve` methods on resources `V2.MoneyManagement.OutboundPayment` and `V2.MoneyManagement.OutboundTransfer`
* Add support for `all`, `archive`, `retrieve`, and `unarchive` methods on resource `V2.MoneyManagement.PayoutMethod`
* Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.MoneyManagement.OutboundSetupIntent`
* Add support for `retrieve` method on resource `V2.MoneyManagement.PayoutMethodsBankAccountSpec`
* Add support for new values `account_number`, `fedwire_routing_number`, and `routing_number` on enum `invalid_payment_method.invalid_param`
* Add support for new thin event `V2MoneyManagementFinancialAccountCreatedEvent` with related object `V2.MoneyManagement.FinancialAccount`
* Add support for new thin events `V2MoneyManagementFinancialAddressActivatedEvent` and `V2MoneyManagementFinancialAddressFailedEvent` with related object `V2.MoneyManagement.FinancialAddress`
* Add support for new thin events `V2MoneyManagementInboundTransferAvailableEvent`, `V2MoneyManagementInboundTransferBankDebitFailedEvent`, `V2MoneyManagementInboundTransferBankDebitProcessingEvent`, `V2MoneyManagementInboundTransferBankDebitQueuedEvent`, `V2MoneyManagementInboundTransferBankDebitReturnedEvent`, and `V2MoneyManagementInboundTransferBankDebitSucceededEvent` with related object `V2.MoneyManagement.InboundTransfer`
* Add support for new thin events `V2MoneyManagementOutboundPaymentCanceledEvent`, `V2MoneyManagementOutboundPaymentCreatedEvent`, `V2MoneyManagementOutboundPaymentFailedEvent`, `V2MoneyManagementOutboundPaymentPostedEvent`, and `V2MoneyManagementOutboundPaymentReturnedEvent` with related object `V2.MoneyManagement.OutboundPayment`
* Add support for new thin events `V2MoneyManagementOutboundTransferCanceledEvent`, `V2MoneyManagementOutboundTransferCreatedEvent`, `V2MoneyManagementOutboundTransferFailedEvent`, `V2MoneyManagementOutboundTransferPostedEvent`, and `V2MoneyManagementOutboundTransferReturnedEvent` with related object `V2.MoneyManagement.OutboundTransfer`
* Add support for new thin events `V2MoneyManagementReceivedCreditAvailableEvent`, `V2MoneyManagementReceivedCreditFailedEvent`, `V2MoneyManagementReceivedCreditReturnedEvent`, and `V2MoneyManagementReceivedCreditSucceededEvent` with related object `V2.MoneyManagement.ReceivedCredit`
* Add support for new thin events `V2MoneyManagementReceivedDebitCanceledEvent`, `V2MoneyManagementReceivedDebitFailedEvent`, `V2MoneyManagementReceivedDebitPendingEvent`, `V2MoneyManagementReceivedDebitSucceededEvent`, and `V2MoneyManagementReceivedDebitUpdatedEvent` with related object `V2.MoneyManagement.ReceivedDebit`
* Add support for new error types `AlreadyCanceledException`, `BlockedByStripeException`, `ControlledByDashboardException`, `FeatureNotEnabledException`, `FinancialAccountNotOpenException`, `InsufficientFundsException`, `InvalidPayoutMethodException`, `NotCancelableException`, and `RecipientNotNotifiableException`


#### New APIs for Accounts v2 in private preview
See [SaaS platform payments with subscription billing using Accounts v2](https://docs.stripe.com/connect/accounts-v2/saas-platform-payments-billing)

* Add support for new resources `V2.Core.AccountLink`, `V2.Core.Account`, `V2.Core.Person`, `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`
* Add support for `all`, `close`, `create`, `retrieve`, and `update` methods on resource `V2.Core.Account`
* Add support for `create` method on resource `V2.Core.AccountLink`
* Add support for `acknowledge_confirmation_of_payee`, `archive`, `create`, `initiate_confirmation_of_payee`, and `retrieve` methods on resource `V2.Core.Vault.GbBankAccount`
* Add support for `archive`, `create`, `retrieve`, and `update` methods on resource `V2.Core.Vault.UsBankAccount`
* Add support for new thin events `V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent`, `V2CoreAccountIncludingConfigurationCustomerUpdatedEvent`, `V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent`, `V2CoreAccountIncludingConfigurationMerchantUpdatedEvent`, `V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent`, `V2CoreAccountIncludingConfigurationRecipientUpdatedEvent`, `V2CoreAccountIncludingIdentityUpdatedEvent`, and `V2CoreAccountIncludingRequirementsUpdatedEvent`
* Add support for new thin event `V2CoreAccountLinkCompletedEvent` with related object `V2.Core.AccountLink`
* Add support for new thin events `V2CoreAccountPersonCreatedEvent`, `V2CoreAccountPersonDeletedEvent`, and `V2CoreAccountPersonUpdatedEvent` with related object `V2.Core.Person`

### Changes
* Change type of `InvoicePayment.is_default` from `nullable(boolean)` to `boolean`
* Change type of `PaymentAttemptRecord.payment_method_details.custom` and `PaymentRecord.payment_method_details.custom` from `nullable(PaymentsPrimitivesPaymentRecordsResourcePaymentMethodCustomDetails)` to `PaymentsPrimitivesPaymentRecordsResourcePaymentMethodCustomDetails`
