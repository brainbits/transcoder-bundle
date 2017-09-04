<?php
/*
 * This file is part of the brainbits transcoder bundle package.
 *
 * (c) brainbits GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brainbits\TranscoderBundle\Tests\DependencyInjection\Compiler;

use Brainbits\TranscoderBundle\DependencyInjection\Compiler\AddDecoderPass;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Add decoder pass test
 */
class AddDecoderPassTest extends TestCase
{
    public function testProcessWithoutDefinition()
    {
        $pass = new AddDecoderPass();

        $definition = new Definition(null, array(null));

        $container = $this->prophesize(ContainerBuilder::class);
        $container->hasDefinition('brainbits.transcoder.decoder.resolver')->willReturn(false);
        $container->findTaggedServiceIds('transcoder.decoder')->shouldNotBeCalled();
        $container->getDefinition('brainbits.transcoder.decoder.resolver')->shouldNotBeCalled();

        $pass->process($container->reveal());

        $this->assertNull($definition->getArgument(0)[0]);
    }

    public function testProcess()
    {
        $pass = new AddDecoderPass();

        $definition = new Definition(null, array(null));

        $container = $this->prophesize(ContainerBuilder::class);
        $container->hasDefinition('brainbits.transcoder.decoder.resolver')->willReturn(true);
        $container->findTaggedServiceIds('transcoder.decoder')->willReturn(array('test_id' => 'arg'));
        $container->getDefinition('brainbits.transcoder.decoder.resolver')->willReturn($definition);

        $pass->process($container->reveal());

        $this->assertInstanceOf(Reference::class, $definition->getArgument(0)[0]);
    }
}
