---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1849
is_stripe_api_change: true
released_in_version: 17.2.0-beta.3
---

### Breaking changes
* Change type of `V2.MoneyManagement.ReceivedDebit.status_transitions` from `an object` to `nullable(an object)`
* Remove support for values `bank_accounts.local_uk`, `bank_accounts.wire_uk`, `cards_uk`, and `crypto_wallets_v2` from enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`

### Additions
* Add support for new resources `Privacy.RedactionJobRootObjects`, `Privacy.RedactionJobValidationError`, and `Privacy.RedactionJob`
* Add support for `all`, `cancel`, `create`, `retrieve`, `run`, `update`, and `validate` methods on resource `RedactionJob`
* Add support for `all` and `retrieve` methods on resource `RedactionJobValidationError`
* Add support for new value `tax_id_prohibited` on enums `Invoice.last_finalization_error.code`, `PaymentIntent.last_payment_error.code`, `QuotePreviewInvoice.last_finalization_error.code`, `SetupAttempt.setup_error.code`, `SetupIntent.last_setup_error.code`, and `StripeError.code`
* Add support for new value `fixed_term_loan` on enum `Capital.FinancingOffer.type`
* Add support for `wallet_options` on `Checkout.Session`
* Add support for new values `privacy.redaction_job.canceled`, `privacy.redaction_job.created`, `privacy.redaction_job.ready`, `privacy.redaction_job.succeeded`, and `privacy.redaction_job.validation_error` on enum `Event.type`
* Add support for `klarna` on `PaymentMethodDomain`
* Change type of `Tax.CalculationLineItem.reference` from `nullable(string)` to `string`
