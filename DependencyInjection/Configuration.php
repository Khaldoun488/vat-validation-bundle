<?php

namespace Khaldoun\VatValidationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 */
class Configuration implements ConfigurationInterface
{
    const WSDL_URL = "http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl";

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('khaldoun_vat_validation');
        $rootNode
            ->children()
            ->scalarNode('wsdl_url')
            ->defaultValue(self::WSDL_URL)
            ->end();

        return $treeBuilder;
    }
}
