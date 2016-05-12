<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace SpomkyLabs\RoleHierarchyBundle\Security;

use SpomkyLabs\RoleHierarchyBundle\Model\RoleInterface;
use SpomkyLabs\RoleHierarchyBundle\Model\RoleManagerInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchy as BaseRoleHierarchy;

final class RoleHierarchy extends BaseRoleHierarchy
{
    /**
     * RoleHierarchy constructor.
     *
     * @param \SpomkyLabs\RoleHierarchyBundle\Model\RoleManagerInterface $role_manager
     */
    public function __construct(RoleManagerInterface $role_manager)
    {
        $map = $this->buildRolesTree($role_manager);
        parent::__construct($map);
    }

    /**
     * @param \SpomkyLabs\RoleHierarchyBundle\Model\RoleManagerInterface $role_manager
     *
     * @return array
     */
    protected function buildRolesTree(RoleManagerInterface $role_manager)
    {
        $hierarchy = [];
        $roles = $role_manager->getRoles();
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
