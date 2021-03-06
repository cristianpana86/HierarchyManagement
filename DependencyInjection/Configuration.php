<?php

namespace CPANA\HierarchyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('cpana_hierarchy');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
                ->children()
            ->arrayNode('group_hierarchy_manager_neo4j')
                                ->children()
                        ->scalarNode('neo4j_user')->defaultValue('')->end()
                    ->scalarNode('neo4j_password')->defaultValue('')->end()
                    ->scalarNode('def_rel_type_group_to_group')->defaultValue('')->end()
                    ->scalarNode('def_rel_type_user_to_group')->defaultValue('')->end()
                    ->scalarNode('root_group_id')->defaultValue('')->end()
                    ->scalarNode('manager_role_property')->defaultValue('')->end()
                    ->scalarNode('default_property_group')->defaultValue('')->end()
                    ->scalarNode('default_property_user')->defaultTrue()->end()
                ->end()
                       ->end() // group_hierarchy_manager_neo4j
                ->end()
                ;

        return $treeBuilder;
    }
}
