<?php

namespace SpomkyLabs\RoleHierarchyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('spomkylabs_role_hierarchy');

        $rootNode
            ->children()
                ->scalarNode('role_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('role_manager')->defaultValue('spomkylabs_role_hierarchy.role_manager.default')->end()
            ->end();

        return $treeBuilder;
    }
}
