---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2005
is_stripe_api_change: true
released_in_version: 19.4.0-alpha.2
---

* Add support for new resource `V2.Core.ConnectionSession`
* Add support for `create` and `retrieve` methods on resource `V2.Core.ConnectionSession`
* Add support for `all` method on resources `V2.Payments.SettlementAllocationIntentSplit` and `V2.Payments.SettlementAllocationIntent`
* Add support for `agentic_commerce_settings` on `AccountSession.create().$params.component`
* Add support for `terminal_hardware_orders` and `terminal_hardware_shop` on `AccountSession.components` and `AccountSession.create().$params.component`
* Add support for `network_cost_passthrough_report` on `AccountSession.components`
* Add support for new values `ae_bank_account`, `ag_bank_account`, `bh_bank_account`, `gm_bank_account`, `hk_bank_account`, `kh_bank_account`, `lc_bank_account`, `mc_bank_account`, `mg_bank_account`, `my_bank_account`, `qa_bank_account`, `rw_bank_account`, `th_bank_account`, `tt_bank_account`, and `vn_bank_account` on enums `V2.Account.configuration.recipient_data.default_outbound_destination.type` and `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
* Add support for `cadence_data` on `V2.Billing.Intent` and `V2\Billing\Intent.create().$params`
* Add support for `cancellation_details` on `V2.Billing.IntentAction.deactivate`, `V2.Billing.PricingPlanSubscription`, and `V2\Billing\Intent.create().$params.action.deactivate`
* Add support for `contact_phone` on `V2.Core.Account`, `V2\Core\Account.create().$params`, `V2\Core\Account.update().$params`, and `V2\Core\AccountToken.create().$params`
* Add support for `registration_date` on `V2.Core.Account.identity.business_details`, `V2\Core\Account.create().$params.identity.business_detail`, `V2\Core\Account.update().$params.identity.business_detail`, and `V2\Core\AccountToken.create().$params.identity.business_detail`
* Add support for new value `gb_vat` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
* Add support for `reference` on `V2.MoneyManagement.Adjustment`
* Add support for `accrued_fees` on `V2.MoneyManagement.FinancialAccount`
* Add support for `starting_balance` on `V2.MoneyManagement.FinancialAccount.payments`
* Add support for new value `accrued_fees` on enum `V2.MoneyManagement.FinancialAccount.type`
* Add support for `account_holder_address` and `account_holder_name` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
* Add support for `fingerprint` on `V2.MoneyManagement.PayoutMethod.card`
* Add support for `card_spend` on `V2.MoneyManagement.ReceivedCredit` and `V2.MoneyManagement.ReceivedDebit`
* Add support for new value `card_spend` on enum `V2.MoneyManagement.ReceivedCredit.type`
* Add support for new value `card_spend` on enum `V2.MoneyManagement.ReceivedDebit.type`
* Add support for new values `advance`, `anticipation_repayment`, `balance_transfer`, `charge_failure`, `charge`, `climate_order_purchase`, `climate_order_refund`, `connect_collection_transfer`, `connect_reserved_funds`, `contribution`, `dispute_reversal`, `financing_paydown_reversal`, `financing_paydown`, `inbound_transfer_reversal`, `issuing_dispute_fraud_liability_debit`, `issuing_dispute_provisional_credit_reversal`, `issuing_dispute_provisional_credit`, `issuing_dispute`, `minimum_balance_hold`, `network_cost`, `obligation`, `outbound_payment_reversal`, `outbound_transfer_reversal`, `partial_capture_reversal`, `payment_network_reserved_funds`, `platform_earning_refund`, `platform_earning`, `platform_fee`, `received_credit_reversal`, `received_debit_reversal`, `refund_failure`, `risk_reserved_funds`, `stripe_balance_payment_debit_reversal`, `stripe_balance_payment_debit`, `stripe_fee_tax`, `transfer_reversal`, and `unreconciled_customer_funds` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
* Add support for `application_fee_refund`, `application_fee`, `charge`, `dispute`, `payout`, `refund`, `reserve_hold`, `reserve_release`, `topup`, `transfer_reversal`, and `transfer` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
* Add support for new values `application_fee_refund`, `application_fee`, `charge`, `dispute`, `payout`, `refund`, `reserve_hold`, `reserve_release`, `topup`, `transfer_reversal`, and `transfer` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
* Change `V2.Payments.SettlementAllocationIntentSplit.flow` to be optional
* Change `V2\Billing\RateCardRate.create().$params.metered_item` to be required
