<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CertificateService extends \Stripe\Service\AbstractService
{
    /**
     * Lists a tax exemption’s certificates, ordered from newest to oldest. The list
     * excludes deleted certificates.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, tax_exemption: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Tax\Certificate>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/tax/certificates', $params, $opts);
    }

    /**
     * Creates a Tax Certificate associated with a tax exemption. Before creating the
     * certificate, <a href="/api/files/create">upload a file</a> with purpose
     * <code>tax_certificate</code>.
     *
     * @param null|array{expand?: string[], file: string, tax_exemption: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Certificate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax/certificates', $params, $opts);
    }

    /**
     * Deletes a Tax Certificate without deleting its uploaded file. You can reuse the
     * file to create another certificate, and you can still retrieve the deleted
     * certificate.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Certificate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/tax/certificates/%s', $id), $params, $opts);
    }

    /**
     * Retrieves a Tax Certificate. Deleted certificates remain retrievable with all
     * their fields and <code>deleted</code> set to <code>true</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Certificate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax/certificates/%s', $id), $params, $opts);
    }
}
