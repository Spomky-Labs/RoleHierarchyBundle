<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2015 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace SpomkyLabs\RoleHierarchyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
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
