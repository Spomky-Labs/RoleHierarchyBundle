<?php

namespace Spomky\RoleHierarchyBundle\Model;

interface RoleManagerInterface
{
    public function getRoles();
    public function getRepository();
}
