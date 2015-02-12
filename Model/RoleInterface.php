<?php

namespace SpomkyLabs\RoleHierarchyBundle\Model;

interface RoleInterface
{
    public function getName();
    public function getParent();
}
