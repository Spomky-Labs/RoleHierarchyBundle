<?php

namespace SpomkyLabs\RoleHierarchyBundle\Security;

use Symfony\Component\Security\Core\Role\RoleHierarchy as BaseRoleHierarchy;
use SpomkyLabs\RoleHierarchyBundle\Model\RoleManagerInterface;
use SpomkyLabs\RoleHierarchyBundle\Model\RoleInterface;

class RoleHierarchy extends BaseRoleHierarchy
{
    protected $rm;

    public function __construct(RoleManagerInterface $rm)
    {
        $this->rm = $rm;
        parent::__construct($this->buildRolesTree());
    }

    protected function buildRolesTree()
    {
        $hierarchy = array();
        $roles = $this->rm->getRoles();
        foreach ($roles as $role) {
            if ($role instanceof RoleInterface) {
                if ($role->getParent()) {
                    if (!isset($hierarchy[$role->getParent()->getName()])) {
                        $hierarchy[$role->getParent()->getName()] = array();
                    }
                    $hierarchy[$role->getParent()->getName()][] = $role->getName();
                } else {
                    if (!isset($hierarchy[$role->getName()])) {
                        $hierarchy[$role->getName()] = array();
                    }
                }
            }
        }

        return $hierarchy;
    }
}
