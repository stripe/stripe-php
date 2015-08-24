<?php

namespace Stripe\Util;

use IteratorAggregate;
use ArrayIterator;

class Set implements IteratorAggregate
{
    /**
     * @var array
     */
    private $_elts;

    /**
     * @param array $members
     */
    public function __construct($members = array())
    {
        $this->_elts = array();

        foreach ($members as $item) {
            $this->_elts[$item] = true;
        }
    }

    /**
     * @param mixed $elt
     *
     * @return bool
     */
    public function includes($elt)
    {
        return isset($this->_elts[$elt]);
    }

    /**
     * @param mixed $elt
     */
    public function add($elt)
    {
        $this->_elts[$elt] = true;
    }

    /**
     * @param mixed $elt
     */
    public function discard($elt)
    {
        unset($this->_elts[$elt]);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_keys($this->_elts);
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->toArray());
    }
}
