<?php

namespace SpomkyLabs\RoleHierarchyBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use SpomkyLabs\RoleHierarchyBundle\DependencyInjection\SpomkyLabsRoleHierarchyExtension;

class SpomkyLabsRoleHierarchyBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new SpomkyLabsRoleHierarchyExtension('spomkylabs_role_hierarchy');
    }
}
