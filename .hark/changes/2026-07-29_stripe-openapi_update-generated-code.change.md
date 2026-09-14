---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2106
is_stripe_api_change: true
released_in_version: 21.1.0
---

* Add support for new resource `FinancialConnections.Authorization`
* Add support for `unreject` method on resource `Account`
* Add support for `all` method on resource `PaymentRecord`
* Add support for new values `mass_transit_parking_tax` and `parking_tax` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`, `Tax.Calculation.tax_breakdown[].tax_rate_details.tax_type`, `Tax.CalculationLineItem.tax_breakdown[].tax_rate_details.tax_type`, `Tax.Transaction.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`, and `TaxRate.tax_type`
* Add support for new value `chaps` on enums `FundingInstructions.bank_transfer.financial_addresses[].supported_networks` and `PaymentIntent.next_action.display_bank_transfer_instructions.financial_addresses[].supported_networks`
* Add support for `smart_disputes_management` on `AccountSession.components.disputes_list.features`, `AccountSession.components.payment_details.features`, `AccountSession.components.payment_disputes.features`, `AccountSession.components.payments.features`, `AccountSession.create().$params.component.disputes_list.feature`, `AccountSession.create().$params.component.payment.feature`, `AccountSession.create().$params.component.payment_detail.feature`, and `AccountSession.create().$params.component.payment_dispute.feature`
* Add support for `administrative_address` and `principal_place_of_business` on `Account.company`, `Account.create().$params.company`, `Account.update().$params.company`, and `Token.create().$params.account.company`
* Add support for `sepa_debit_payments` on `Account.update().$params.setting`
* Remove support for `proof_of_registration` on `Account.create().$params.document`.  This field was limited-use and is being deprecated.
* Add support for `payouts_action` on `Account.reject().$params`
* Add support for new value `data_share_only` on enums `Charge.payment_method_details.card.three_d_secure.result`, `PaymentAttemptRecord.payment_method_details.card.three_d_secure.result`, `PaymentRecord.payment_method_details.card.three_d_secure.result`, and `SetupAttempt.payment_method_details.card.three_d_secure.result`
* Add support for new values `bnp_paribas`, `citibank`, and `mbsb_bank` on enums `Charge.payment_method_details.fpx.bank`, `ConfirmationToken.payment_method_preview.fpx.bank`, `PaymentAttemptRecord.payment_method_details.fpx.bank`, `PaymentMethod.fpx.bank`, and `PaymentRecord.payment_method_details.fpx.bank`
* Remove support for `dynamic_tax_rates` on `Checkout\Session.create().$params.line_item`.  This field was limited-use and is being deprecated.
* Add support for `setup_future_usage` on `Checkout.Session.payment_method_options.payco`, `Checkout.Session.payment_method_options.samsung_pay`, `Checkout\Session.create().$params.payment_method_option.payco`, `Checkout\Session.create().$params.payment_method_option.samsung_pay`, `PaymentIntent.confirm().$params.payment_method_option.payco`, `PaymentIntent.confirm().$params.payment_method_option.samsung_pay`, `PaymentIntent.create().$params.payment_method_option.payco`, `PaymentIntent.create().$params.payment_method_option.samsung_pay`, `PaymentIntent.payment_method_options.payco`, `PaymentIntent.payment_method_options.samsung_pay`, `PaymentIntent.update().$params.payment_method_option.payco`, `PaymentIntent.update().$params.payment_method_option.samsung_pay`, and `PaymentLink.update().$params.payment_intent_datum`
* Add support for new value `ic_nif` on enums `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, `Tax.Transaction.customer_details.tax_ids[].type`, and `TaxId.type`
* Add support for `network` on `Dispute.payment_method_details.card`
* Add support for new values `financial_connections.account.expected_deactivation_date_updated`, `financial_connections.account.supported_payment_method_types_updated`, `financial_connections.account.upcoming_deactivation`, `financial_connections.authorization.expected_deactivation_date_updated`, and `financial_connections.authorization.upcoming_deactivation` on enum `Event.type`
* Add support for `limits` and `manual_entry` on `FinancialConnections.Session` and `FinancialConnections\Session.create().$params`
* Add support for `require_payment_method_support` on `FinancialConnections.Session.filters` and `FinancialConnections\Session.create().$params.filter`
* Add support for `bank_account_token` on `FinancialConnections.Session`
* Add support for `metadata` on `Invoice.create_preview().$params.subscription_detail`
* Add support for new values `alipay` and `mb_way` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
* Add support for new value `stripe_internal_error` on enum `Issuing.Authorization.request_history[].reason`
* Add support for `business_name` on `Issuing.Card.shipping`, `Issuing\Card.create().$params.shipping`, and `Issuing\Card.update().$params.shipping`
* Add support for new value `correos` on enum `Issuing.Card.shipping.carrier`
* Add support for `allowed_payment_method_types` on `PaymentIntent.confirm().$params`, `PaymentIntent.create().$params`, `PaymentIntent.update().$params`, `PaymentIntent`, `SetupIntent.confirm().$params`, `SetupIntent.create().$params`, `SetupIntent.update().$params`, and `SetupIntent`
* Add support for `referrer` on `PaymentIntent.confirm().$params.radar_option` and `PaymentIntent.create().$params.radar_option`
* Add support for `consent_collection` and `shipping_options` on `PaymentLink.update().$params`
* Add support for `custom_fields`, `description`, and `footer` on `Quote.create().$params.invoice_setting`, `Quote.invoice_settings`, `Quote.update().$params.invoice_setting`, `SubscriptionSchedule.create().$params.default_setting.invoice_setting`, `SubscriptionSchedule.create().$params.phase.invoice_setting`, `SubscriptionSchedule.default_settings.invoice_settings`, `SubscriptionSchedule.phases[].invoice_settings`, `SubscriptionSchedule.update().$params.default_setting.invoice_setting`, and `SubscriptionSchedule.update().$params.phase.invoice_setting`
* Add support for `customer_account` and `customer` on `Refund`
* Add support for `payment_method` on `Refund` and `Topup`
* Add support for `trial` on `SubscriptionSchedule.phases[]`
* Add support for `mass_transit_parking_tax` and `parking_tax` on `Tax.Registration.country_options.us` and `Tax\Registration.create().$params.country_option.me`
* Add support for new values `mass_transit_parking_tax` and `parking_tax` on enum `Tax.Registration.country_options.us.type`
* Add support for `initiated_by` and `payment_method_options` on `Topup`
* Add support for `additional_addresses` on `V2.Core.Account.identity.business_details`, `V2\Core\Account.create().$params.identity.business_detail`, `V2\Core\Account.update().$params.identity.business_detail`, and `V2\Core\AccountToken.create().$params.identity.business_detail`
* Add support for snapshot events `FINANCIAL_CONNECTIONS_ACCOUNT_EXPECTED_DEACTIVATION_DATE_UPDATED`, `FINANCIAL_CONNECTIONS_ACCOUNT_SUPPORTED_PAYMENT_METHOD_TYPES_UPDATED`, and `FINANCIAL_CONNECTIONS_ACCOUNT_UPCOMING_DEACTIVATION` with resource `FinancialConnections.Account`
* Add support for snapshot events `FINANCIAL_CONNECTIONS_AUTHORIZATION_EXPECTED_DEACTIVATION_DATE_UPDATED` and `FINANCIAL_CONNECTIONS_AUTHORIZATION_UPCOMING_DEACTIVATION` with resource `FinancialConnections.Authorization`
