<?php

namespace SpomkyLabs\TestRoleHierarchyBundle\Entity;

use SpomkyLabs\RoleHierarchyBundle\Model\RoleManager as Base;
use SpomkyLabs\RoleHierarchyBundle\Model\RoleInterface;

class RoleManager extends Base
{
    public function createRole()
    {
        $class = $this->getClass();

        return new $class();
    }

    public function saveRole(RoleInterface $role)
    {
        $this->getEntityManager()->persist($role);
        $this->getEntityManager()->flush();

        return $this;
    }
}
