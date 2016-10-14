<?php

namespace Stripe;

class PermissionsErrorTest extends TestCase
{
    private function permissionsErrorResponse()
    {
        return array(
            'error' => array(),
        );
    }

    /**
     * @expectedException Stripe\Error\Permissions
     */
    public function testPermissions()
    {
        $this->mockRequest('GET', '/v1/accounts/acct_DEF', array(), $this->permissionsErrorResponse(), 403);
        Account::retrieve('acct_DEF');
    }
}
