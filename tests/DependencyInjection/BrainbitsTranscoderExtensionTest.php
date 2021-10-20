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

namespace Brainbits\TranscoderBundle\Tests\DependencyInjection;

use Brainbits\TranscoderBundle\DependencyInjection\BrainbitsTranscoderExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

/**
 * Extension test.
 */
class BrainbitsTranscoderExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @inheritDoc
     */
    protected function getContainerExtensions(): array
    {
        return [new BrainbitsTranscoderExtension()];
    }

    public function testContainerHasDefaultParameters(): void
    {
        $this->load();

        $this->assertContainerBuilderHasParameter('brainbits.transcoder.decoder.7z.executable', '7z');
        $this->assertContainerBuilderHasParameter('brainbits.transcoder.encoder.7z.executable', '7z');
    }

    public function testContainerHasProvidedParameters(): void
    {
        $this->load([
            'encoder' => ['7z' => 'sevenZ'],
            'decoder' => ['7z' => 'sevenZ'],
        ]);

        $this->assertContainerBuilderHasParameter('brainbits.transcoder.decoder.7z.executable', 'sevenZ');
        $this->assertContainerBuilderHasParameter('brainbits.transcoder.encoder.7z.executable', 'sevenZ');
    }
}
