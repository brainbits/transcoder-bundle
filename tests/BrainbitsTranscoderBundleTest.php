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

namespace Brainbits\TranscoderBundle\Tests;

use Brainbits\TranscoderBundle\BrainbitsTranscoderBundle;
use Brainbits\TranscoderBundle\DependencyInjection\Compiler\AddDecoderPass;
use Brainbits\TranscoderBundle\DependencyInjection\Compiler\AddEncoderPass;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Transcoder bundle test.
 */
class BrainbitsTranscoderBundleTest extends TestCase
{
    use ProphecyTrait;

    public function testBuild(): void
    {
        $bundle = new BrainbitsTranscoderBundle();

        $container = $this->prophesize(ContainerBuilder::class);
        $container->addCompilerPass(Argument::type(AddDecoderPass::class))
            ->shouldBeCalled();
        $container->addCompilerPass(Argument::type(AddEncoderPass::class))
            ->shouldBeCalled();

        $bundle->build($container->reveal());
    }
}
