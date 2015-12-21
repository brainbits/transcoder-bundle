<?php

/*
 * This file is part of the brainbits transcoder bundle package.
 *
 * (c) brainbits GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brainbits\TranscoderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * BrainbitsTranscoderExtension configuration structure.
 *
 * @author Stephan Wentz <swentz@brainbits.net>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('brainbits_transcoder');

        $rootNode
            ->children()
                ->arrayNode('decoder')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('7z')
                            ->defaultValue('7z')
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('encoder')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('7z')
                            ->defaultValue('7z')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
