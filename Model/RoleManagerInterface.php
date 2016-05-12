<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace SpomkyLabs\RoleHierarchyBundle\Model;

interface RoleManagerInterface
{
    /**
     * @return array
     */
    public function getRoles();

    /**
     * @return string
     */
    public function getClass();

    /**
     * @return \Doctrine\Common\Persistence\ObjectManager
     */
    public function getEntityManager();

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getEntityRepository();

    /**
     * @return \SpomkyLabs\RoleHierarchyBundle\Model\RoleInterface
     */
    public function createRole();

    /**
     * @param \SpomkyLabs\RoleHierarchyBundle\Model\RoleInterface $role
     */
    public function saveRole(RoleInterface $role);
}
