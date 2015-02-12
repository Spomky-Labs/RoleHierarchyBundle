<?php

namespace SpomkyLabs\RoleHierarchyBundle\Model;

use Doctrine\Common\Persistence\ManagerRegistry;

class RoleManager implements RoleManagerInterface
{
    protected $class;
    protected $entity_manager;
    protected $entity_repository;

    public function __construct(ManagerRegistry $manager_registry, $class)
    {
        $this->class = $class;
        $this->entity_manager = $manager_registry->getManagerForClass($class);
        $this->entity_repository = $this->entity_manager->getRepository($class);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityManager()
    {
        return $this->entity_manager;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityRepository()
    {
        return $this->entity_repository;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->getEntityRepository()->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        return $this->class;
    }
}
