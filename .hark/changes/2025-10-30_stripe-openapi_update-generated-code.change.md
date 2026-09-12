---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/1949
is_stripe_api_change: true
released_in_version: 18.2.0-alpha.2
---

* Change `DelegatedCheckout\RequestedSession.update().$params.line_item_detail.quantity` to be required
* Add support for `payment_method_preview` on `DelegatedCheckout.RequestedSession`
* Add support for `order_id` on `DelegatedCheckout.RequestedSession.order_details`
* Add support for `lead` on `V2.Core.Account.configuration.card_creator.capabilities.commercial`, `V2.Core.Account.identity.attestations.terms_of_service.card_creator.commercial`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator.commercial`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator.commercial`
* Add support for `global_account_holder` on `V2.Core.Account.identity.attestations.terms_of_service.card_creator.commercial`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator.commercial`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator.commercial`
* Add support for new value `commercial.lead.prepaid_card` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new value `commercial.lead.prepaid_card` on enum `EventsV2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent.updated_capability`
