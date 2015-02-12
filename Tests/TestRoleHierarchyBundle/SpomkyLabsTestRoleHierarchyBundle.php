<?php

namespace SpomkyLabs\TestRoleHierarchyBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use SpomkyLabs\TestRoleHierarchyBundle\DependencyInjection\TestExtension;

class SpomkyLabsTestRoleHierarchyBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new TestExtension('spomkylabs_test_role_hierarchy');
    }
}
