---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1588
is_stripe_api_change: true
released_in_version: 12.8.0-beta.1
---

* Add support for new resources `AccountNotice` and `Issuing.CreditUnderwritingRecord`
* Add support for `all`, `retrieve`, and `update` methods on resource `AccountNotice`
* Add support for `all`, `correct`, `create_from_application`, `create_from_proactive_review`, `report_decision`, and `retrieve` methods on resource `CreditUnderwritingRecord`
* Add support for new values `account_notice.created` and `account_notice.updated` on enum `Event.type`
