<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Identity;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class BlocklistEntryService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of BlocklistEntry objects associated with your account.
     *
     * The blocklist entries are returned sorted by creation date, with the most
     * recently created entries appearing first.
     *
     * Related guide: <a href="/docs/identity/review-tools#block-list">Identity
     * Verification Blocklist</a>
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string, type?: string, verification_report?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Identity\BlocklistEntry>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/identity/blocklist_entries', $params, $opts);
    }

    /**
     * Creates a BlocklistEntry object from a verification report.
     *
     * A blocklist entry prevents future identity verifications that match the same
     * identity information. You can create blocklist entries from verification reports
     * that contain document extracted data or a selfie.
     *
     * Related guide: <a
     * href="/docs/identity/review-tools#add-a-blocklist-entry">Identity Verification
     * Blocklist</a>
     *
     * @param null|array{check_existing_verifications?: bool, entry_type: string, expand?: string[], verification_report: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Identity\BlocklistEntry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/identity/blocklist_entries', $params, $opts);
    }

    /**
     * Disables a BlocklistEntry object.
     *
     * After a BlocklistEntry is disabled, it will no longer block future verifications
     * that match the same information. This action is irreversible. To re-enable it, a
     * new BlocklistEntry must be created using the same verification report.
     *
     * Related guide: <a
     * href="/docs/identity/review-tools#disable-a-blocklist-entry">Identity
     * Verification Blocklist</a>
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Identity\BlocklistEntry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function disable($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/identity/blocklist_entries/%s/disable', $id), $params, $opts);
    }

    /**
     * Retrieves a BlocklistEntry object by its identifier.
     *
     * Related guide: <a href="/docs/identity/review-tools#block-list">Identity
     * Verification Blocklist</a>
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Identity\BlocklistEntry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/identity/blocklist_entries/%s', $id), $params, $opts);
    }
}
