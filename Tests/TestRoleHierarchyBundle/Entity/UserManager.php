<?php

namespace SpomkyLabs\TestRoleHierarchyBundle\Entity;

class UserManager
{
    protected $users = array();

    public function __construct()
    {
        $this->users['john'] = new User('john', 'doe', '0123456789', array('Supervisor'));
        $this->users['ben']  = new User('ben',  'neb', '9876543210', array('Manager'));
        $this->users['ian']  = new User('ian',  'nia', '0000000000', array('SuperAdmin'));
    }

    public function checkEndUserPasswordCredentials(EndUserInterface $enduser, $password)
    {
        return $enduser->getPassword() === $password;
    }

    public function getEndUser($username)
    {
        return isset($this->users[$username]) ? $this->users[$username] : null;
    }
}
