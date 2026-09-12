---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/1938
is_stripe_api_change: true
released_in_version: 18.1.0-alpha.2
---

* Add support for new resource `PaymentMethodBalance`
* Add support for `check_balance` method on resource `PaymentMethod`
* Add support for `benefits` on `Card`, `Charge.payment_method_details.card`, `ConfirmationToken.payment_method_preview.card`, and `PaymentMethod.card`
* Add support for `benefit` on `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, `PaymentIntent.payment_details`, and `PaymentIntent.update().$params.payment_detail`
* Add support for `setup_details` on `SetupIntent.confirm().$params`, `SetupIntent.create().$params`, `SetupIntent.update().$params`, and `SetupIntent`
* Add support for new value `card_creator` on enum `V2.Core.Account.applied_configurations`
* Add support for `card_creator` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service`
* Add support for new values `commercial.celtic.charge_card`, `commercial.celtic.spend_card`, `commercial.cross_river_bank.charge_card`, `commercial.cross_river_bank.spend_card`, `commercial.stripe.charge_card`, and `commercial.stripe.prepaid_card` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new value `card_creator` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].configuration`
* Add support for thin events `V2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationCardCreatorUpdatedEvent` with related object `V2.Core.Account`
* Remove support for thin events `V1CustomerDiscountCreatedEvent`, `V1CustomerDiscountDeletedEvent`, and `V1CustomerDiscountUpdatedEvent` with related object `Discount`
