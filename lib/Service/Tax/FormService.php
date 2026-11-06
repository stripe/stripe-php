<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FormService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of tax forms which were previously created. The tax forms are
     * returned in sorted order, with the oldest tax forms appearing first.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, payee: array{account?: string, external_reference?: string, type?: string}, starting_after?: string, status?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Tax\Form>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/tax/forms', $params, $opts);
    }

    /**
     * Creates a correction for a filed tax form. Supply either payee details or
     * numerical values for the tax form type. Created correction forms are not filed
     * automatically.
     *
     * @param string $id
     * @param null|array{expand?: string[], payee_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, merchant_category_code?: string, name_line_1?: string, name_line_2?: string, tax_id_number?: string, treasury_tipped_occupation_code?: string}, second_tin_notice?: bool, us_1099_k?: array{card_not_present_transactions?: array{volume_decimal: string}, cash_tips?: array{volume_decimal: string}, federal_income_tax_withheld?: array{volume_decimal: string}, monthly_volumes?: array{volume_decimal: string}[], payment_transactions_count?: array{count: int}, state_income_tax_withheld?: array{volume_decimal: string}}, us_1099_misc?: array{cash_tips?: array{volume_decimal: string}, crop_insurance_proceeds?: array{volume_decimal: string}, direct_sales_for_resale?: bool, excess_golden_parachute_payments?: array{volume_decimal: string}, fatca_filing_required?: bool, federal_income_tax_withheld?: array{volume_decimal: string}, fish_purchased_for_resale?: array{volume_decimal: string}, fishing_boat_proceeds?: array{volume_decimal: string}, gross_proceeds_paid_to_an_attorney?: array{volume_decimal: string}, medical_and_health_care_payments?: array{volume_decimal: string}, nonqualified_deferred_compensation?: array{volume_decimal: string}, other_income?: array{volume_decimal: string}, overtime_compensation?: array{volume_decimal: string}, rents?: array{volume_decimal: string}, royalties?: array{volume_decimal: string}, section_409a_deferrals?: array{volume_decimal: string}, state_income?: array{volume_decimal: string}, state_tax_withheld?: array{volume_decimal: string}, substitute_payments?: array{volume_decimal: string}}, us_1099_nec?: array{cash_tips?: array{volume_decimal: string}, direct_sales_indicator?: bool, federal_income_tax_withheld?: array{volume_decimal: string}, nonemployee_compensation?: array{volume_decimal: string}, overtime_compensation?: array{volume_decimal: string}, state_income?: array{volume_decimal: string}, state_tax_withheld?: array{volume_decimal: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\FormCorrection
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/tax/forms/%s/corrections', $id), $params, $opts);
    }

    /**
     * Download the PDF for a tax form.
     *
     * @param string $id
     * @param callable $readBodyChunkCallable
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return mixed
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function pdf($id, $readBodyChunkCallable, $params = null, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        if (!isset($opts->apiBase)) {
            $opts->apiBase = $this->getClient()->getFilesBase();
        }

        return $this->requestStream('get', $this->buildPath('/v1/tax/forms/%s/pdf', $id), $readBodyChunkCallable, $params, $opts);
    }

    /**
     * Retrieves the details of a tax form that has previously been created. Supply the
     * unique tax form ID that was returned from your previous request, and Stripe will
     * return the corresponding tax form information.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Form
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax/forms/%s', $id), $params, $opts);
    }
}
