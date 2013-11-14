<?php

namespace Spomky\RoleHierarchyBundle\Event;

use Spomky\RoleHierarchyBundle\Model\RoleInterface;
use Symfony\Component\EventDispatcher\Event;

class RoleEvent extends Event
{
    const PRE_ROLE_SAVE  = 'spomky_role_hierarchy.pre_role_save';
    const POST_ROLE_SAVE = 'spomky_role_hierarchy.post_role_save';

    /**
     * @var \Spomky\RoleHierarchyBundle\Model\RoleInterface
     */
    private $role;

    /**
     * @param RoleInterface $role
     */
    public function __construct(RoleInterface $role)
    {
        $this->role = $role;
    }

    /**
     * @return RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }
}
