<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace SpomkyLabs\TestRoleHierarchyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadRoleData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $role_manager = $this->container->get('role_hierarchy.role_manager');

        foreach ($this->getRoles() as $role) {
            /**
             * @var \SpomkyLabs\TestRoleHierarchyBundle\Entity\Role
             */
            $entity = $role_manager->createRole();
            $parent = null === $role['parent'] ? null : $this->getReference('role-'.$role['parent']);
            $entity->setName($role['name']);
            $entity->setParent($parent);

            $role_manager->saveRole($entity);
            $this->addReference('role-'.$role['name'], $entity);
        }
    }

    protected function getRoles()
    {
        return [
            [
                'name'   => 'ROLE_SUPERADMIN',
                'parent' => null,
            ],
            [
                'name'   => 'ROLE_ADMIN',
                'parent' => 'ROLE_SUPERADMIN',
            ],
            [
                'name'   => 'ROLE_SUPERVISOR',
                'parent' => 'ROLE_ADMIN',
            ],
            [
                'name'   => 'ROLE_MANAGER',
                'parent' => 'ROLE_ADMIN',
            ],
            [
                'name'   => 'ROLE_OPERATOR',
                'parent' => 'ROLE_SUPERVISOR',
            ],
            [
                'name'   => 'ROLE_USER',
                'parent' => 'ROLE_MANAGER',
            ],
        ];
    }
}
