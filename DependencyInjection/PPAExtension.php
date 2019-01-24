<?php

namespace PPA\Bundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Config\FileLocator;

class PPAExtension extends Extension
{
    
    public function load(array $configs, ContainerBuilder $container)
    {
        var_dump($configs);
        
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . "/../Resources")
        );
        
        $loader->load("services.yml");
        
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);
    }
    
}

?>
