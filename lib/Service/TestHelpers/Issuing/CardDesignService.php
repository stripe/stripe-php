<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Issuing;

class CardDesignService extends \Stripe\Service\AbstractService
{
    /**
     * Updates the <code>status</code> of the specified testmode card design object to
     * <code>active</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CardDesign
     */
    public function activateTestmode($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/card_designs/%s/status/activate', $id), $params, $opts);
    }

    /**
     * Updates the <code>status</code> of the specified testmode card design object to
     * <code>inactive</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CardDesign
     */
    public function deactivateTestmode($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/card_designs/%s/status/deactivate', $id), $params, $opts);
    }

    /**
     * Updates the <code>status</code> of the specified testmode card design object to
     * <code>rejected</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CardDesign
     */
    public function rejectTestmode($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/card_designs/%s/status/reject', $id), $params, $opts);
    }
}
