<?php

declare(strict_types=1);

/*
 * This file is part of the brainbits transcoder bundle package.
 *
 * (c) brainbits GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brainbits\TranscoderBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Add decoder pass.
 */
class AddEncoderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if ($container->hasDefinition('brainbits.transcoder.encoder.resolver') === false) {
            return;
        }

        $encoders = [];
        foreach ($container->findTaggedServiceIds('transcoder.encoder') as $id => $attributes) {
            $encoders[] = new Reference($id);
        }

        $container->getDefinition('brainbits.transcoder.encoder.resolver')->replaceArgument(0, $encoders);
    }
}
