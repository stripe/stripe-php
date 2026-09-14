---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/2006
is_stripe_api_change: true
released_in_version: 19.5.0-beta.1
---

* Add support for `smart_disputes` on `Account.create().$params.setting`, `Account.settings`, `Account.update().$params.setting`, `V2.Core.Account.configuration.merchant`, `V2\Core\Account.create().$params.configuration.merchant`, and `V2\Core\Account.update().$params.configuration.merchant`
* Add support for `email_customers_on_successful_payment` on `Account.create().$params.setting.payment`, `Account.settings.payments`, and `Account.update().$params.setting.payment`
* Add support for `managed_payments` on `Checkout.Session`, `Checkout\Session.create().$params`, `PaymentIntent`, `SetupIntent`, and `Subscription`
* Add support for new value `lk_vat` on enums `Checkout.Session.collected_information.tax_ids[].type`, `Order.tax_details.tax_ids[].type`, and `QuotePreviewInvoice.customer_tax_ids[].type`
* Add support for new value `pay_by_bank` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
* Add support for new values `bt_bank_account`, `cr_bank_account`, `do_bank_account`, `gt_bank_account`, `md_bank_account`, `mk_bank_account`, `mo_bank_account`, `mz_bank_account`, `pe_bank_account`, `pk_bank_account`, `tw_bank_account`, and `uz_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
* Add support for `purpose` on `V2.MoneyManagement.OutboundPayment` and `V2\MoneyManagement\OutboundPayment.create().$params`
* Add support for `branch_number` and `swift_code` on `V2.MoneyManagement.PayoutMethod.bank_account`
* Change `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow` to be optional
* Add support for error codes `storer_capability_missing` and `storer_capability_not_active` on `QuotePreviewInvoice.last_finalization_error`
