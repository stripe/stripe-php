---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2065
is_stripe_api_change: true
released_in_version: 20.2.0-alpha.4
---

* Add support for new resource `PaymentLocation`
* Add support for `create`, `delete`, `retrieve`, and `update` methods on resource `PaymentLocation`
* Add support for `protections` on `Account.create().$params.capability.card_payment`, `Account.update().$params.capability.card_payment`, and `Capability`
* Add support for `gift_card` on `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentMethod.create().$params`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, `SetupIntent.update().$params.payment_method_datum`, and `SharedPayment.GrantedToken.payment_method_details`
* Add support for new value `gift_card` on enums `ConfirmationToken.payment_method_preview.type`, `PaymentMethod.type`, and `SharedPayment.GrantedToken.payment_method_details.type`
* Add support for `metadata` on `DelegatedCheckout\RequestedSession.confirm().$params`
* Add support for `credited_items` on `InvoiceItem.proration_details`
* Add support for `network_lifecycle` on `Issuing.Dispute`
* Add support for new value `gift_card` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for `status_details` on `Subscription`
