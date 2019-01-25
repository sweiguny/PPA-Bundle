<?php

namespace PPA\Bundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class PPAExtension extends Extension
{
    
    public function load(array $configs, ContainerBuilder $container)
    {
//        var_dump($configs);
        
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . "/../Resources")
        );
        
        $loader->load("services.yml");
        
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);
        
        
        $definition = $container->getDefinition("ppa.connection");
        $definition->setArgument(1, $config["dbal"]["db_type"]);
        $definition->setArgument(2, []);
        $definition->setArgument(3, $config["dbal"]["db_user"]);
        $definition->setArgument(4, $config["dbal"]["db_password"]);
        $definition->setArgument(5, $config["dbal"]["db_host"]);
        $definition->setArgument(6, $config["dbal"]["db_name"]);
        $definition->addMethodCall("connect");
    }
    
}

?>
