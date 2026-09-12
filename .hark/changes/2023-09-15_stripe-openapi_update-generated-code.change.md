---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1575
is_stripe_api_change: true
released_in_version: 12.4.0-beta.1
---

* Add support for new resource `ConfirmationToken`
* Add support for `retrieve` method on resource `ConfirmationToken`
* Add support for `create` method on resource `Issuing.CardDesign`
* Add support for `reject_testmode` test helper method on resource `Issuing.CardDesign`
* Add support for new value `issuing_card_design.rejected` on enum `Event.type`
* Add support for `features` on `Issuing.CardBundle`
* Add support for `card_logo`, `carrier_text`, `preferences`, and `rejection_reasons` on `Issuing.CardDesign`
* Remove support for `preference` on `Issuing.CardDesign`
