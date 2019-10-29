<?php

namespace Stripe\Service;

class FileService extends AbstractService
{
    public function basePath()
    {
        return '/v1/files';
    }

    /**
     * List all files.
     *
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Collection
     */
    public function all($params = [], $opts = [])
    {
        return $this->allObjects($params, $opts);
    }

    /**
     * Create a file.
     *
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\File
     */
    public function create($params = [], $opts = [])
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        if (!isset($opts->apiBase)) {
            $opts->apiBase = $this->getClient()->getFilesBase();
        }

        // Manually flatten params, otherwise curl's multipart encoder will
        // choke on nested arrays.
        $flatParams = \array_column(\Stripe\Util\Util::flattenParams($params), 1, 0);

        return $this->createObject($flatParams, $opts);
    }

    /**
     * Retrieve a file.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\File
     */
    public function retrieve($id, $params = [], $opts = [])
    {
        return $this->retrieveObject($id, $params, $opts);
    }
}
