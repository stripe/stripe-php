---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2204
semver_level: minor
is_stripe_api_change: true
---

* Add support for new resource `V2.Core.ClaimableSandbox`
* Add support for `create`, `renew_onboarding_link`, and `retrieve` methods on resource `V2.Core.ClaimableSandbox`
* Add support for `funding_sources` on `Charge.payment_method_details.card.wallet.link` and `Charge.payment_method_details.link`
* Add support for new value `tron` on enums `Charge.payment_method_details.crypto.network`, `PaymentAttemptRecord.payment_method_details.crypto.network`, and `PaymentRecord.payment_method_details.crypto.network`
* Add support for `fingerprint` on `Charge.payment_method_details.paypay`, `PaymentAttemptRecord.payment_method_details.paypay`, and `PaymentRecord.payment_method_details.paypay`
* Add support for `address_collection_precision` on `Checkout.Session.automatic_tax` and `Checkout\Session.create().$params.automatic_tax`
* Change `Dispute.evidence.appeal` to be required
* Change `Issuing.Card.shipping.delivered_at` to be required
* Change `Issuing.Card.shipping.shipped_at` to be required
* Change `PaymentAttemptRecord.payment_method_details.card.stored_credential_usage` and `PaymentRecord.payment_method_details.card.stored_credential_usage` to be required
* Add support for `car_rental_data` and `lodging_data` on `PaymentIntent.capture().$params.payment_detail`, `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, `PaymentIntent.payment_details`, and `PaymentIntent.update().$params.payment_detail`
* Change type of `PaymentLink.create().$params.payment_intent_datum.capture_method` from `enum('automatic'|'automatic_async'|'manual')` to `emptyable(enum('automatic'|'automatic_async'|'manual'))`
* Add support for `capture_method` on `PaymentLink.update().$params.payment_intent_datum`
* Add support for `loss_message` on `Product.create().$params.marketing_feature`, `Product.marketing_features[]`, and `Product.update().$params.marketing_feature`
* Add support for `application` on `Refund`
* Add support for `bizum` and `upi` on `Refund.destination_details`
* Add support for `tax_invoice_month` on `Reporting.ReportRun.parameters` and `Reporting\ReportRun.create().$params.parameter`
* Add support for `igic` on `Tax.Registration.country_options.es` and `Tax\Registration.create().$params.country_option.e`
* Add support for new value `igic` on enum `Tax.Registration.country_options.es.type`
* Add support for new values `stripe_s700_devkit`, `stripe_s710_devkit`, `stripe_t600_devkit`, `verifone_ux700_devkit`, and `verifone_v660p_devkit` on enum `Terminal.Reader.device_type`
* Add support for `network_details` on `Treasury.InboundTransfer.failure_details`, `Treasury.OutboundPayment.returned_details`, `Treasury.OutboundTransfer.returned_details`, and `Treasury\InboundTransfer.fail().$params.failure_detail`
* Add support for `failure_details` on `Treasury\InboundTransfer.return_inbound_transfer().$params`
* Add support for `account_dashboard` on `V2.Core.AccountLink.use_case` and `V2\Core\AccountLink.create().$params.use_case`
* Add support for new value `account_dashboard` on enum `V2.Core.AccountLink.use_case.type`
* Add support for `paypay_payments` on `V2.Core.Account.configuration.merchant.capabilities`, `V2.Core.Account.configuration.merchant`, `V2\Core\Account.create().$params.configuration.merchant.capability`, `V2\Core\Account.create().$params.configuration.merchant`, `V2\Core\Account.update().$params.configuration.merchant.capability`, and `V2\Core\Account.update().$params.configuration.merchant`
* Add support for `billie_payments`, `mb_way_payments`, `nz_bank_account_becs_debit_payments`, and `pix_payments` on `V2.Core.Account.configuration.merchant.capabilities`, `V2\Core\Account.create().$params.configuration.merchant.capability`, and `V2\Core\Account.update().$params.configuration.merchant.capability`
* Add support for `additional_material` on `V2.Core.Account.configuration.merchant.konbini_payments`, `V2\Core\Account.create().$params.configuration.merchant.konbini_payment`, and `V2\Core\Account.update().$params.configuration.merchant.konbini_payment`
* Add support for new values `billie_payments`, `mb_way_payments`, `nz_bank_account_becs_debit_payments`, `paypay_payments`, and `pix_payments` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new values `billie_payments`, `mb_way_payments`, `nz_bank_account_becs_debit_payments`, `paypay_payments`, and `pix_payments` on enum `EventsV2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent.updated_capability`
* Add support for event notifications `V2CoreClaimableSandboxClaimedEvent`, `V2CoreClaimableSandboxCreatedEvent`, `V2CoreClaimableSandboxExpiredEvent`, `V2CoreClaimableSandboxExpiringEvent`, and `V2CoreClaimableSandboxUpdatedEvent` with related object `V2.Core.ClaimableSandbox`
* Add support for error code `inactive_api_operation_confirmation_required` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, `StripeError`, and `Terminal.Reader.action.api_error`
