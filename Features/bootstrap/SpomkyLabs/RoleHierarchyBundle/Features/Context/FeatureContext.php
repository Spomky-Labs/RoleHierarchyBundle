<?php

namespace SpomkyLabs\RoleHierarchyBundle\Features\Context;

use Behat\Symfony2Extension\Context\KernelAwareContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Behat context class.
 */
class FeatureContext extends MinkContext implements KernelAwareContext, SnippetAcceptingContext
{
    private $kernel;
    private $result = null;

    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;

        return $this;
    }

    /**
     * @return \Symfony\Component\HttpKernel\KernelInterface
     */
    public function getKernel()
    {
        return $this->kernel;
    }

    /**
     * @Given I am logged in as :username
     */
    public function iAmAnLoggedInAs($username)
    {
        $client = $this->getSession()->getDriver()->getClient();

        $session = $client->getContainer()->get('session');

        $user = $this->getKernel()->getContainer()->get('test_bundle.user_manager')->getUser($username);

        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $session->set('_security_main', serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $client->getCookieJar()->set($cookie);
    }

    /**
     * @Given I am on the page :uri
     */
    public function iAmOnThePage($uri)
    {
        $client = $this->getSession()->getDriver()->getClient();
        $client->request("GET", $uri);
    }

    /**
     * @When I want to verify if I am granted :grant
     */
    public function iWantToVerifyIfIsGranted($grant)
    {
        $this->result = $this->getKernel()->getContainer()->get("security.context")->isGranted($grant);
    }

    /**
     * @Then I should get true
     */
    public function iShouldGetTrue()
    {
        if (true !== $this->result) {
            throw new \Exception("I did not get true.");
        }
    }

    /**
     * @Then I should get false
     */
    public function iShouldGetFalse()
    {
        if (false !== $this->result) {
            throw new \Exception("I did not get false.");
        }
    }
}
