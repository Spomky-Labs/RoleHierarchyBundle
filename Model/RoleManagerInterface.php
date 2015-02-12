<?php

namespace SpomkyLabs\RoleHierarchyBundle\Model;

interface RoleManagerInterface
{
    public function getRoles();
    public function getClass();
    public function getEntityManager();
    public function getEntityRepository();
}
