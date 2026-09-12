---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2063
is_stripe_api_change: true
released_in_version: 20.2.0-alpha.3
---

* Add support for `debit_card` on `V2.Core.Account.configuration.card_creator.capabilities.consumer.lead`, `V2.Core.Account.identity.attestations.terms_of_service.card_creator.consumer.lead`, `V2\Core\Account.create().$params.configuration.card_creator.capability.consumer.lead`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator.consumer.lead`, `V2\Core\Account.update().$params.configuration.card_creator.capability.consumer.lead`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator.consumer.lead`
* Add support for new value `consumer.lead.debit_card` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new value `consumer.lead.debit_card` on enum `EventsV2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent.updated_capability`
