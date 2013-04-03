<?php

namespace Brainbits\TranscoderBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class AddDecoderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('brainbits.transcoder.decoder.resolver')) {
            return;
        }

        $decoders = array();
        foreach ($container->findTaggedServiceIds('transcoder.decoder') as $id => $attributes) {
            $decoders[] = new Reference($id);
        }

        $container->getDefinition('brainbits.transcoder.decoder.resolver')->replaceArgument(0, $decoders);
    }
}
