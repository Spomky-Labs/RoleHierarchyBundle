<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2015 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace SpomkyLabs\RoleHierarchyBundle\Security;

use SpomkyLabs\RoleHierarchyBundle\Model\RoleInterface;
use SpomkyLabs\RoleHierarchyBundle\Model\RoleManagerInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchy as BaseRoleHierarchy;

class RoleHierarchy extends BaseRoleHierarchy
{
    protected $rm;

    public function __construct(RoleManagerInterface $rm)
    {
        $this->rm = $rm;

        $map = $this->buildRolesTree();
        parent::__construct($map);
    }

    protected function buildRolesTree()
    {
        $hierarchy = [];
        $roles = $this->rm->getRoles();
        foreach ($roles as $role) {
            if ($role instanceof RoleInterface) {
                if ($role->getParent()) {
                    if (!isset($hierarchy[$role->getParent()->getName()])) {
                        $hierarchy[$role->getParent()->getName()] = [];
                    }
                    $hierarchy[$role->getParent()->getName()][] = $role->getName();
                } else {
                    if (!isset($hierarchy[$role->getName()])) {
                        $hierarchy[$role->getName()] = [];
                    }
                }
            }
        }

        return $hierarchy;
    }
}
