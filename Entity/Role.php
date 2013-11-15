<?php
namespace Spomky\RoleHierarchyBundle\Entity;

use Spomky\RoleHierarchyBundle\Model\Role as BaseRole;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Entity()
 */
class Role extends BaseRole
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    protected $parent;

    public function getId() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setParent(Role $parent) {
        $this->parent = $parent;
        return $this;
    }
}
