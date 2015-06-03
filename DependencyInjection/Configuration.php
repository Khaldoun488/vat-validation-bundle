<?php

namespace Khaldoun488\VatValidationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('khaldoun488_vat_validation');
        $rootNode
            ->children()
            ->scalarNode('wsdl_url')
            ->defaultValue('http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl')
            ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}
