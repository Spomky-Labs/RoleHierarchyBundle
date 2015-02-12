<?php

namespace SpomkyLabs\TestRoleHierarchyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadAuthCodeData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /*$code_manager = $this->container->get('spomky_oauth2_server_auth_code_test.auth_code_manager');

        foreach ($this->getAuthCodes() as $authcode) {
            $code = $code_manager->newAuthCode();
            $code->setResourceOwner($authcode['resource_owner'])
                 ->setClient($authcode['client'])
                 ->setCode($authcode['code'])
                 ->setScope($authcode['scope'])
                 ->setRedirectUri($authcode['redirect_uri'])
                 ->setExpiresAt($authcode['expires_at']);

            $code_manager->saveAuthCode($code);
            $this->addReference('authcode-'.$authcode['code'], $code);
        }*/
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
