<?php

namespace Spomky\RoleHierarchyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

class FOSOAuthServerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor     = new Processor();
        $configuration = new Configuration($container->get('kernel.debug'));

        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load(sprintf('%s.xml', $config['db_driver']));

        $container->setAlias('spomky_role_hierarchy.role_manager', $config['role_manager']);
        $container->setParameter('spomky_role_hierarchy.role.class', $config['role_class']);
    }

    public function getAlias()
    {
        return 'spomky_role_hierarchy';
    }
}
