<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace SpomkyLabs\TestRoleHierarchyBundle\Entity;

class UserManager
{
    protected $users = [];

    public function __construct()
    {
        $this->users['john'] = new User('john', 'doe', '0123456789', ['ROLE_SUPERVISOR']);
        $this->users['ben'] = new User('ben', 'neb', '9876543210', ['ROLE_MANAGER']);
        $this->users['ian'] = new User('ian', 'nia', '0000000000', ['ROLE_SUPERADMIN']);
    }

    public function checkEndUserPasswordCredentials(EndUserInterface $enduser, $password)
    {
        return $enduser->getPassword() === $password;
    }

    public function getUser($username)
    {
        return isset($this->users[$username]) ? $this->users[$username] : null;
    }
}
