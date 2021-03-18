<?php

namespace PPA\Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder("php-persistence-api");

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode("dbal")
                    ->children()
                        ->scalarNode("db_type")->end()
                        ->scalarNode("db_host")->end()
                        ->integerNode("db_port")->end()
                        ->scalarNode("db_name")->end()
                        ->scalarNode("db_user")->end()
                        ->scalarNode("db_password")->end()
                    ->end()
                ->end()
                ->arrayNode("orm")
                    ->children()
                        ->scalarNode("repositories")->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }

}

?>
