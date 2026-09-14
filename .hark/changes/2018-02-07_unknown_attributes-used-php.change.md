---
title: "Attributes that used to be PHP arrays (such as `legal_entity->additional_owners` on `\\Stripe\\Account` instances) are now instances of `\\Stripe\\StripeObject`, except when they are empty. `\\Stripe\\StripeObject` has array semantics so this should not be an issue unless you are actively checking types."
released_in_version: 6.0.0
---
