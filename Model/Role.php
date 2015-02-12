<?php

namespace SpomkyLabs\RoleHierarchyBundle\Model;

class Role implements RoleInterface
{
    protected $id;
    protected $name;
    protected $parent;

    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getParent()
    {
        return $this->parent;
    }
}
