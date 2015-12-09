<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2015 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace SpomkyLabs\RoleHierarchyBundle\Model;

use Doctrine\Common\Persistence\ManagerRegistry;

class RoleManager implements RoleManagerInterface
{
    protected $class;
    protected $entity_manager;
    protected $entity_repository;

    public function __construct(ManagerRegistry $manager_registry, $class)
    {
        $this->class = $class;
        $this->entity_manager = $manager_registry->getManagerForClass($class);
        $this->entity_repository = $this->entity_manager->getRepository($class);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityManager()
    {
        return $this->entity_manager;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityRepository()
    {
        return $this->entity_repository;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->getEntityRepository()->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        return $this->class;
    }

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
