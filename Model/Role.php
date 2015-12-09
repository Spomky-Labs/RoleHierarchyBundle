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
