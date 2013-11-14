<?php

namespace Spomky\RoleHierarchyBundle\Model;

class Role implements RoleInterface
{
    protected $name;
    protected $parent;

    public function getName() {
        return $this->name;
    }

    public function getParent() {
        return $this->parent;
    }
}
