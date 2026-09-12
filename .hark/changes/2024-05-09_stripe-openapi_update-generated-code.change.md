---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1692
is_stripe_api_change: true
released_in_version: 14.6.0
---

* Add support for `update` test helper method on resources `Treasury.OutboundPayment` and `Treasury.OutboundTransfer`
* Add support for new values `treasury.outbound_payment.tracking_details_updated` and `treasury.outbound_transfer.tracking_details_updated` on enum `Event.type`
* Add support for `allow_redisplay` on `PaymentMethod`
* Add support for `tracking_details` on `Treasury.OutboundPayment` and `Treasury.OutboundTransfer`
