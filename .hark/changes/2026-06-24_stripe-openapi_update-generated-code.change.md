---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/2075
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.4.0-beta.1
---

* Add support for `redaction` on `Card`, `Charge`, `Checkout.Session`, `Customer`, `Issuing.Authorization`, `Issuing.Card`, `Issuing.Cardholder`, `Issuing.Dispute`, `Issuing.Transaction`, `PaymentIntent`, `PaymentMethod`, `SetupIntent`, `Source`, and `Token`
* Add support for `disclaimer_variant` on `Capital.FinancingOffer` and `Capital.FinancingSummary.details`
* Add support for `active` on `FinancialConnections.Account.status_details` and `FinancialConnections.Authorization.status_details`
* Add support for new value `institution_requirement` on enum `FinancialConnections.Account.status_details.inactive.cause`
* Change type of `FinancialConnections\Session.create().$params.limit.accounts` from `longInteger` to `emptyable(longInteger)`
* Add support for `pause` on `Invoice.create_preview().$params.subscription_detail`
* Add support for new value `satispay` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
* Add support for `release_details` on `Reserve.Hold`
* Add support for `buyer_id` on `SharedPayment.GrantedToken.payment_method_details.bizum` and `SharedPayment.GrantedToken.payment_method_details.blik`
* Add support for `fingerprint` on `SharedPayment.GrantedToken.payment_method_details.pix`
* Add support for new value `money_manager` on enums `EventsV2CoreAccountLinkReturnedEvent.configurations`, `V2.Core.AccountLink.use_case.account_onboarding.configurations`, and `V2.Core.AccountLink.use_case.account_update.configurations`
* ⚠️ Add support for new value `money_manager` on enum `V2.Core.Account.applied_configurations`
* ⚠️ Remove support for value `storer` from enum `V2.Core.Account.applied_configurations`
* Add support for `money_manager` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
* ⚠️ Remove support for `storer` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
* Add support for new values `business_storage.inbound.eur`, `business_storage.inbound.gbp`, `business_storage.inbound.usd`, `business_storage.outbound.eur`, `business_storage.outbound.gbp`, `business_storage.outbound.usd`, `received_credits.bank_accounts`, and `received_debits.bank_accounts` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new value `money_manager` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].configuration` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].configuration`
* ⚠️ Remove support for `maximum_rps` on `V2.Core.BatchJob` and `V2\Core\BatchJob.create().$params`
* Add support for `bic` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
* ⚠️ Remove support for `swift_code` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
* Add support for `processing` on `V2.MoneyManagement.OutboundPayment.status_details` and `V2.MoneyManagement.OutboundTransfer.status_details`
* Add support for new values `fx_rate_drift_exceeded_after_review`, `payout_method_amount_limit_exceeded`, and `review_rejected` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
* Add support for new values `fx_rate_drift_exceeded_after_review` and `review_rejected` on enum `V2.MoneyManagement.OutboundTransfer.status_details.failed.reason`
* Add support for `account_holder_name` on `V2.MoneyManagement.ReceivedCredit.bank_transfer.us_bank_account`
* Add support for new value `capability_inactive` on enum `V2.MoneyManagement.ReceivedDebit.status_details.failed.reason`
* Add support for `statuses` on `V2\MoneyManagement\FinancialAccount.all().$params`
* ⚠️ Remove support for `status` on `V2\MoneyManagement\FinancialAccount.all().$params`
* Change `V2\Core\BatchJob.create().$params.metadata` to be optional
* Add support for event notifications `V2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationMoneyManagerUpdatedEvent` with related object `V2.Core.Account`
* Add support for event notification `V2MoneyManagementOutboundPaymentUnderReviewEvent` with related object `V2.MoneyManagement.OutboundPayment`
* Add support for event notification `V2MoneyManagementOutboundTransferUnderReviewEvent` with related object `V2.MoneyManagement.OutboundTransfer`
* ⚠️ Remove support for event notifications `V2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationStorerUpdatedEvent` with related object `V2.Core.Account`
* Add support for error codes `anomalous_money_movement_request`, `failed_tax_calculation`, `financial_account_balance_does_not_support_currency`, `financial_account_capability_not_enabled`, and `financial_account_capability_restricted` on `QuotePreviewInvoice.last_finalization_error`
