---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2103
is_breaking: true
is_stripe_api_change: true
released_in_version: 21.1.0-alpha.2
---

* Add support for new resources `Billing.AlertNotification` and `Crypto.DepositAddress`
* Add support for `all`, `create`, and `retrieve` methods on resource `Crypto.DepositAddress`
* Add support for `all` method on resource `Billing.AlertNotification`
* Add support for new values `partner_disabled_dispute_rate`, `partner_disabled_responsibilities`, `partner_disabled_restricted_business`, and `partner_disabled_suspected_fraud` on enums `Account.future_requirements.errors[].code`, `Account.requirements.errors[].code`, `BankAccount.future_requirements.errors[].code`, `BankAccount.requirements.errors[].code`, `Capability.future_requirements.errors[].code`, `Capability.requirements.errors[].code`, `Person.future_requirements.errors[].code`, and `Person.requirements.errors[].code`
* Add support for new value `data_share_only` on enums `Charge.payment_method_details.card.three_d_secure.result`, `PaymentAttemptRecord.payment_method_details.card.three_d_secure.result`, `PaymentRecord.payment_method_details.card.three_d_secure.result`, and `SetupAttempt.payment_method_details.card.three_d_secure.result`
* Add support for `vipps` on `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for new value `vipps` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for new value `sui` on enum `Crypto.CustomerConsumerWallet.network`
* Add support for new value `sui` on enum `Crypto.OnrampSession.transaction_details.destination_network`
* Add support for new value `sui` on enum `Crypto.OnrampSession.transaction_details.destination_networks`
* Add support for `sui` on `Crypto.OnrampSession.transaction_details.wallet_addresses`
* Add support for `use_stripe_sdk` on `DelegatedCheckout\RequestedSession.confirm().$params`
* Add support for new value `mb_way` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* Add support for `ev_charging` on `PaymentIntent.capture().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.confirm().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.create().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.decrement_authorization().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.increment_authorization().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.update().$params.amount_detail.line_item.payment_method_option.card`, and `PaymentIntentAmountDetailsLineItem.payment_method_options.card`
* ⚠️ Change type of `PaymentIntent.allowed_payment_method_types` from `string` to `enum`
* Add support for new value `vipps` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for `tax_items` on `PaymentIntent.payment_details.car_rental_data[].total.tax`, `PaymentIntent.payment_details.flight_data[].total.tax`, and `PaymentIntent.payment_details.lodging_data[].total.tax`
* ⚠️ Remove support for `taxes` on `PaymentIntent.payment_details.car_rental_data[].total.tax`, `PaymentIntent.payment_details.flight_data[].total.tax`, and `PaymentIntent.payment_details.lodging_data[].total.tax`
* Change `PaymentRecord.create().$params.closed` to be optional
* Change `PaymentRecord.create().$params.funded` to be optional
* Add support for `card` on `Radar\PaymentEvaluation.create().$params.payment_detail.payment_method_detail`
* ⚠️ Remove support for `acss_debit`, `afterpay_clearpay`, `alipay`, `alma`, `amazon_pay`, `au_becs_debit`, `bacs_debit`, `bancontact`, `billie`, `bizum`, `blik`, `boleto`, `card_present`, `cashapp`, `crypto`, `customer_balance`, `eps`, `fpx`, `gift_card`, `giropay`, `gopay`, `grabpay`, `id_bank_transfer`, `ideal`, `interac_present`, `kakao_pay`, `konbini`, `kr_card`, `mb_way`, `mobilepay`, `multibanco`, `naver_pay`, `nz_bank_account`, `oxxo`, `p24`, `pay_by_bank`, `payco`, `paynow`, `paypal`, `paypay`, `payto`, `pix`, `promptpay`, `qris`, `rechnung`, `revolut_pay`, `samsung_pay`, `satispay`, `scalapay`, `sepa_debit`, `shopeepay`, `sofort`, `stripe_balance`, `sunbit`, `swish`, `tamara`, `twint`, `upi`, `us_bank_account`, `wechat_pay`, and `zip` on `SharedPayment.GrantedToken.payment_method_details`
* ⚠️ Add support for new value `shop_pay` on enum `SharedPayment.GrantedToken.payment_method_details.type`
* ⚠️ Remove support for values `acss_debit`, `afterpay_clearpay`, `alipay`, `alma`, `amazon_pay`, `au_becs_debit`, `bacs_debit`, `bancontact`, `billie`, `bizum`, `blik`, `boleto`, `card_present`, `cashapp`, `crypto`, `custom`, `customer_balance`, `eps`, `fpx`, `gift_card`, `giropay`, `gopay`, `grabpay`, `id_bank_transfer`, `ideal`, `interac_present`, `kakao_pay`, `konbini`, `kr_card`, `mb_way`, `mobilepay`, `multibanco`, `naver_pay`, `nz_bank_account`, `oxxo`, `p24`, `pay_by_bank`, `payco`, `paynow`, `paypal`, `paypay`, `payto`, `pix`, `promptpay`, `qris`, `rechnung`, `revolut_pay`, `samsung_pay`, `satispay`, `scalapay`, `sepa_debit`, `shopeepay`, `sofort`, `stripe_balance`, `sunbit`, `swish`, `tamara`, `twint`, `upi`, `us_bank_account`, `wechat_pay`, and `zip` from enum `SharedPayment.GrantedToken.payment_method_details.type`
* Add support for `spend_card` on `V2.Core.Account.configuration.card_creator.capabilities.commercial.stripe`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.stripe`, and `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.stripe`
* Add support for new value `commercial.stripe.spend_card` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new value `payment_delinquency_exposure` on enum `V2.Signals.AccountSignal.type`
* Add support for new value `commercial.stripe.spend_card` on enum `EventsV2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent.updated_capability`
