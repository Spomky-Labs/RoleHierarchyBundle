<?php

namespace SpomkyLabs\RoleHierarchyBundle\Features\Context;

use Behat\Symfony2Extension\Context\KernelDictionary;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Behat context class.
 */
class FeatureContext extends MinkContext implements SnippetAcceptingContext
{
    use KernelDictionary;
}
