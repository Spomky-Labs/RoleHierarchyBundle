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
    
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }
}
