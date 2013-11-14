<?php

namespace Spomky\RoleHierarchyBundle\Model;

interface RoleInterface
{
    public function getName();
    public function getParent();
}
