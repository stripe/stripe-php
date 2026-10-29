---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2167
semver_level: major
is_stripe_api_change: true
---

* Add support for new resources `PaymentPlan`, `V2.Data.QueryRun`, `V2.Data.ReportRun`, `V2.Data.Report`, and `V2.Data.Schema`
* Add support for `all`, `create`, `retrieve`, and `update` methods on resource `PaymentPlan`
* Add support for `all` and `retrieve` methods on resources `V2.Data.Report` and `V2.Data.Schema`
* Add support for `create` and `retrieve` methods on resources `V2.Data.QueryRun` and `V2.Data.ReportRun`
* ⚠️ Remove support for `acknowledge_confirmation_of_payee` and `initiate_confirmation_of_payee` methods on resource `V2.Core.Vault.GbBankAccount`
* Add support for new value `issuing.application_rejected_because_prohibited_business` on enum `AccountNotice.reason`
* Add support for `settlement_currencies` on `BalanceSettings.payments` and `BalanceSettings.update().$params.payment`
* Add support for `default_settlement_currency` on `BalanceSettings.payments`
* Add support for `wero` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for new value `mandiri` on enums `Charge.payment_method_details.id_bank_transfer.bank`, `ConfirmationToken.payment_method_preview.id_bank_transfer.bank`, `PaymentAttemptRecord.payment_method_details.id_bank_transfer.bank`, `PaymentMethod.id_bank_transfer.bank`, `PaymentRecord.payment_method_details.id_bank_transfer.bank`, and `SetupAttempt.payment_method_details.id_bank_transfer.bank`
* Add support for new values `au_acn`, `au_wpn`, `bw_vat`, `ci_vat`, `cz_dic`, `fr_siren`, `fr_siret`, `fr_spi`, `gh_tin`, `is_kt`, `md_cf`, `mu_vat`, `mz_nuit`, `nz_bn`, `pt_nif`, `sm_coe`, `tt_bir`, and `tt_vat` on enums `Checkout.Session.collected_information.tax_id.type`, `Order.tax_details.tax_ids[].type`, and `QuotePreviewInvoice.customer_tax_ids[].type`
* Add support for `external_token` on `ConfirmationToken.create().$params.payment_method_datum.us_bank_account`, `PaymentIntent.confirm().$params.payment_method_datum.us_bank_account`, `PaymentIntent.create().$params.payment_method_datum.us_bank_account`, `PaymentIntent.update().$params.payment_method_datum.us_bank_account`, `PaymentMethod.create().$params.us_bank_account`, `SetupIntent.confirm().$params.payment_method_datum.us_bank_account`, `SetupIntent.create().$params.payment_method_datum.us_bank_account`, `SetupIntent.update().$params.payment_method_datum.us_bank_account`, and `Treasury\OutboundPayment.create().$params.destination_payment_method_datum.us_bank_account`
* Add support for new value `wero` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* ⚠️ Change type of `Dispute.evidence.appeal` from `DisputeAppeal` to `nullable(DisputeAppeal)`
* Change `Dispute.evidence_details.submission_method` to be required
* Change `Dispute.intended_submission_method` to be required
* Add support for `payment_plan` on `Invoice`
* Add support for new value `wero` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for new value `sequra` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
* Change `QuotePreviewSubscriptionSchedule.pause_schedules` to be required
* ⚠️ Remove support for `default_outbound_destination` on `V2.Core.Account.configuration.recipient` and `V2\Core\Account.update().$params.configuration.recipient`
* Add support for `crypto_wallets` on `V2.Core.Account.configuration.recipient.capabilities`, `V2\Core\Account.create().$params.configuration.recipient.capability`, and `V2\Core\Account.update().$params.configuration.recipient.capability`
* Add support for `ach`, `fedwire`, `fps`, `rtp`, `sepa`, and `swift` on `V2.Core.Account.configuration.recipient.capabilities.bank_accounts`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account`, and `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account`
* ⚠️ Remove support for `wire` on `V2.Core.Account.configuration.recipient.capabilities.bank_accounts`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account`, and `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account`
* Add support for new value `physical` on enum `V2.Core.Account.identity.business_details.additional_addresses[].purpose`
* Add support for `proof_of_business_presence` on `V2.Core.Account.identity.business_details.documents`, `V2\Core\Account.create().$params.identity.business_detail.document`, `V2\Core\Account.update().$params.identity.business_detail.document`, and `V2\Core\AccountToken.create().$params.identity.business_detail.document`
* Add support for `partial_output_file` on `V2.Core.BatchJob.status_details.batch_failed`
* Add support for `fingerprint` on `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`, and `V2.MoneyManagement.PayoutMethod.bank_account`
* ⚠️ Remove support for values `futsu` and `toza` from enum `V2.Core.Vault.GbBankAccount.bank_account_type`
* Add support for `fedwire_fingerprint` on `V2.Core.Vault.UsBankAccount`
* ⚠️ Remove support for values `balance_exchange` and `inbound_payment` from enum `V2.MoneyManagement.Adjustment.adjusted_flow.type`
* Add support for `address` on `V2.MoneyManagement.FinancialAddress.bank_account.aba`
* ⚠️ Remove support for `account_holder_address` on `V2.MoneyManagement.FinancialAddress.bank_account.aba`
* ⚠️ Remove support for `last4` on `V2.MoneyManagement.FinancialAddress.bank_account.aba`, `V2.MoneyManagement.FinancialAddress.bank_account.iban`, and `V2.MoneyManagement.FinancialAddress.bank_account.sort_code`
* ⚠️ Remove support for `country` on `V2.MoneyManagement.FinancialAddress.bank_account.iban`
* Change `V2.MoneyManagement.FinancialAddress.bank_account.aba.account_number` and `V2.MoneyManagement.FinancialAddress.bank_account.sort_code.account_number` to be required
* Change `V2.MoneyManagement.FinancialAddress.bank_account.iban.iban` to be required
* Change `V2.MoneyManagement.FinancialAddress.settlement_currency` to be required
* Add support for `tax_amount` on `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[]`
* ⚠️ Remove support for values `becs`, `eft`, `npp`, and `sepa_instant` from enum `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].network_fee_details.network`
* Add support for new value `next_day_payout_fee` on enum `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].type`
* Add support for `payout_method_options` on `V2.MoneyManagement.OutboundPayment.to`, `V2.MoneyManagement.OutboundPaymentQuote.to`, `V2.MoneyManagement.OutboundTransfer.to`, `V2\MoneyManagement\OutboundPayment.create().$params.to`, `V2\MoneyManagement\OutboundPaymentQuote.create().$params.to`, and `V2\MoneyManagement\OutboundTransfer.create().$params.to`
* Add support for `payout_intent` and `tracking_details` on `V2.MoneyManagement.OutboundPayment`
* Add support for `recipient_verification` on `V2.MoneyManagement.OutboundPayment` and `V2\MoneyManagement\OutboundPayment.create().$params`
* ⚠️ Change `V2.MoneyManagement.OutboundPayment.to.payout_method` and `V2.MoneyManagement.OutboundSetupIntent.payout_method` to be optional
* Add support for `crypto_wallet` on `V2.MoneyManagement.PayoutMethod` and `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum`
* Add support for `network` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* ⚠️ Remove support for `gb_bank_account`, `sepa_bank_account`, and `us_bank_account` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* ⚠️ Remove support for `network` on `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.aba`, `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.iban`, and `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.sort_code`
* Add support for `fee_batch` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
* ⚠️ Remove support for `fee_transaction` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
* ⚠️ Add support for new value `fee_batch` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
* ⚠️ Remove support for value `fee_transaction` from enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
* Add support for `metadata` and `regulatory_receipt` on `V2.MoneyManagement.Transaction`
* Add support for `contact_email` on `V2.Signals.AccountActivity.account_details.data`, `V2.Signals.AccountEvaluation.account_details.data`, `V2\Signals\AccountActivity.create().$params.account_detail.datum`, and `V2\Signals\AccountEvaluation.create().$params.account_detail.datum`
* Add support for `statement_descriptor` on `V2\MoneyManagement\OutboundPayment.create().$params` and `V2\MoneyManagement\OutboundTransfer.create().$params`
* ⚠️ Remove support for `created_gt`, `created_gte`, `created_lt`, and `created_lte` on `V2\MoneyManagement\OutboundPayment.all().$params`
* ⚠️ Change type of `V2\MoneyManagement\OutboundPayment.all().$params.created` from `DateTime` to `an object`
* ⚠️ Remove support for `settlement_currency` on `V2\MoneyManagement\FinancialAddress.create().$params`
* ⚠️ Remove support for `deposit_insurance_eligibility` on `V2\MoneyManagement\FinancialAccount.create().$params.storage`
* Add support for snapshot events `PAYMENT_PLAN_CREATED`, `PAYMENT_PLAN_INSTALLMENT_DUE`, `PAYMENT_PLAN_INSTALLMENT_PAID`, `PAYMENT_PLAN_INSTALLMENT_WILL_BE_DUE`, and `PAYMENT_PLAN_UPDATED` with resource `PaymentPlan`
* Add support for event notifications `V2DataQueryRunCreatedEvent`, `V2DataQueryRunFailedEvent`, `V2DataQueryRunSucceededEvent`, and `V2DataQueryRunUpdatedEvent` with related object `V2.Data.QueryRun`
* Add support for event notifications `V2DataReportRunCreatedEvent`, `V2DataReportRunFailedEvent`, `V2DataReportRunSucceededEvent`, and `V2DataReportRunUpdatedEvent` with related object `V2.Data.ReportRun`
* Add support for error codes `smart_disputes_not_available`, `subscription_update_trial_after_billing_cycle_anchor`, `three_d_secure_authentication_not_supported`, and `three_d_secure_authentication_upstream_error` on `QuotePreviewInvoice.last_finalization_error`
