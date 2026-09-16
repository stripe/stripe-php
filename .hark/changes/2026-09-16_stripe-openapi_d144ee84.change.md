---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2143
semver_level: major
is_stripe_api_change: true
released_in_version: 21.4.0-alpha.4
---

* Add support for new resources `Apps.Install` and `V2.Core.Vault.NetworkToken`
* Add support for `create_from_credential`, `create`, `generate_cryptogram`, and `retrieve` methods on resource `V2.Core.Vault.NetworkToken`
* ⚠️ Remove support for `nesting_demo` on `AccountSession.components`
* Add support for `shared_payment_granted_token` on `Charge.payment_method_details`
* Change type of `Charge.payment_method_details.card.mandate` from `string` to `expandable($Mandate)`
* Add support for `current_trial` on `Checkout.Session.items[].subscription.items[]` and `Checkout\Session.create().$params.item.subscription.item`
* Add support for `verification_method` on `Checkout.Session.payment_method_options.bacs_debit` and `Checkout\Session.create().$params.payment_method_option.bacs_debit`
* Add support for new values `address_validation_failed` and `person_verification_failed` on enum `Crypto.Customer.kyc_tiers[].verification_errors`
* Add support for new values `address_validation_failed` and `person_verification_failed` on enum `Crypto.Customer.verifications[].errors`
* Add support for new value `ripusd` on enum `Crypto.OnrampSession.transaction_details.destination_currencies`
* Add support for new value `ripusd` on enum `Crypto.OnrampSession.transaction_details.destination_currency`
* Add support for new values `cad`, `cop`, and `php` on enum `Crypto.OnrampSession.transaction_details.source_currency`
* Add support for `appeal` on `Dispute.evidence`
* Add support for `bacs_debit` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
* Add support for `pricing_token` on `Invoice.create_preview().$params`
* Add support for `expires_at` on `Mandate.payment_method_details.blik`, `PaymentIntent.next_action.swish_handle_redirect_or_display_qr_code.qr_code`, and `Subscription.payment_settings.payment_method_options.blik.mandate_options`
* ⚠️ Remove support for `expires_after` on `Mandate.payment_method_details.blik` and `Subscription.payment_settings.payment_method_options.blik.mandate_options`
* Add support for `momo` on `PaymentAttemptRecord.payment_method_details` and `PaymentRecord.payment_method_details`
* Add support for new values `2.3.0` and `2.3.1` on enums `PaymentAttemptRecord.payment_method_details.card.three_d_secure.version` and `PaymentRecord.payment_method_details.card.three_d_secure.version`
* Add support for `link` on `PaymentAttemptRecord.payment_method_details.card.wallet` and `PaymentRecord.payment_method_details.card.wallet`
* Add support for `funding_source_group` on `PaymentAttemptRecord.payment_method_details.link` and `PaymentRecord.payment_method_details.link`
* Add support for `payout_method_options` on `Payout.create().$params`
* ⚠️ Change `ProductCatalog.TrialOffer.end_behavior.transition` to be optional
* Add support for `early_fraud_warning` and `fraudulent_dispute` on `Radar.PaymentEvaluation.signals`
* ⚠️ Remove support for `igic` on `Tax.Registration.country_options.at`, `Tax.Registration.country_options.be`, `Tax.Registration.country_options.bg`, `Tax.Registration.country_options.cy`, `Tax.Registration.country_options.cz`, `Tax.Registration.country_options.de`, `Tax.Registration.country_options.dk`, `Tax.Registration.country_options.ee`, `Tax.Registration.country_options.fi`, `Tax.Registration.country_options.fr`, `Tax.Registration.country_options.gr`, `Tax.Registration.country_options.hr`, `Tax.Registration.country_options.hu`, `Tax.Registration.country_options.ie`, `Tax.Registration.country_options.it`, `Tax.Registration.country_options.lt`, `Tax.Registration.country_options.lu`, `Tax.Registration.country_options.lv`, `Tax.Registration.country_options.mt`, `Tax.Registration.country_options.nl`, `Tax.Registration.country_options.pl`, `Tax.Registration.country_options.pt`, `Tax.Registration.country_options.ro`, `Tax.Registration.country_options.se`, `Tax.Registration.country_options.si`, and `Tax.Registration.country_options.sk`
* Add support for new value `igic` on enum `Tax.Registration.country_options.es.type`
* Add support for `metadata` on `V2.Billing.Contract.one_time_fees.data[]`, `V2\Billing\Contract.create().$params.one_time_fee`, `V2\Billing\Contract.update().$params.one_time_fee_action.add`, and `V2\Billing\Contract.update().$params.one_time_fee_action.update`
* Add support for `bank_account` and `crypto_wallet` on `V2.MoneyManagement.FinancialAddress` and `V2\MoneyManagement\FinancialAddress.create().$params`
* Add support for `type` on `V2.MoneyManagement.FinancialAddress` and `V2.MoneyManagement.ReceivedCredit.crypto_wallet_transfer`
* ⚠️ Remove support for `credentials` and `currency` on `V2.MoneyManagement.FinancialAddress`
* Add support for `amount_received` on `V2.MoneyManagement.ReceivedCredit`
* Add support for `originating_bank_account` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
* ⚠️ Remove support for `origin_type` on `V2.MoneyManagement.ReceivedCredit.bank_transfer` and `V2.MoneyManagement.ReceivedCredit.crypto_wallet_transfer`
* Add support for `latest_payment_attempt_record_details` on `V2.Payments.OffSessionPayment`
* Add support for `account_reviewed` on `V2.Signals.AccountActivity` and `V2\Signals\AccountActivity.create().$params`
* Add support for new value `account_reviewed` on enum `V2.Signals.AccountActivity.type`
* ⚠️ Change `V2.Signals.PaymentRetrySignal.payment_record` to be optional
* Add support for `include` on `V2\Payments\OffSessionPayment.create().$params`
* ⚠️ Remove support for `include` on `V2\MoneyManagement\FinancialAddress.all().$params` and `V2\MoneyManagement\FinancialAddress.retrieve().$params`
* ⚠️ Remove support for `crypto_properties` and `sepa_bank_account` on `V2\MoneyManagement\FinancialAddress.create().$params`
* Add support for error type `MerchantNotGatedException`
