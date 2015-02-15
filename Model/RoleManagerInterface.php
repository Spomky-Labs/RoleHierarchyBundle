<?php

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
     * @return self
     */
    public function saveRole(RoleInterface $role);
}
