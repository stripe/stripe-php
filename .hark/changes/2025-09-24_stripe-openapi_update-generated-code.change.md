---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1907
is_stripe_api_change: true
released_in_version: 18.1.0-beta.1
---

* Add support for new resources `V2.Billing.BillSettingVersion`, `V2.Billing.BillSetting`, `V2.Billing.Cadence`, `V2.Billing.CollectionSettingVersion`, `V2.Billing.CollectionSetting`, and `V2.Billing.Profile`
* Add support for `all`, `create`, `retrieve`, and `update` methods on resources `V2.Billing.BillSetting`, `V2.Billing.CollectionSetting`, and `V2.Billing.Profile`
* Add support for `all` and `retrieve` methods on resources `V2.Billing.BillSettingVersion` and `V2.Billing.CollectionSettingVersion`
* Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.Billing.Cadence`
* Add support for thin event `V2BillingBillSettingUpdatedEvent` with related object `V2.Billing.BillSetting`
* Remove support for `currency` on `V2\MoneyManagement\FinancialAddress.create().$params`
* Add support for `amount_details` and `payments_orchestration` on `V2.Payments.OffSessionPayment` and `V2\Payments\OffSessionPayment.create().$params`
* Add support for `mandate_data` and `payment_method_options` on `V2\Payments\OffSessionPayment.create().$params`
* Add support for `retry_policy` on `V2.Payments.OffSessionPayment.retry_details` and `V2\Payments\OffSessionPayment.create().$params.retry_detail`
* Add support for `profile` on `V2.Core.Account.defaults`, `V2\Core\Account.create().$params.default`, and `V2\Core\Account.update().$params.default`
* Add support for `sepa_bank_account` on `V2.MoneyManagement.FinancialAddress.credentials` and `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* Add support for new value `sepa_bank_account` on enum `V2.MoneyManagement.FinancialAddress.credentials.type`
* Add support for new value `crypto_wallet` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
* Add support for `settlement_currency` on `V2.MoneyManagement.FinancialAddress`
* Add support for new value `authorization_expired` on enum `V2.Payments.OffSessionPayment.failure_reason`
* Change type of `V2.MoneyManagement.OutboundPaymentQuote.fx_quote.lock_expires_at` from `DateTime` to `nullable(DateTime)`
* Add support for `i_p` on `V2.Core.Account.identity.attestations.directorship_declaration`, `V2.Core.Account.identity.attestations.ownership_declaration`, `V2.Core.Account.identity.attestations.terms_of_service.account`, `V2.Core.Account.identity.attestations.terms_of_service.storer`, `V2.Core.Account.identity.individual.additional_terms_of_service.account`, `V2.Core.Person.additional_terms_of_service.account`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.account`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.storer`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service.account`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service.storer`, `V2\Core\Person.create().$params.additional_terms_of_service.account`, and `V2\Core\Person.update().$params.additional_terms_of_service.account`
* Remove support for `ip` on `V2.Core.Account.identity.attestations.directorship_declaration`, `V2.Core.Account.identity.attestations.ownership_declaration`, `V2.Core.Account.identity.attestations.terms_of_service.account`, `V2.Core.Account.identity.attestations.terms_of_service.storer`, `V2.Core.Account.identity.individual.additional_terms_of_service.account`, `V2.Core.Person.additional_terms_of_service.account`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.account`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.storer`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service.account`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service.storer`, `V2\Core\Person.create().$params.additional_terms_of_service.account`, and `V2\Core\Person.update().$params.additional_terms_of_service.account`
* Remove support for `doing_business_as`, `product_description`, and `url` on `V2.Core.Account.identity.business_details`, `V2\Core\Account.create().$params.identity.business_detail`, and `V2\Core\Account.update().$params.identity.business_detail`
* Add support for new values `heuristic` and `scheduled` on enum `V2.Payments.OffSessionPayment.retry_details.retry_strategy`
* Change type of `V2.MoneyManagement.OutboundPaymentQuote.fx_quote.lock_duration` from `literal('five_minutes')` to `enum('five_minutes'|'none')`
* Add support for new value `none` on enum `V2.MoneyManagement.OutboundPaymentQuote.fx_quote.lock_status`
* Add support for new value `crypto_wallet` on enum `V2.MoneyManagement.PayoutMethod.type`
* Add support for `origin_type` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* Remove support for `payment_method_type` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* Add support for `type` on `V2\MoneyManagement\FinancialAddress.create().$params`
* Add support for new values `financial_addressses.crypto_wallets`, `holds_currencies.usdc`, `outbound_payments.crypto_wallets`, and `outbound_transfers.crypto_wallets` on enum `EventsV2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent.updated_capability`
