<?php

namespace Stripe\Services;

abstract class AbstractNestedService extends AbstractService
{
    protected function allNestedObjects($parentId, $params, $opts)
    {
        return $this->request('get', $this->baseNestedPath($parentId), $params, $opts);
    }

    protected function createNestedObject($parentId, $params, $opts)
    {
        return $this->request('post', $this->baseNestedPath($parentId), $params, $opts);
    }

    protected function deleteNestedObject($parentId, $id, $params, $opts)
    {
        return $this->request('delete', $this->nestedInstancePath($parentId, $id), $params, $opts);
    }

    protected function retrieveNestedObject($parentId, $id, $params, $opts)
    {
        return $this->request('get', $this->nestedInstancePath($parentId, $id), $params, $opts);
    }

    protected function updateNestedObject($parentId, $id, $params, $opts)
    {
        return $this->request('post', $this->nestedInstancePath($parentId, $id), $params, $opts);
    }

    protected function baseNestedPath($parentId)
    {
        return str_replace('{PARENT}', urlencode($parentId), $this->basePath());
    }

    protected function nestedInstancePath($parentId, $id)
    {
        return $this->baseNestedPath($parentId) . '/' . urlencode($id);
    }
}
