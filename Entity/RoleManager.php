<?php

namespace Spomky\RoleHierarchyBundle\Entity;

use Spomky\RoleHierarchyBundle\Model\RoleManager as BaseRoleManager;

class RoleManager extends BaseRoleManager
{
    /**
     * {@inheritdoc}
     */
    public function findRoleBy(array $criteria) {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function updateRole(RoleInterface $role) {
        $this->em->persist($role);
        $this->em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function deleteRole(RoleInterface $role) {
        $this->em->remove($role);
        $this->em->flush();
    }
}
