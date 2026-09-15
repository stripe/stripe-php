---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2143
semver_level: major
is_stripe_api_change: true
---

* ⚠️ Remove support for `nesting_demo` on `AccountSession.components`
* Add support for `verification_method` on `Checkout.Session.payment_method_options.bacs_debit` and `Checkout\Session.create().$params.payment_method_option.bacs_debit`
* Add support for new value `ripusd` on enum `Crypto.OnrampSession.transaction_details.destination_currencies`
* Add support for new value `ripusd` on enum `Crypto.OnrampSession.transaction_details.destination_currency`
* Add support for new values `cad`, `cop`, and `php` on enum `Crypto.OnrampSession.transaction_details.source_currency`
* Add support for `appeal` on `Dispute.evidence`
* Add support for `bacs_debit` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
* Add support for `pricing_token` on `Invoice.create_preview().$params`
* Add support for new values `2.3.0` and `2.3.1` on enums `PaymentAttemptRecord.payment_method_details.card.three_d_secure.version` and `PaymentRecord.payment_method_details.card.three_d_secure.version`
* Add support for `funding_source_group` on `PaymentAttemptRecord.payment_method_details.link` and `PaymentRecord.payment_method_details.link`
* Add support for `payout_method_options` on `Payout.create().$params`
* ⚠️ Change `ProductCatalog.TrialOffer.end_behavior.transition` to be optional
* ⚠️ Remove support for `igic` on `Tax.Registration.country_options.at`, `Tax.Registration.country_options.be`, `Tax.Registration.country_options.bg`, `Tax.Registration.country_options.cy`, `Tax.Registration.country_options.cz`, `Tax.Registration.country_options.de`, `Tax.Registration.country_options.dk`, `Tax.Registration.country_options.ee`, `Tax.Registration.country_options.fi`, `Tax.Registration.country_options.fr`, `Tax.Registration.country_options.gr`, `Tax.Registration.country_options.hr`, `Tax.Registration.country_options.hu`, `Tax.Registration.country_options.ie`, `Tax.Registration.country_options.it`, `Tax.Registration.country_options.lt`, `Tax.Registration.country_options.lu`, `Tax.Registration.country_options.lv`, `Tax.Registration.country_options.mt`, `Tax.Registration.country_options.nl`, `Tax.Registration.country_options.pl`, `Tax.Registration.country_options.pt`, `Tax.Registration.country_options.ro`, `Tax.Registration.country_options.se`, `Tax.Registration.country_options.si`, and `Tax.Registration.country_options.sk`
* Add support for new value `igic` on enum `Tax.Registration.country_options.es.type`
