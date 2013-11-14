<?php

namespace Spomky\RoleHierarchyBundle\Model;

use Symfony\Component\Security\Core\Role\RoleHierarchy as BaseRoleHierarchy;
use Spomky\RoleHierarchyBundle\Model\RoleManagerInterface;

class RoleHierarchy extends BaseRoleHierarchy
{
    protected $em;

    public function __construct(array $hierarchy, RoleManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct($this->buildRolesTree());
    }

    protected function buildRolesTree()
    {
        $hierarchy = array();
        $roles = $this->em->createQuery('SELECT r from UserBundle:Role r')->execute();
        foreach ($roles as $role) {
            /** @var $role Role */
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
        return $hierarchy;
    }
}
