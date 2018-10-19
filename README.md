Role Hierarchy
==============

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Spomky-Labs/RoleHierarchyBundle/badges/quality-score.png?s=0e87558488def68be0b724ff87cd5d2b43cc44e8)](https://scrutinizer-ci.com/g/Spomky-Labs/RoleHierarchyBundle/)
[![Build Status](https://travis-ci.org/Spomky-Labs/RoleHierarchyBundle.png?branch=master)](https://travis-ci.org/Spomky-Labs/RoleHierarchyBundle)
[![HHVM Status](http://hhvm.h4cc.de/badge/spomky-labs/role-hierarchy-bundle.svg)](http://hhvm.h4cc.de/package/spomky-labs/role-hierarchy-bundle)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/dd715881-1645-4a67-8275-44d8acaa56b6/big.png)](https://insight.sensiolabs.com/projects/dd715881-1645-4a67-8275-44d8acaa56b6)

[![Latest Stable Version](https://poser.pugx.org/spomky-labs/role-hierarchy-bundle/v/stable.png)](https://packagist.org/packages/spomky-labs/role-hierarchy-bundle)
[![Total Downloads](https://poser.pugx.org/spomky-labs/role-hierarchy-bundle/downloads.png)](https://packagist.org/packages/spomky-labs/role-hierarchy-bundle)
[![Latest Unstable Version](https://poser.pugx.org/spomky-labs/role-hierarchy-bundle/v/unstable.png)](https://packagist.org/packages/spomky-labs/role-hierarchy-bundle)
[![License](https://poser.pugx.org/spomky-labs/role-hierarchy-bundle/license.png)](https://packagist.org/packages/spomky-labs/role-hierarchy-bundle) [![GuardRails badge](https://badges.production.guardrails.io/Spomky-Labs/RoleHierarchyBundle.svg)](https://www.guardrails.io)

# Prerequisites #

This version of the bundle requires:

* Symfony 2.8 or 3.0+
* PHP 5.6+

It has been successfully tested using `PHP 5.6` to `PHP 7.0` and `HHVM` under Symfony `2.8` to `3.0`.

# Installation #

Installation is a quick 4 steps process:

* Install the bundle
* Enable the bundle
* Create your model class
* Configure the bundle

##Step 1: Install the bundle##

The preferred way to install this bundle is to rely on Composer:

```sh
composer require spomky-labs/role-hierarchy-bundle
```

##Step 2: Enable the bundle##

Finally, enable the bundle in the kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new SpomkyLabs\RoleHierarchyBundle\SpomkyLabsRoleHierarchyBundle(),
    );
}
```

##Step 3: Create model class##

This bundle needs to persist roles to a database:

Your first job, then, is to create a role class for your application.
This class can look and act however you want: add any properties or methods you find useful.

There is just a few requirements:

* They must be sure that role names are unique
* They should follow naming conventions

In the following sections, you'll see an example of how your class should look.

Your class can live inside any bundle in your application.
For example, if you work at "Acme" company, then you might create a bundle called AcmeRoleBundle and place your classs in it.

This bundle is able to support Doctrine ORM, ODM, CouchDB or MongoDB. Please note that only ORM has been tested.

###Doctrine ORM###

If you are persisting your data via the Doctrine ORM, then your class should live in the Entity namespace of your bundle and look like this to start:

```php
<?php
// src/Acme/RoleBundle/Entity/Role.php

namespace Acme\RoleBundle\Entity;

use SpomkyLabs\RoleHierarchyBundle\Entity\Role as Base;
use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity()
 */
class Role extends Base
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
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    protected $parent;

    public function getId() {
        return $this->id;
    }
}
```

###Doctrine ODM###

To be written

###Couch DB###

To be written

###Mongo DB###

To be written

##Step 4: Configure your application##

```yml
# app/config/config.yml
spomkylabs_role_hierarchy:
    role_class: "Acme\RoleBundle\Entity\Role"
```

If you have your own roles manager, you can use it. It just needs to implement `SpomkyLabs\RoleHierarchyBundle\Model\RoleManagerInterface`.

```yml
# app/config/config.yml
spomkylabs_role_hierarchy:
    ...
    role_manager: "my.custom.role.manager"
```
