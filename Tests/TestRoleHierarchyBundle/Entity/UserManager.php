<?php

namespace SpomkyLabs\TestRoleHierarchyBundle\Entity;


class UserManager
{
    protected $users = array();

    public function __construct()
    {
        $this->users['john'] = new User('john', 'doe', '0123456789', array('ROLE_SUPERVISOR'));
        $this->users['ben']  = new User('ben',  'neb', '9876543210', array('ROLE_MANAGER'));
        $this->users['ian']  = new User('ian',  'nia', '0000000000', array('ROLE_SUPERADMIN'));
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
