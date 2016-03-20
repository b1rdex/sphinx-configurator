<?php
/**
 * @author: Viskov Sergey
 * @date: 20.03.16
 * @time: 5:58
 */


use LTDBeget\sphinx\configurator\Configuration;
use LTDBeget\sphinx\enums\eVersion;

/**
 * Class ConfiguratorTest
 */
class ConfiguratorTest extends PHPUnit_Framework_TestCase
{
    public function testChainSerializeDeserialize()
    {
        $config_path = realpath(__DIR__."/../sphinx/conf/valid.example.conf");
        $plain_config = file_get_contents($config_path);

        $referenceHash = md5((string) Configuration::fromString($plain_config, eVersion::V_2_1_8()));


        $config = Configuration::fromString($plain_config, eVersion::V_2_1_8());
        $config = Configuration::fromArray($config->toArray(), eVersion::V_2_1_8());
        $config = Configuration::fromJson($config->toJson(), eVersion::V_2_1_8());
        $config = Configuration::fromString( (string) $config, eVersion::V_2_1_8());

        $hash = md5((string) $config);

        $this->assertEquals($referenceHash, $hash);
    }

}
