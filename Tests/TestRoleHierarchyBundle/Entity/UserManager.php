<?php

namespace SpomkyLabs\TestRoleHierarchyBundle\Entity;


class UserManager
{
    protected $users = array();

    public function __construct()
    {
        $this->users['john'] = new User('john', 'doe', '0123456789', array('ROLE_USER'));
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
