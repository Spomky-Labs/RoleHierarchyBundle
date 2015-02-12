<?php

namespace SpomkyLabs\TestRoleHierarchyBundle\Entity;

use SpomkyLabs\RoleHierarchyBundle\Entity\Role as Base;

class Role extends Base
{
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
