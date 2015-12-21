<?php
/*
 * This file is part of the brainbits transcoder bundle package.
 *
 * (c) brainbits GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brainbits\TranscoderBundle;

use Brainbits\TranscoderBundle\DependencyInjection\Compiler\AddDecoderPass;
use Brainbits\TranscoderBundle\DependencyInjection\Compiler\AddEncoderPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * brainbits transcoder bundle
 *
 * @author Phillip Look <plook@brainbits.net>
 */
class BrainbitsTranscoderBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AddDecoderPass());
        $container->addCompilerPass(new AddEncoderPass());
    }
}
