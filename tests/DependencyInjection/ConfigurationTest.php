<?php
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
use Matthias\SymfonyConfigTest\PhpUnit\AbstractConfigurationTestCase;

/**
 * Configuration test
 *
 * @author Stephan Wentz <swentz@brainbits.net>
 */
class ConfigurationTest extends AbstractConfigurationTestCase
{
    protected function getConfiguration()
    {
        return new Configuration();
    }

    public function testValuesAreValidIfNoValuesAreProvided()
    {
        $this->assertConfigurationIsValid(
            array(
                array() // no values at all
            )
        );
    }

    public function testDefaultValues()
    {
        $this->assertProcessedConfigurationEquals(
            array(
                array() // no values at all
            ),
            array(
                'decoder' => array(
                    '7z' => '7z'
                ),
                'encoder' => array(
                    '7z' => '7z'
                )
            )
        );
    }

    public function testProvidedValues()
    {
        $this->assertProcessedConfigurationEquals(
            array(
                array(
                    'decoder' => array(
                        '7z' => 'sevenZ'
                    ),
                    'encoder' => array(
                        '7z' => 'sevenZ'
                    )
                )
            ),
            array(
                'decoder' => array(
                    '7z' => 'sevenZ'
                ),
                'encoder' => array(
                    '7z' => 'sevenZ'
                )
            )
        );
    }
}
