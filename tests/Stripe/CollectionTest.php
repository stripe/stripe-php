<?php

namespace Stripe;

class CollectionTest extends TestCase
{
    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->fixture = Collection::constructFrom(array(
            'data' => array(array('id' => 1)),
            'has_more' => true,
            'url' => '/things',
        ), new Util\RequestOptions());
    }

    public function testCanList()
    {
        $this->stubRequest(
            'GET',
            '/things',
            array(),
            null,
            false,
            array(
                'data' => array(array('id' => 1)),
                'has_more' => true,
                'url' => '/things',
            )
        );

        $resources = $this->fixture->all();
        $this->assertTrue(is_array($resources->data));
    }

    public function testCanRetrieve()
    {
        $this->stubRequest(
            'GET',
            '/things/1',
            array(),
            null,
            false,
            array(
                'id' => 1,
            )
        );

        $this->fixture->retrieve(1);
    }

    public function testCanCreate()
    {
        $this->stubRequest(
            'POST',
            '/things',
            array(
                'foo' => 'bar',
            ),
            null,
            false,
            array(
                'id' => 2,
            )
        );

        $this->fixture->create(array(
            'foo' => 'bar',
        ));
    }

    public function testProvidesAutoPagingIterator()
    {
        $this->stubRequest(
            'GET',
            '/things',
            array(
                'starting_after' => 1,
            ),
            null,
            false,
            array(
                'data' => array(array('id' => 2), array('id' => 3)),
                'has_more' => false,
            )
        );

        $seen = array();
        foreach ($this->fixture->autoPagingIterator() as $item) {
            array_push($seen, $item['id']);
        }

        $this->assertSame(array(1, 2, 3), $seen);
    }

    public function testSupportsIteratorToArray()
    {
        $this->stubRequest(
            'GET',
            '/things',
            array(
                'starting_after' => 1,
            ),
            null,
            false,
            array(
                'data' => array(array('id' => 2), array('id' => 3)),
                'has_more' => false,
            )
        );

        $seen = array();
        foreach (iterator_to_array($this->fixture->autoPagingIterator()) as $item) {
            array_push($seen, $item['id']);
        }

        $this->assertSame(array(1, 2, 3), $seen);
    }
}
