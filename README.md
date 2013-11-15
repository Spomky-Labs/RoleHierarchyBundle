Role Hierarchy
==============

[![Build Status](https://secure.travis-ci.org/Spomky/RoleHierarchyBundle.png)](http://travis-ci.org/Spomky/RoleHierarchyBundle)


# Prerequisites #

This version of the bundle requires Symfony 2.1.
It only supports Doctrine ORM.

# Installation #

Installation is a quick 4 steps process:

    Download SpomkyRoleHierarchyBundle
    Enable the Bundle
    Create your model class
    Configure the SpomkyRoleHierarchyBundle

##Step 1: Install SpomkyRoleHierarchyBundle##

The preferred way to install this bundle is to rely on Composer. Just check on Packagist the version you want to install (in the following example, we used "dev-master") and add it to your composer.json:

	{
	    "require": {
	        // ...
	        "spomky/role-hierarchy-bundle": "dev-master"
	    }
	}

##Step 2: Enable the bundle##

Finally, enable the bundle in the kernel:

	<?php
	// app/AppKernel.php
	
	public function registerBundles()
	{
	    $bundles = array(
	        // ...
	        new Spomky\RoleHierarchyBundle\SpomkyRoleHierarchyBundle(),
	    );
	}

##Step 3: Create model classe##

This bundle needs to persist roless to a database:

Your first job, then, is to create this classe for your application.
This classe can look and act however you want: add any properties or methods you find useful.

There is just a few requirements:

* They must be sure that role names are unique
* They should follow naming conventions

In the following sections, you'll see an example of how your classe should look.

Your classe can live inside any bundle in your application.
For example, if you work at "Acme" company, then you might create a bundle called AcmeRoleBundle and place your classes in it.

###Doctrine ORM###

If you are persisting your data via the Doctrine ORM, then your classe should live in the Entity namespace of your bundle and look like this to start:

	<?php
	// src/Acme/RoleBundle/Entity/Role.php
	
	namespace Acme\RoleBundle\Entity;
	
	use Spomky\RoleHierarchyBundle\Model\Role as BaseRole;
	use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Role
	 *
	 * @ORM\Table(name="roles")
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

###Propel###

	Not supported yet

###Doctrine ODM###

	Not supported yet

##Step 4: Configure your application##

	# app/config/config.yml
	spomky_role_hierarchy:
	    db_driver: orm       # Driver available: orm
	    role_class:          Acme\RoleBundle\Entity\Role

If you have your own roles manager, you can use it. It just needs to implement Spomky\RoleHierarchyBundle\Model\RoleManagerInterface.

	# app/config/config.yml
	spomky_role_hierarchy:
	    ...
	    role_manager: my.custom.role.manager
