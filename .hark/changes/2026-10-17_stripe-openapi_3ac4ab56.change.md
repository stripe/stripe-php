---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2178
semver_level: major
is_stripe_api_change: true
---

* Add support for new resource `Risk.Form`
* Add support for `retrieve` and `update` methods on resource `Risk.Form`
* Add support for `business_profile_management` on `AccountSession.components`
* Change type of `AccountSession.components.terminal_hardware_orders` from `nullable(ConnectEmbeddedBaseConfig)` to `ConnectEmbeddedBaseConfig`
* Change type of `AccountSession.components.terminal_hardware_shop` from `nullable(ConnectEmbeddedBaseConfig)` to `ConnectEmbeddedBaseConfig`
* Change `AccountSession.components.terminal_hardware_orders` to be required
* Change `AccountSession.components.terminal_hardware_shop` to be required
* Add support for new value `mandiri` on enums `Charge.payment_method_details.id_bank_transfer.bank`, `ConfirmationToken.payment_method_preview.id_bank_transfer.bank`, `PaymentAttemptRecord.payment_method_details.id_bank_transfer.bank`, `PaymentMethod.id_bank_transfer.bank`, `PaymentRecord.payment_method_details.id_bank_transfer.bank`, and `SetupAttempt.payment_method_details.id_bank_transfer.bank`
* Add support for `marketing_attributions` on `Checkout.Session` and `Checkout\Session.create().$params`
* Add support for new values `au_acn`, `au_wpn`, `cz_dic`, `fr_siren`, `fr_siret`, `fr_spi`, `is_kt`, `md_cf`, `mu_vat`, `mz_nuit`, `nz_bn`, `pt_nif`, `sm_coe`, `tt_bir`, and `tt_vat` on enums `Checkout.Session.collected_information.tax_id.type`, `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Order.tax_details.tax_ids[].type`, `QuotePreviewInvoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, and `Tax.Transaction.customer_details.tax_ids[].type`
* Add support for `mandate_options` on `Checkout.Session.payment_method_options.card`
* ⚠️ Change type of `Dispute.evidence.appeal` from `DisputeAppeal` to `nullable(DisputeAppeal)`
* Change `Dispute.evidence_details.submission_method` to be required
* ⚠️ Remove support for `details` on `Identity.VerificationReport.email`
* ⚠️ Remove support for value `email` from enums `Identity.VerificationReport.type` and `Identity.VerificationSession.type`
* ⚠️ Remove support for `healthcare` on `Issuing\Authorization.capture().$params.purchase_detail`, `Issuing\Transaction.create_force_capture().$params.purchase_detail`, and `Issuing\Transaction.create_unlinked_refund().$params.purchase_detail`
* Add support for `account_tax_ids`, `custom_fields`, `description`, and `footer` on `PaymentLink.subscription_data.invoice_settings`
* Change type of `Radar.PaymentEvaluation.signals.early_fraud_warning` from `nullable(Payment Evaluation Signal)` to `Payment Evaluation Signal`
* ⚠️ Change `Radar.PaymentEvaluation.signals.early_fraud_warning` to be optional
* Add support for `bw`, `ci`, `gh`, and `mu` on `Tax.Registration.country_options`
* Add support for new value `account_takeover` on enum `V2.Core.AccountEvaluation.evaluations_triggered`
* Add support for `czk`, `nok`, `pln`, and `sek` on `V2.Core.Account.configuration.money_manager.capabilities.business_storage.inbound`, `V2.Core.Account.configuration.money_manager.capabilities.business_storage.outbound`, `V2\Core\Account.create().$params.configuration.money_manager.capability.business_storage.inbound`, `V2\Core\Account.create().$params.configuration.money_manager.capability.business_storage.outbound`, `V2\Core\Account.update().$params.configuration.money_manager.capability.business_storage.inbound`, and `V2\Core\Account.update().$params.configuration.money_manager.capability.business_storage.outbound`
* Add support for `account_takeover_confirmation`, `account_takeover_report`, `credential_change`, `mfa_addition`, and `mfa_removal` on `V2.Signals.AccountActivity`, `V2\Signals\AccountActivity.create().$params`, and `V2\Signals\AccountEvaluation.create().$params.account_activity_detail.datum`
* Add support for new values `account_takeover_confirmation`, `account_takeover_mitigation`, `account_takeover_report`, `credential_change`, `mfa_addition`, and `mfa_removal` on enum `V2.Signals.AccountActivity.type`
* Add support for `account_takeover` on `V2.Signals.AccountEvaluation.evaluated_signals` and `V2.Signals.AccountSignal`
* Add support for new value `account_takeover` on enum `V2.Signals.AccountEvaluation.pending_signals`
* Add support for new value `account_takeover` on enum `V2.Signals.AccountEvaluation.requested_signals`
* Add support for `customer_risk` on `V2.Signals.AccountSignal`
* Add support for new values `account_takeover` and `customer_risk` on enum `V2.Signals.AccountSignal.type`
* Add support for new values `business_storage.inbound.czk`, `business_storage.inbound.nok`, `business_storage.inbound.pln`, `business_storage.inbound.sek`, `business_storage.outbound.czk`, `business_storage.outbound.nok`, `business_storage.outbound.pln`, and `business_storage.outbound.sek` on enum `EventsV2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEvent.updated_capability`
* Add support for event notification `V2SignalsAccountSignalCustomerRiskReadyEvent` with related object `V2.Signals.AccountSignal`
