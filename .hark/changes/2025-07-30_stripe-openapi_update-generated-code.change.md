---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1885
is_stripe_api_change: true
released_in_version: 17.6.0-beta.1
---

* Add support for new resources `Billing.MeterUsageRow`, `Billing.MeterUsage`, and `Terminal.OnboardingLink`
* Add support for `retrieve` method on resource `Billing.MeterUsage`
* Add support for `create` method on resource `Terminal.OnboardingLink`
* Add support for `smart_disputes` on `Dispute`
* Add support for new value `upi` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* Add support for thin event `V2CoreAccountLinkReturnedEvent`
* Add support for thin event `V2MoneyManagementPayoutMethodUpdatedEvent` with related object `V2.MoneyManagement.PayoutMethod`
* Remove support for thin event `V2CoreAccountLinkCompletedEvent`
* Remove support for thin event `V2OffSessionPaymentRequiresCaptureEvent` with related object `V2.Payments.OffSessionPayment`
