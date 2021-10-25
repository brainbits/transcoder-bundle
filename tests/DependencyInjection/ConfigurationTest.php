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

use Brainbits\TranscoderBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration test
 */
class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;

    protected function getConfiguration(): ConfigurationInterface
    {
        return new Configuration();
    }

    public function testValuesAreValidIfNoValuesAreProvided(): void
    {
        $this->assertConfigurationIsValid(
            [
                [], // no values at all
            ]
        );
    }

    public function testDefaultValues(): void
    {
        $this->assertProcessedConfigurationEquals(
            [
                [], // no values at all
            ],
            [
                'decoder' => ['7z' => '7z'],
                'encoder' => ['7z' => '7z'],
            ]
        );
    }

    public function testProvidedValues(): void
    {
        $this->assertProcessedConfigurationEquals(
            [
                [
                    'decoder' => ['7z' => 'sevenZ'],
                    'encoder' => ['7z' => 'sevenZ'],
                ],
            ],
            [
                'decoder' => ['7z' => 'sevenZ'],
                'encoder' => ['7z' => 'sevenZ'],
            ]
        );
    }
}
